<?php

require_once __DIR__ . '/../../db/DB.php';

class CustomerController
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function index()
    {
        $customerStmt = $this->pdo->query("SELECT id, first_name, last_name, email, birth_date, points FROM customers ORDER BY id");
        $customers = $customerStmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Klienti</h1>";
        echo "<a href='/'>Atpakaļ</a><br>";

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>ID</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Email</th>
                <th>Dzimšanas datums</th>
                <th>Punkti</th>
              </tr>";

        foreach ($customers as $customer) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($customer['id']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['last_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['email']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['birth_date']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['points']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}