<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="noindex, nofollow">

    <title><?= ($data['title'] ?? '404 Not Found'); ?> | <?= APP_NAME; ?></title>
    <meta name="description" content="Halaman yang Anda cari di <?= APP_NAME; ?> tidak ditemukan. Silakan kembali ke beranda.">
    <meta name="author" content="<?= APP_NAME; ?> Team">
    <meta name="theme-color" content="<?= THEME_COLOR; ?>">

    <link rel="icon" href="<?= BASEURL . APP_FAVICON; ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= BASEURL . APP_FAVICON; ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/error-style.css?v=<?= time(); ?>">
</head>

<body>

    <div class="error-wrapper">
        <h1 class="code-404">404</h1>

        <h2 class="error-title">Halaman Tidak Ditemukan</h2>
        <p class="error-text">
            Mohon maaf, sistem tidak dapat menemukan alamat yang Anda tuju.<br class="d-none d-md-block">
            Silakan periksa kembali URL atau kembali ke halaman utama.
        </p>

        <div class="btn-action-group">
            <button onclick="history.back()" class="btn-custom btn-back">
                <i class="bi bi-arrow-left"></i> Sebelumnya
            </button>

            <?php
            // Logika penentuan link beranda berdasarkan role
            $home_url = BASEURL; // default
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    $home_url = BASEURL . '/admin/dashboard';
                } elseif ($_SESSION['role'] == 'intern') {
                    $home_url = BASEURL . '/intern/dashboard';
                }
            }
            ?>

            <a href="<?= $home_url; ?>" class="btn-custom btn-primary-admin">
                <i class="bi bi-house-door"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="footer-brand">
            &copy; <?= date('Y'); ?> <strong><?= APP_NAME; ?> Pdg</strong> &bull; <?= APP_TAGLINE; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>