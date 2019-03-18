<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\TimeShow;



class HomeController extends Controller
{

    public $_film;

    public $_timeshow;

    public function __construct
    (
        Film $film
    )
    {
        $this->_film = $film;
    }

    public function index()
    {
        $data['best_film'] = $this->_film->where('status','1')->take(6)->get();
        return view('layout.frontend.index',$data);
    }
}
