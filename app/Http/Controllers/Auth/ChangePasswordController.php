<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function showChangePasswordForm()
    {
        return view('auth/passwords/change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        /* ===ValidationはChangePasswordRequestで処理=== */

        //パスワード変更処理
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //パスワード変更処理後、settingにリダイレクト
        return redirect()->route('setting')->with('status', __('Your password has been changed.'));
    }
}
