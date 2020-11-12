<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangeNameRequest;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except(['index', 'showChangeEmailForm', 'changeEmail']);
    }

    public function index()
    {
        $auth = Auth::user();

        return view('setting/index', ['auth' => $auth]);
    }

    public function showChangeNameForm()
    {
        $auth = Auth::user();

        return view('setting/name', ['auth' => $auth]);
    }

    public function changeName(ChangeNameRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->save();

        return redirect()->route('setting')->with('status', __('Your name has been changed.'));
    }

    public function showChangeEmailForm()
    {
        $auth = Auth::user();

        return view('setting/email', ['auth' => $auth]);
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        //ValidationはChangeUsernameRequestで処理

        //メールアドレス変更処理
        $user = Auth::user();

        if ($user->email == $request->get('email')) {
            return redirect()->route('setting')->with('status', __('Your email address has been changed.'));
        }

        $user->email = $request->get('email');
        $user->email_verified_at = null;
        $user->save();
        $user->sendEmailVerificationNotification();

        return redirect()->route('setting')->with('status', __('A confirmation email for changing the email address has been sent.'));
    }
}
