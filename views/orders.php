<?php include 'layout/header.php'; ?>
<h1>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 10px;">
        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <path d="M16 10a4 4 0 0 1-8 0"></path>
    </svg>
    Pasūtījumi
</h1>

<a href='/' class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
        <path d="M19 12H5M12 19l-7-7 7-7"></path>
    </svg>
    Atpakaļ
</a>

<form method="GET" action="/orders">
    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Meklēt pēc statusa vai komentāra...">
    <button type="submit">Meklēt</button>
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

<?php if (isset($totalPages)): ?>
<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>" 
           class="<?= $i == $page ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<?php endif; ?>
<?php include 'layout/footer.php'; ?>
