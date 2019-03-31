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
    public function createOrder(Request $request)
    {
        try{
            $this->model->create($request->all());

            return redirect('admin/order')->with('success','save successful!');
        }catch(\Exception $e){
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrder(Request $request)
    {
        try{
            $this->model->update($request->id, $request->all());

            return redirect('admin/order')->with('success','save successful!');
        }catch(\Exception $e){
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function ajaxGetCoupon($id)
    {
       $coupon = $this->coupon->findOrFail($id);
       if ($coupon) {
           $data = $coupon->toJson();

           return response()->json(array('success' => true,'data'=>$data));
       }else{
           return response()->json(array('success' => false));
       }
    }


    public function ajaxGetTimeShow($id)
    {
        $timeShow = $this->timeShow->findOrFail($id);
        if ($timeShow && $timeShow->status == 1) {
            $timeShow->room->seat;
            $timeShow->order;
            $time_show = $timeShow->toJson();

            return response()->json(array('success' => true, 'data' => $time_show));
        } else {
            return response()->json(array('success' => false));
        }
    }

    public function editOrder($id)
    {
        $order = $this->model->findOrFail($id);
        $fastFood = $this->fastFood->all();
        $timeShow = $this->timeShow->all();
        $coupon = $this->coupon->where('status', '=', '1')->get();

        return view('layout.backend.orderform', compact('order', 'fastFood', 'timeShow', 'coupon'));
    }

    public function getOrder()
    {
       $model = $this->model->paginate(config('setting.paginate'));
        $data['order'] = $model;
        return view('layout/backend/order',$data);
    }
}
