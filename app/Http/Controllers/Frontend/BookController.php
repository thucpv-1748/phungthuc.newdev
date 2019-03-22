<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\TimeShow;
use App\Model\Store;
use App\Model\Room;
use App\Model\FastFood;
use App\Model\Coupon;


class BookController extends Controller
{
    /**
     * @var Coupon
     */
    public $_coupon;
    /**
     * @var FastFood
     */

    public $_fastfood;
    /**
     * @var Film
     */
    public $_film;

    /**
     * @var TimeShow
     */
    public $_timeshow;

    /**
     * @var Store
     */
    public $_store;

    /**
     * @var Room
     */
    public $_room;

    /**
     * BookController constructor.
     * @param Film $film
     * @param TimeShow $timeshow
     * @param Store $store
     * @param Room $room
     * @param FastFood $fastFood
     * @param Coupon $coupon
     */
    public function __construct
    (
        Film $film,
        TimeShow $timeshow,
        Store $store,
        Room $room,
        FastFood $fastFood,
        Coupon $coupon
    )
    {
        $this->_film = $film;
        $this->_timeshow = $timeshow;
        $this->_store = $store;
        $this->_room = $room;
        $this->_fastfood = $fastFood;
        $this->_coupon = $coupon;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStep1($id)
    {

        $data['film'] =  $this->_film->find($id);
        $data['room'] = $this->_room;

        return view('layout.frontend.step1',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function postStep1(Request $request)
    {

        $id = $request->choosen_time;
        if ($id)
        {
            return Redirect('/step2/'.$id);
        }else{
            return Redirect()->back()->with('error','not found!');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getStep2($id)
    {
        $time_show = $this->_timeshow->find($id);
        $seats = [];
        if($time_show){
            $data['time_show'] = $time_show;
            $select_seat = $time_show->order;
            foreach ($select_seat as $value ){
                $seats = array_merge($seats, explode(',',$value->seat));
            }
            $data['seat_ids'] = $seats;
            return view('layout.frontend.step2',$data);
        }else{
            return Redirect()->back()->with('error','not found!');
        }

    }

    public function postStep2(Request $request)
    {
        $request->Session()->put('checkout',$request->all());

        return Redirect('/step3');
    }

    public function getStep3(Request $request)
    {
        if($request->session()->has('checkout'))
        {
            $data['fast_food'] = $this->_fastfood->all();
            $data['data'] = $request->session()->get('checkout');

            return view('layout.frontend.step3',$data);
        }else{
            return Redirect('/step3')->back()->with('error','not found!');
        }
    }

    public function getCoupon(Request $request)
    {
        $code = $request->code;
        $coupon = $this ->_coupon->where('coupon_code',$code)->where('status','1')->first();
        if($coupon){
            return response()->json(array('success' => true, 'data'=>$coupon));
        }else{
            return response()->json(array('success' => false, 'data'=>$coupon));
        }
    }
}
