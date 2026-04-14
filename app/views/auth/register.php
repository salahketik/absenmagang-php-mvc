<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Registrasi Magang</h3>
                        <p class="text-muted small">Dinas Kehutanan Provinsi Sumatera Barat</p>
                        <hr class="mx-auto w-25 border-2 border-success opacity-75">
                    </div>

                    <?php Flasher::flash(); ?>

                    <form action="<?= BASEURL; ?>/auth/store" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-dark">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light text-success">
                                    <i class="bi bi-person-badge"></i>
                                </span>
                                <input type="text" name="name" id="name"
                                    class="form-control border-start-0 bg-light"
                                    placeholder="Masukkan nama lengkap"
                                    required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold text-dark">Username</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light text-success">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="username" id="username"
                                    class="form-control border-start-0 bg-light"
                                    placeholder="Buat username"
                                    required autocomplete="username">
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
                                    placeholder="Minimal 6 karakter" required minlength="6">

                                <button class="btn btn-outline-light border-start-0 bg-light text-muted"
                                    type="button" onclick="togglePassword('password-reg', 'eye-pwd-reg')">
                                    <i class="bi bi-eye-slash" id="eye-pwd-reg"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-reg" class="form-label fw-semibold text-dark">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-light text-success">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </span>
                                <input type="password" name="confirm_password" id="confirm-reg"
                                    class="form-control border-start-0 border-end-0 bg-light"
                                    placeholder="Ulangi password" required minlength="6">

                                <button class="btn btn-outline-light border-start-0 bg-light text-muted"
                                    type="button" onclick="togglePassword('confirm-reg', 'eye-confirm-reg')">
                                    <i class="bi bi-eye-slash" id="eye-confirm-reg"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold shadow-sm rounded-3 text-uppercase">
                            Daftar Akun Magang
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <span class="text-muted small">Sudah memiliki akun?</span>
                        <a href="<?= BASEURL; ?>/auth" class="text-success fw-bold text-decoration-none small"> Login Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>