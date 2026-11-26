<?php
$page_title = 'Add Gallery Images';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$error = '';
$successCount = 0;
$failCount = 0;
$segmentNames = [1 => 'Sparkling Water', 2 => 'Premium Juices', 3 => 'Premium Soda'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireCsrfToken();
    $segment = (int)($_POST['segment'] ?? 1);
    if ($segment < 1 || $segment > 3) { $segment = 1; }
    $title = $segmentNames[$segment];
    $sort_order = (int)($_POST['sort_order'] ?? 0);

    if (empty($_FILES['images']['name'][0])) {
        $error = 'Please select at least one image.';
    } else {
        $dest_dir = dirname(__DIR__, 2) . '/uploads/gallery/';
        $totalFiles = count($_FILES['images']['name']);

        for ($i = 0; $i < $totalFiles; $i++) {
            $file = [
                'name'     => $_FILES['images']['name'][$i],
                'type'     => $_FILES['images']['type'][$i],
                'tmp_name' => $_FILES['images']['tmp_name'][$i],
                'error'    => $_FILES['images']['error'][$i],
                'size'     => $_FILES['images']['size'][$i],
            ];

            if ($file['error'] !== UPLOAD_ERR_OK) {
                $failCount++;
                continue;
            }

            $filename = uploadImage($file, $dest_dir);
            if ($filename === false) {
                $failCount++;
                continue;
            }

            $stmt = $conn->prepare("INSERT INTO gallery_images (title, image_path, segment, sort_order) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $title, $filename, $segment, $sort_order);
            if ($stmt->execute()) {
                $successCount++;
            } else {
                $failCount++;
            }
        }

        if ($successCount > 0 && $failCount === 0) {
            flashMessage('success', $successCount . ' image(s) added successfully.');
            redirect('index.php');
        } elseif ($successCount > 0 && $failCount > 0) {
            flashMessage('success', $successCount . ' image(s) added. ' . $failCount . ' failed.');
            redirect('index.php');
        } else {
            $error = 'All uploads failed. Allowed formats: JPG, PNG, WEBP, GIF (Max 5MB each).';
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:700px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Add Gallery Images</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Upload one or multiple images for the public gallery.</p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to Gallery</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <?= csrfField() ?>
        <div class="form-group">
            <label>Gallery Images <span style="color:#dc2626;">*</span></label>
            <input type="file" name="images[]" accept="image/jpeg,image/png,image/webp,image/gif" multiple required>
            <div class="form-hint">Select multiple images at once. Accepted formats: JPG, PNG, WEBP, GIF (Max 5MB each).</div>
        </div>
        <div class="form-group">
            <label>Segment <span style="color:#dc2626;">*</span></label>
            <select name="segment" required>
                <option value="1"<?= (($_POST['segment'] ?? '1') == '1') ? ' selected' : '' ?>>Sparkling Water (PET)</option>
                <option value="2"<?= (($_POST['segment'] ?? '') == '2') ? ' selected' : '' ?>>Premium Juices (Glass)</option>
                <option value="3"<?= (($_POST['segment'] ?? '') == '3') ? ' selected' : '' ?>>Premium Soda (Can)</option>
            </select>
            <div class="form-hint">All selected images will be assigned to this segment.</div>
        </div>
        <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="<?= htmlspecialchars($_POST['sort_order'] ?? '0') ?>" min="0" step="1">
            <div class="form-hint">Lower numbers appear first. All images in this batch get the same sort order.</div>
        </div>
        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary">Upload Images →</button>
            <a href="index.php" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>

<?php include '../includes/admin_footer.php'; ?>
