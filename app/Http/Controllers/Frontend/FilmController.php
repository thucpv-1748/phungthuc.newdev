<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilmInterface;
use App\Repositories\Contracts\RoomInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\CommentInterface;

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


    public $comment;


    /**
     * FilmController constructor.
     * @param FilmInterface $film
     * @param RoomInterface $room
     * @param CategoryInterface $category
     */
    public function __construct(FilmInterface $film, RoomInterface $room, CategoryInterface $category, CommentInterface $comment)
    {
        $this->film = $film;
        $this->room = $room;
        $this->category = $category;
        $this->comment = $comment;
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getFilm($id)
    {
        $film = $this->film->findOrFail($id);
        if ($film) {
             $room = $this->room;
             $comment = $film->comment->sortByDesc('created_at');

             return view('layout.frontend.filmdetails', compact('film', 'room', 'comment'));
        } else {
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
        } else {
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
        } else {
            return response()->json(array('success' => false));
        }
    }


    public function createComment(Request $request)
    {
        try {
            $this->comment->createComment($request);
            $comment = $this->comment->where('film_id', $request->film_id)->get()->sortByDesc('created_at');
            $returnHTML = view('layout.frontend.subtemplate.comment', compact('comment'))->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));
        } catch (\Exception $e) {
            return response()->json(array('success' => false));
        }

    }
}
