<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TimeShowInterface;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\RoomInterface;

class ListShowFilmController extends Controller
{
    /**
     * @var ListShowFilm|TimeShowInterface
     */
    public $model;

    /**
     * @var ListFilm|FilmInterface
     */
    public $listfilm;

    /**
     * @var Room|RoomInterface
     */
    public $room;

    /**
     * ListShowFilmController constructor.
     * @param TimeShowInterface $model
     * @param FilmInterface $listfilm
     * @param RoomInterface $room
     */
    public function __construct(
        TimeShowInterface $model,
        FilmInterface $listfilm,
        RoomInterface $room
    )
    {
        $this->model = $model;
        $this->listfilm = $listfilm;
        $this->room = $room;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createListShowFilm(Request $request)
    {
        try{
            $this->model->create($request->all());

            return redirect('admin/time-show')->with('success', __('save successful!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateListShowFilm(Request $request)
    {
        try{
            $this->model->update($request->id, $request->all());

            return redirect('admin/time-show')->with('success', __('save successful!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addTimeShow()
    {
        $rooms = $this->room->all();
        $listfilms = $this->listfilm->all();

        return view('layout.backend.listshowform', compact('rooms', 'listfilms'));
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function editTimeShow($id)
    {
       $model = $this->model->findOrFail($id);
       if ($model) {
           $timeshow = $model;
           $rooms = $this->room->all();
           $listfilms = $this->listfilm->all();

           return view('layout.backend.listshowform', compact('timeshow', 'rooms', 'listfilms'));
       } else {
           return redirect()->back()->with('error', __('not found!'));
       }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function getTimeShow()
    {
        $time_show = $this->model->paginate(Config('setting.paginate'));

        return view('layout.backend.timeshow', compact('time_show'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function deleteTimeShow($id)
    {
        $model = $this->model->findOrFail($id);
        if($model->delete())
        {
            return redirect('admin/time-show')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','not found!');
        }
    }
}
