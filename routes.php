<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
require('./vendor/pecee/simple-router/helpers.php');

Router::group(['prefix' => '/admin'], function () {
    Router::get('/', function () {
        include_once('src/main.php');
    });
    Router::get('/sections/{lang}', function ($langId) {
        include_once('src/pages/sections.php');
    });
    Router::get('/posts/{lang}/create', function ($langId) {
        $postId = null;
        include_once('src/pages/posts-control.php');
    });
    Router::get('/items/{sec}/{lang}', function ($sectionId, $langId) {
        include_once('src/pages/posts.php');
    });
    Router::get('/items/{lang}', function ($langId) {
        include_once('src/pages/posts.php');
    });
    Router::get('/posts/{lang}/edit/{id}', function ($langId, $postId) {
        include_once('src/pages/posts-control.php');
    });
    Router::get('/languages', function () {
        include_once('src/pages/languages.php');
    });
    Router::get('/language/create', function () {
        include_once('src/pages/language-control.php');
    });
    Router::get('/language/edit/{lang}', function ($id) {
        include_once('src/pages/language-control.php');
    });
    
    Router::get('/404', function () {
        include_once('src/pages/404.php');
    });
});

Router::error(function ($request, $exception) {
    switch ($exception->getCode()) {
        case 404:
            response()->redirect('/admin/404');
    }
});
Router::start();