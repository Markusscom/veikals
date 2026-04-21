<?php
class OrderController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $ordersStmt = $this->pdo->query("SELECT id, customer_id, order_date, status, comment, delivery_date FROM orders ORDER BY id");
        $orders = $ordersStmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Pasūtījumi</h1>";
        echo "<a href='/'>Atpakaļ</a><br>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Klienta ID</th>";
        echo "<th>Pasūtījuma datums</th>";
        echo "<th>Statuss</th>";
        echo "<th>Komentārs</th>";
        echo "<th>Piegādes datums</th>";
        echo "</tr>";

        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($order['id']) . "</td>";
            echo "<td>" . htmlspecialchars($order['customer_id']) . "</td>";
            echo "<td>" . htmlspecialchars($order['order_date']) . "</td>";
            echo "<td>" . htmlspecialchars($order['status']) . "</td>";
            echo "<td>" . htmlspecialchars($order['comment']) . "</td>";
            echo "<td>" . htmlspecialchars($order['delivery_date']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}

?>