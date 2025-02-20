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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("loginBtn").addEventListener("click", function(event) {
                event.preventDefault();

                const email = document.getElementById('name');
                const password = document.getElementById('password');

                // validasi input tidak boleh kosong/wajib di isi
                let isValid = true;

                if (email.value.trim() === '') {
                    document.getElementById('dangerName').textContent = 'Silakan isi name anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerName').textContent = '';
                }

                if (password.value.trim() === '') {
                    document.getElementById('dangerPassword').textContent = 'Silakan isi password anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerPassword').textContent = '';
                }

                // menampilkan pesan sukses
                if (isValid) {
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
                        event.target.closest('form').submit();
                    });
                }
            });

            // validasi hilang disaat mengisi input
            document.getElementById('name').addEventListener('input', function() {
                document.getElementById('dangerName').textContent = '';
            });

            document.getElementById('password').addEventListener('input', function() {
                document.getElementById('dangerPassword').textContent = '';
            });
        });
    </script>
@endsection
