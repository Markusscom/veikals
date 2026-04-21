<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Order extends Model
{
    public function getAll($search = null)
    {
        if ($search) {
            $stmt = $this->db->prepare("SELECT * FROM orders WHERE status LIKE ? OR comment LIKE ?");
            $stmt->execute(["%$search%", "%$search%"]);
            return $stmt->fetchAll();
        }
        return $this->db->query("SELECT * FROM orders")->fetchAll();
    }
}
