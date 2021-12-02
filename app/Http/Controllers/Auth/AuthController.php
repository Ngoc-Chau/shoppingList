<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    public function login(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function postRegister(){
        return view('auth.register');
    }
}
