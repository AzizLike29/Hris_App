<form class="was-validated" id="forgotForm" action="{{ route('password.email') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" class="form-control form-control-xl" name="email" placeholder="Masukkan Nama Email"
            id="email" required>
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
    </div>
</form>
