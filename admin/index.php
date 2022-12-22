<?php
require('./components/db.php');
require('./components/auth.php');
include_once('./components/header.php');

// require __DIR__ . '/vendor/autoload.php';
$auth = new Auth();
$db = new Database();
$isUserAuth = $auth->checkAuth();
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('./components/spinner.php');
        include_once('./components/sidebar.php'); ?>

        <div class="content">
            <?php
            $routes = [];
            include_once('./components/nav.php');

            route('/admin/', function () {
                include_once('./old.index.html');
            });
            route('/admin/slides', function () {
                include_once('./pages/slides.php');
            });
            route('/admin/slides/add', function () {
                include_once('./pages/slides-add.php');
            });
            route('/admin/slides/edit', function () {
                include_once('./pages/slides-delete.php');
            });
            route('/admin/login', function () {
                include_once('./pages/signin.php');
            });
            route('/admin/404', function () {
                echo "Page not found";
            });


            run();

            function route(string $path, callable $callback)
            {
                global $routes;
                $routes[$path] = $callback;
            }
            function run()
            {
                global $routes, $isUserAuth;
                $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
                $found = false;
                foreach ($routes as $path => $callback) {
                    if ($path !== $uri) continue;

                    if (!$isUserAuth) {
                        $loginCallback = $routes['/admin/login'];
                        $loginCallback();
                        break;
                    } else {
                        $callback();
                    }
                    $found = true;
                }


                if (!$found) {
                    $notFoundCallback = $routes['/admin/404'];
                    $notFoundCallback();
                }
            }
            ?>
        </div>

        <?php include_once('./components/footer.php'); ?>
    </div>
</body>

</html>