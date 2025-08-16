<?php
// Load config once
require __DIR__ . "/config/config.php";
require __DIR__ . "/config/connection.php";
session_start();
error_reporting(E_ALL); // better than (1), set to 0 in production

// Simple router based on ?page=...
$page = $_GET['page'] ?? 'login';
var_dump($page);die;
switch ($page) {
    case 'auth':
        require __DIR__ . "/controllers/auth.php";
        break;
    case 'dashboard':
        require __DIR__ . "/views/dashboard.php";
        break;
    case 'signup':
        require __DIR__ . "/views/signup.php";
        break;
    case 'login':
        require __DIR__ . "/views/login.php";
        break;
    default:
        http_response_code(404);
        require __DIR__ . "/views/404.php";
        break;
}



// $_GET['page'] is being handled using .htaccess
