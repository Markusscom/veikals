<?php include 'layout/header.php'; ?>
<h1>Klienti</h1>
<a href='/'>Atpakaļ</a>

<form method="GET" action="/customers" style="margin: 20px 0;">
    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Meklēt..." style="padding: 8px;">
    <button type="submit" style="padding: 8px;">Meklēt</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Vārds</th>
        <th>Uzvārds</th>
        <th>Email</th>
        <th>Dzimšanas datums</th>
        <th>Punkti</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= htmlspecialchars($customer['id']) ?></td>
            <td><?= htmlspecialchars($customer['first_name']) ?></td>
            <td><?= htmlspecialchars($customer['last_name']) ?></td>
            <td><?= htmlspecialchars($customer['email']) ?></td>
            <td><?= htmlspecialchars($customer['birth_date']) ?></td>
            <td><?= htmlspecialchars($customer['points']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include 'layout/footer.php'; ?>
