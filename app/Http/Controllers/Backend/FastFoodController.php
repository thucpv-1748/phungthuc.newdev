<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FastFoodInterface;

class FastFoodController extends Controller
{
    /**
     * @var FastFoodInterface
     */
    public $model;

    /**
     * FastFoodController constructor.
     * @param FastFoodInterface $model
     */
    public function __construct(FastFoodInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addFastFood()
    {
        return view('layout.backend.fastfoodform');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createFastFood(Request $request)
    {
        try {
            $this->model->create($request->all());
            return redirect('admin/fast-food')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFastFood(Request $request)
    {
        try {
            $this->model->update($request->id, $request->all());

            return redirect('admin/fast-food')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFastFood()
    {
        $fast_food = $this ->model->paginate(config('setting.paginate'));

        return view('layout.backend.fastfood', compact('fast_food'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editFastFood($id)
    {
        $fastfood = $this ->model->findOrFail($id);

        return view('layout.backend.fastfoodform', compact('fastfood'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFastFood($id)
    {
        $model = $this->model->findOrFail($id);
        if ($model->delete()) {
            return redirect('admin/fast-food')->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('delete save!'));
        }
    }
}
