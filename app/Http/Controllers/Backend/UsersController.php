<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Modeluser;
use Illuminate\Support\Facades\Crypt;

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


    public function addUser(Request $request){

        $Modeluser =new Modeluser;
        $Modeluser->name = $request->name;
        $Modeluser ->email = $request->email;
        $Modeluser->password = bcrypt($request->password);
        $Modeluser->level=$request->level;
        $Modeluser->birth_of_date = $request->birth_of_date;
        $Modeluser->phone = $request->phone;
        $Modeluser->save();
        $data['users'] =   Modeluser::all();
        return view('layout/backend/users',$data);

    }


    public function ajaxGetUser(Request $request){
        $user_id = $request->id;
        $Modeluser =new Modeluser;
        $data = $Modeluser::find($user_id);
        $password = $data->password;
        $data = $data->toArray();
        $data['password']=$password;
        return response()->json(array('user'=>$data));
    }
}
