<?php

$adminUrl = substr($_SERVER['REQUEST_URI'], 0, 6);
if ($adminUrl != '/admin') {
    require('public/index.php');
    exit();
}

require('src/components/db.php');
require('src/components/auth.php');
require __DIR__ . '/vendor/autoload.php';

$auth = new Auth();
$db = new Database();
$isUserAuth = $auth->checkAuth();
$languages = $db->getLanguages();

require('src/components/header.php');
include_once('src/components/spinner.php');
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/components/sidebar.php'); ?>
        <div class="content">

            <?php
            require('src/components/nav.php');

            require('route.php');
            ?>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>