<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('message', 'Email dan Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
