<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\ChatroomController;
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

/*Chatroom routes*/
$router->respond('GET', '/rooms/create', [new ChatroomController(), 'createRoom']);
$router->respond('GET', '/check-tag', [new ChatroomController(), 'tagExists']);
$router->respond('GET', '/check-room-title', [new ChatroomController(), 'nameExists']);
$router->respond('POST', '/create-room', [new ChatroomController(), 'createNewRoom']);
$router->respond('GET', '/rooms', [new ChatroomController(), 'loadRooms']);
$router->respond('GET', '/room/[:tag]', [new ChatroomController(), 'joinRoom']);
$router->respond('GET', '/getMessageHistory', [new ChatroomController(), 'getRoomMessageHistory']);
$router->respond('POST', '/sendMessage', [new ChatroomController(), 'sendMessage']);

// route for 404 REDIRECT to a 404 page
$router->onHttpError(function ($code, $router) {
    if ($code == 404) {
        $router->response()->redirect('/404');
    }
});

$router->dispatch();
