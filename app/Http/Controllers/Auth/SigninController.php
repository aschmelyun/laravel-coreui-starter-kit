<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class SigninController extends Controller
{

    public function index()
    {
        if(Auth::check())
            return redirect()->route('dashboard.index');

        return view('auth.signin', [
            'title' => 'Welcome back'
        ]);
    }

    public function post(Request $request)
    {
        $this->validate($request, User::signin_rules());

        $attempt = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if($attempt) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->back()->withErrors(['password' => 'Incorrect email/password combination']);
    }

    public function signout()
    {
        Auth::logout();
        return redirect()->route('page.index');
    }
}
