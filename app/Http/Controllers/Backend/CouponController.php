<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CouponInterface;

class CouponController extends Controller
{
    /**
     * @var CouponInterface 
     */

    protected $model;

    /**
     * CouponController constructor.
     * @param CouponInterface $model
     */
    public function __construct(CouponInterface $model)
    {
        $this->model = $model;
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
    public function createCoupon(Request $request)
    {
        try {
            $this->model->create($request->all());

            return redirect('admin/coupon')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCoupon(Request $request)
    {
        try {
            $this->model->update($request->id, $request->all());

            return redirect('admin/coupon')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getCoupon()
    {
        $coupon = $this->model->paginate(config('setting.paginate'));

        return view('layout.backend.coupon', compact('coupon'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editCoupon($id)
    {
        $coupon = $this->model->findOrFail($id);
        if ($coupon) {
            return view('layout.backend.couponform', compact('coupon'));
        } else {
            return redirect()->back()->with('error', __('not found !'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCoupon($id)
    {
        $model = $this->model->findOrFail($id);
        if ($model->delete()) {
            return redirect('admin/coupon')->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('delete save!'));
        }
    }
}
