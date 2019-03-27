<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\FilmInterface;

class FilmController extends Controller
{
    /**
     * \
     * @var FilmInterface
     */
    public $film;

    /**
     * @var CategoryInterface
     */
    public $category;

    /**
     * FilmController constructor.
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
    public function addFilm()
    {
        $category = $this->category->all();
        
        return view('layout/backend/listfilmform', compact('category'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createFilm(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $file = $request->img;
            $partfile = $file->move('resources/img/upload', $file->getClientOriginalName());
            $data['img'] = $partfile;
        }
        try {
            $this->film->create($data);
            
            return redirect('admin/list-film')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFilm(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $file = $request->img;
            $partfile = $file->move('resources/img/upload', $file->getClientOriginalName());
            $data['img'] = $partfile;
        }
        try {
            $this->film->update($request->id, $data);

            return redirect('admin/list-film')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editFilm($id)
    {
        $listfilm = $this->film->findOrFail($id);
        $category = $this->category->all();

        return view('layout/backend/listfilmform', compact('listfilm', 'category'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFilm()
    {
        $listfilm = $this->film->paginate(config('setting.paginate'));

        return view('layout/backend/listfilm', compact('listfilm'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFilm($id)
    {
        $model = $this->film->findOrFail($id);
        if ($model->delete()) {
            return redirect('admin/list-film')->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('delete save!'));
        }
    }
}
