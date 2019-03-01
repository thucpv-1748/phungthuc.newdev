<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\Seat;
use App\Model\Store;


class RoomController extends Controller
{
    //

    /**
     *
     */
    public function getRoom()
    {
       $room = Room::paginate(15);
       return view('layout/backend');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function saveRoom(Request $request)
    {
        $room = new Room;
        $id = $request->id;
        if($id){
            $room = $room::find($id);
        }
        $room->name = $request-> name;
        $room->id_store = $request->id_store;
        try{
            if($room->save()){
                $this->saveSeatByRoom($room->id,$request->row);
                return redirect('admin/room')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','error save!');
            }
        }catch(\Exception $e){
            // insert query
        return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * @param $id_room
     * @param $SeatRequest
     * @return \Illuminate\Http\RedirectResponse
     */

    public function saveSeatByRoom($id_room,$SeatRequest){
        $seat = new Seat;
        $seat = $seat::where('id_room',$id_room);
        if($seat){
            $seat->delete();
        }
        try{
            if(count($SeatRequest) > 0)
            {
                foreach ($SeatRequest as $key => $value){
                    $seat = new Seat;
                    $seat->row = $key;
                    $seat->number = $value;
                    $seat->id_room = $id_room;
                    $seat->save();
                }
            }else{
                return redirect()->back()->with('error','error save!');
            }
        }catch (\Exception $e)
        {
            $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }


    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addRoom()
    {
        $store = Store::all();
        $data['store'] = $store;
        return view('layout/backend/addroom',$data);
    }




}
