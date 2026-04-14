<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Login Portal Magang</h3>
                        <p class="text-muted small">Dinas Kehutanan Provinsi Sumatera Barat</p>
                        <hr class="mx-auto w-25 border-2 border-success opacity-75">
                    </div>

                    <?php Flasher::flash(); ?>

                    <form action="<?= BASEURL; ?>/auth/login" method="post">

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold text-dark">Username</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light text-success">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="username" id="username"
                                    class="form-control border-start-0 bg-light"
                                    placeholder="Masukkan username"
                                    required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password-reg" class="form-label fw-semibold text-dark">Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light text-success">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password" id="password-reg"
                                    class="form-control border-start-0 border-end-0 bg-light"
                                    placeholder="Masukkan password" required>

                                <button class="btn btn-outline-light border-start-0 bg-light text-muted"
                                    type="button" onclick="togglePassword('password-reg', 'eye-pwd-reg')">
                                    <i class="bi bi-eye-slash" id="eye-pwd-reg"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label small text-muted">Ingat Saya</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold shadow-sm rounded-3 text-uppercase">
                            Masuk ke Sistem
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <span class="text-muted small">Belum memiliki akun magang?</span>
                        <a href="<?= BASEURL; ?>/auth/registration" class="text-success fw-bold text-decoration-none small"> Registrasi di sini</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>