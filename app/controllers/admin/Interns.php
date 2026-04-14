<?php

class Interns extends Controller
{
    public function __construct()
    {
        // 1. Mulai session jika belum ada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // 2. Proteksi Login: Jika belum login, tendang ke halaman login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }

        // 3. Proteksi Role: Jika bukan admin, tendang ke dashboard intern masing-masing
        if ($_SESSION['role'] !== 'admin') {
            header('Location: ' . BASEURL . '/intern/dashboard');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa Magang';
        $internModel = $this->model('Intern_model');

        // Ambil semua data mahasiswa dari database
        $data['all_interns'] = $internModel->getAllInterns();

        // Load Views (Sesuai folder yang kamu minta: admin/interns/index)
        $this->view('templates/admin/header', $data);
        $this->view('admin/interns/index', $data); // Ini memanggil app/views/admin/interns/index.php
        $this->view('templates/admin/footer');
    }
}
