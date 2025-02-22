@extends('layout.auth')

@section('content')
    <div class="auth-logo">
        <a href="#"><img src="{{ URL::asset('./assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
    </div>
    <h1 class="auth-title">Log in.</h1>
    <p class="auth-subtitle mb-5">
        Log in with your data that you entered during
        registration.
    </p>

    @include('components.auth.login.form-login')
    <div class="text-center mt-5 text-lg fs-4">
        @include('components.auth.login.direct-route')
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Inisalisasi element form
            const emailInput = document.getElementById('name');
            const passwordInput = document.getElementById('password');
            const rememberMe = document.getElementById('flexCheckDefault');
            const loginBtn = document.getElementById('loginBtn');

            // Memuat email yang disimpan
            if (localStorage.getItem('email')) {
                emailInput.value = localStorage.getItem('email');
                rememberMe.checked = true;
            }

            // Fungsional centang
            rememberMe.addEventListener('change', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('email', emailInput.value);
                } else {
                    localStorage.removeItem('email');
                    emailInput.value = '';
                }
            });

            // Menyimpan email saat mengetik jika klik centang
            emailInput.addEventListener('input', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('email', emailInput.value);
                }
                document.getElementById('dangerName').textContent = '';
            });

            // Apabila error maka inputan dibersihkan
            passwordInput.addEventListener('input', () => {
                document.getElementById('dangerPassword').textContent = '';
            });

            // Proses tombol login
            loginBtn.addEventListener("click", (e) => {
                e.preventDefault();
                let canSubmit = true;

                // Periksa data kosong
                if (!emailInput.value.trim()) {
                    document.getElementById('dangerName').textContent = 'Silakan isi name anda!';
                    canSubmit = false;
                }

                if (!passwordInput.value.trim()) {
                    document.getElementById('dangerPassword').textContent = 'Silakan isi password anda!';
                    canSubmit = false;
                }

                // Menampilkan pesan disaat submit
                if (canSubmit) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Login berhasil!",
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'mt-6'
                        }
                    }).then(() => {
                        e.target.closest('form').submit();
                    });
                }
            });
        });
    </script>
@endsection
