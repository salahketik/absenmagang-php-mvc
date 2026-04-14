<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        // 1. Cek apakah sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }

        // 2. PROTEKSI KRUSIAL: Cek apakah role-nya ADMIN
        // Jika yang masuk adalah 'intern', tendang balik ke dashboard intern
        if ($_SESSION['role'] !== 'admin') {
            header('Location: ' . BASEURL . '/intern/dashboard');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $_SESSION['username'];

        // Ambil data dari model
        // Pastikan kamu sudah membuat Attendance_model & Intern_model
        $attendanceModel = $this->model('Attendance_model');
        $internModel = $this->model('Intern_model');

        // 1. Data untuk Stats Cards (Hari Ini)
        $data['total_interns'] = $internModel->countAllInterns();
        $data['present_today'] = $attendanceModel->countPresentToday();
        $data['permission_today'] = $attendanceModel->countPermissionToday();
        $data['absent_today'] = $data['total_interns'] - ($data['present_today'] + $data['permission_today']);

        // 2. Data untuk Sidebar Status (Total Akumulasi)
        $data['total_active'] = $internModel->countActiveInterns();
        $data['total_finished'] = $internModel->countFinishedInterns();

        // 3. Data untuk Recent Attendance Table (Misal: 5 data terbaru)
        $data['recent_attendance'] = $attendanceModel->getRecentAttendance(5);

        // Load Views
        $this->view('templates/admin/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/admin/footer');
    }
}
