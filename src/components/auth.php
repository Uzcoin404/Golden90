<?php
session_start();

class Auth
{
    public function checkAuth()
    {
        $email = $_COOKIE['email'] ?? null;
        if ($email) {
            return true;
        } else {
            return false;
        }
    }
}