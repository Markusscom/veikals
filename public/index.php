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
    <title>Komandcentrs - Veikals</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        :root { --anim-duration: 1.5s; }
        .grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
        .card { background: #fff; padding: 25px; border-radius: 16px; box-shadow: 0 10px 20px rgba(0,0,0,0.08); transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .chart-svg { width: 100%; height: 200px; }
        .line-path { fill: none; stroke: var(--primary-color); stroke-width: 3; stroke-dasharray: 500; stroke-dashoffset: 500; animation: draw var(--anim-duration) forwards; }
        @keyframes draw { to { stroke-dashoffset: 0; } }
        .top-client { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        .badge { background: var(--secondary-color); padding: 4px 8px; border-radius: 6px; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>Komandcentrs</h1>
    
    <div class="grid">
        <div class="card">
            <h3>Pasūtījumu aktivitāte (pēdējās 7 dienas)</h3>
            <svg class="chart-svg" viewBox="0 0 400 200">
                <path class="line-path" d="M0 150 L100 100 L200 120 L300 50 L400 80" />
            </svg>
        </div>
        <div class="card">
            <h3>Top klienti</h3>
            <?php foreach ($stats['top_customers'] as $c): ?>
                <div class="top-client">
                    <span><?= $c['first_name'] ?> <?= $c['last_name'] ?></span>
                    <span class="badge"><?= $c['points'] ?> p.</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h3>Pasūtījumu statusi</h3>
        <div style="display:flex; gap: 20px;">
            <?php foreach ($stats['status_dist'] as $status => $count): ?>
                <div><strong><?= ucfirst($status) ?></strong>: <?= $count ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
