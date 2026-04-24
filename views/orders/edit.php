<?php include __DIR__ . '/../layout/header.php'; ?>
<h1>Rediģēt pasūtījumu</h1>

<form method="POST" action="/orders/update?id=<?= htmlspecialchars($order['id']) ?>">
    <label>Klienta ID:</label>
    <input type="number" name="customer_id" value="<?= htmlspecialchars($order['customer_id']) ?>" required>
    
    <label>Statuss:</label>
    <select name="status">
        <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
        <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
    </select>
    
    <label>Komentārs:</label>
    <textarea name="comment"><?= htmlspecialchars($order['comment']) ?></textarea>
    
    <label>Piegādes datums:</label>
    <input type="date" name="delivery_date" value="<?= htmlspecialchars($order['delivery_date']) ?>">
    
    <button type="submit">Saglabāt</button>
</form>

<a href="/orders" class="back-link">Atpakaļ</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
