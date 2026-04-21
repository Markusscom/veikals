<?php

namespace Veikals\Controllers;

use Veikals\Models\Customer;

class CustomerController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new Customer();
    }

    public function index()
    {
        $customers = $this->customerModel->getAll();
        require __DIR__ . '/../../views/customers.php';
    }
}
