@extends('layout.auth')

@section('styles')
    <style>
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #0d6efd;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
            color: #444444;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }

        .footer {
            padding: 20px;
            text-align: center;
            color: #666666;
            font-size: 14px;
            border-top: 1px solid #eeeeee;
        }

        .logo {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="PT. Cinta Sejati" class="logo" height="40">
            <h1>Atur Ulang Kata Sandi</h1>
        </div>
        <div class="content">
            <p>Hai,</p>
            <p>Anda telah meminta untuk mengatur ulang kata sandi akun Anda. Silakan klik tombol di bawah ini untuk
                melanjutkan proses pengaturan ulang kata sandi:</p>

            <center>
                <a href="{{ route('password.reset', $token) }}" class="button">
                    Atur Ulang Kata Sandi
                </a>
            </center>

            <p>Jika Anda tidak meminta pengaturan ulang kata sandi, Anda dapat mengabaikan email ini dan kata sandi Anda
                tidak akan berubah.</p>

            <p>Demi keamanan, tautan ini hanya akan aktif selama 60 menit.</p>

            <p>Terima kasih,<br>
                Tim PT. Cinta Sejati</p>
        </div>
        <div class="footer">
            <p>&copy; 2025 PT. Cinta Sejati. All rights reserved.</p>
        </div>
    </div>
@endsection
