<?php

class Flasher
{
    // Pastikan namanya 'setFlash' (Bukan 'setMessage' atau yang lain)
    public static function setFlash($msg, $action, $type)
    {
        $_SESSION['flash'] = [
            'msg' => $msg,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo "
            <script>
                window.addEventListener('load', function() {
                    Swal.fire({
                        title: '" . $_SESSION['flash']['msg'] . "',
                        text: '" . $_SESSION['flash']['action'] . "',
                        icon: '" . $_SESSION['flash']['type'] . "'
                    });
                });
            </script>";
            unset($_SESSION['flash']);
        }
    }
}
