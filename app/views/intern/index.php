<?php
// Logika Jam Operasional untuk Tampilan
$currentTime = date('H:i:s');
$startTime = "07:00:00";
$endTime = "16:00:00";
$isOpen = ($currentTime >= $startTime && $currentTime <= $endTime);
?>

<div class="container-fluid px-3 px-md-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 mt-3 mt-md-4 text-center text-md-start">
        <div class="mb-3 mb-md-0">
            <h1 class="fs-5 fs-md-3 fw-bold text-dark mb-1">Halo, <?= explode(' ', $data['name'])[0]; ?>! 👋</h1>
            <p class="text-muted extra-small mb-0">
                <span class="d-block d-md-inline"><?= date('l, d F Y'); ?></span>
                <span class="d-none d-md-inline mx-1">|</span>
                <span>Pastikan kehadiranmu tercatat hari ini.</span>
            </p>
        </div>

        <div class="bg-white px-3 py-2 rounded-pill shadow-sm border border-success border-opacity-25 d-inline-flex align-items-center">
            <i class="bi bi-clock-fill text-success me-2"></i>
            <span id="realtime-clock" class="fw-bold text-dark small-tracking" style="min-width: 75px;">00:00:00</span>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 border-bottom border-4 border-success-light h-100">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 p-3 bg-success-light rounded-4 text-success">
                        <i class="bi bi-person-badge fs-4"></i>
                    </div>
                    <div class="ms-3">
                        <p class="text-muted extra-small mb-0 text-uppercase fw-bold">Status Hari Ini</p>
                        <h6 class="fw-bold mb-0">
                            <?php
                            $status = $data['my_status_today'] ?? 'None';
                            if ($status == 'Present' || $status == 'Late') echo 'Sudah Hadir';
                            elseif ($status == 'Permission') echo 'Izin';
                            elseif ($status == 'Sick') echo 'Sakit';
                            else echo 'Belum Absen';
                            ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <?php Flasher::flash(); ?>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 p-3 bg-primary-light rounded-4 text-primary">
                        <i class="bi bi-alarm fs-4"></i>
                    </div>
                    <div class="ms-3">
                        <p class="text-muted extra-small mb-0 text-uppercase fw-bold">Waktu Absen</p>
                        <h6 class="fw-bold mb-0"><?= ($data['check_in_time'] != '--:--') ? $data['check_in_time'] . ' WIB' : '-- : --'; ?></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <?php if (!$data['has_checked_in']) : ?>
                <?php if ($isOpen) : ?>
                    <a href="javascript:void(0)" id="btn-attendance" class="card border-0 shadow-sm rounded-4 p-3 bg-success text-white text-decoration-none h-100 hover-scale">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="small mb-0 opacity-75">Tindakan</p>
                                <h6 class="fw-bold mb-0">Absen Sekarang</h6>
                            </div>
                            <i class="bi bi-arrow-right-circle-fill fs-2"></i>
                        </div>
                    </a>
                <?php else : ?>
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-secondary text-white opacity-75 h-100 cursor-not-allowed">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="small mb-0 opacity-75">Tindakan</p>
                                <h6 class="fw-bold mb-0">Absen Belum Dibuka</h6>
                            </div>
                            <i class="bi bi-lock-fill fs-2"></i>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-light h-100 border-start border-4 border-success">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="small mb-0 text-muted">Tindakan</p>
                            <h6 class="fw-bold mb-0 text-success">Absensi Tercatat</h6>
                        </div>
                        <i class="bi bi-check-circle-fill text-success fs-3"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row g-3 g-md-4">
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <div class="card-body p-0">
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 border-0 text-muted small fw-bold">TANGGAL</th>
                                <th class="py-3 border-0 text-muted small fw-bold">WAKTU</th>
                                <th class="py-3 border-0 text-muted small fw-bold text-end px-4">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['my_recent_logs'])) : ?>
                                <?php foreach ($data['my_recent_logs'] as $log) : ?>
                                    <tr>
                                        <td class="px-4 py-3 fw-medium small"><?= date('d M Y', strtotime($log['date'])); ?></td>
                                        <td class="py-3 small text-muted"><?= date('H:i', strtotime($log['entry_time'])); ?> WIB</td>
                                        <td class="py-3 text-end px-4">
                                            <?php
                                            $statusKey = $log['status'];
                                            $bClass = ($statusKey == 'Present') ? 'bg-success-light text-success' : 'bg-warning-light text-warning';
                                            $label = ($statusKey == 'Present') ? 'Hadir' : ($statusKey == 'Late' ? 'Terlambat' : $statusKey);
                                            ?>
                                            <span class="badge rounded-pill <?= $bClass; ?> px-3 py-2" style="font-size: 0.7rem;"><?= $label; ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-md-none">
                    <?php if (!empty($data['my_recent_logs'])) : ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($data['my_recent_logs'] as $log) : ?>
                                <div class="list-group-item px-3 py-3 border-0 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-bold small mb-1"><?= date('d M Y', strtotime($log['date'])); ?></div>
                                            <div class="text-muted extra-small"><i class="bi bi-clock me-1"></i><?= date('H:i', strtotime($log['entry_time'])); ?> WIB</div>
                                        </div>
                                        <?php
                                        $statusKey = $log['status'];
                                        $bClass = ($statusKey == 'Present') ? 'bg-success-light text-success' : 'bg-warning-light text-warning';
                                        $label = ($statusKey == 'Present') ? 'Hadir' : ($statusKey == 'Late' ? 'Terlambat' : $statusKey);
                                        ?>
                                        <span class="badge rounded-pill <?= $bClass; ?> px-2 py-1" style="font-size: 0.65rem;"><?= $label; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (empty($data['my_recent_logs'])) : ?>
                    <div class="text-center py-5">
                        <p class="text-muted small mb-0">Belum ada riwayat absensi.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-info-square-fill text-success fs-5 me-2"></i>
                        <h6 class="fw-bold text-dark mb-0">Panduan Magang</h6>
                    </div>
                    <div class="small text-muted">
                        <div class="d-flex mb-3 align-items-start">
                            <i class="bi bi-check2-circle text-success me-2 mt-1"></i>
                            <div>Absen dibuka pukul <strong>07:00 WIB</strong> dan ditutup <strong>16:00 WIB</strong>.</div>
                        </div>
                        <div class="d-flex mb-3 align-items-start">
                            <i class="bi bi-check2-circle text-success me-2 mt-1"></i>
                            <div>Batas toleransi tepat waktu adalah pukul <strong>08:00 WIB</strong>.</div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check2-circle text-success me-2 mt-1"></i>
                            <div>Data absensi yang masuk akan dipantau langsung oleh pembimbing DISHUT.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>