<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InfomationController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    //EDIT AND UPDATE
    public function edit() {
        return view('auth.information');
    }

    public function update(Request $request) {
        $data = $request->all();
        if($data['name'] == '' || $data['name'] == Auth::user()->name) {
            return redirect()->back()->with('msg', __(lang.'NotBlank'));
        }
        $user = User::find(Auth::user()->id);
        $data = $user->fill($data)->save();
        return redirect()->route('auth.edit')->with('msg', __(lang.'UpdateSuccessfully'));
    }
    
    public function changePass(Request $request) {
        $data = $request->all();
        $password = Auth::user()->password;
        $check = Hash::check($data['old_password'], $password);
        if($check) {
            $data['password'] = Hash::make($data['password']);
            $user = User::find(Auth::user()->id);
            $data = $user->fill($data)->save();
            return redirect()->route('auth.edit')->with('msg', __(lang.'UpdateSuccessfully'));
        }
        else {
            return redirect()->back()->with('msg', __(lang.'CurrentPasswordPlease')');
        }
    }
}
