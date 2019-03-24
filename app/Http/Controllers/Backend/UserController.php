<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Model\Role;

class UserController extends Controller
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @var Role
     */
    protected $role;

    /**
     * UserController constructor.
     * @param User $model
     * @param Role $role
     */
    public function __construct(User $model, Role $role)
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
        $data['users'] = $this->model->paginate(15);

        return view('layout.backend.users', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser()
    {
        $model = $this->role->all();
        $data['role'] = $model;

        return view('layout/backend/userform', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * create and update user
     */

    public function saveUser(Request $request)
    {
        $modeluser = $this->model;
        try {
            $modeluser->updateOrCreate($request->only('id', 'email', 'password', 'name', 'phone', 'date_of_birth'));
            $modeluser->roles()->attach($this->role->findOrFail($request->role));

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
        $model = $this -> model;
        $model = $model->findOrFail($id);

        if ($model) {
            $data['user'] = $model;
            $data['role'] = $this->role->all();

            return view('layout/backend/userform', $data);
        } else {
            return redirect()->back()->with('error', __('Not found! please check User!'));
        }
    }
    /**
     * @param $currentpassword
     * @param $newpassword
     * @param $modeluser
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPassword($currentpassword, $newpassword, $modeluser)
    {
        if ($newpassword !== $currentpassword) {
            $modeluser->password = bcrypt($newpassword);

            return $modeluser;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * delete user
     */
    public function deleteUsers($id)
    {
        $modeluser = $this->model;
        $modeluser = $modeluser->findOrFail($id);
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
        $data['user'] = Auth::user();
        $data['role'] = $this->role->all();

        return view('layout/backend/profile', $data);
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
    public function saveRole(Request $request)
    {
        $role = $this->role;
        $id = $request->id;
        if ($id) {
            $role = $role->findOrFail($id);
        }
        try {
            $role->name = $request->name;
            $role->description = $request->description;
            if ($role->save()) {
                return redirect('admin/role')->with('success', __('save successful!'));
            } else {
                return redirect()->back()->with('error', __('save error!'));
            }
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
        $data['role'] = $this->role->paginate(15);

        return view('layout.backend.role', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editRole($id)
    {
        $data['role'] = $this->role->findOrFail($id);

        return view('layout.backend.roleform', $data);
    }
}
