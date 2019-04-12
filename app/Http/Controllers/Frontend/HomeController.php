<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\StoreInterface;
use App\Repositories\Contracts\RateInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * @var FilmInterface
     */
    public $film;

    /**
     * @var CategoryInterface
     */
    public $category;

    /**
     * @var StoreInterface
     */

    public $store;

    /**
     * @var RateInterface
     */

    public $rate;

    /**
     * HomeController constructor.
     * @param FilmInterface $film
     * @param CategoryInterface $category
     * @param StoreInterface $store
     * @param RateInterface $rate
     */
    public function __construct(
        FilmInterface $film,
        CategoryInterface $category,
        StoreInterface $store,
        RateInterface $rate
    ) {
        $this->film = $film;
        $this->category = $category;
        $this->store = $store;
        $this->rate = $rate;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bestfilm = $this->film->where('status', '1')->take(config('setting.item_home'))->get();
        $cinema = $this->store->all();
        $category = $this->category->all();
        $rate = $this->rate;

        return view('layout.frontend.index', compact('bestfilm', 'cinema', 'category', 'rate'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */

    public function ajaxFilter(Request $request)
    {
        $type = $request->data_fill;
        $returnHTML = '';
        switch ($type) {
            case 'film-category':
                $category = $this->category->where('title', 'LIKE', "%".$request->value."%")->get();
                $returnHTML = view('layout.frontend.subtemplate.subfilter', compact( 'category' , 'type'))->render();
                break;
            case 'film':
                $film = $this->film->where('title', 'LIKE', "%".$request->value."%")->get();
                $returnHTML = view('layout.frontend.subtemplate.subfilter', compact( 'film' , 'type'))->render();
                break;
        }
        return response()->json(['success' => true, 'html' => $returnHTML]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postRate(Request $request)
    {
        try {
            if (Auth::check()) {
                $this->rate->createRate($request);

                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}