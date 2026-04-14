<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        // Pastikan user sudah login
        Middleware::auth();

        // Proteksi Role: Jika bukan intern, tendang ke login atau dashboard admin
        if ($_SESSION['role'] !== 'intern') {
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'My Attendance Dashboard';
        $data['user_id'] = $_SESSION['user_id'];
        $data['name'] = $_SESSION['name'];

        $attendanceModel = $this->model('Attendance_model');

        // 1. Ambil status kehadiran user ini KHUSUS hari ini
        $todayAttendance = $attendanceModel->getAttendanceByUserAndDate($data['user_id'], date('Y-m-d'));

        $data['has_checked_in'] = $todayAttendance ? true : false;
        $data['my_status_today'] = $todayAttendance['status'] ?? 'Not Checked In';
        $data['check_in_time'] = $todayAttendance['entry_time'] ?? '--:--';

        // 2. Ambil riwayat absensi pribadi (misal 5 terakhir)
        $data['my_recent_logs'] = $attendanceModel->getPersonalLogs($data['user_id'], 5);

        // Load Views khusus folder intern
        $this->view('templates/intern/header', $data);
        $this->view('intern/index', $data);
        $this->view('templates/intern/footer');
    }
}
