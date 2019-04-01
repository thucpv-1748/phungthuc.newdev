<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\CategoryInterface;



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
     * HomeController constructor.
     * @param FilmInterface $film
     * @param CategoryInterface $category
     */
    public function __construct(FilmInterface $film, CategoryInterface $category)
    {
        $this->film = $film;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bestfilm = $this->film->where('status','1')->take(6)->get();

        return view('layout.frontend.index', compact('bestfilm'));
    }
}
