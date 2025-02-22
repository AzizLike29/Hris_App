<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_confirmation' => 'required'
        ]);

        return redirect('login')->with('success', 'Berhasil menambahkan user baru!');
    }
}
