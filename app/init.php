<?php

// 1. Muat Konfigurasi Terlebih Dahulu
require_once 'config/config.php';

// 2. Muat Komponen Inti (Core) - Pastikan Huruf Kapital Sesuai Nama File
require_once 'core/App.php';
require_once 'core/Controller.php'; // C kapital agar aman di Linux
require_once 'core/Database.php';
require_once 'core/Flasher.php';
require_once 'core/Middleware.php';

/**
 * CATATAN MODULAR: 
 * Jangan panggil Flasher::flash() di sini. 
 * Panggillah di views/templates/header.php atau langsung di view terkait.
 * init.php hanya bertugas "mendaftarkan" file agar siap digunakan.
 */
