@extends('layout.auth')

@section('content')
    <div class="auth-logo">
        <a href="{{ route('password.request') }}"><img src="{{ URL::asset('./assets/compiled/svg/logo.svg') }}"
                alt="Logo" /></a>
    </div>
    <h1 class="auth-title">Forgot Password?</h1>
    <p class="auth-subtitle mb-5">
        Enter the data you provided during registration to reset your password.
    </p>

    @include('components.auth.forgotPassword.form-forgot-password')
@endsection
