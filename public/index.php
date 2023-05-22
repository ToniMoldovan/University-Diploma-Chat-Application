<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$GLOBALS['assets'] = '/../';

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/routes.php';
