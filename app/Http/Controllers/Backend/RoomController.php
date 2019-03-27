<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StoreInterface;
use App\Repositories\Contracts\SeatInterface;
use App\Repositories\Contracts\RoomInterface;

class RoomController extends Controller
{
    /**
     * @var RoomInterface
     */
    protected $model;
    /**
     * @var StoreInterface
     */
    protected $store;
    /**
     * @var SeatInterface
     */
    protected $seat;


    /**
     * RoomController constructor.
     * @param RoomInterface $model
     * @param StoreInterface $store
     * @param SeatInterface $seat
     */
    public function __construct(RoomInterface $model, StoreInterface $store, SeatInterface $seat)
    {
        $this->model = $model;
        $this->store = $store;
        $this->seat = $seat;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoom()
    {
        $room = $this->model->with('store')->paginate(config('setting.paginate'));

        return view('layout/backend/room', compact('room'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function createRoom(Request $request)
    {
        try {
            $this->model->createRoom($request);

            return redirect('admin/room')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateRoom(Request $request)
    {
        try {
            $this->model->updateRoom($request);

            return redirect('admin/room')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addRoom()
    {
        $store = $this->store->all();
        $seat = [];

        return view('layout/backend/roomform', compact('store', 'seat'));
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editRoom($id)
    {
        $store = $this->store->all();
        $room = $this->model->findOrFail($id);
        $seat = $room->seat->sortBy('row')->toArray();

        return view('layout/backend/roomform', compact('store', 'room', 'seat'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRoom($id)
    {
        $room = $this->model->findOrFail($id);
        if ($room->delete()) {
            $this->seat->where('room_id', $id)->delete();

            return redirect('admin/room')->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('delete save!'));
        }
    }
}
