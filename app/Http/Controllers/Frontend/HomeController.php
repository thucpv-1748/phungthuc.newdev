<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\Category;



class HomeController extends Controller
{

    public $_film;

    public $_category;

    public function __construct
    (
        Film $film,
        Category $category
    )
    {
        $this->_film = $film;
        $this->_category = $category;
    }

    public function index()
    {
        $data['best_film'] = $this->_film->where('status','1')->take(6)->get();
        return view('layout.frontend.index',$data);
    }
}
