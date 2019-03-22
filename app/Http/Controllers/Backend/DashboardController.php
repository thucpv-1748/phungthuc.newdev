<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\Category;
use App\User;
use App\Model\Order;

class DashboardController extends Controller
{
    public $_film;
    public $_category;
    public $_user;
    public $_order;

    public function __construct
    (
        Film $film,
        Category $category,
        User $user,
        Order $order
    )
    {
        $this -> _category = $category;
        $this -> _film = $film;
        $this -> _user = $user;
        $this -> _order = $order;
    }

    public function getDashboard(){
        $data['category'] = $this->_category->all()->count();
        $data['user'] = $this->_user->all()->count();
        $data['order'] = $this->_order->all()->count();
        $data['film'] = $this->_film->all()->count();

        return view('layout/backend/dashboard',$data);
    }
}
