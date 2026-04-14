<?php

class Auth extends Controller
{
    private function loadAuthView($page, $data)
    {
        $this->view('templates/auth/header', $data);
        $this->view('auth/' . $page, $data);
        $this->view('templates/auth/footer');
    }

    public function index()
    {
        Middleware::guest();
        $data['title'] = 'Login Admin';
        $this->loadAuthView('login', $data);
    }

    public function registration()
    {
        Middleware::guest();
        $data['title'] = 'Register Admin';
        $this->loadAuthView('register', $data);
    }

    public function login()
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);

        $user = $this->model('User_model')->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // 1. Set Session
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // 2. Set Cookie (Remember Me)
            if ($remember) {
                $hashKey = hash('sha256', $user['username'] . 'YOUR_SECRET_SALT_123');
                setcookie('id', $user['id'], time() + (3600 * 24 * 30), '/');
                setcookie('key', $hashKey, time() + (3600 * 24 * 30), '/');
            }

            // Sapa dengan Name Lengkap
            Flasher::setFlash('Berhasil', 'Selamat Datang, ' . $user['name'], 'success');

            // 3. REDIRECT BERDASARKAN ROLE
            if ($user['role'] == 'admin') {
                header('Location: ' . BASEURL . '/admin/dashboard');
            } else if ($user['role'] == 'intern') { // Pastikan mengecek 'intern', bukan yang lain
                header('Location: ' . BASEURL . '/intern/dashboard'); // Arahkan ke /intern/dashboard
            } else {
                // Jika ada role lain atau fallback
                header('Location: ' . BASEURL . '/auth');
            }
            exit;
            // HAPUS header('Location: ' . BASEURL . '/Dashboard'); yang ada di sini sebelumnya
            exit;
        }

        Flasher::setFlash('Gagal', 'Username atau Password salah!', 'error');
        header('Location: ' . BASEURL . '/auth');
        exit;
    }

    public function store()
    {
        // 1. Validasi Input Lengkap (Termasuk 'name')
        if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
            Flasher::setFlash('Gagal', 'Semua data wajib diisi!', 'warning');
            header('Location: ' . BASEURL . '/auth/registration');
            exit;
        }

        // 2. Validasi Password
        if ($_POST['password'] !== $_POST['confirm_password']) {
            Flasher::setFlash('Gagal', 'Konfirmasi password tidak sesuai!', 'error');
            header('Location: ' . BASEURL . '/auth/registration');
            exit;
        }

        // 3. Proses registrasi ke Model
        $result = $this->model('User_model')->register($_POST);

        if ($result > 0) {
            Flasher::setFlash('Berhasil', 'Akun berhasil dibuat, silakan login!', 'success');
            header('Location: ' . BASEURL . '/auth');
        } else {
            $msg = ($result == -1) ? 'Username sudah terdaftar!' : 'Terjadi kesalahan sistem!';
            Flasher::setFlash('Gagal', $msg, 'error');
            header('Location: ' . BASEURL . '/auth/registration');
        }
        exit;
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $_SESSION = [];
        session_unset();
        session_destroy();

        // Hapus Cookie
        setcookie('id', '', time() - 3600, '/');
        setcookie('key', '', time() - 3600, '/');

        header('Location: ' . BASEURL . '/auth');
        exit;
    }
}
