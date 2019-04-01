<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StoreInterface;

class CinemaController extends Controller
{
    /**
     * @var StoreInterface
     */
    public $store;

    /**
     * CinemaController constructor.
     * @param StoreInterface $store
     */

    public function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAll()
    {
       $store = $this->store->all();

       return view('layout.frontend.cinema-list', compact('store'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComingSoon()
    {
        return view('layout.frontend.coming-soon');
    }
}
