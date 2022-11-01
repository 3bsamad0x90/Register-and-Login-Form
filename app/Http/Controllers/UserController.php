<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //index Home page
    function index(){
        return view('index');
    }
    //Registration
    function register(){
        return view('users.register');
    }
    function store(Request $request){
        $validator = $request->validate([
            'username' => ['required','unique:users','max:50'],
            'email'    => ['required','email','unique:users'],
            'password' => ['required','string','min:6']
        ]);
        $user = new User();
        $user -> username = $request -> username;
        $user -> email = $request -> email;
        $user -> password = \Hash::make($request -> password);
        $user -> save();

        return redirect()->route('users.login');
    }

    //login
    function login(){
        return view('users.login');
    }
    function loginHandle(Request $request){
        $validator = $request->validate([
            'email'    => ['required','email','exists:users,email'],
            'password' => ['required','string']
        ]);
        $cred = array(
            'email'     => $request -> email,
            'password'  => $request -> password
        );
        //check credential
        if(\Auth::attempt($cred)){
            return redirect()->route('index');
        }
        else{
            return redirect()->route('users.login',['Invalid',"Invalid Credential"]);
        }
    }
    //logout
    function logout(){
        \Auth::logout();
        return redirect()->route('users.login');
    }
}
