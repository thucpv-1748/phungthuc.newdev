<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TimeShow;
use App\Model\Film;
use App\Model\Room;

class ListShowFilmController extends Controller
{
    //

    /**
     * @var ListShowFilm
     */
    public $_model;

    /**
     * @var ListFilm
     */
    public $_listfilm;

    /**
     * @var Room
     */
    public $_room;

    /**
     * ListShowFilmController constructor.
     * @param ListShowFilm $model
     * @param ListFilm $listfilm
     * @param Room $room
     */
    public function __construct(
        TimeShow $model,
        Film $listfilm,
        Room $room
    )
    {
        $this->_model = $model;
        $this->_listfilm = $listfilm;
        $this->_room = $room;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveListShowFilm(Request $request){


        $model = $this->_model;
        if ($request->id){
            $model = $model->find($request->id);
        }
        $model->film_id = $request->film_id;
        $model->room_id = $request->room_id;
        $model->status = $request->status;
        $model->time_show = $request->time_show;
        $model->price = $request->price;
        $model->sale_price = $request->sale_price;
        try{
            if($model->save()){
                return redirect('admin/time-show')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','error save!');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addTimeShow()
    {
        $data['rooms']= $this->_room->all();
        $data['listfilms'] = $this -> _listfilm ->all();
        return view('layout.backend.listshowform',$data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function editTimeShow($id)
    {
       $model = $this->_model->find($id);
       if($model)
       {
           $data['timeshow'] = $model;
           $data['rooms']= $this->_room->all();
           $data['listfilms'] = $this -> _listfilm ->all();
           return view('layout.backend.listshowform',$data);
       }else{
           return redirect()->back()->with('error','not found!');
       }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function getTimeShow(){
        $model = $this->_model->paginate(15);
        $data['time_show'] = $model;
        return view('layout.backend.timeshow',$data);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function deleteTimeShow($id)
    {
        $model = $this->_model->find($id);
        if($model->delete())
        {
            return redirect('admin/time-show')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','not found!');
        }
    }
}
