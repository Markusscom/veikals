<?php include 'layout/header.php'; ?>
<h1>Pasūtījumi</h1>
<a href='/'>Atpakaļ</a>

<form method="GET" action="/orders" style="margin: 20px 0;">
    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Meklēt (Statuss/Komentārs)..." style="padding: 8px; width: 250px;">
    <button type="submit" style="padding: 8px;">Meklēt</button>
</form>

<table>
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
<?php include 'layout/footer.php'; ?>
