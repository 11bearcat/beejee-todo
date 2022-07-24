<?php

session_start();

define('UPLDIR', __DIR__ . '/uploads');

require 'vendor/autoload.php';
//
if (! isset($_SESSION['auth'])
    && strpos($_SERVER['REQUEST_URI'], '/admin') !== false
) {
    header('Location: /login');
    return;
}


$dispatcher = FastRoute\simpleDispatcher(function($r) {

    $r->addRoute(['GET', 'POST'], '/tasks', function() {
        $controller = new App\Controller\TasksController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/tasks/add', function() {
        $controller = new App\Controller\TasksController();
        $controller->runAdd();
    });

    $r->addRoute('GET', '/', function(){
        header('Location: /tasks');
    });

    $r->addRoute(['GET', 'POST'], '/login', function() {
        $controller = new App\Controller\LoginController();
        $controller->run();
    });

    $r->addRoute(['GET', 'POST'], '/logout', function() {
        session_unset();
        header('Location: /tasks');
    });

    $r->addRoute(['GET', 'POST'], '/admin/users', function() {
        $controller = new App\Controller\UsersController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/admin/users/add', function() {
        $controller = new App\Controller\UsersController();
        $controller->runAdd();
    });
    $r->addRoute(['GET', 'POST'], '/admin/users/update', function() {
        $controller = new App\Controller\UsersController();
        $controller->runUpdate();
    });
    $r->addRoute(['GET', 'POST'], '/admin/users/delete', function() {
        $controller = new App\Controller\UsersController();
        $controller->runDelete();
    });
    $r->addRoute(['GET', 'POST'], '/tasks/update', function() {
        $controller = new App\Controller\TasksController();
        $controller->runUpdate();
    });
    $r->addRoute(['GET', 'POST'], '/tasks/delete', function() {
        $controller = new App\Controller\TasksController();
        $controller->runDelete();
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo 'Роут не создан';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo 'Роут есть, а метода нет (GET или POST?)';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        // ... call $handler with $vars
        break;
}
