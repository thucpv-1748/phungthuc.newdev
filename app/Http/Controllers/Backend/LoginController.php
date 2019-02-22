<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Backend\UserAdmin;
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

    public function postLogin(Request $request){
        $data =['email'=>$request->email,'password'=>$request->password];
        if (Auth::attempt($data)){
            return redirect('/admin/dashboard');
        }else{
            return redirect()->back();
        }
        
    }
}
