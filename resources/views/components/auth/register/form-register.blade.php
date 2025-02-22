<form class="was-validated" method="POST" action="{{ route('register.store') }}">
    {{ csrf_field() }}
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" class="form-control form-control-xl" name="email" placeholder="Masukkan Email" id="email"
            required>
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
        <small id="dangerEmail" class="text-danger"></small>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" name="name" placeholder="Masukkan Username"
            id="name" required>
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" name="password" placeholder="Masukkan Password"
            id="password" required>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" name="password_confirmation"
            placeholder="Konfirmasi Password" id="password-confirm" required>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="daftarBtn">Sign Up</button>
</form>
