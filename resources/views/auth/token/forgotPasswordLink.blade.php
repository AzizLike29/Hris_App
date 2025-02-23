@extends('layout.auth')

@section('content')
    <div class="auth-logo">
        <a href="#"><img src="{{ URL::asset('./assets/compiled/svg/logo.svg') }}" alt="Logo" /></a>
    </div>
    <h1 class="auth-title">Change Forgot Password</h1>
    <p class="auth-subtitle mb-5">
        Enter the data you provided during registration to reset your password.
    </p>

    @include('components.auth.forgotPassword.change.form-change-password')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('forgotFormLink');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password-confirm');

            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                // Validasi panjang password
                if (password.value.length < 6) {
                    Swal.fire({
                        icon: "error",
                        title: "Password minimal 6 karakter!",
                        toast: true,
                        position: "top-end",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    return;
                }

                // Validasi konfirmasi password
                if (password.value !== passwordConfirm.value) {
                    Swal.fire({
                        icon: "error",
                        title: "Password tidak sama!",
                        toast: true,
                        position: "top-end",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    return;
                }

                // Kirim data ke server
                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    });

                    const result = await response.json();

                    // Handle response dari server
                    if (response.status === 404) {
                        Swal.fire({
                            icon: "error",
                            title: "Email tidak ditemukan!",
                            toast: true,
                            position: "top-end",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        return;
                    }

                    // Jika berhasil
                    if (response.ok) {
                        Swal.fire({
                            icon: "success",
                            title: result.success,
                            toast: true,
                            position: "top-end",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '/login';
                        });
                    }

                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Terjadi kesalahan!",
                        toast: true,
                        position: "top-end",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });
    </script>
@endsection
