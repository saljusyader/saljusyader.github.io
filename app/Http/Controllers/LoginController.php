<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('Home');
        }else{
            $tittle = "Login";
            return view('Login', compact('tittle'));
        }
    }

    public function register()
    {
        $tittle = "Register";
        return view('Register', compact('tittle'));
    }


    public function actionlogin(Request $request)
    {
        // dd($request);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/Login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}