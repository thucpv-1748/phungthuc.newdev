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
     * @var Room
     */

    protected $_model;
    /**
     * @var Store
     */
    protected $_store;
    /**
     * @var Seat
     */
    protected $_seat;


    /**
     * RoomController constructor.
     * @param Room $model
     * @param Store $store
     * @param Seat $seat
     */
    public function __construct(
        Room $model,
        Store $store,
        Seat $seat
    )
    {
        $this->_model=$model;
        $this->_store = $store;
        $this->_seat = $seat;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoom()
    {
       $room = $this->_model->with('store')->paginate(15);
       $data['room'] = $room;
       return view('layout/backend/room',$data);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function saveRoom(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'id_store'           => 'required',
            'row.*'           =>'required|min:1',
        ]);
        $room =$this->_model;
        $id = $request->id;
        if($id){
            $room = $room::find($id);
        }
        $room->name = $request-> name;
        $room->store_id = $request->id_store;
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
        $seat = $this->_seat;
        $seat->where('room_id',$id_room)->delete();
        try{
            if(count($SeatRequest) > 0)
            {
                foreach ($SeatRequest as $key => $value){
                    $seat =new seat;
                    $seat->row = $key;
                    $seat->col = ($value > 0)?$value:1;
                    $seat->room_id = $id_room;
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
        $store = $this->_store->all();
        $data['store'] = $store;
        $data['seat'] = [];
        return view('layout/backend/addroom',$data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editRoom($id){
        $NameRow = array(
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'K',
            'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y',
            'Z'
        );
        $store =  $this->_store->all();
        $room =  $this->_model->find($id);
        $data['room']=$room;
        $data['seat']=$room->seat->sortBy('row')->toArray();
        $data['store'] = $store;
        $data['namerow'] = $NameRow;

        return view('layout/backend/addroom',$data);
    }

    public function deleteRoom($id)
    {
        $seat =  $this->_seat;
        $room =  $this->_model;
        $room = $room::find($id);
        $seat::where('room_id',$id)->delete();
        if($room->delete())
        {
            return redirect('admin/room')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','delete save!');
        }


    }


}
