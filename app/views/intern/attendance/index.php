<div class="table-responsive">
    <table class="table table-hover align-middle mb-0 d-none d-md-table">
        <thead class="bg-light">
            <tr>
                <th class="ps-4 py-3 text-uppercase extra-small fw-bold">Tanggal</th>
                <th class="py-3 text-uppercase extra-small fw-bold">Jam Masuk</th>
                <th class="py-3 text-uppercase extra-small fw-bold text-center">Status</th>
                <th class="pe-4 py-3 text-uppercase extra-small fw-bold text-end">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['attendance'])) : ?>
                <?php foreach ($data['attendance'] as $row) : ?>
                    <tr>
                        <td class="ps-4 py-3 small fw-bold"><?= date('d M Y', strtotime($row['date'])); ?></td>
                        <td class="py-3 small"><?= $row['entry_time']; ?> WIB</td>
                        <td class="py-3 text-center">
                            <?php
                            $status_info = getStatusConfig($row['status']); // Fungsi pembantu
                            ?>
                            <span class="badge <?= $status_info['badge']; ?> rounded-pill px-3"><?= $row['status']; ?></span>
                        </td>
                        <td class="pe-4 py-3 text-end small text-muted">
                            <?= !empty($row['information']) ? $row['information'] : $status_info['text']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="d-md-none">
        <?php if (!empty($data['attendance'])) : ?>
            <?php foreach ($data['attendance'] as $row) :
                $status_info = getStatusConfig($row['status']);
            ?>
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="fw-bold small"><?= date('l, d M Y', strtotime($row['date'])); ?></div>
                            <div class="text-muted extra-small"><i class="bi bi-clock me-1"></i><?= $row['entry_time']; ?> WIB</div>
                        </div>
                        <span class="badge <?= $status_info['badge']; ?> rounded-pill"><?= $row['status']; ?></span>
                    </div>
                    <div class="bg-light p-2 rounded small text-muted">
                        <i class="bi bi-info-circle me-1"></i> <?= !empty($row['information']) ? $row['information'] : $status_info['text']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="text-center py-5">
                <i class="bi bi-clipboard-x display-1 text-light"></i>
                <p class="text-muted mt-3">Belum ada data.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Fungsi pembantu biar kode tidak kotor (letakkan di atas atau di helper)
function getStatusConfig($status)
{
    switch ($status) {
        case 'Late':
            return ['badge' => 'bg-warning text-dark', 'text' => 'Datang terlambat'];
        case 'Sick':
            return ['badge' => 'bg-info text-white', 'text' => 'Sakit (Izin)'];
        case 'Permission':
            return ['badge' => 'bg-primary text-white', 'text' => 'Izin Keperluan'];
        default:
            return ['badge' => 'bg-success text-white', 'text' => 'Hadir tepat waktu'];
    }
}
?>