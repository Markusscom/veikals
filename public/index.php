<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use Veikals\App\Controllers\CustomerController;
use Veikals\App\Controllers\OrderController;

$customerController = new CustomerController();
$orderController = new OrderController();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/customers' || $requestUri === '/orders') {
    // Ļaujam kontrolieriem ielādēt skatus, kuros jau ir pievienoti header/footer
    if ($requestUri === '/customers') {
        $customerController->index();
    } else {
        $orderController->index();
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Sākums - Veikals</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        .hero { text-align: center; padding: 50px 0; animation: fadeIn 1s ease-in; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .dashboard-icons { display: flex; justify-content: center; gap: 40px; margin-top: 30px; }
        .icon-box { transition: transform 0.3s ease; cursor: pointer; display: block; color: inherit; }
        .icon-box:hover { transform: scale(1.1); }
    </style>
</head>
<body>
<div class="container">
    <div class="hero">
        <h1>Veikala Vadības Sistēma</h1>
        <div class="dashboard-icons">
            <a href="/customers" class="icon-box">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <p>Klienti</p>
            </a>
            <a href="/orders" class="icon-box">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <p>Pasūtījumi</p>
            </a>
        </div>
    </div>
</div>
</body>
</html>
