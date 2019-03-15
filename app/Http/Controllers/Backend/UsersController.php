<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Model\Role;

class UsersController extends Controller
{
    //

    /**
     * @var User
     */
    protected $_model;

    /**
     * @var
     */
    protected $_role;

    /**
     * UsersController constructor.
     * @param User $model
     */
    public function __construct
    (
        User $model,
        Role $role
    )
    {
        $this->_model = $model;
        $this->_role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get all user
     */
    public function getUsers(){
        $data['users'] =   $this->_model->paginate(15);
       return view('layout.backend.users',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser(){
        $model = $this->_role->all();
        $data['role'] = $model;
        return view('layout/backend/userform',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * create and update user
     */

    public function saveUser(Request $request){
        $new_password = $request->password;
        $Modeluser =$this->_model;
        if($request->id_user){
            $Modeluser =$Modeluser->find($request->id_user);
            $current_password = $Modeluser->password;
            $this->checkPassword($current_password,$new_password,$Modeluser);
        }else{
            $Modeluser->password = bcrypt($new_password);
        }
        $Modeluser->name = $request->name;
        $Modeluser->email = $request->email;
        $Modeluser->birth_of_date = $request->birth_of_date;
        $Modeluser->phone = $request->phone;
        try{
            if($Modeluser->save()){
                return redirect('admin/users')->with('success','save successful!');
            }else{
                return redirect()->back()->with('error','save error!');
            }
        }catch(\Exception $e){
            // insert query
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * get info user
     */
    public function ajaxGetUser(Request $request){
        $user_id = $request->id;
        $Modeluser =$this->_model;
        $data = $Modeluser->find($user_id);
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
        $ModelUser =$this->_model;
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
        $Modeluser = $this->_model;
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
