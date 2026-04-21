<?php
namespace Veikals\App\Models;

use Veikals\App\Core\Model;

class Stats extends Model {
    public function getDashboardStats() {
        return [
            'weekly_orders' => $this->db->query("SELECT DATE_FORMAT(order_date, '%d') as day, COUNT(*) as count FROM orders WHERE order_date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY day ORDER BY day ASC")->fetchAll(\PDO::FETCH_KEY_PAIR),
            'status_dist' => $this->db->query("SELECT status, COUNT(*) as count FROM orders GROUP BY status")->fetchAll(\PDO::FETCH_KEY_PAIR),
            'top_customers' => $this->db->query("SELECT first_name, last_name, points FROM customers ORDER BY points DESC LIMIT 3")->fetchAll()
        ];
    }
}
