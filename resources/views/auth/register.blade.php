@extends('layout.auth')

@section('content')
    <div class="auth-logo">
        <a href="{{ route('register.index') }}"><img src="{{ URL::asset('./assets/compiled/svg/logo.svg') }}" alt="Logo">
        </a>
    </div>
    <h1 class="auth-title">Sign Up</h1>
    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

    @include('components.auth.register.form-register')
    <div class="text-center mt-5 text-lg fs-4">
        @include('components.auth.register.direct-route')
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("daftarBtn").addEventListener("click", function(event) {
                event.preventDefault();

                const nama = document.getElementById('name');
                const email = document.getElementById('email');
                const password = document.getElementById('password');
                const password_confirm = document.getElementById('password-confirm');

                // validasi input tidak boleh kosong/wajib di isi
                let isValid = true;

                if (nama.value.trim() === '') {
                    document.getElementById('dangerName').textContent = 'Silakan isi nama anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerName').textContent = '';
                }

                if (email.value.trim() === '') {
                    document.getElementById('dangerEmail').textContent = 'Silakan isi email anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerEmail').textContent = '';
                }

                if (password.value.trim() === '') {
                    document.getElementById('dangerPassword').textContent = 'Silakan isi password anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerPassword').textContent = '';
                }

                if (password_confirm.value.trim() === '') {
                    document.getElementById('dangerConfirmationPassword').textContent =
                        'Silakan isi konfirmasi password anda!';
                    isValid = false;
                } else {
                    document.getElementById('dangerConfirmationPassword').textContent = '';
                }

                // menampilkan pesan sukses
                if (isValid) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Register berhasil!",
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'mt-6'
                        }
                    }).then(() => {
                        document.querySelector('form').submit();
                    });
                }
            });

            // validasi hilang disaat mengisi input
            document.getElementById('name').addEventListener('input', function() {
                document.getElementById('dangerName').textContent = '';
            });

            document.getElementById('email').addEventListener('input', function() {
                document.getElementById('dangerEmail').textContent = '';
            });

            document.getElementById('password').addEventListener('input', function() {
                document.getElementById('dangerPassword').textContent = '';
            });

            document.getElementById('password-confirm').addEventListener('input', function() {
                document.getElementById('dangerConfirmationPassword').textContent = '';
            });
        });
    </script>
@endsection
