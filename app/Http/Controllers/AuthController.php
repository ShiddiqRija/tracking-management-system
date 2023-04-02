<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('layout.guest');
    }

    public function login(Request $request)
    {
        $cred = $request->only('email', 'password');

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withInput()->with('error', 'Credential does not match!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
