<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return redirect()->route('login');
    }
    //
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
}
