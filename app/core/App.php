<?php

class App
{
    protected $controller = 'Auth';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // --- LOGIKA REMEMBER ME SUDAH DIPINDAH KE MIDDLEWARE ---
        // Kita tidak perlu cek DB di sini lagi agar App.php tetap ringan.

        $url = $this->parseURL();

        // 1. CEK SUB-FOLDER (Contoh: admin)
        $path = '../app/controllers/';
        if (!empty($url) && is_dir($path . $url[0])) {
            $path .= $url[0] . '/';

            // Set default controller untuk sub-folder admin
            if ($url[0] == 'admin') {
                $this->controller = 'Dashboard';
            }

            unset($url[0]);
            $url = array_values($url);
        }

        // 2. CEK FILE CONTROLLER
        if (!empty($url)) {
            if (file_exists($path . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } else {
                // Jika file tidak ada, arahkan ke ErrorPage
                $this->controller = 'ErrorPage';
                $path = '../app/controllers/';
            }
        }

        // 3. LOAD & INSTANSIASI CONTROLLER
        require_once $path . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 4. CEK METHOD
        $url = array_values($url);
        if (isset($url[0])) {
            if (method_exists($this->controller, $url[0])) {
                $this->method = $url[0];
                unset($url[0]);
            } else {
                // Method tidak ada? Lempar ke ErrorPage
                require_once '../app/controllers/ErrorPage.php';
                $this->controller = new ErrorPage();
                $this->method = 'index';
            }
        }

        // 5. PARAMS
        $this->params = !empty($url) ? array_values($url) : [];

        // 6. JALANKAN
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
