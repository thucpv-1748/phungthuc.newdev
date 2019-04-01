<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\RoleInterface;

class LoginController extends Controller
{
    /**
     * @var
     */
    public $user;
    /**
     * @var RoleInterface
     */

    public $role;

    /**
     * LoginController constructor.
     * @param UserInterface $user
     */

    public function __construct(UserInterface $user, RoleInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * * view login
     */
    public function getLogin()
    {
        return view('layout/frontend/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postLogin(Request $request)
    {
        $request -> validate(
            [
              'email' => 'required|max:255|email',
              'password' => 'required',
            ]
        );
        $data = ['email' => $request -> email, 'password' => $request -> password];
        if ($request->remember == 'on') {
            $remember = true;
        } else {
            $remember = false;
        }
        if (Auth::attempt($data, $remember)) {
            return redirect('/home')->with('success', __('Login success!'));
        } else {
            return redirect()->back()->with('error', __('Incorrect email or password!'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegistration()
    {
        return view('layout.frontend.registration');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function createUser(Request $request)
    {
        $request -> validate(
            [
                'email' => 'required|max:255|email',
                'password' => 'required',
            ]
        );
        try {
            $this->user->createUser($request);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/home')->with('success', __('Login success!'));
            } else {
                return redirect()->back()->with('error', __('Incorrect email or password!'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/home');
    }
}
