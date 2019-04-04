<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\TimeShowInterface;
use App\Repositories\Contracts\StoreInterface;
use App\Repositories\Contracts\RoomInterface;
use App\Repositories\Contracts\FastFoodInterface;
use App\Repositories\Contracts\CouponInterface;
use App\Repositories\Contracts\OrderInterface;

class BookController extends Controller
{
    /**
     * @var Coupon
     */
    public $coupon;
    /**
     * @var FastFood
     */

    public $fastfood;
    /**
     * @var Film
     */

    public $film;
    /**
     * @var TimeShow
     */

    public $timeshow;
    /**
     * @var Store
     */

    public $store;
    /**
     * @var Room
     */

    public $room;
    /**
     * @var OrderInterface
     */

    public $order;
    /**
     * BookController constructor.
     * @param FilmInterface $film
     * @param TimeShowInterface $timeshow
     * @param StoreInterface $store
     * @param RoomInterface $room
     * @param FastFoodInterface $fastFood
     * @param CouponInterface $coupon
     * @param OrderInterface $order
     */

    public function __construct(
        FilmInterface $film,
        TimeShowInterface $timeshow,
        StoreInterface $store,
        RoomInterface $room,
        FastFoodInterface $fastFood,
        CouponInterface $coupon,
        OrderInterface $order
    ) {
        $this->film = $film;
        $this->timeshow = $timeshow;
        $this->store = $store;
        $this->room = $room;
        $this->fastfood = $fastFood;
        $this->coupon = $coupon;
        $this->order = $order;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStep1($id)
    {
        $film =  $this->film->findOrFail($id);
        $room = $this->room;

        return view('layout.frontend.step1', compact('film', 'room'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function postStep1(Request $request)
    {
        $id = $request->choosen_time;
        if ($id) {
            return Redirect('/step2/' . $id);
        } else {
            return Redirect()->back()->with('error', __('not found!'));
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getStep2($id)
    {
        $timeshow = $this->timeshow->findOrFail($id);
        $seatids = [];
        if ($timeshow) {
            $selectseat = $timeshow->order;
            foreach ($selectseat as $value) {
                $seatids = array_merge($seatids, explode(',', $value->seat));
            }

            return view('layout.frontend.step2', compact('timeshow', 'seatids'));
        } else {
            return Redirect()->back()->with('error', __('not found!'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postStep2(Request $request)
    {
        $request->Session()->put('checkout', $request->all());

        return Redirect('/step3');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getStep3(Request $request)
    {
        if ($request->session()->has('checkout')) {
            $fastfood = $this->fastfood->all();
            $data = $request->session()->get('checkout');

            return view('layout.frontend.step3', compact('fastfood', 'data'));
        } else {
            return Redirect('/step3')->back()->with('error', __('not found!'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoupon(Request $request)
    {
        $code = $request->code;
        $coupon = $this ->coupon->where('coupon_code', $code)->where('status', '1')->first();
        if ($coupon) {
            return response()->json(['success' => true, 'data' => $coupon]);
        } else {
            return response()->json(['success' => false, 'data' => $coupon]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createOrder(Request $request)
    {
        $data = $this->order->create($request->all());
        $request->session()->forget('checkout');

        return Redirect('/thank-you/' . $data->id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getThankYou($id)
    {
        $order = $this->order->findOrFail($id);
        $seats = explode(',', $order->seat);
        $sits = [];
        if ($seats) {
            foreach ($seats as $seat) {
                $seat = explode('-', $seat);
                if (isset($seat[1])) {
                    $sits[] = $seat[1] . config('nameRow.' . $seat[0]);
                }
            }
        }
        $sits = implode(',', $sits);
        $fastfoods = explode(',', $order->fast_food_ids);
        $fastfood = [];
        if ($fastfoods) {
            foreach ($fastfoods as $value) {
                $food = explode('-', $value);
                if ($food[0]) {
                    $fastfood[] = $this->fastfood->findOrFail($food[0])->name . ' : ' . $food[1];
                }
            }
        }
        $fastfood = implode(',', $fastfood);

        return view('layout.frontend.step-final', compact('order', 'sits', 'fastfood'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBook()
    {
        $film = $this->film->all();

        return view('layout.frontend.book', compact('film'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getTimeByDate(Request $request)
    {
        $id = $request->id;
        $film = $this->film->findOrFail($id);
        $room = $this->room;
        if ($film) {
            $date = $request->date;
            $returnHTML = view('layout.frontend.subtemplate.subtimebydate', compact('film', 'room', 'date'))->render();

            return response()->json(['success' => true, 'html' => $returnHTML]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
