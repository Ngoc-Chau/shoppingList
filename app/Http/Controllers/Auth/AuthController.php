<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PhpParser\Node\Stmt\Foreach_;

class AuthController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }

    //LOGIN

    public function login(){
        return view('auth.login');
    }
    public function postLogin(UserRequest $request){
        $data = $request->all();
        $login = Auth::attempt(['email' => $data['email'], 'password' =>$data['password']]);
        if($login){
            return redirect()->route('shopping.index')->with('welcome', 'Chào mừng bạn đến với trình quản lý công việc của mình!');
        }else{
            return redirect()->route('auth.login')->with('msg', 'Sai tài khoản hoặc tên đăng nhập');
        }
    }

    //REGISTER

    public function register(){
        return view('auth.register');
    }
    public function postRegister(RegisterUserRequest $request){
        $data = $request->all();
        $users = User::all();
        foreach ($users as $user) {
            if($data['email'] == $user['email']){
                return redirect()->back()->with('msg', 'Email đã được sử dụng, vui lòng nhập email khác');
            }
        }
        $data['password'] = Hash::make($data['password']);
        $user = new User;
        $data = $user->fill($data)->save();
        if($data){
            return redirect()->route('shopping.index')->with('welcome', 'Chào mừng bạn đến với trình quản lý công việc của mình!');
        }else{
            return redirect()->route('auth.register')->with('msg', 'Mã lỗi 401');
        }
    }

    //LOGOUT

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

    //EDIT AND UPDATE
    
    public function edit(){
        return view('auth.information');
    }
    public function update(Request $request){
        $data = $request->all();
        if($data['name'] == '' || $data['name'] == Auth::user()->name){
            return redirect()->back()->with('msg', 'Không để trống hoặc trùng tên hiện tại!');
        }
        $user = User::find(Auth::user()->id);
        $data = $user->fill($data)->save();
        return redirect()->route('auth.edit')->with('msg', 'Bạn đã cập nhật thành công!');
    }
    public function resetPass(Request $request){
        $data = $request->all();
        $password = Auth::user()->password;
        $check = Hash::check($data['old_password'], $password);
        if($check){
            $data['password'] = Hash::make($data['password']);
            $user = User::find(Auth::user()->id);
            $data = $user->fill($data)->save();
            return redirect()->route('auth.edit')->with('msg', 'Bạn đã cập nhật thành công!');
        }else{
            return redirect()->back()->with('msg', 'Vui lòng nhập điền Mật khẩu hiện tại của bạn!');
        }
    }
}
