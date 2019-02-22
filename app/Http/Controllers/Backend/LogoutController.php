<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //

   public  function getLogout(){
            Auth::logout();
           return redirect('/admin/login');

   }
}
