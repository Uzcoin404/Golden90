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
$db = new Database();
$user = $db->getUser($_COOKIE['email']);

require __DIR__ . '/vendor/autoload.php';
require('src/components/header.php');
include_once('src/components/spinner.php');

?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/components/sidebar.php'); ?>
        <div class="content">

            <?php
            require('src/components/nav.php');

            require('routes.php');
            ?>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>