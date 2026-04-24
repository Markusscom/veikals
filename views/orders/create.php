<?php include __DIR__ . '/../layout/header.php'; ?>
<h1>Pievienot pasūtījumu</h1>

<form method="POST" action="/orders/store">
    <label>Klienta ID:</label>
    <input type="number" name="customer_id" required>
    
    <label>Statuss:</label>
    <select name="status">
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
    </select>
    
    <label>Komentārs:</label>
    <textarea name="comment"></textarea>
    
    <label>Piegādes datums:</label>
    <input type="date" name="delivery_date">
    
    <button type="submit">Saglabāt</button>
</form>

<a href="/orders" class="back-link">Atpakaļ</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
