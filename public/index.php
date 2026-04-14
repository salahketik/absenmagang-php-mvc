<?php

// 1. Jalankan Session (Wajib di paling atas)
if (!session_id()) session_start();

// 2. Panggil semua file inti melalui init.php
require_once '../app/init.php';

// 3. Jalankan Aplikasi (Routing)
$app = new App;
