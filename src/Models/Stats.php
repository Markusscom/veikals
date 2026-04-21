<?php
namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Stats extends Model {
    public function getDashboardStats() {
        return [
            'total_customers' => $this->db->query("SELECT COUNT(*) FROM customers")->fetchColumn(),
            'total_orders' => $this->db->query("SELECT COUNT(*) FROM orders")->fetchColumn(),
            'pending_orders' => $this->db->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn(),
            'recent_orders' => $this->db->query("SELECT o.*, c.first_name, c.last_name FROM orders o JOIN customers c ON o.customer_id = c.id ORDER BY o.order_date DESC LIMIT 5")->fetchAll(),
            'status_distribution' => $this->db->query("SELECT status, COUNT(*) as count FROM orders GROUP BY status")->fetchAll(\PDO::FETCH_KEY_PAIR)
        ];
    }
}
