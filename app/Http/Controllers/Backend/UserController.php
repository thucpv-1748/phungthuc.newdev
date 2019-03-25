<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\RoleInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $model;

    /**
     * @var RoleRepository|RoleInterface
     */
    protected $role;

    /**
     * UserController constructor.
     * @param UserInterface $model
     * @param RoleRepository $role
     */
    public function __construct(UserInterface $model, RoleInterface $role)
    {
        $this->model = $model;
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get all user
     */
    public function getUsers()
    {
        $users = $this->model->paginate(config('setting.paginate'));

        return view('layout.backend.users', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser()
    {
        $role = $this->role->all();

        return view('layout/backend/userform', compact('role'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * create and update user
     */

    public function createUser(Request $request)
    {
        $modeluser = $this->model;
        try {
            $modeluser->createUser($request);

            return redirect('admin/users')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * create and update user
     */

    public function updateUser(Request $request)
    {
        $modeluser = $this->model;
        try {
            $modeluser->updateUser($request);

            return redirect('admin/users')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editUser($id)
    {
        $model = $this->model->findOrFail($id);
        if ($model) {
            $user = $model;
            $role = $this->role->all();

            return view('layout/backend/userform', compact('user', 'role'));
        } else {
            return redirect()->back()->with('error', __('Not found! please check User!'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * delete user
     */
    public function deleteUsers($id)
    {
        $modeluser = $this->model->findOrFail($id);
        if ($modeluser) {
            $modeluser->delete();

            return redirect()->back()->with('success', __('Delete successful!'));
        } else {
            return redirect()->back()->with('error', __('Delete error!'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getProfile()
    {
        $user = Auth::user();
        $role = $this->role->all();

        return view('layout/backend/profile', compact('user', 'role'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addRole()
    {
        return view('layout.backend.roleform');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createRole(Request $request)
    {
        try {
            $this->role->create($request->all());

            return redirect('admin/role')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request)
    {
        try {
            $this->role->update($request->id, $request->all());

            return redirect('admin/role')->with('success', __('save successful!'));
        } catch (\Exception $e) {
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRole()
    {
        $role = $this->role->paginate(config('setting.paginate'));

        return view('layout.backend.role', compact('role'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editRole($id)
    {
        $role = $this->role->findOrFail($id);

        return view('layout.backend.roleform', compact('role'));
    }
}
