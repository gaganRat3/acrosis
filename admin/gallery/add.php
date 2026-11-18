<?php
$page_title = 'Add Gallery Image';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title'] ?? '');
    $sort_order = (int)($_POST['sort_order'] ?? 0);

    if ($title === '') {
        $error = 'Image title is required.';
    } elseif (empty($_FILES['image']['name'])) {
        $error = 'Please select an image.';
    } else {
        $dest_dir = dirname(__DIR__, 2) . '/uploads/gallery/';
        $filename = uploadImage($_FILES['image'], $dest_dir);
        if ($filename === false) {
            $error = 'Image upload failed. Allowed formats: JPG, PNG, WEBP, GIF (Max 5MB).';
        } else {
            $stmt = $conn->prepare("INSERT INTO gallery_images (title, image_path, sort_order) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $title, $filename, $sort_order);
            if ($stmt->execute()) {
                flashMessage('success', 'Gallery image added successfully.');
                redirect('index.php');
            }
            $error = 'Failed to save gallery image.';
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:700px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Add Gallery Image</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Upload an image for the public gallery.</p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to Gallery</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Image Title <span style="color:#dc2626;">*</span></label>
            <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" required placeholder="e.g. Acrosis Production Facility">
        </div>
        <div class="form-group">
            <label>Gallery Image <span style="color:#dc2626;">*</span></label>
            <input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif" required>
            <div class="form-hint">Accepted formats: JPG, PNG, WEBP, GIF (Max 5MB).</div>
        </div>
        <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="<?= htmlspecialchars($_POST['sort_order'] ?? '0') ?>" min="0" step="1">
            <div class="form-hint">Lower numbers appear first.</div>
        </div>
        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary">Save Image →</button>
            <a href="index.php" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>

<?php include '../includes/admin_footer.php'; ?>
