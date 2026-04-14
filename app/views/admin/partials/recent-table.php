<div class="table-responsive border-0">
    <table class="table table-hover align-middle mb-0 responsive-table-to-card">
        <thead class="bg-light d-none d-md-table-header-group">
            <tr>
                <th class="px-4 py-3 border-0 text-muted small fw-bold text-uppercase">Mahasiswa</th>
                <th class="py-3 border-0 text-muted small fw-bold text-uppercase">Waktu Masuk</th>
                <th class="py-3 border-0 text-muted small fw-bold text-uppercase text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['recent_attendance'])) : ?>
                <?php foreach ($data['recent_attendance'] as $row) : ?>
                    <tr>
                        <td class="px-4 py-3" data-label="Mahasiswa">
                            <div class="d-flex align-items-center w-100 justify-content-end justify-content-md-start">
                                <div class="avatar-circle-sm bg-success text-white me-3 d-none d-md-flex">
                                    <?= strtoupper(substr($row['name'] ?? 'U', 0, 1)); ?>
                                </div>
                                <div class="text-end text-md-start">
                                    <div class="fw-bold text-dark mb-0 text-truncate" style="max-width: 150px;">
                                        <?= $row['name'] ?? 'Unknown'; ?>
                                    </div>
                                    <div class="extra-small text-muted d-block">
                                        <?= $row['university'] ?? $row['instansi'] ?? 'Tanpa Instansi'; ?>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="py-3 text-end text-md-start" data-label="Waktu">
                            <div class="small fw-medium text-dark">
                                <i class="bi bi-clock me-1 text-muted d-none d-md-inline"></i>
                                <?php
                                $check_in = $row['check_in'] ?? $row['jam_masuk'] ?? null;
                                echo $check_in ? date('H:i', strtotime($check_in)) : '--:--';
                                ?> WIB
                            </div>
                            <div class="extra-small text-muted">
                                <?php echo $check_in ? date('d M Y', strtotime($check_in)) : '-'; ?>
                            </div>
                        </td>

                        <td class="py-3 text-center" data-label="Status">
                            <?php
                            $status = $row['status'] ?? 'Hadir';
                            if ($status == 'Late' || $status == 'Terlambat') :
                            ?>
                                <span class="badge rounded-pill bg-danger-light text-danger px-3">Terlambat</span>
                            <?php else : ?>
                                <span class="badge rounded-pill bg-success-light text-success px-3">Tepat Waktu</span>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center py-5 border-0">
                        <div class="py-3">
                            <i class="bi bi-inbox fs-1 text-muted opacity-25"></i>
                            <p class="text-muted small mt-2">Belum ada aktivitas absensi hari ini.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    /* CSS Khusus untuk mengubah tabel menjadi Card di Mobile */
    @media (max-width: 768px) {
        .responsive-table-to-card thead {
            display: none;
            /* Sembunyikan header tabel di mobile */
        }

        .responsive-table-to-card border-0 {
            border: 0 !important;
        }

        .responsive-table-to-card tr {
            display: block;
            margin-bottom: 1rem;
            background: #fff;
            border: 1px solid #eee !important;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .responsive-table-to-card td {
            display: flex;
            justify-content: 间;
            align-items: center;
            text-align: right;
            border-bottom: 1px solid #f8f9fa;
            padding: 8px 10px !important;
        }

        .responsive-table-to-card td::before {
            content: attr(data-label);
            /* Mengambil label dari atribut data-label */
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.65rem;
            color: #6c757d;
            flex: 1;
            text-align: left;
        }

        .responsive-table-to-card td:last-child {
            border-bottom: 0;
            justify-content: center;
        }

        .avatar-mobile {
            width: 35px;
            height: 35px;
            font-size: 0.8rem;
        }
    }

    .avatar-circle-sm {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
</style>