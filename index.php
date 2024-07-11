<?php
session_start();

require_once 'src/vendor/autoload.php';

// Utilisation du Router
use Api\Routes\Router;
use Api\config\Database;
use Api\Controller\PostController;
use Api\Controller\AuthController;
use Api\Models\User;

require_once 'src/config/config.php';
require_once 'src/helpers/request.php';

$router = new Router;

$router->get('/', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->index();
});
// login //
$router->get('/login', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->index();
});
$router->post('/login/check', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->login();
});
$router->get('/logout', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->logout();
});


// Register //

$router->get('/register', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->register();
});

$router->post('/register/add', function () {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    (new AuthController('', '', $db))->checkRegister();
});

// Post request //

$router->get('/posts/:key', function ($key) {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    $posts = (new Postcontroller($db))->getPosts($key);
    print_r($posts);
    exit;
});

$router->get('/post/:id/:key', function ($id, $key) {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    $post = (new Postcontroller($db))->getPost($id, $key);
    print_r($post);
    exit;
});
$router->post('/post/:key', function ($key) {

    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    $post = (new Postcontroller($db))->postPost($key);
    print_r($post);
    exit;
});

$router->put('/post/:id/:key', function ($id, $key) {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    $post = (new Postcontroller($db))->putPost($id, $key);
    print_r($post);
    exit;
});

$router->delete('/post/:id/:key', function ($id, $key) {
    $db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
    $post = (new Postcontroller($db))->deletePost($id, $key);
    print_r($post);
    exit;
});

$router->run();
