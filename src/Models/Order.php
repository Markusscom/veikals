<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Order extends Model
{
    public function getPaginated($limit, $offset, $search = null)
    {
        $sql = "SELECT * FROM orders";
        $params = [];
        if ($search) {
            $sql .= " WHERE status LIKE ? OR comment LIKE ?";
            $params = ["%$search%", "%$search%"];
        }
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = (int)$limit;
        $params[] = (int)$offset;

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function count($search = null)
    {
        $sql = "SELECT COUNT(*) FROM orders";
        $params = [];
        if ($search) {
            $sql .= " WHERE status LIKE ? OR comment LIKE ?";
            $params = ["%$search%", "%$search%"];
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn();
    }
}
