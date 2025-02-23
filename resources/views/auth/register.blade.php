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
            document.getElementById("daftarBtn").addEventListener("click", function(e) {
                e.preventDefault();
                // Inisalisasi element form
                const password = document.getElementById('password');
                const passwordConfirm = document.getElementById('password-confirm');

                let emptyValid = true;

                // Validasi panjang password
                if (password.value.length < 6) {
                    emptyValid = false;
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Password minimal 6 karakter!",
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'mt-6'
                        }
                    });
                }

                // Validasi kesamaan password dan password confirmation
                if (password.value !== passwordConfirm.value) {
                    emptyValid = false;
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Password tidak sama!",
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'mt-6'
                        }
                    });
                }

                // menampilkan pesan sukses
                if (emptyValid) {
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
        });
    </script>
@endsection
