<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\RoomInterface;
use App\Repositories\Contracts\CategoryInterface;

class FilmController extends Controller
{

    /**
     * @var FilmInterface
     */
    public $film;

    /**
     * @var RoomInterface
     */
    public $room;


    /**
     * @var CategoryInterface \
     */
    public $category;


    /**
     * FilmController constructor.
     * @param FilmInterface $film
     * @param RoomInterface $room
     * @param CategoryInterface $category
     */
    public function __construct(FilmInterface $film, RoomInterface $room, CategoryInterface $category)
    {
        $this->film = $film;
        $this->room = $room;
        $this->category = $category;
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getFilm($id)
    {
        $film = $this->film ->find($id);
        if ($film) {
             $room = $this->room;

             return view('layout.frontend.filmdetails', compact('film', 'room'));
        }else{
             return Redirect()->back()->with('error', __('not found!'));
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function getCategory($id)
    {
        $category = $this->category->findOrFail($id);
        if ($category) {
            $room = $this->room;

            return view('layout.frontend.category', compact('category', 'room'));
        }else{
            return Redirect()->back()->with('error', __('not found!'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */

    public function getData(Request $request)
    {
        $id = $request->id;
        $date = $request->date;
        $category = $this->category->findOrFail($id);
        $sortby = $request->sortby;
        if ($category) {
            $room = $this->room;
            $returnHTML = view('layout.frontend.subtemplate.selecttime', compact('date', 'category', 'sortby', 'room'))->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));

        }else{
            return response()->json(array('success' => false));
        }
    }
}
