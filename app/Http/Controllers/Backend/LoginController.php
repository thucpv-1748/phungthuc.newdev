<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Backend\UserAdmin;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * view login
     */
    public function getLogin(){
        return view('layout/backend/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request){
        $request->validate([
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);
        $data =['email'=>$request->email,'password'=>$request->password];
        if (Auth::attempt($data)){
            return redirect('/admin/dashboard')->with('success','Login success!');
        }else{
            return redirect()->back()->with('error','Incorrect email or password!');
        }
        
    }
}
