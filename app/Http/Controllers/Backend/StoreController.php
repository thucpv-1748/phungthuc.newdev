<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StoreInterface;

class StoreController extends Controller
{
    /**
     * @var Store|StoreRepository
     */
    protected $model;

    /**
     * StoreController constructor.
     * @param StoreRepository $model
     */
    public function __construct(StoreInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStore()
    {
        $store = $this->model->paginate(config('setting.paginate'));

        return view('layout/backend/store', compact('store'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function addStore()
    {
        return view('layout/backend/storeform');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createStore(Request $request)
    {
        try {
            $this->model->create($request->all());

            return redirect('admin/store')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStore(Request $request)
    {
        try {
            $this->model->update($request->id, $request->all());

            return redirect('admin/store')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editStore($id)
    {
        $store = $this->model->findOrFail($id);
        if ($store) {
            return view('layout/backend/storeform', compact('store'));
        } else {
            return redirect()->back()->with('error', __('Not found! please check Store!'));
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteStore($id)
    {
        $store = $this->model->findOrFail($id);
        if ($store) {
            $store->delete();

            return redirect()->back()->with('success', __('delete successful!'));
        } else {
            return redirect()->back()->with('error', __('Not found! please check store!'));
        }
    }
}
