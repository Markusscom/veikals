<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Customer extends Model
{
    public function getAll($search = null)
    {
        if ($search) {
            $stmt = $this->db->prepare("SELECT * FROM customers WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?");
            $stmt->execute(["%$search%", "%$search%", "%$search%"]);
            return $stmt->fetchAll();
        }
        return $this->db->query("SELECT * FROM customers")->fetchAll();
    }
}
