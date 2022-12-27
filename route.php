<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(['prefix' => '/admin'], function () {
    Router::get('/', function () {
        include_once('src/old.index.html');
    });
    Router::get('/slides', function () {
        include_once('src/pages/slides.php');
    });
    Router::get('/slides/create', function () {
        $slideId = null;
        include_once('src/pages/slides-control.php');
    });
    Router::get('/slides/edit/{id}', function ($slideId) {
        include_once('src/pages/slides-control.php');
    });
    Router::get('/posts/{lang}', function ($langId) {
        include_once('src/pages/posts.php');
    });
    Router::get('/posts/{lang}/create', function ($langId) {
        $postId = null;
        include_once('src/pages/posts-control.php');
    });
    Router::get('/posts/{lang}/edit/{id}', function ($langId, $postId) {
        include_once('src/pages/posts-control.php');
    });
});

Router::get('/404', function () {
    include_once('src/pages/404.php');
});
// Router::error(function ($request, $exception) {

//     switch ($exception->getCode()) {
//         case 404:
//             response()->redirect('/404');
//     }
// });
Router::start();
