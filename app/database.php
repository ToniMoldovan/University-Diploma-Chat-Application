<?php

// Database configuration
$dbConfig = [
    'host' => 'mysql',
    'dbname' => 'chatapp',
    'username' => 'admin',
    'password' => 'admin',
];

// PDO database connection
try {
    $pdo = new PDO(
        'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'],
        $dbConfig['username'],
        $dbConfig['password']
    );

    // Enable error reporting and exception throwing for PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection error
    die('Database connection failed: ' . $e->getMessage());
}
