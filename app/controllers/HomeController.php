<?php

namespace app\controllers;

class HomeController
{
    public function index($request, $response)
    {
        if (isset($_SESSION['user_id'])) {
            require __DIR__ . '/../views/home.php';
        }
        else {
            require __DIR__ . '/../views/login.php';
        }
    }

    public function home($request, $response)
    {
        if (isset($_SESSION['user_id'])) {
            $response->redirect('/');
        }
        else {
            $response->redirect('/');
        }
    }

    public function about()
    {
        echo 'This is the about page.';
    }

    public function contact()
    {
        echo 'This is the contact page.';
    }

    //TODO: Create a 404 page
    public function notFound()
    {
        echo '404 - Page not found.';
    }
}