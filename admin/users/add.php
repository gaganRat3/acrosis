<?php
$page_title = 'Add Admin User';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(sanitize($_POST['username'] ?? ''));
    $full_name = trim(sanitize($_POST['full_name'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = sanitize($_POST['role'] ?? 'admin');

    if (empty($username) || empty($full_name)) {
        $error = 'Username and Full Name are required.';
    } elseif (strlen($username) < 3) {
        $error = 'Username must be at least 3 characters long.';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Check unique username
        $check = $conn->prepare("SELECT id FROM admin_users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check_res = $check->get_result();
        if ($check_res->num_rows > 0) {
            $error = 'Username is already taken. Please choose another.';
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO admin_users (username, password_hash, full_name, role, is_active, created_at) VALUES (?, ?, ?, ?, 1, NOW())");
            $stmt->bind_param("ssss", $username, $hash, $full_name, $role);
            if ($stmt->execute()) {
                flashMessage('success', 'User account "' . $username . '" created successfully.');
                redirect('index.php');
            } else {
                $error = 'Failed to create user. Error: ' . $conn->error;
            }
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:650px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Add New Admin User</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Create credentials for back-office access.</p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to Users</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Username <span style="color:#dc2626;">*</span></label>
            <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" placeholder="e.g. jhajohn" required autocomplete="off">
            <div class="form-hint">Unique identifier used for signing in</div>
        </div>

        <div class="form-group">
            <label>Full Name <span style="color:#dc2626;">*</span></label>
            <input type="text" name="full_name" value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>" placeholder="e.g. John Jha" required>
        </div>

        <div class="form-group">
            <label>Role <span style="color:#dc2626;">*</span></label>
            <select name="role" required>
                <option value="admin" <?= (($_POST['role'] ?? '') === 'admin') ? 'selected' : '' ?>>Admin</option>
                <option value="super_admin" <?= (($_POST['role'] ?? '') === 'super_admin') ? 'selected' : '' ?>>Super Admin</option>
            </select>
            <div class="form-hint">Super Admin has complete system administration access</div>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label>Password <span style="color:#dc2626;">*</span></label>
                <input type="password" name="password" placeholder="Minimum 8 characters" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label>Confirm Password <span style="color:#dc2626;">*</span></label>
                <input type="password" name="confirm_password" placeholder="Repeat password" required autocomplete="new-password">
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary" style="padding:11px 26px;">Create User →</button>
            <a href="index.php" class="btn btn-outline" style="padding:11px 20px;">Cancel</a>
        </div>
    </form>
</div>

<?php include '../includes/admin_footer.php'; ?>
