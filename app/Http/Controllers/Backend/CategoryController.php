<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var CategoryInterface
     */
    protected $model;

    /**
     * CategoryController constructor.
     * @param CategoryInterface $model
     */
    public function __construct(CategoryInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory()
    {
        $category = $this->model->paginate(config('setting.paginate'));

        return view('layout/backend/category', compact('category'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function getFormCategory()
    {
        return view('layout/backend/categoryform');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCategory(Request $request)
    {
        try {
            $this->model->create($request->all());

            return redirect('admin/category')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategory(Request $request)
    {
        try {
            $this->model->update($request->id, $request->all());

            return redirect('admin/category')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editCategory($id)
    {
        $category = $this->model->findOrFail($id);

        return view('layout/backend/categoryform', compact('category'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $category = $this->model->findOrFail($id);
        if ($category) {
            $category->delete();

            return redirect()->back()->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('Not found! please check Category!'));
        }
    }
}
