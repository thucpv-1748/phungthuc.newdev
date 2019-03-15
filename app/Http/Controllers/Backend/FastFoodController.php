<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FastFood;

class FastFoodController extends Controller
{
    //

    public $_model;

    public function __construct(FastFood $model)
    {

        $this->_model = $model;
    }

    public function addFastFood()
    {
        return view('layout.backend.fastfoodform');
    }

    public function saveFastFood(Request $request)
    {
        $model = $this ->_model;
        if($request->id){
            $model = $model->find($request->id);
        }
        $model->name = $request->name;
        $model->description = $request->description;
        $model->price = $request->price;
        try{
            if($model->save()){
                return redirect('admin/fast-food')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','error save!');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getFastFood()
    {
        $model = $this ->_model->paginate(15);
        $data['fast_food'] = $model;
        return view('layout.backend.fastfood',$data);
    }

    public function editFastFood($id)
    {
        $model = $this ->_model->find($id);
        $data['fastfood'] = $model;
        return view('layout.backend.fastfoodform',$data);
    }

    public function deleteFastFood($id)
    {
        $model = $this->_model->find($id);
        if($model->delete())
        {
            return redirect('admin/fast-food')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','delete save!');
        }
    }
}
