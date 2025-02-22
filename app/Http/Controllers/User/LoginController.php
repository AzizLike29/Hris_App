<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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

        // Cek apakah name ada di database
        $user = User::where('name', $credentials['name'])->first();

        if (!$user) {
            return response()->json(['error' => 'Name tidak ditemukan!'], 401);
        }

        // Cek apakah password benar
        if (!Auth::attempt($credentials, $remember)) {
            return response()->json(['error' => 'Password salah!'], 401);
        }

        // Jika login berhasil
        return response()->json([
            'success' => 'Login berhasil!',
            'redirect_url' => route('master-employee') // Redirect URL
        ], 200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
