<?php include __DIR__ . '/../layout/header.php'; ?>
<h1>Pievienot klientu</h1>

<form method="POST" action="/customers/store">
    <label>Vārds:</label>
    <input type="text" name="first_name" required>
    
    <label>Uzvārds:</label>
    <input type="text" name="last_name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <button type="submit">Saglabāt</button>
</form>

<a href="/customers" class="back-link">Atpakaļ</a>
<?php include __DIR__ . '/../layout/footer.php'; ?>
