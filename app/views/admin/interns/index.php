<div class="container-fluid px-2 px-md-4">
    <div class="mb-4 mt-4 text-center text-md-start">
        <h4 class="fw-bold text-dark mb-1">Informasi Mahasiswa Magang</h4>
        <p class="text-muted small mb-0">Halaman monitoring data instansi, periode, dan status keaktifan mahasiswa.</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0 p-md-2">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 responsive-card-table">
                    <thead class="bg-light d-none d-md-table-header-group">
                        <tr>
                            <th class="ps-4 py-3 border-0 text-muted small fw-bold text-uppercase">No</th>
                            <th class="py-3 border-0 text-muted small fw-bold text-uppercase">Mahasiswa</th>
                            <th class="py-3 border-0 text-muted small fw-bold text-uppercase">Asal Instansi / Universitas</th>
                            <th class="py-3 border-0 text-muted small fw-bold text-uppercase">Periode Magang</th>
                            <th class="px-4 py-3 border-0 text-muted small fw-bold text-uppercase text-center">Status Keaktifan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['all_interns'])) : ?>
                            <?php $no = 1;
                            foreach ($data['all_interns'] as $intern) : ?>
                                <tr>
                                    <td class="ps-4 small text-muted" data-label="No"><?= $no++; ?></td>

                                    <td data-label="Mahasiswa">
                                        <div class="d-flex align-items-center justify-content-end justify-content-md-start">
                                            <div class="avatar-circle-sm bg-success text-white me-3 d-none d-md-flex">
                                                <?= strtoupper(substr($intern['name'] ?? $intern['nama'] ?? 'U', 0, 1)); ?>
                                            </div>
                                            <div class="text-end text-md-start">
                                                <span class="d-block fw-bold text-dark small"><?= $intern['name'] ?? $intern['nama'] ?? 'N/A'; ?></span>
                                                <small class="text-muted extra-small d-block"><?= $intern['email'] ?? 'Tidak ada Email'; ?></small>
                                            </div>
                                        </div>
                                    </td>

                                    <td data-label="Instansi">
                                        <div class="text-dark small fw-medium">
                                            <i class="bi bi-building me-1 text-muted d-none d-md-inline"></i>
                                            <?= $intern['university'] ?? $intern['instansi'] ?? $intern['asal_sekolah'] ?? 'Umum / Lainnya'; ?>
                                        </div>
                                    </td>

                                    <td data-label="Periode">
                                        <div class="small text-dark fw-bold">
                                            <?php
                                            $start = $intern['start_date'] ?? $intern['tgl_mulai'] ?? null;
                                            $end = $intern['end_date'] ?? $intern['tgl_selesai'] ?? null;
                                            echo $start ? date('d M Y', strtotime($start)) : '-';
                                            echo ' <span class="text-muted mx-1">s/d</span> ';
                                            echo $end ? date('d M Y', strtotime($end)) : 'Selesai';
                                            ?>
                                        </div>
                                        <?php if ($start && $end) : ?>
                                            <div class="extra-small text-muted mt-1">
                                                <i class="bi bi-calendar-check me-1"></i>
                                                <?php
                                                $d1 = new DateTime($start);
                                                $d2 = new DateTime($end);
                                                $diff = $d1->diff($d2);
                                                echo ($diff->m > 0) ? $diff->m . " Bulan " : "";
                                                echo $diff->d . " Hari Durasi";
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-md-center px-4" data-label="Status">
                                        <?php
                                        $status = strtolower($intern['status'] ?? 'active');
                                        if ($status == 'active' || $status == 'aktif') :
                                        ?>
                                            <span class="badge rounded-pill bg-success-soft px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> Aktif
                                            </span>
                                        <?php else : ?>
                                            <span class="badge rounded-pill bg-secondary-soft px-3 py-2">
                                                <i class="bi bi-clock-history me-1"></i> Selesai
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 border-0">
                                    <i class="bi bi-folder-x text-muted opacity-25 fs-1"></i>
                                    <p class="text-muted small mt-2">Data informasi mahasiswa tidak tersedia saat ini.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>