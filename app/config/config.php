<?php

/**
 * KONFIGURASI PENTING - SISTEM ABSENSI MAGANG
 */

// 1. URL Utama (Sesuaikan jika folder di htdocs berubah)
define('BASEURL', 'absenmagang-php-mvc');

// 2. Branding Aplikasi (Ubah dari TokoKu ke Absensi)
define('APP_NAME', 'AbsenMagang');
define('APP_BRAND_PART1', 'Absen');
define('APP_BRAND_PART2', 'Magang');
define('APP_TAGLINE', 'Sistem Monitoring Kehadiran Mahasiswa');

// 3. Konfigurasi Database (Krusial agar tidak error 404/500)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'absensi_magang');

// 4. Identitas Developer (Penting untuk Footer)
define('DEVELOPER_NAME', 'Jimmy');
define('CONTACT_WHATSAPP', '6287737884832');

define('APP_FAVICON', '/img/logo.png');
define('THEME_COLOR', '#198754'); // Hijau (Success) lebih cocok untuk Absensi daripada Ungu