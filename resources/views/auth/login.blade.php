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
            // Inisialisasi element form
            const nameInput = document.getElementById('name');
            const passwordInput = document.getElementById('password');
            const rememberMe = document.getElementById('flexCheckDefault');
            const loginBtn = document.getElementById('loginBtn');

            // Memuat email yang disimpan
            if (localStorage.getItem('email')) {
                nameInput.value = localStorage.getItem('email');
                rememberMe.checked = true;
            }

            // Fungsional centang
            rememberMe.addEventListener('change', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('email', nameInput.value);
                } else {
                    localStorage.removeItem('email');
                    nameInput.value = '';
                }
            });

            // Menyimpan email saat mengetik jika klik centang
            nameInput.addEventListener('input', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('email', nameInput.value);
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
                if (!nameInput.value.trim()) {
                    document.getElementById('dangerName').textContent = 'Silakan isi name anda!';
                    canSubmit = false;
                } else {
                    document.getElementById('dangerName').textContent = '';
                }

                if (!passwordInput.value.trim()) {
                    document.getElementById('dangerPassword').textContent = 'Silakan isi password anda!';
                    canSubmit = false;
                } else {
                    document.getElementById('dangerPassword').textContent = '';
                }

                // Menampilkan pesan disaat submit
                if (canSubmit) {
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
                                    throw errorData; // Lempar data error dari backend
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.error) {
                                // Tampilkan pesan error spesifik
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: data.error, // Pesan error dari backend
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
                                title: "Terjadi kesalahan pada server. Silakan coba lagi.",
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
