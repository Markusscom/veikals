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
        $search = $_GET['search'] ?? null;
        $orders = $this->orderModel->getAll($search);
        require __DIR__ . '/../../views/orders.php';
    }
}
