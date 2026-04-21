<h1>Klienti</h1>
<a href='/'>Atpakaļ</a><br>

<table border='1' cellpadding='5' cellspacing='0'>
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
