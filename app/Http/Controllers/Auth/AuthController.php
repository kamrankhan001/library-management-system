<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('interface.auth.register');
    }

    public function login(){
        return view('interface.auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
