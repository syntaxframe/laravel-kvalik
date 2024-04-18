<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegLogController extends Controller
{
    public function index()
    {
        return view('pages.signup');
    }

    public function edit()
    {
        return view('pages.signin');
    }

    public function signup(SignupRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'role_id' => 2,
        ]);
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials, true);
        $request->session()->regenerate();
        return redirect(route('home'));
    }

    public function signin(SigninRequest $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withInput()->withErrors(['login' => 'Invalid data']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
