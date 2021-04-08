<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function logged(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ]);
        if(!auth()->attempt($request->only('username','password'))){
            return back()->with('status','Invalid credential details');
        }
        return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'username'=>'required|max:255|unique:users',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);

        
        User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('index');
        
    }
    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
