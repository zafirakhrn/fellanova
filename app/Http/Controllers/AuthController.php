<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\User as AuthUser;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth/logincs');
 
    }
    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('login/success');
        } else {
            return back()->with('error', 'Wrong login details');
        }
    }

    function successlogin(Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'Admin'){
        return redirect('/home');
        }else if ($itemuser->role == 'Manufacturer'){
            return redirect('/home');
        }else{
            return redirect('/');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('Auth/registercs');
    }

    public function doRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3',
            'role' => 'required',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)  ,
            'role' => $request->role,  
        ]);

        return redirect('/');
    }
}
