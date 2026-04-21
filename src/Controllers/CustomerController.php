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
        $search = $_GET['search'] ?? null;
        $customers = $this->customerModel->getAll($search);
        require __DIR__ . '/../../views/customers.php';
    }
}
