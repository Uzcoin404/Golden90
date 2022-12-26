<?php
require('./components/db.php');
require('./components/auth.php');
require('./components/header.php');


require __DIR__ . '/vendor/autoload.php';
$auth = new Auth();
$db = new Database();
$isUserAuth = $auth->checkAuth();
$languages = $db->getLanguages();
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('./components/spinner.php');
        include_once('./components/sidebar.php'); ?>

        <div class="content">
            <?php
            include_once('./components/nav.php');

            $klein = new \Klein\Klein();

            $klein->with('/admin', function () use ($klein) {
                $klein->respond('GET', '/', function () {
                    include_once('old.index.html');
                });
                $klein->respond('GET', '/slides', function () {
                    include_once('pages/slides.php');
                });
                $klein->respond('GET', '/slides/[create|edit:action]/[:id]?', function ($request) {
                    $slideId = $request->id;
                    include_once('pages/slides-add.php');
                });
                $klein->respond('GET', '/posts/[:id]', function ($request) {
                    $langId = $request->id;
                    include_once('pages/posts.php');
                });
            });
            $klein->respond(function () {
                return 'All the things';
            });
            $klein->dispatch();
            ?>
        </div>

        <?php require('components/footer.php'); ?>
    </div>
</body>

</html>