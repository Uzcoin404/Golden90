<?php
require('./db.php');
ob_start();

$db = new Database();
$email = $_POST['email'];
$password = $_POST['password'];

if ($db->getUser($email, $password)) {
    setcookie('email', $email, time() + 3600 * 24 * 30, '/');
    header("Location: /admin/");
    exit();
} else {
    header("Location: /admin/login?err=1");
}
ob_end_flush();
