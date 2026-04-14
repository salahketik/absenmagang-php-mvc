<?php

class Controller
{
    public function view($view, $data = [])
    {
        // Gunakan DIRECTORY_SEPARATOR agar aman di Windows maupun Linux
        $path = '../app/views/' . $view . '.php';

        if (file_exists($path)) {
            extract($data);
            require_once $path;
        } else {
            // Berikan response 404 jika file tidak ada
            header("HTTP/1.0 404 Not Found");
            die("View Error: File <b>app/views/$view.php</b> not found.");
        }
    }

    public function model($model)
    {
        // Mendukung pemanggilan model di subfolder, misal: 'admin/User_model'
        $file = explode('/', $model);
        $className = end($file); // Ambil nama class terakhirnya saja

        $path = '../app/models/' . $model . '.php';

        if (file_exists($path)) {
            require_once $path;

            // Cek apakah class-nya benar-benar ada di dalam file tersebut
            if (class_exists($className)) {
                return new $className;
            }
        }

        die("Model Error: Class or File <b>$model.php</b> not found.");
    }
}
