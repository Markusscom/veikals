<?php

namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Customer extends Model
{
    public function getDb()
    {
        return $this->db;
    }

    public static function generateUuid()
    {
        return bin2hex(random_bytes(16));
    }

    public function getByUuid($uuid)
    {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE uuid = ?");
        $stmt->execute([$uuid]);
        return $stmt->fetch();
    }

    public function getPaginated($limit, $offset, $search = null)
    {
        $sql = "SELECT * FROM customers";
        $params = [];
        if ($search) {
            $sql .= " WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%"];
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
        $sql = "SELECT COUNT(*) FROM customers";
        $params = [];
        if ($search) {
            $sql .= " WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%"];
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn();
    }
}
