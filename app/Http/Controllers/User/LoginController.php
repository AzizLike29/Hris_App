<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function prosLogin(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $remember = $request->has('remember_token');

        if (!Auth::attempt($credentials, $remember)) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        return redirect()->route('master-employee');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
