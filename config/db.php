<?php
// ── Auto-detect environment ───────────────────────────────────────────────────
// XAMPP local: uses root / no password / local DB name
// Hostinger live: uses production credentials
// To force an env, set ACROSIS_ENV=local or ACROSIS_ENV=production in your server config
// ─────────────────────────────────────────────────────────────────────────────

$_env = getenv('ACROSIS_ENV') ?: (in_array($_SERVER['SERVER_NAME'] ?? '', ['localhost', '127.0.0.1', '']) ? 'local' : 'production');

if ($_env === 'local') {
    // ── XAMPP / Local development ─────────────────────────────────────────────
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'acrosis_db');
} else {
    // ── Hostinger / Live server ───────────────────────────────────────────────
    define('DB_HOST', 'localhost');
    define('DB_USER', 'u321878734_acrosis');
    define('DB_PASS', 'Acrosis@1234');
    define('DB_NAME', 'u321878734_acrosis_db');
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
