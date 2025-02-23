<form class="was-validated" method="POST" action="{{ route('login.process') }}">
    {{ csrf_field() }}
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" name="name" placeholder="Masukkan Username"
            id="name" required />
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" name="password" placeholder="Masukkan Password"
            id="password" required />
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-check form-check-lg d-flex align-items-end">
        <input class="form-check-input me-2" type="checkbox" name="remember_token" value="" id="flexCheckDefault"
            required />
        <label class="form-check-label text-gray-600" for="flexCheckDefault">
            Keep me logged in
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="loginBtn">
        Log in
    </button>
</form>
