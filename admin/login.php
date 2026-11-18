<?php
session_start();
require_once '../config/db.php';
require_once '../includes/functions.php';

if (isLoggedIn()) redirect('dashboard.php');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        $stmt = $conn->prepare("SELECT id, username, password_hash, full_name, role, is_active FROM admin_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if ($row['is_active'] && password_verify($password, $row['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['admin_name'] = $row['full_name'];
                $_SESSION['admin_role'] = $row['role'];
                redirect('dashboard.php');
            } else {
                $error = 'Invalid credentials or account inactive.';
            }
        } else {
            $error = 'Invalid credentials.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Acrosis Beverages</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
    /* Full inline admin login CSS — dark navy bg, centered gold card */
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:#005B8F; display:flex; align-items:center; justify-content:center; min-height:100vh; font-family:'Inter',sans-serif; }
    .login-box { background:#fff; border-radius:12px; padding:40px; width:100%; max-width:400px; box-shadow:0 20px 60px rgba(0,0,0,0.4); }
    .login-logo { text-align:center; margin-bottom:30px; }
    .login-logo h1 { font-family:'Playfair Display',serif; color:#F4C542; font-size:28px; letter-spacing:3px; }
    .login-logo p { color:#666; font-size:12px; letter-spacing:2px; margin-top:4px; font-weight:600; }
    .form-group { margin-bottom:20px; }
    .form-group label { display:block; color:#333; font-size:14px; font-weight:600; margin-bottom:6px; }
    .form-group input { width:100%; padding:12px 16px; border:2px solid #e5e5e5; border-radius:8px; font-size:14px; transition:border-color .3s; }
    .form-group input:focus { outline:none; border-color:#F4C542; }
    .btn-login { width:100%; padding:14px; background:#F4C542; color:#005B8F; border:none; border-radius:8px; font-size:16px; font-weight:700; cursor:pointer; font-family:'Inter',sans-serif; letter-spacing:1px; transition:background .3s; }
    .btn-login:hover { background:#b8973d; }
    .error-msg { background:#fee; color:#c00; padding:10px 14px; border-radius:6px; margin-bottom:20px; font-size:14px; border-left:3px solid #c00; }
    .back-site { text-align:center; margin-top:20px; }
    .back-site a { color:#888; font-size:13px; text-decoration:none; transition:color .2s; }
    .back-site a:hover { color:#F4C542; }
    </style>
</head>
<body>
<div class="login-box">
    <div class="login-logo">
        <h1>ACROSIS</h1>
        <p>BEVERAGES — ADMIN PANEL</p>
    </div>
    <?php if ($error): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required autocomplete="username" autofocus>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required autocomplete="current-password">
        </div>
        <button type="submit" class="btn-login">LOGIN</button>
    </form>
    <div class="back-site">
        <a href="../index.php">← Back to Acrosis Beverages</a>
    </div>
</div>
</body>
</html>
