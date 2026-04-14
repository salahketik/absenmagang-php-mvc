<?php

class ErrorPage extends Controller
{
    public function index()
    {
        // Pastikan key 'title' dibuat di sini
        $data['title'] = '404 Not Found';

        $this->view('error/404', $data);
    }
}
