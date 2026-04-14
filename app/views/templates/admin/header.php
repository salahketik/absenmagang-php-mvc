<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">

    <title><?= $data['title']; ?> | <?= APP_NAME; ?></title>

    <link rel="icon" href="<?= BASEURL . APP_FAVICON; ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin-style.css">
</head>

<body>
    <div id="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="<?= BASEURL; ?>/admin/dashboard" class="text-decoration-none d-flex align-items-center">
                    <img src="<?= BASEURL . APP_FAVICON; ?>" alt="Logo" width="35" height="35" class="me-3 rounded shadow-sm">
                    <div class="line-height-1">
                        <h6 class="mb-0 fw-bold text-white letter-spacing-1">TokoKu</h6>
                        <small class="text-success extra-small fw-bold text-uppercase">Panel Admin</small>
                    </div>
                </a>
            </div>

            <div class="sidebar-content">
                <ul class="list-unstyled">
                    <?php $current_page = $_GET['url'] ?? ''; ?>

                    <li class="nav-label text-uppercase">Menu Utama</li>
                    <li>
                        <a href="<?= BASEURL; ?>/admin/dashboard" class="<?= (strpos($current_page, 'admin/dashboard') !== false) ? 'active' : ''; ?>">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-label text-uppercase">Manajemen Data</li>
                    <li>
                        <a href="<?= BASEURL; ?>/admin/interns" class="<?= (strpos($current_page, 'admin/interns') !== false) ? 'active' : ''; ?>">
                            <i class="bi bi-people"></i>
                            <span>Data Magang</span>
                        </a>
                    </li>
                    <li class="nav-label text-uppercase">Sistem</li>
                    <li>
                        <a href="<?= BASEURL; ?>/auth/logout" class="text-danger btn-logout">
                            <i class="bi bi-power"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer mt-auto p-3">
                <div class="d-flex align-items-center bg-dark bg-opacity-25 p-2 rounded-3 border border-secondary border-opacity-10 mb-2">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                        <i class="bi bi-brush text-white small"></i>
                    </div>
                    <div class="line-height-1">
                        <p class="mb-1 text-white-50 fw-medium" style="font-size: 0.65rem; letter-spacing: 0.5px;">DIDESAIN OLEH</p>
                        <p class="mb-0 text-white fw-bold small">Angga & Randa</p>
                    </div>
                </div>

                <a href="https://wa.me/<?= CONTACT_WHATSAPP; ?>?text=<?= urlencode('Halo, saya tertarik untuk konsultasi pembuatan website seperti sistem absensi ini.'); ?>"
                    target="_blank"
                    class="d-flex align-items-center bg-primary bg-opacity-10 p-2 rounded-3 border border-primary border-opacity-25 text-decoration-none transition-all hover-effect">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                        <i class="bi bi-chat-dots text-white small"></i>
                    </div>
                    <div class="line-height-1">
                        <p class="mb-1 text-primary fw-medium" style="font-size: 0.65rem; letter-spacing: 0.5px;">MAU WEB SEPERTI INI?</p>
                        <p class="mb-0 text-white fw-bold small">Hubungi Sekarang</p>
                    </div>
                </a>
            </div>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand navbar-light sticky-top shadow-sm bg-white">
                <div class="container-fluid px-3">
                    <button type="button" id="sidebarCollapse" class="btn shadow-none border-0">
                        <i class="bi bi-list fs-4"></i>
                    </button>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="profile-icon-circle me-3 bg-success text-white shadow-sm">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <div class="d-none d-md-block line-height-1">
                                    <span class="text-dark small fw-bold text-capitalize d-block"><?= $_SESSION['username']; ?></span>
                                    <small class="text-muted extra-small">Administrator</small>
                                </div>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2 animate-fade-in">
                                <li>
                                    <a class="dropdown-item py-2 rounded-3 text-danger btn-logout" href="<?= BASEURL; ?>/auth/logout">
                                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="p-4">