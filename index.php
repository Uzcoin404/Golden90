<?php

$adminUrl = substr($_SERVER['REQUEST_URI'], 0, 6);
if ($adminUrl != '/admin') {
    require('public/index.php');
    exit();
}
require('src/components/auth.php');
$auth = new Auth();
$isUserAuth = $auth->checkAuth();

if (!$isUserAuth) {
    require('src/components/header.php');
    require('src/pages/signin.php');
    exit();
}

require('src/components/db.php');
require __DIR__ . '/vendor/autoload.php';
require('./routes.php');
?>