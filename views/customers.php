<?php include 'layout/header.php'; ?>
<h1>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 10px;">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
        <circle cx="9" cy="7" r="4"></circle>
        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
    </svg>
    Klienti
</h1>

<a href='/' class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
        <path d="M19 12H5M12 19l-7-7 7-7"></path>
    </svg>
    Atpakaļ
</a>

<form method="GET" action="/customers">
    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Meklēt pēc vārda vai e-pasta...">
    <button type="submit">Meklēt</button>
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

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>" 
           class="<?= $i == $page ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<?php include 'layout/footer.php'; ?>
