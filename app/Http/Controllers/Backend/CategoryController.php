<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    /**
     * @var Category
     */
    protected $_model;

    /**
     * CategoryController constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this -> _model = $model;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory()
    {
        $data['category'] = $this->_model->paginate(15);
        return view('layout/backend/category',$data);

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function getFormCategory(){

        return view('layout/backend/categoryform');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategory(Request $request){
        $Category = $this->_model;
        $id = $request->id_category;
        if($id){
            $Category = $Category::find($id);
        }
        try{
            $Category->title = $request->name;
            $Category->description = $request->description;
            if($Category->save()){
                return redirect('admin/category')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','save error!');
            }

        }catch(\Exception $e){
            // insert query
        return redirect()->back()->with('error', $e->getMessage());
        }

    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editCategory($id)
    {
        $Category = $this->_model;
        if ($id) {
            $Category = $Category::find($id)->toArray();
            $data['category'] = $Category;
            return view('layout/backend/categoryform', $data);
        } else {
            return redirect()->back()->with('error', 'Not found! please check Category!');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id){
            $Category = $this->_model;
            $Category = $Category::find($id);
            if ($Category) {
                $Category->delete();
                return redirect()->back()->with('success', 'delete successful!');
            } else {
                return redirect()->back()->with('error', 'Not found! please check Category!');
            }

     }


}
