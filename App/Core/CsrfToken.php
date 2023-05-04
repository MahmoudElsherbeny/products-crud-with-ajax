<?php 

namespace App\Core;

class CsrfToken
{
    public static function generateToken($name)
    {
        session_start();
        $token = isset($_SESSION[$name]) ? $_SESSION[$name] : $_SESSION[$name] = md5(uniqid());
        session_write_close();
    }

    public function validateToken($name, $token)
    {
        session_start();
        // validate token
        $csrf_token = isset($_SESSION[$name]) ? $_SESSION[$name] : "";
		session_write_close();
        if ($csrf_token && $token === $csrf_token) {
            unset($_SESSION[$name]);
            return true;
        } else {
            return false;
        }
    }

    public function CsrfToken($name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
    }

}
