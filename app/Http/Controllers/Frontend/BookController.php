<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\TimeShow;



class BookController extends Controller
{

    public $_film;

    public $_timeshow;

    public function __construct
    (
        Film $film,
        TimeShow $timeshow
    )
    {
        $this->_film = $film;
        $this->_timeshow = $timeshow;
    }

    public function getStep1()
    {
        $data['film'] = $this->_film->where('status','1')->get();
        return view('layout.frontend.step1',$data);
    }
}
