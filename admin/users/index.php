<?php
$page_title = 'Admin Users';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

// Handle Toggle Active
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_id'])) {
    $toggle_id = (int)$_POST['toggle_id'];
    if ($toggle_id === (int)($_SESSION['admin_id'] ?? 0)) {
        flashMessage('error', 'You cannot deactivate your own logged-in account.');
    } else {
        $stmt = $conn->prepare("UPDATE admin_users SET is_active = NOT is_active WHERE id = ?");
        $stmt->bind_param("i", $toggle_id);
        if ($stmt->execute()) {
            flashMessage('success', 'User account status toggled.');
        } else {
            flashMessage('error', 'Failed to update user status.');
        }
    }
    redirect('index.php');
}

include '../includes/admin_header.php';

$users = $conn->query("SELECT id, username, full_name, role, is_active, created_at FROM admin_users ORDER BY id ASC");
?>

<div class="card">
    <div class="card-header">
        <div>
            <div class="card-title">Admin Users Management</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Manage access privileges and team administrator accounts.</p>
        </div>
        <div>
            <a href="add.php" class="btn btn-primary">+ Add New User</a>
        </div>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="width:200px; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users && $users->num_rows > 0): ?>
                    <?php while ($u = $users->fetch_assoc()): ?>
                        <?php
                        $is_self = ($u['id'] == ($_SESSION['admin_id'] ?? 0));
                        ?>
                        <tr>
                            <td>#<?= $u['id'] ?></td>
                            <td>
                                <strong><?= htmlspecialchars($u['username']) ?></strong>
                                <?php if ($is_self): ?>
                                    <span style="font-size:11px; color:#F4C542; font-weight:700;">(You)</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($u['full_name']) ?></td>
                            <td>
                                <span class="badge <?= $u['role'] === 'super_admin' ? 'badge-gold' : 'badge-blue' ?>">
                                    <?= htmlspecialchars($u['role']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($u['is_active']): ?>
                                    <span class="badge badge-green">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-red">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d M Y', strtotime($u['created_at'])) ?></td>
                            <td style="text-align:center;">
                                <div style="display:inline-flex; gap:6px;">
                                    <a href="edit.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    
                                    <?php if (!$is_self): ?>
                                        <form method="POST" action="index.php" style="display:inline;">
                                            <input type="hidden" name="toggle_id" value="<?= $u['id'] ?>">
                                            <button type="submit" class="btn btn-sm <?= $u['is_active'] ? 'btn-danger' : 'btn-outline' ?>">
                                                <?= $u['is_active'] ? 'Deactivate' : 'Activate' ?>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-outline" disabled style="opacity:0.5; cursor:not-allowed;">Current</button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center; padding:35px; color:#888;">
                            No admin users found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/admin_footer.php'; ?>
