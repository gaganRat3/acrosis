<?php
$page_title = 'Gallery Management';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = (int)$_POST['delete_id'];
    $stmt = $conn->prepare("SELECT image_path FROM gallery_images WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $image = $stmt->get_result()->fetch_assoc();

    if ($image) {
        $file = dirname(__DIR__, 2) . '/uploads/gallery/' . $image['image_path'];
        $delete = $conn->prepare("DELETE FROM gallery_images WHERE id = ?");
        $delete->bind_param("i", $delete_id);
        if ($delete->execute()) {
            if (is_file($file)) {
                unlink($file);
            }
            flashMessage('success', 'Gallery image deleted successfully.');
        } else {
            flashMessage('error', 'Failed to delete gallery image.');
        }
    } else {
        flashMessage('error', 'Gallery image not found.');
    }
    redirect('index.php');
}

include '../includes/admin_header.php';
$images = $conn->query("SELECT id, title, image_path, sort_order, created_at FROM gallery_images ORDER BY sort_order ASC, id DESC");
?>

<div class="card">
    <div class="card-header">
        <div>
            <div class="card-title">Gallery Images</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Manage images displayed on the public Gallery page.</p>
        </div>
        <a href="add.php" class="btn btn-primary">+ Add Image</a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Sort Order</th>
                    <th>Added</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($images && $images->num_rows > 0): ?>
                    <?php while ($image = $images->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <img
                                    src="../../uploads/gallery/<?= htmlspecialchars($image['image_path'], ENT_QUOTES) ?>"
                                    alt="<?= htmlspecialchars($image['title'], ENT_QUOTES) ?>"
                                    class="thumb"
                                >
                            </td>
                            <td><strong><?= htmlspecialchars($image['title']) ?></strong></td>
                            <td><?= (int)$image['sort_order'] ?></td>
                            <td><?= date('d M Y', strtotime($image['created_at'])) ?></td>
                            <td style="text-align:center;">
                                <form method="POST" action="index.php" onsubmit="return confirm('Delete this gallery image permanently?');">
                                    <input type="hidden" name="delete_id" value="<?= (int)$image['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align:center; padding:35px; color:#888;">No gallery images yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/admin_footer.php'; ?>
