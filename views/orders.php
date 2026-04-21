<h1>Pasūtījumi</h1>
<a href='/'>Atpakaļ</a><br>

<table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>ID</th>
        <th>Klienta ID</th>
        <th>Pasūtījuma datums</th>
        <th>Statuss</th>
        <th>Komentārs</th>
        <th>Piegādes datums</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['id']) ?></td>
            <td><?= htmlspecialchars($order['customer_id']) ?></td>
            <td><?= htmlspecialchars($order['order_date']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td><?= htmlspecialchars($order['comment']) ?></td>
            <td><?= htmlspecialchars($order['delivery_date']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
