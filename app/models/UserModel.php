<?php

namespace app\models;
use PDO;

class UserModel
{
    private $id = -1;
    private $first_name = '';
    private $last_name = '';

    private $email = '';

    private $username = '';

    private $password = '';

    private $profile_picture_link = '';

    private $status = ''; // online or offline

    private $is_admin = 'false';

    public function getIsAdmin(): string
    {
        return $this->is_admin;
    }

    public function setIsAdmin(string $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    private $created_at = '';

    private $last_active = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getFirstName(): string
    {
        return $this->first_name;
    }


    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }


    public function getLastName(): string
    {
        return $this->last_name;
    }


    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getProfilePictureLink(): string
    {
        return $this->profile_picture_link;
    }


    public function setProfilePictureLink(string $profile_picture_link): void
    {
        $this->profile_picture_link = $profile_picture_link;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


    public function getCreatedAt(): string
    {
        return $this->created_at;
    }


    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }


    public function getLastActive(): string
    {
        return $this->last_active;
    }


    public function setLastActive(string $last_active): void
    {
        $this->last_active = $last_active;
    }

    private function usernameExists($username)
    {
        global $pdo;

        // Prepare the SQL statement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");

        // Bind the parameter
        $stmt->bindParam(':username', $username);

        // Execute the statement
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return true if the username exists, false otherwise
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        global $pdo;

        if ($this->usernameExists($this->username)) {
            $_SESSION['error_message'] = 'Username already exists. Please try again with a different username.';
            header('Location: /');
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, username, password, profile_picture) VALUES (:first_name, :last_name, :email, :username, :password, :profile_picture)");

        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':profile_picture', $this->profile_picture_link);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['success_message'] = 'Registration successful!';
        } else {
            $_SESSION['error_message'] = 'Registration failed. Please try again.';
        }
        header('Location: /');
        exit();
    }

    private function setSessionVariables($user_array) {
        $_SESSION['user_id'] = $user_array['user_id'];
        $_SESSION['username'] = $user_array['username'];
        $_SESSION['email'] = $user_array['email'];
        $_SESSION['first_name'] = $user_array['first_name'];
        $_SESSION['last_name'] = $user_array['last_name'];
        $_SESSION['profile_picture'] = $user_array['profile_picture'];
        $_SESSION['status'] = $user_array['status'];
        $_SESSION['is_admin'] = $user_array['is_admin'];
    }

    public function login()
    {
        global $pdo;

        // Prepare the SQL statement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");

        // Bind the parameter
        $stmt->bindParam(':username', $this->username);

        // Execute the statement
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If the username exists
        if ($user) {
            // Verify the password
            if (password_verify($this->password, $user['password'])) {
                // Set the session variables
                $this->setSessionVariables($user);

                // Set the class variables
                $this->id = $user['user_id'];
                $this->first_name = $user['first_name'];
                $this->last_name = $user['last_name'];
                $this->email = $user['email'];
                $this->username = $user['username'];
                $this->password = $user['password'];
                $this->profile_picture_link = $user['profile_picture'];
                $this->status = $user['status'];
                $this->is_admin = $user['is_admin'];
                $this->created_at = $user['created_at'];
                $this->last_active = $user['last_active'];

                // Update the last active column
                $stmt = $pdo->prepare("UPDATE users SET last_active = :last_active WHERE user_id = :user_id");
                $this->last_active = date('Y-m-d H:i:s');
                $stmt->bindParam(':last_active', $this->last_active);
                $stmt->bindParam(':user_id', $this->id);
                $stmt->execute();

                // Update the status column to online
                $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE user_id = :user_id");
                $this->status = 'online';
                $stmt->bindParam(':status', $this->status);
                $stmt->bindParam(':user_id', $this->id);
                $stmt->execute();

                //$_SESSION['success_message'] = 'Login successful!';
                header('Location: /home');
                exit();
            } else {
                $_SESSION['error_message'] = 'Incorrect password. Please try again.';
                header('Location: /');
                exit();
            }
        } else {
            $_SESSION['error_message'] = 'Username does not exist. Please try again.';
            header('Location: /');
            exit();
        }
    }

}