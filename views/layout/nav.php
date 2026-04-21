<?php
$current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
function isActive($path, $current) {
    return $current === $path ? 'active' : '';
}
?>
<style>
    .nav-main { display: flex; gap: 20px; align-items: center; padding: 15px; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; }
    .nav-main a { text-decoration: none; color: #666; padding: 8px 16px; border-radius: 8px; transition: all 0.3s ease; font-weight: 500; }
    .nav-main a:hover { background: #f0f0f0; color: #333; transform: translateY(-2px); }
    .nav-main a.active { background: var(--primary-color); color: white; box-shadow: 0 4px 6px rgba(74, 144, 226, 0.3); }
</style>

<nav class="nav-main">
    <a href="/" class="<?= isActive('/', $current) ?>">🏠 Komandcentrs</a>
    <a href="/customers" class="<?= isActive('/customers', $current) ?>">👥 Klienti</a>
    <a href="/orders" class="<?= isActive('/orders', $current) ?>">📦 Pasūtījumi</a>
</nav>
