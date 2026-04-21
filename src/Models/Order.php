<?php

namespace Veikals\Models;

use Veikals\Core\Model;

class Order extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM orders")->fetchAll();
    }
}
