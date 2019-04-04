<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\OrderInterface;

class DashboardController extends Controller
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
     * @var User
     */
    public $user;
    /**
     * @var OrderInterface
     */
    public $order;

    /**
     * DashboardController constructor.
     * @param FilmInterface $film
     * @param CategoryInterface $category
     * @param UserInterface $user
     * @param OrderInterface $order
     */

    public function __construct(
        FilmInterface $film,
        CategoryInterface $category,
        UserInterface $user,
        OrderInterface $order
    ) {
        $this->category = $category;
        $this->film = $film;
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getDashboard()
    {
        $category = $this->category->all()->count();
        $user = $this->user->all()->count();
        $order = $this->order->all()->count();
        $film = $this->film->all()->count();

        return view('layout/backend/dashboard', compact('category', 'user', 'order', 'film'));
    }
}
