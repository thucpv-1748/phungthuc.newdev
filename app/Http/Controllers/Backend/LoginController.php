<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * view login
     */

    public function getLogin()
    {
        return view('layout/backend/login');
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
        if ($request -> remember == 'on') {
            $remember = true;
        } else {
            $remember = false;
        }
        if (Auth::attempt($data, $remember)) {
            return redirect('/admin/dashboard')->with('success', __('Login success!'));
        } else {
            return redirect()->back()->with('error', __('Incorrect email or password!'));
        }
    }
}
