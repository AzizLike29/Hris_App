<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\password_resets;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function password()
    {
        return view('auth.forgotPassword');
    }

    public function validateForgotPasswordRequest(Request $request)
    {
        return $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        // Validate Input
        $validateData = $this->validateForgotPasswordRequest($request);

        // Generate Token
        $token = Str::random(64);

        // Simpan token ke dalam table password_resets
        password_resets::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Kirim email reset password
        Mail::send('auth.email.forgotPasswordTemplate', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Informasi Reset Password');
        });

        // Redirect route dan menerima pesan
        return redirect()->route('password.reset', ['token' => $token])->with('status', 'Link reset password telah dikirim ke email anda. Silahkan cek secara berkala!');
    }
}
