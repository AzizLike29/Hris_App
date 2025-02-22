<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\password_resets;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function resetPassword($token)
    {
        return view('auth.token.forgotPasswordLink', ['token' => $token]);
    }

    public function resetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $userExists = User::where('email', $request->email)->exists();

        if (!$userExists) {
            return response()->json(['error' => 'email tidak ditemukan'], 404);
        }

        $updatePassword = password_resets::where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$updatePassword) {
            return response()->json(['error' => 'Salah token!'], 400);
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        password_resets::where(['email' => $request->email])->delete();

        return response()->json(['success' => 'Password berhasil diubah']);
    }
}
