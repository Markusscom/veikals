<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

require_once __DIR__ . '/../db/DB.php';
// Controllers will be loaded via autoloader later

$pdo = DB::connect();

$customerController = new CustomerController($pdo);
$orderController = new OrderController($pdo);

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($requestUri) {
    case '/':
        echo "<h1>Veikals</h1>";
        echo "<a href='/customers'>Klienti</a><br>";
        echo "<a href='/orders'>Pasūtījumi</a><br>";
        break;

    case '/customers':
        $customerController->index();
        break;

    case '/orders':
        $orderController->index();
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Lapa nav atrasta</h1>";
        break;
}
