<?php

// Database configuration
$dbConfig = [
    'host' => 'mysql', // Replace with your database host
    'dbname' => 'chatapp', // Replace with your database name
    'username' => 'admin', // Replace with your database username
    'password' => 'admin', // Replace with your database password
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
