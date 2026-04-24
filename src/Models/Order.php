<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Order extends Model
{
    public function getDb()
    {
        return $this->db;
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

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
