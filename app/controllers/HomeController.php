<?php

namespace app\controllers;

class HomeController
{
    public function index()
    {
        require __DIR__ . '/../views/home.php';
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