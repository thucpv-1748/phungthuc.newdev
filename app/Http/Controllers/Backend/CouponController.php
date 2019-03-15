<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Coupon;

class CouponController extends Controller
{
    //

    /**
     * @var Coupon
     */

    protected $_model;

    /**
     * CouponController constructor.
     * @param Coupon $model
     */
    public function __construct(Coupon $model)
    {
        $this->_model = $model;

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCoupon()
    {
        return view('layout.backend.couponform');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveCoupon(Request $request)
    {
        $model = $this->_model;
        if($request->id){
            $model =  $model->find($request->id);
        }
        $model->name = $request->name;
        $model->coupon_code = $request->coupon_code;
        $model->status = $request->status;
        $model->type = $request->type;
        $model->percent = ($request->percent)?$request->percent : 0;
        $model->price = ($request->price)?$request->price : 0;
        try{
            if($model->save()){
                return redirect('admin/coupon')->with('success','save successful!');
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

    public function getCoupon()
    {
        $data['coupon'] = $this->_model->paginate(15);
        return view('layout.backend.coupon',$data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editCoupon($id){
        $model = $this->_model->find($id);
        if($model){
            $data['coupon'] = $model;
            return view('layout.backend.couponform',$data);
        }else{
            return redirect()->back()->with('error','not found !');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCoupon($id){
        $model = $this->_model->find($id);
        if($model->delete())
        {
            return redirect('admin/coupon')->with('success','delete successful!');
        }else{
            return redirect()->back()->with('error','delete save!');
        }
    }
}
