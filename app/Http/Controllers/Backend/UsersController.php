<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Modeluser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get all user
     */
    public function getUsers(){
        $data['users'] =   Modeluser::paginate(15);
       return view('layout/backend/users',$data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * create and update user
     */

    public function addUser(Request $request){
        $new_password = $request->password;
        $Modeluser =new Modeluser;
        if($request->id_user){
            $Modeluser =$Modeluser::find($request->id_user);
            $current_password = $Modeluser->password;
            $this->checkPassword($current_password,$new_password,$Modeluser);
        }else{
            $Modeluser->password = bcrypt($new_password);
        }
        $Modeluser->name = $request->name;
        $Modeluser->email = $request->email;
        $Modeluser->level=$request->level;
        $Modeluser->birth_of_date = $request->birth_of_date;
        $Modeluser->phone = $request->phone;
        $Modeluser->save();
        $data['users'] =   Modeluser::paginate(15);
        return view('layout/backend/users',$data);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * get info user
     */
    public function ajaxGetUser(Request $request){
        $user_id = $request->id;
        $Modeluser =new Modeluser;
        $data = $Modeluser::find($user_id);
        if($data){
            $password = $data->password;
            $data = $data->toArray();
            $data['password']=$password;
            return response()->json(array('success' => true,'user'=>$data));
        }else{
            return response()->json(array('success' => false));
        }

    }


    /**
     * @param $current_password
     * @param $new_password
     * @param $Modeluser
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPassword($current_password,$new_password,$Modeluser){
        if($new_password !== $current_password)
        {
            $Modeluser->password = bcrypt($new_password);
            return $Modeluser;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * delete user
     */
    public function deleteUsers($id){
        $ModelUser =new Modeluser;
        $ModelUser=$ModelUser::find($id);
        if($ModelUser){
            $ModelUser->delete();
            return redirect()->back()->with('success','Delete successful!');
        }else{
            return redirect()->back()->with('error','Delete error!');
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getProfile(){
        $data['user'] =  Auth::user();
        return view('layout/backend/profile',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *   Edit profile user
     * $Modeuser
     */


    public function editProfile(Request $request){

        $request->validate([
            'email'           => 'required|max:255|email',
            'password'           => 'required',
            'level'              => 'required',
        ]);
        $id_user = $request->id_user;
        $new_password = $request->password;
        $Modeluser = new Modeluser;
        $Modeluser = $Modeluser::find($id_user);

        try{
            if($Modeluser){
                $current_password = $Modeluser->password;
                $this->checkPassword($current_password,$new_password,$Modeluser);

                $Modeluser->name=$request->name;
                $Modeluser->email = $request->email;
                $Modeluser->level = $request->level;
                $Modeluser->birth_of_date = $request->birth_of_date;
                $Modeluser->phone = $request->phone;
                if($Modeluser->save()){
                    return redirect()->back()->with('success','save successful!');
                }else{
                    return redirect()->back()->with('error','save error!');
                }
            }else{
                return redirect()->back()->with('error','save error!');
            }
        }catch(\Exception $e){
             // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
