<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StoreInterface;

class CinemaController extends Controller
{
    public $store;

    public function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }


    public function getAll()
    {
       $store = $this->store->all();

       return view('layout.frontend.cinema-list');
    }
}
