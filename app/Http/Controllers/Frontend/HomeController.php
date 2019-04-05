<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\StoreInterface;

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
     * HomeController constructor.
     * @param FilmInterface $film
     * @param CategoryInterface $category
     * @param StoreInterface $store
     */
    public function __construct(FilmInterface $film, CategoryInterface $category, StoreInterface $store)
    {
        $this->film = $film;
        $this->category = $category;
        $this->store = $store;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bestfilm = $this->film->where('status', '1')->take(6)->get();
        $cinema = $this->store->all();
        $category = $this->category->all();

        return view('layout.frontend.index', compact('bestfilm', 'cinema', 'category'));
    }
}
