<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OrderInterface;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\CouponInterface;
use App\Repositories\Contracts\TimeShowInterface;
use App\Repositories\Contracts\FastFoodInterface;


class OrderController extends Controller
{
    /**
     * @var OrderInterface
     */

    public $model;

    /**
     * @var CouponInterface
     */
    public $coupon;

    /**
     * @var TimeShowInterface
     */
    public $timeShow;

    /**
     * @var FastFoodInterface
     */
    public $fastFood;

    /**
     * OrderController constructor.
     * @param OrderInterface $model
     * @param CouponInterface $coupon
     * @param TimeShowInterface $timeShow
     * @param FastFoodInterface $fastFood
     */
    public function __construct(
        OrderInterface $model,
        CouponInterface $coupon,
        TimeShowInterface $timeShow,
        FastFoodInterface $fastFood
    )
    {
        $this->model = $model;
        $this->coupon = $coupon;
        $this->fastFood = $fastFood;
        $this->timeShow = $timeShow;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addOrder()
    {
        $fastFood = $this->fastFood->all();
        $timeShow = $this->timeShow->all();
        $coupon  = $this->coupon->where('status', '=', '1')->get();
        return view('layout.backend.orderform', compact('fastFood', 'timeShow', 'coupon'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveOrder(Request $request){
            $model = $this ->model;
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
       $coupon = $this->coupon->find($id);
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
        $timeShow = $this->timeShow->find($id);
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
       $model = $this->model->find($id);
       if($model){
                $data['order'] = $model;
               $data['fastFood'] = $this->fastFood->all();
               $data['timeShow'] = $this->timeShow->all();
               $data['coupon']  = $this->coupon->where('status','=','1')->get();
                return view('layout.backend.orderform',$data);
            }else{
                return redirect()->back()->with('error','not found !');
       }
    }

    public function getOrder()
    {
       $model = $this->model->paginate(15);
        $data['order'] = $model;
        return view('layout/backend/order',$data);

    }
}
