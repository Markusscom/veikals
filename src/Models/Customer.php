<?php

namespace Veikals\Models;

use Veikals\Core\Model;

class Customer extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM customers")->fetchAll();
    }
}
