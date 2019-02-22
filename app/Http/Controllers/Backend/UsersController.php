<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Modeluser;
class UsersController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get all user
     */
    public function getUsers(){
        $data['users'] =   Modeluser::all();
       return view('layout/backend/users',$data);
    }


    public function addUser(){

    }
}
