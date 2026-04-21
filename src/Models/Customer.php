<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Customer extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM customers")->fetchAll();
    }
}
