@extends('layout.auth')

@section('content')
    <div class="auth-logo">
        <a href="{{ route('login') }}"><img src="{{ URL::asset('./assets/compiled/svg/logo.svg') }}" alt="Logo" />
        </a>
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
            // Inisialisasi element form
            const nameInput = document.getElementById('name');
            const passwordInput = document.getElementById('password');
            const rememberMe = document.getElementById('flexCheckDefault');
            const loginBtn = document.getElementById('loginBtn');

            // Memuat name yang disimpan
            if (localStorage.getItem('name')) {
                nameInput.value = localStorage.getItem('name');
                rememberMe.checked = true;
            }

            // Fungsional centang
            rememberMe.addEventListener('change', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('name', nameInput.value);
                } else {
                    localStorage.removeItem('name');
                    nameInput.value = '';
                }
            });

            // Menyimpan name saat mengetik jika klik centang
            nameInput.addEventListener('input', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('name', nameInput.value);
                }
            });

            // Proses tombol login
            loginBtn.addEventListener("click", (e) => {
                e.preventDefault();
                let processSubmit = true;

                // Menampilkan pesan disaat submit
                if (processSubmit) {
                    fetch('/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                name: nameInput.value.trim(),
                                password: passwordInput.value.trim(),
                                remember_token: rememberMe.checked
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(errorData => {
                                    throw errorData;
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.error) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: data.error,
                                    toast: true,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    customClass: {
                                        popup: 'mt-6'
                                    }
                                });
                            } else if (data.success) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: data.success,
                                    toast: true,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    customClass: {
                                        popup: 'mt-6'
                                    }
                                }).then(() => {
                                    window.location.href = data.redirect_url;
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: error.error ||
                                    "Terjadi kesalahan pada server. Silakan coba lagi.",
                                toast: true,
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: {
                                    popup: 'mt-6'
                                }
                            });
                        });
                }
            });
        });
    </script>
@endsection
