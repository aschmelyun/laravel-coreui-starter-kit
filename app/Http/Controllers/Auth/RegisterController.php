<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;

class RegisterController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return view('auth.register', [
            'title' => 'Sign up for an account'
        ]);
    }

    public function post(Request $request)
    {
        $this->validate($request, User::register_rules());

        $user = User::create([
            'email'     => strtolower(trim($request->input('email'))),
            'name'      => $request->input('name'),
            'password'  => Hash::make($request->input('password'))
        ]);

        //todo: confirm user with email verification

        Auth::login($user, true);
        return redirect()->route('dashboard.index');
    }
}
