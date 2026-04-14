<?php

class Middleware
{
    /**
     * Satpam untuk halaman yang WAJIB Login (Dashboard, Produk, dll)
     */
    public static function auth()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // 1. Jika tidak ada session, coba cek Cookie (Auto Login)
        if (!isset($_SESSION['login'])) {
            if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {

                $db = new Database;
                $db->query("SELECT * FROM users WHERE id = :id");
                $db->bind('id', $_COOKIE['id']);
                $user = $db->single();

                if ($user) {
                    // Verifikasi Key Cookie dengan Salt (Agar tidak mudah ditebak)
                    $hashKey = hash('sha256', $user['username'] . 'YOUR_SECRET_SALT_123');

                    if ($_COOKIE['key'] === $hashKey) {
                        $_SESSION['login'] = true;
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        return; // Berhasil login via cookie, izinkan akses
                    }
                }
            }

            // Jika tidak ada session dan cookie tidak valid, tendang ke login
            Flasher::setFlash('Peringatan', 'Silakan login terlebih dahulu untuk mengakses halaman ini.', 'warning');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    /**
     * Satpam untuk halaman Guest (Login & Register)
     * Mencegah user yang sudah login balik lagi ke halaman login
     */
    public static function guest()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        }
    }
}
