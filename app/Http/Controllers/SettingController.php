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
        $this->middleware('verified')->except('index');
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
        $user = Auth::user();
        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('setting')->with('status', __('Your email address has been changed.'));
    }
}
