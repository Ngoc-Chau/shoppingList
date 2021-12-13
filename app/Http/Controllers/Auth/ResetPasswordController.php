<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function sendMail(Request $request) {
        $data = $request->email;
        $user = User::where('email', $data)->first();
        if(!$user) {
            return redirect()->back()->with('msg', 'errors 502');
        }
        $token  = Str::random(100);
        $now    = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y | H:i');
        $title  = 'Xác nhận lấy lại mật khẩu ngày '.$now;
        $urlResetPassword = config('app.url') . '/resetPass/' . $token . '?email=' . urlencode($data);
        
        Mail::send('auth.confirmMail',['url'=>$urlResetPassword],function($message) use ($title,$data) {
            $message->to($data)->subject($title);
            $message->from($data,$title);
        });
        
        //update remember_token
        $user->update(['remember_token' => $token]);
        return redirect()->back()->with('msg', __(lang.'Successfully_CheckGmail'));
    }

    public function showFormPass($token) {
        $user = User::where('remember_token', $token)->first();
        if(!$user) {
            return redirect()->route('auth.login')->with('msg', __(lang.'Error_NoInfor'));
        }
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function resetPassword(Request $request){
        $data = $request->all();
        $user = User::where('remember_token', $data['token_password'])->first();
        $data['password'] = Hash::make($data['password']);
        $user->update(['password' => $data['password']]);
        if($user) {
            return redirect()->route('auth.login')->with('msg', __(lang.'PasswordChanged'));
        }
        else {
            return redirect()->back()->with('msg', __(lang.'Error_ChangingPassword'));
        }
    }
}
