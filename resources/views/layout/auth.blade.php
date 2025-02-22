<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Hris App' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/compiled/svg/logo.svg') }}">
    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    @yield('content')
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
