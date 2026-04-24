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

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $order = $this->orderModel->getById($id);
        if (!$order) {
            die("Pasūtījums nav atrasts.");
        }
        require __DIR__ . '/../../views/orders/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->orderModel->getDb()->prepare("UPDATE orders SET customer_id = ?, status = ?, comment = ?, delivery_date = ? WHERE id = ?");
            $stmt->execute([$_POST['customer_id'], $_POST['status'], $_POST['comment'], $_POST['delivery_date'], $id]);
            header('Location: /orders');
            exit;
        }
    }

    public function create()
    {
        require __DIR__ . '/../../views/orders/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->orderModel->getDb()->prepare("INSERT INTO orders (customer_id, order_date, status, comment, delivery_date) VALUES (?, NOW(), ?, ?, ?)");
            $stmt->execute([$_POST['customer_id'], $_POST['status'], $_POST['comment'], $_POST['delivery_date']]);
            header('Location: /orders');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $this->orderModel->getDb()->prepare("DELETE FROM orders WHERE id = ?");
            $stmt->execute([$id]);
        }
        header('Location: /orders');
        exit;
    }
}
