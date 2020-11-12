<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class DeactiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDeactiveForm()
    {
        return view('auth/deactive');
    }

    public function deactive()
    {
        User::find(Auth::id())->delete();

        return redirect('/');
    }
}
