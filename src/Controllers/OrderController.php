<?php

namespace Veikals\App\Controllers;

use Veikals\App\Models\Order;

class OrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $search = $_GET['search'] ?? null;

        $orders = $this->orderModel->getPaginated($limit, $offset, $search);
        $totalOrders = $this->orderModel->count($search);
        $totalPages = ceil($totalOrders / $limit);

        require __DIR__ . '/../../views/orders.php';
    }
}
