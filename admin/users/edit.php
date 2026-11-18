<?php
$page_title = 'Edit Admin User';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    flashMessage('error', 'Invalid user ID.');
    redirect('index.php');
}

$stmt = $conn->prepare("SELECT id, username, full_name, role, is_active FROM admin_users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();

if (!$user) {
    flashMessage('error', 'User not found.');
    redirect('index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(sanitize($_POST['username'] ?? ''));
    $full_name = trim(sanitize($_POST['full_name'] ?? ''));
    $role = sanitize($_POST['role'] ?? 'admin');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    // Disallow deactivating self
    if ($id === (int)($_SESSION['admin_id'] ?? 0) && $is_active === 0) {
        $error = 'You cannot set your own account to inactive.';
    } elseif (empty($username) || empty($full_name)) {
        $error = 'Username and Full Name are required.';
    } elseif (strlen($username) < 3) {
        $error = 'Username must be at least 3 characters long.';
    } else {
        // Check unique username for others
        $check = $conn->prepare("SELECT id FROM admin_users WHERE username = ? AND id != ?");
        $check->bind_param("si", $username, $id);
        $check->execute();
        if ($check->get_result()->num_rows > 0) {
            $error = 'Username is already taken by another account.';
        } else {
            // Check password change if entered
            if (!empty($password)) {
                if (strlen($password) < 8) {
                    $error = 'New password must be at least 8 characters long.';
                } elseif ($password !== $confirm_password) {
                    $error = 'New passwords do not match.';
                } else {
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    $upd = $conn->prepare("UPDATE admin_users SET username = ?, full_name = ?, role = ?, is_active = ?, password_hash = ? WHERE id = ?");
                    $upd->bind_param("sssisi", $username, $full_name, $role, $is_active, $hash, $id);
                }
            } else {
                $upd = $conn->prepare("UPDATE admin_users SET username = ?, full_name = ?, role = ?, is_active = ? WHERE id = ?");
                $upd->bind_param("sssii", $username, $full_name, $role, $is_active, $id);
            }

            if (empty($error)) {
                if ($upd->execute()) {
                    // Update session name if editing self
                    if ($id === (int)($_SESSION['admin_id'] ?? 0)) {
                        $_SESSION['admin_username'] = $username;
                        $_SESSION['admin_name'] = $full_name;
                        $_SESSION['admin_role'] = $role;
                    }
                    flashMessage('success', 'User account "' . $username . '" updated successfully.');
                    redirect('index.php');
                } else {
                    $error = 'Failed to update user. Error: ' . $conn->error;
                }
            }
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:650px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Edit User #<?= $user['id'] ?></div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Modify administrator profile and access level.</p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to Users</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Username <span style="color:#dc2626;">*</span></label>
            <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? $user['username']) ?>" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Full Name <span style="color:#dc2626;">*</span></label>
            <input type="text" name="full_name" value="<?= htmlspecialchars($_POST['full_name'] ?? $user['full_name']) ?>" required>
        </div>

        <div class="form-group">
            <label>Role <span style="color:#dc2626;">*</span></label>
            <?php $cur_role = $_POST['role'] ?? $user['role']; ?>
            <select name="role" required>
                <option value="admin" <?= $cur_role === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="super_admin" <?= $cur_role === 'super_admin' ? 'selected' : '' ?>>Super Admin</option>
            </select>
        </div>

        <div class="form-group" style="display:flex; align-items:center; gap:10px;">
            <?php $cur_active = isset($_POST['username']) ? isset($_POST['is_active']) : (bool)$user['is_active']; ?>
            <input type="checkbox" name="is_active" id="is_active" value="1" <?= $cur_active ? 'checked' : '' ?> style="width:18px; height:18px; cursor:pointer;">
            <label for="is_active" style="margin-bottom:0; cursor:pointer; font-size:14px;">Account is Active</label>
        </div>

        <div style="margin:24px 0 16px; padding-top:16px; border-top:1px dashed #CBD5E1;">
            <h4 style="font-size:14px; color:#005B8F; margin-bottom:4px;">Change Password (Optional)</h4>
            <p style="font-size:12px; color:#64748b;">Leave both fields below blank to retain the current password.</p>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" placeholder="Leave blank to keep current" autocomplete="new-password">
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" placeholder="Repeat new password" autocomplete="new-password">
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary" style="padding:11px 26px;">Save Changes →</button>
            <a href="index.php" class="btn btn-outline" style="padding:11px 20px;">Cancel</a>
        </div>
    </form>
</div>

<?php include '../includes/admin_footer.php'; ?>
