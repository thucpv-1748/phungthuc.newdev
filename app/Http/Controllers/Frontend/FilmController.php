<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\Room;
use App\Model\Category;

class FilmController extends Controller
{

    public $_film;

    public $_room;

    public $_category;

    public function __construct
    (
        Film $film,
        Room $room,
        Category $category

    )
    {
        $this->_film = $film;
        $this->_room = $room;
        $this->_category = $category;
    }


    public function getFilm($id)
    {
        $film = $this->_film ->find($id);
        if ($film)
        {
             $data['film'] = $film;
             $data['room'] = $this->_room;
             return view('layout.frontend.filmdetails',$data);
        }else{
             return Redirect()->back()->with('error','not found!');
        }

    }

    public function getCategory($id)
    {
        $category = $this->_category->find($id);
        if ($category)
        {
            $data['category'] = $category;
            $data['room'] = $this->_room;
            return view('layout.frontend.category',$data);
        }else{
            return Redirect()->back()->with('error','not found!');
        }
    }


    public function getData(Request $request)
    {
        $id = $request->id;
        $date = $request->date;
        $category = $this->_category->find($id);
        $sortby = $request->sortby;
        if ($category)
        {
            $data['category'] = $category;
            $data['room'] = $this->_room;
            $data['date'] = $date;
            $data['sortby'] = $sortby;
            $returnHTML = view('layout.frontend.subtemplate.selecttime',$data)->render();

            return response()->json(array('success' => true, 'html'=>$returnHTML));

        }else{
            return response()->json(array('success' => false));
        }
    }
}
