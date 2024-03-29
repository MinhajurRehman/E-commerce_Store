<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class authcontroller extends Controller
{
    public function login(){

        $users = new User;
        return view('login',['users'=>$users]);
    }

    public function register(){
        $users = new User;
        return view('register',['users'=>$users]);
    }

    public function registerUser(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success','You have registerd successfully! Now Login ');
        }else{
            return back()->with('fail','Something Wrong!');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);


        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('AdminId',$user->id);
                return redirect('/');
            }else{
                return back()->with('fail','Password does not match.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('welcome',compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
