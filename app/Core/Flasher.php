<?php

class Flasher
{
    public static function set_flashdata($message)
    {
        $_SESSION['flash'] = $message;
    }

    public static function flashdata()
    {
        if (isset($_SESSION['flash'])) {
            echo $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    }
}
