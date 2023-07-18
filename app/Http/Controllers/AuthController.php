<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function register(){
        return view('auth.register');
    }

    public function postlogin(Request $request){
        $credentials = [
            'username'=>$request->username,
            'password'=>$request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('profile.index');
        }
        return back()->with('error','Username or password incorrect!');
    
    }


    public function postRegister(Request $request){
        $check_email = User::where('email',$request->email)->first();
        if($check_email){
            return back()->with('error','email is alredy exist!');
        }
        $user = User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $credentials = [
            'username'=>$user->username,
            'password'=>$request->password,
        ];
        Auth::attempt($credentials);
        return redirect()->route('profile.index')->with('success','Congratulations! Your account can be used!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

