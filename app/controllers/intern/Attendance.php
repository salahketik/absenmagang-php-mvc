<?php

class Attendance extends Controller
{

    // WAJIB ADA: Fungsi index inilah yang dipanggil saat kamu buka URL /attendance
    public function index()
    {
        $data['title'] = 'Absensi Saya';
        $data['active_menu'] = 'attendance'; // Ini untuk menjawab error "Undefined array key"

        $user_id = $_SESSION['user_id'];
        $data['attendance'] = $this->model('Attendance_model')->getPersonalLogs($user_id, 100);

        $this->view('templates/intern/header', $data); // Sesuaikan folder header kamu
        $this->view('intern/attendance/index', $data);
        $this->view('templates/intern/footer', $data);
    }

    public function checkin()
    {

        // Tambahkan baris ini di paling atas!
        date_default_timezone_set('Asia/Jakarta');
        
        Middleware::auth();
        if ($_SESSION['role'] !== 'intern') exit;

        $user_id = $_SESSION['user_id'];
        $date = date('Y-m-d');
        $current_time = date('H:i:s');

        // Konfigurasi Waktu
        $start_time = "07:00:00";
        $end_time = "16:00:00";
        $late_limit = "08:00:00";

        // 1. Validasi Jam Operasional
        if ($current_time < $start_time || $current_time > $end_time) {
            Flasher::setFlash('Gagal', 'Absensi hanya jam 07:00 - 16:00 WIB.', 'error');
            header('Location: ' . BASEURL . '/intern/dashboard');
            exit;
        }

        $model = $this->model('Attendance_model');

        // 2. Validasi Sudah Absen
        if ($model->getAttendanceByUserAndDate($user_id, $date)) {
            Flasher::setFlash('Peringatan', 'Anda sudah absen hari ini.', 'warning');
            header('Location: ' . BASEURL . '/intern/dashboard');
            exit;
        }

        // 3. Penentuan Status (CRITICAL: Pastikan string ini sama dengan ENUM di DB)
        // Gunakan huruf kapital depan jika di DB menggunakan 'Present' dan 'Late'
        $status = (strtotime($current_time) <= strtotime($late_limit)) ? 'Present' : 'Late';

        $data = [
            'user_id' => $user_id,
            'date'    => $date,
            'time'    => $current_time,
            'status'  => $status // Pastikan key 'status' ini ada dan terisi
        ];

        if ($model->recordAttendance($data) > 0) {
            Flasher::setFlash('Berhasil', 'Absen berhasil dengan status: ' . $status, 'success');
        } else {
            Flasher::setFlash('Gagal', 'Sistem gagal menyimpan status. Cek struktur DB.', 'error');
        }

        header('Location: ' . BASEURL . '/intern/dashboard');
        exit;
    }
}
