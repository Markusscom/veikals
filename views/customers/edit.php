<?php include __DIR__ . '/../layout/header.php'; ?>
<h1>Rediģēt klientu</h1>

<form method="POST" action="/customers/update?uuid=<?= htmlspecialchars($customer['uuid']) ?>">
    <label>Vārds:</label>
    <input type="text" name="first_name" value="<?= htmlspecialchars($customer['first_name']) ?>" required>
    
    <label>Uzvārds:</label>
    <input type="text" name="last_name" value="<?= htmlspecialchars($customer['last_name']) ?>" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" required>
    
    <button type="submit">Saglabāt izmaiņas</button>
</form>

<a href="/customers" class="back-link">Atpakaļ</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
