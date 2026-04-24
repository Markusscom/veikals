<?php

namespace Veikals\App\Controllers;

use Veikals\App\Models\Customer;

class CustomerController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new Customer();
    }

    public function index()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $search = $_GET['search'] ?? null;

        $customers = $this->customerModel->getPaginated($limit, $offset, $search);
        $totalCustomers = $this->customerModel->count($search);
        $totalPages = ceil($totalCustomers / $limit);

        require __DIR__ . '/../../views/customers.php';
    }

    public function edit()
    {
        $uuid = $_GET['uuid'] ?? null;
        $customer = $this->customerModel->getByUuid($uuid);
        if (!$customer) {
            die("Klients nav atrasts.");
        }
        require __DIR__ . '/../../views/customers/edit.php';
    }

    public function update()
    {
        $uuid = $_GET['uuid'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->customerModel->getDb()->prepare("UPDATE customers SET first_name = ?, last_name = ?, email = ? WHERE uuid = ?");
            $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['email'], $uuid]);
            header('Location: /customers');
            exit;
        }
    }

    public function create()
    {
        require __DIR__ . '/../../views/customers/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uuid = Customer::generateUuid();
            $stmt = $this->customerModel->getDb()->prepare("INSERT INTO customers (uuid, first_name, last_name, email) VALUES (?, ?, ?, ?)");
            $stmt->execute([$uuid, $_POST['first_name'], $_POST['last_name'], $_POST['email']]);
            header('Location: /customers');
            exit;
        }
    }

    public function delete()
    {
        $uuid = $_GET['uuid'] ?? null;
        if ($uuid) {
            $stmt = $this->customerModel->getDb()->prepare("DELETE FROM customers WHERE uuid = ?");
            $stmt->execute([$uuid]);
        }
        header('Location: /customers');
        exit;
    }
}
