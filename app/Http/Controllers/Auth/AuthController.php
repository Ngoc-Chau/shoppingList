<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Whoops\Run;


class AuthController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    //LOGIN
    public function login() {
        return view('auth.login');
    }

    public function postLogin(UserRequest $request) {
        $data = $request->all();
        $login = Auth::attempt(['email' => $data['email'], 'password' =>$data['password']]);
        if($login) {
            return redirect()->route('shopping.index')->with('welcome', __('lang.welcome'));
        }
        else {
            return redirect()->route('auth.login')->with('msg', 'Sai tài khoản hoặc tên đăng nhập');
        }
    }

    //REGISTER
    public function register() {
        return view('auth.register');
    }

    public function postRegister(RegisterUserRequest $request) {
        $login = $request->all();
        $data = $request->all();
        $users = User::all();
        foreach ($users as $user) {
            if($data['email'] == $user['email']) {
                return redirect()->back()->with('msg', 'Email đã được sử dụng, vui lòng nhập email khác');
            }
        }
        $data['password'] = Hash::make($data['password']);
        $user = new User;
        $data = $user->fill($data)->save();
        if($data) {
            $login = Auth::attempt(['email' => $login['email'], 'password' =>$login['password']]);
            if($login) {
                return redirect()->route('shopping.index')->with('welcome', 'Chào mừng bạn đến với trình quản lý công việc của mình!');
            }
            else {
                return redirect()->route('auth.login')->with('msg', 'Sai tài khoản hoặc tên đăng nhập');
            }
        }
        else {
            return redirect()->route('auth.register')->with('msg', 'Mã lỗi 401');
        }
    }

    //LOGOUT
    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
