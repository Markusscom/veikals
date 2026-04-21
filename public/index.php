<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use Veikals\App\Controllers\CustomerController;
use Veikals\App\Controllers\OrderController;
use Veikals\App\Models\Stats;

$customerController = new CustomerController();
$orderController = new OrderController();
$statsModel = new Stats();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/customers' || $requestUri === '/orders') {
    if ($requestUri === '/customers') {
        $customerController->index();
    } else {
        $orderController->index();
    }
    exit;
}

$stats = $statsModel->getDashboardStats();
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Informācijas panelis - Veikals</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        .dashboard { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .card h3 { margin-top: 0; font-size: 14px; color: #666; }
        .card .value { font-size: 28px; font-weight: bold; color: var(--primary-color); }
        .quick-actions { display: flex; gap: 15px; margin-bottom: 30px; }
        .btn-action { padding: 12px 20px; background: #2d3436; color: white; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .recent-orders { background: white; padding: 20px; border-radius: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Informācijas panelis</h1>
    
    <div class="quick-actions">
        <a href="/customers" class="btn-action">👥 Klientu saraksts</a>
        <a href="/orders" class="btn-action">📦 Pasūtījumu saraksts</a>
    </div>

    <div class="dashboard">
        <div class="card">
            <h3>Klienti kopā</h3>
            <div class="value"><?= $stats['total_customers'] ?></div>
        </div>
        <div class="card">
            <h3>Visi pasūtījumi</h3>
            <div class="value"><?= $stats['total_orders'] ?></div>
        </div>
        <div class="card" style="border-left: 4px solid var(--accent-color);">
            <h3>Gaida izpildi (pending)</h3>
            <div class="value" style="color: var(--accent-color);"><?= $stats['pending_orders'] ?></div>
        </div>
    </div>

    <div class="recent-orders">
        <h3>Jaunākie pasūtījumi</h3>
        <table>
            <tr><th>Klients</th><th>Datums</th><th>Statuss</th></tr>
            <?php foreach ($stats['recent_orders'] as $order): ?>
            <tr>
                <td><?= $order['first_name'] . ' ' . $order['last_name'] ?></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
