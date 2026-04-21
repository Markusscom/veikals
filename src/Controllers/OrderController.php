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
        $orders = $this->orderModel->getAll();
        require __DIR__ . '/../../views/orders.php';
    }
}
