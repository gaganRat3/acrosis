<?php
$page_title = 'Add New Product';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $segment = (int)($_POST['segment'] ?? 1);
    $description = sanitize($_POST['description'] ?? '');
    $sizes = sanitize($_POST['sizes'] ?? '');
    $flavors = sanitize($_POST['flavors'] ?? '');
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $sort_order = (int)($_POST['sort_order'] ?? 0);

    if (empty($name)) {
        $error = 'Product name is required.';
    } elseif (!in_array($segment, [1, 2, 3])) {
        $error = 'Please select a valid segment.';
    } else {
        $image_filename = null;
        if (!empty($_FILES['image']['name'])) {
            $dest_dir = dirname(__DIR__, 2) . '/uploads/products/';
            if (!is_dir($dest_dir)) {
                mkdir($dest_dir, 0755, true);
            }
            $uploaded = uploadImage($_FILES['image'], $dest_dir);
            if ($uploaded) {
                $image_filename = $uploaded;
            } else {
                $error = 'Image upload failed. Allowed formats: JPG, PNG, WEBP, GIF (Max 5MB).';
            }
        }

        if (empty($error)) {
            $stmt = $conn->prepare("INSERT INTO products (segment, name, description, image_path, sizes, flavors, is_featured, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
            $stmt->bind_param("isssssii", $segment, $name, $description, $image_filename, $sizes, $flavors, $is_featured, $sort_order);
            if ($stmt->execute()) {
                flashMessage('success', 'Product "' . $name . '" created successfully.');
                redirect('index.php');
            } else {
                $error = 'Failed to create product. Error: ' . $conn->error;
            }
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:850px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Add New Product</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Add a new beverage to the public catalogue.</p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to List</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-grid-2">
            <div class="form-group">
                <label>Product Name <span style="color:#dc2626;">*</span></label>
                <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="e.g. Acrosis Sparkling Mint Water" required>
            </div>
            <div class="form-group">
                <label>Segment <span style="color:#dc2626;">*</span></label>
                <select name="segment" required>
                    <option value="1" <?= (($_POST['segment'] ?? 1) == 1) ? 'selected' : '' ?>>1 — Sparkling Water (PET)</option>
                    <option value="2" <?= (($_POST['segment'] ?? 1) == 2) ? 'selected' : '' ?>>2 — Premium Juices (Glass Bottle)</option>
                    <option value="3" <?= (($_POST['segment'] ?? 1) == 3) ? 'selected' : '' ?>>3 — Premium Soda (Aluminum Can)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Crisp carbonated natural water infused with fresh mountain mint and balanced minerals..."><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label>Available Sizes</label>
                <input type="text" name="sizes" value="<?= htmlspecialchars($_POST['sizes'] ?? '') ?>" placeholder="e.g. 250ml, 500ml, 750ml">
                <div class="form-hint">Comma separated volume options</div>
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="<?= htmlspecialchars($_POST['sort_order'] ?? '0') ?>" min="0" step="1">
                <div class="form-hint">Lower numbers display first (e.g. 1, 2, 3)</div>
            </div>
        </div>

        <div class="form-group">
            <label>Flavors / Notes</label>
            <textarea name="flavors" rows="2" placeholder="e.g. Lemon Lime, Wild Berries, Classic Club"><?= htmlspecialchars($_POST['flavors'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="image" id="productImageInput" accept="image/jpeg,image/png,image/webp,image/gif">
            <div class="form-hint">Accepted formats: JPG, PNG, WEBP (Max 5MB)</div>
            <img id="imagePreview" class="img-preview-box" alt="Image preview">
        </div>

        <div class="form-group" style="display:flex; align-items:center; gap:10px;">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" <?= isset($_POST['is_featured']) ? 'checked' : '' ?> style="width:18px; height:18px; cursor:pointer;">
            <label for="is_featured" style="margin-bottom:0; cursor:pointer; font-size:14px;">Feature this product on Homepage carousel &amp; highlights</label>
        </div>

        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary" style="padding:11px 26px;">Save Product →</button>
            <a href="index.php" class="btn btn-outline" style="padding:11px 20px;">Cancel</a>
        </div>
    </form>
</div>

<script>
// Image Preview using FileReader API
document.getElementById('productImageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            preview.src = event.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>

<?php include '../includes/admin_footer.php'; ?>
