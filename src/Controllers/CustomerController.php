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
}
