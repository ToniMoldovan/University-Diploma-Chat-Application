<?php

namespace app\controllers;

use app\models\UserModel;

class AuthController
{
    public function register($request, $response)
    {
        $first_name = $request->param('first-name');
        $last_name = $request->param('last-name');
        $email = $request->param('email');
        $username = $request->param('username');
        $password = $request->param('password');
        $profile_picture_link = $request->param('profile-picture-link');

        // Hash the password using PASSWORD_DEFAULT
        $password = password_hash($password, PASSWORD_DEFAULT);

        $user = new UserModel();
        $user->setFirstName($first_name);
        $user->setLastName($last_name);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setProfilePictureLink($profile_picture_link);

        $user->save();
    }

    public function login($request, $response)
    {
        if (!isset($_SESSION['user_id'])) {
            $username = $request->param('username-login');
            $password = $request->param('password-login');

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);

            $user->login();
        }
        else {
            $response->redirect('/');
        }
    }

    public function logout($request, $response)
    {
        if (isset($_SESSION['user_id'])) {
            // Unset the user_id key from Session
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['profile_picture']);
            unset($_SESSION['status']);
            unset($_SESSION['is_admin']);
            // Destroy the Session
            session_destroy();
            // Redirect to the home page
            $response->redirect('/');
        }
        else {
            $response->redirect('/');
        }
    }

}