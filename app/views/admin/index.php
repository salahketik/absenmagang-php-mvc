<div class="container-fluid px-2 px-md-4">
    <div class="d-md-flex justify-content-between align-items-center mb-4 mt-4 text-center text-md-start">
        <div class="mb-3 mb-md-0">
            <h1 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Ringkasan Kehadiran</h1>
            <p class="text-muted small mb-0">Pantau aktivitas dan kehadiran harian mahasiswa magang.</p>
        </div>
    </div>

    <?php include 'partials/stats-cards.php'; ?>

    <div class="row g-3 g-md-4 mt-1">
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-clock-history me-2 text-success"></i>Log Kehadiran Terbaru
                    </h6>
                    <a href="<?= BASEURL; ?>/admin/attendance" class="btn btn-sm btn-light text-success fw-bold p-0 px-2">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <?php include 'partials/recent-table.php'; ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-bar-chart-line me-2 text-success"></i>Status Mahasiswa
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-2 g-lg-0">
                        <div class="col-6 col-lg-12 mb-lg-3">
                            <div class="d-flex align-items-center p-2 p-lg-0">
                                <div class="flex-shrink-0 p-2 p-md-3 bg-success-light rounded-3 text-success">
                                    <i class="bi bi-person-check fs-5 fs-md-4"></i>
                                </div>
                                <div class="ms-2 ms-md-3">
                                    <h5 class="mb-0 fw-bold"><?= $data['total_active'] ?? 0; ?></h5>
                                    <p class="text-muted extra-small mb-0">Aktif Magang</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-12 mb-lg-3">
                            <div class="d-flex align-items-center p-2 p-lg-0">
                                <div class="flex-shrink-0 p-2 p-md-3 bg-light rounded-3 text-secondary">
                                    <i class="bi bi-person-x fs-5 fs-md-4"></i>
                                </div>
                                <div class="ms-2 ms-md-3">
                                    <h5 class="mb-0 fw-bold"><?= $data['total_finished'] ?? 0; ?></h5>
                                    <p class="text-muted extra-small mb-0">Selesai Magang</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-3 d-none d-lg-block opacity-50">

                    <div class="p-3 bg-light rounded-3 mt-2 mt-lg-0 border-start border-success border-4">
                        <p class="small text-dark fw-bold mb-1 text-uppercase" style="font-size: 0.65rem;">Catatan</p>
                        <p class="extra-small text-muted mb-0">
                            Mahasiswa baru mendaftar secara mandiri melalui portal pendaftaran.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.appUrl = '<?= BASEURL; ?>';
</script>
<script src="<?= BASEURL; ?>/js/dashboard.js"></script>