<div class="row g-2 g-md-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 stats-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon bg-success-light text-success">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1 text-dark"><?= $data['total_interns'] ?? 0; ?></h3>
                <p class="text-muted mb-0 extra-small fw-bold text-uppercase tracking-wider">Total Mahasiswa</p>
            </div>
            <div class="stats-progress bg-success opacity-25" style="height: 4px; width: 100%;"></div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 stats-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon bg-primary-light text-primary">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1 text-dark"><?= $data['present_today'] ?? 0; ?></h3>
                <p class="text-muted mb-0 extra-small fw-bold text-uppercase tracking-wider">Hadir Hari Ini</p>
            </div>
            <div class="stats-progress bg-primary opacity-25" style="height: 4px; width: 100%;"></div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 stats-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon bg-warning-light text-warning">
                        <i class="bi bi-envelope-paper-fill"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1 text-dark"><?= $data['permission_today'] ?? 0; ?></h3>
                <p class="text-muted mb-0 extra-small fw-bold text-uppercase tracking-wider">Izin / Sakit</p>
            </div>
            <div class="stats-progress bg-warning opacity-25" style="height: 4px; width: 100%;"></div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 stats-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon bg-danger-light text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1 text-dark"><?= $data['absent_today'] ?? 0; ?></h3>
                <p class="text-muted mb-0 extra-small fw-bold text-uppercase tracking-wider">Belum Absen</p>
            </div>
            <div class="stats-progress bg-danger opacity-25" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
</div>