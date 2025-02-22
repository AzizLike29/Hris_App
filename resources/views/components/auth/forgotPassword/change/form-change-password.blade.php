<form class="was-validated" id="forgotFormLink" action="{{ route('password.update') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group position-relative mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-envelope"></i>
            </span>
            <input type="email" class="form-control form-control-xl" name="email" placeholder="Masukkan Nama Email"
                id="email" required>
        </div>
    </div>
    <div class="form-group position-relative mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-shield-lock"></i>
            </span>
            <input type="password" class="form-control form-control-xl" name="password"
                placeholder="Masukkan Password Baru" id="password" required>
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-eye-slash password-toggle" id="toggleIcon"></i>
            </button>
        </div>
    </div>
    <div class="form-group position-relative mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-shield-lock"></i>
            </span>
            <input type="password" class="form-control form-control-xl" name="password_confirmation"
                placeholder="Konfirmasi Password Baru" id="password-confirm" required>
            <button class="btn btn-outline-secondary" type="button" id="toggleIconConfirm">
                <i class="bi bi-eye-slash password-toggle"></i>
            </button>
        </div>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
    </div>
</form>
