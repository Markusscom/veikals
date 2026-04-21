<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use Veikals\App\Controllers\CustomerController;
use Veikals\App\Controllers\OrderController;

$customerController = new CustomerController();
$orderController = new OrderController();

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
