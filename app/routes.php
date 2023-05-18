<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\HomeController;
use Klein\Klein;

$router = new Klein();

/* Home routes */
$router->respond('GET', '/', [new HomeController(), 'index']);
$router->respond('GET', '/home', [new HomeController(), 'home']);
$router->respond('GET', '/about', [new HomeController(), 'about']);
$router->respond('GET', '/contact', [new HomeController(), 'contact']);
$router->respond('GET', '/404', [new HomeController(), 'notFound']);

/* AuthController routes */
$router->respond('POST', '/register-user', [new AuthController(), 'register']);
$router->respond('POST', '/login-user', [new AuthController(), 'login']);
$router->respond('GET', '/logout-user', [new AuthController(), 'logout']);

// route for 404 REDIRECT to a 404 page
$router->onHttpError(function ($code, $router) {
    if ($code == 404) {
        $router->response()->redirect('/404');
    }
});



$router->dispatch();
