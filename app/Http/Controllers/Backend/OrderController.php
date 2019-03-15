<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Support\Facades\Auth;
use App\Model\Coupon;
use App\Model\TimeShow;
use App\Model\FastFood;


class OrderController extends Controller
{


    /**
     * @var Order
     */

    public $_model;

    /**
     * @var Coupon
     */
    public $_coupon;

    /**
     * @var TimeShow
     */
    public $_timeShow;

    /**
     * @var FastFood
     */
    public $_fastFood;

    /**
     * OrderController constructor.
     * @param Order $model
     * @param Coupon $coupon
     * @param TimeShow $timeShow
     * @param FastFood $fastFood
     */
    public function __construct(
        Order $model,
        Coupon $coupon,
        TimeShow $timeShow,
        FastFood $fastFood
    )
    {
        $this->_model = $model;
        $this->_coupon = $coupon;
        $this->_fastFood = $fastFood;
        $this->_timeShow = $timeShow;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addOrder()
    {
        $data['fastFood'] = $this->_fastFood->all();
        $data['timeShow'] = $this->_timeShow->all();
        $data['coupon']  = $this->_coupon->where('status','=','1')->get();
        return view('layout.backend.orderform',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveOrder(Request $request){
            $model = $this ->_model;
            $id = $request->id;
            if($id){
                $model = $model->find($id);
            }
            $model->user_id = Auth::user()->id;
            $model->time_show_id = $request->time_show_id;
            $model->coupon_id = $request->coupon_id;
            $model->fast_food_ids = $request->fast_food_ids;
            $model->seat = implode(',',$request->seat_ids);
            $model->status = $request->status;
            $model->total_price = $request->total_price;
            $model->sale_price = $request->sale_price;
            $model->final_price = $request -> final_price;
            try{
                if($model->save()){
                    return redirect('admin/order')->with('success','save successful!');
                }else{
                    return redirect()->back()->with('error','error save!');
                }
            }catch(\Exception $e){
                // insert query
                return redirect()->back()->with('error', $e->getMessage());
            }
    }


    public function ajaxGetCoupon($id)
    {
       $coupon = $this->_coupon->find($id);
       if($coupon)
       {
           $data = $coupon->toJson();
           return response()->json(array('success' => true,'data'=>$data));
       }else{
           return response()->json(array('success' => false));
       }
    }


    public function ajaxGetTimeShow($id)
    {
        $timeShow = $this->_timeShow->find($id);
        if($timeShow && $timeShow->status == 1)
        {
            $timeShow->room->seat;
            $timeShow->order;
            $time_show = $timeShow->toJson();
            return response()->json(array('success' => true,'data'=>$time_show));
        }else{
            return response()->json(array('success' => false));
        }
    }

    public function editOrder($id)
    {
       $model = $this->_model->find($id);
       if($model){
                $data['order'] = $model;
               $data['fastFood'] = $this->_fastFood->all();
               $data['timeShow'] = $this->_timeShow->all();
               $data['coupon']  = $this->_coupon->where('status','=','1')->get();
                return view('layout.backend.orderform',$data);
            }else{
                return redirect()->back()->with('error','not found !');
       }
    }

    public function getOrder()
    {
       $model = $this->_model->paginate(15);
        $data['order'] = $model;
        return view('layout/backend/order',$data);

    }
}
