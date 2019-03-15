<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Film;

class FilmController extends Controller
{
    //

    /**
     * @var ListFilm
     */
    public $listFilm;


    /**
     * @var Category
     */
    public $category;

    /**
     * ListFilmController constructor.
     * @param ListFilm $listFilm
     * @param Category $category
     */
    public function __construct(Film $listFilm,Category $category)
    {
        $this->listFilm = $listFilm;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addListFilm(){
        $data['category'] =  $this->category->all();
        return view('layout/backend/listfilmform',$data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveListFilm(Request $request){
        $model = $this->listFilm;
        if ($request->id){
            $model = $model->find($request->id);
        }

        if($request->hasFile('img')){
            $file = $request->img;
           $partfile = $file->move('resources/img/upload',$file->getClientOriginalName());
            $model->img = $partfile;
        }
        $model->title = $request->title;
        $model->description = $request->description;
        $model->language = $request->language;
        $model->subtitle = $request->subtitle;
        $model->time = $request->time;
        $model->status = $request->status;
        $model->category_id = $request->category_id;
        $model->fist_show = $request->fist_show;
        $model->director = $request->director;
        $model->actor = $request->actor;
        try{
            if($model->save()){
                return redirect('admin/list-film')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','error save!');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editListFilm($id){
        $model = $this->listFilm->find($id);
        $data['category'] = $this->category->all();
        $data['listfilm'] = $model;

        return view('layout/backend/listfilmform',$data);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getListFilm(){
        $model = $this->listFilm->paginate(15);
        $data['listfilm'] = $model;
        return view('layout/backend/listfilm',$data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteListFilm($id){
        $model = $this->listFilm->find($id);
        if($model->delete())
        {
            return redirect('admin/list-film')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','delete save!');
        }
    }
}
