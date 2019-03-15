<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Store;
class StoreController extends Controller
{
    //

    /**
     * @var Store
     */
    protected $_model;

    /**
     * StoreController constructor.
     * @param Store $model
     */
    public function __construct(Store $model)
    {

        $this->_model = $model;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStore(){
        $store = $this->_model->paginate(15);
        $data['store']= $store;
        return view('layout/backend/store',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function addStore()
    {
        return view('layout/backend/storeform');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveStore(Request $request)
    {
        $store =$this->_model;
        $id = $request->id;
        if($id){
            $store = $store::find($id);
        }
        try{
            $store->name = $request->name;
            $store->description = $request->description;
            if($store->save()){
                return redirect('admin/store')->with('success','save successful!');
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
    public function editStore($id)
    {
        $store = $this->_model;
         $store = $store::find($id);
         if($store){
             $data['store'] = $store;
             return view('layout/backend/storeform', $data);
         }else{
             return redirect()->back()->with('error', 'Not found! please check Store!');
         }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteStore($id)
    {
        $store =$this->_model;
        $store = $store::find($id);
        if ($store) {
            $store->delete();
            return redirect()->back()->with('success', 'delete successful!');
        } else {
            return redirect()->back()->with('error', 'Not found! please check store!');
        }
    }


}
