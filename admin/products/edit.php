<?php
$page_title = 'Edit Product';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    flashMessage('error', 'Invalid product ID.');
    redirect('index.php');
}

// Fetch existing product
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$product = $res->fetch_assoc();

if (!$product) {
    flashMessage('error', 'Product not found.');
    redirect('index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireCsrfToken();
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
        $image_filename = $product['image_path']; // keep existing by default
        
        // If a new file is uploaded
        if (!empty($_FILES['image']['name'])) {
            $dest_dir = dirname(__DIR__, 2) . '/uploads/products/';
            if (!is_dir($dest_dir)) {
                mkdir($dest_dir, 0755, true);
            }
            $uploaded = uploadImage($_FILES['image'], $dest_dir);
            if ($uploaded) {
                // Delete old image file if existed
                if (!empty($product['image_path'])) {
                    $old_file = $dest_dir . $product['image_path'];
                    if (file_exists($old_file)) {
                        @unlink($old_file);
                    }
                }
                $image_filename = $uploaded;
            } else {
                $error = 'Image upload failed. Allowed formats: JPG, PNG, WEBP, GIF (Max 5MB).';
            }
        }

        if (empty($error)) {
            $upd = $conn->prepare("UPDATE products SET segment = ?, name = ?, description = ?, image_path = ?, sizes = ?, flavors = ?, is_featured = ?, sort_order = ?, updated_at = NOW() WHERE id = ?");
            $upd->bind_param("isssssiii", $segment, $name, $description, $image_filename, $sizes, $flavors, $is_featured, $sort_order, $id);
            if ($upd->execute()) {
                flashMessage('success', 'Product "' . $name . '" updated successfully.');
                redirect('index.php');
            } else {
                $error = 'Failed to update product. Error: ' . $conn->error;
            }
        }
    }
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:850px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Edit Product #<?= $product['id'] ?></div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Modify details for <?= htmlspecialchars($product['name']) ?></p>
        </div>
        <a href="index.php" class="btn btn-sm btn-outline">← Back to List</a>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <?= csrfField() ?>
        <div class="form-grid-2">
            <div class="form-group">
                <label>Product Name <span style="color:#dc2626;">*</span></label>
                <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? $product['name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Segment <span style="color:#dc2626;">*</span></label>
                <?php $cur_seg = $_POST['segment'] ?? $product['segment']; ?>
                <select name="segment" required>
                    <option value="1" <?= $cur_seg == 1 ? 'selected' : '' ?>>1 — Sparkling Water (PET)</option>
                    <option value="2" <?= $cur_seg == 2 ? 'selected' : '' ?>>2 — Premium Juices (Glass Bottle)</option>
                    <option value="3" <?= $cur_seg == 3 ? 'selected' : '' ?>>3 — Premium Soda (Aluminum Can)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4"><?= htmlspecialchars($_POST['description'] ?? $product['description']) ?></textarea>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label>Available Sizes</label>
                <input type="text" name="sizes" value="<?= htmlspecialchars($_POST['sizes'] ?? $product['sizes']) ?>" placeholder="e.g. 250ml, 500ml, 1L">
                <div class="form-hint">Comma separated volume options</div>
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="<?= htmlspecialchars($_POST['sort_order'] ?? $product['sort_order']) ?>" min="0" step="1">
                <div class="form-hint">Lower numbers display first</div>
            </div>
        </div>

        <div class="form-group">
            <label>Flavors / Notes</label>
            <textarea name="flavors" rows="2"><?= htmlspecialchars($_POST['flavors'] ?? $product['flavors']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Product Image</label>
            <?php if (!empty($product['image_path'])): ?>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:10px;">
                    <img src="../../uploads/products/<?= htmlspecialchars($product['image_path']) ?>" alt="Current image" class="thumb" style="width:70px; height:70px;">
                    <div style="font-size:12px; color:#64748b;">Current image: <?= htmlspecialchars($product['image_path']) ?><br>Upload a new file below to replace it.</div>
                </div>
            <?php endif; ?>
            <input type="file" name="image" id="productImageInput" accept="image/jpeg,image/png,image/webp,image/gif">
            <div class="form-hint">Leave blank to keep current image. Max 5MB (JPG, PNG, WEBP, GIF).</div>
            <img id="imagePreview" class="img-preview-box" alt="New image preview">
        </div>

        <div class="form-group" style="display:flex; align-items:center; gap:10px;">
            <?php $cur_feat = isset($_POST['name']) ? isset($_POST['is_featured']) : (bool)$product['is_featured']; ?>
            <input type="checkbox" name="is_featured" id="is_featured" value="1" <?= $cur_feat ? 'checked' : '' ?> style="width:18px; height:18px; cursor:pointer;">
            <label for="is_featured" style="margin-bottom:0; cursor:pointer; font-size:14px;">Feature this product on Homepage carousel &amp; highlights</label>
        </div>

        <div style="display:flex; gap:12px; margin-top:24px;">
            <button type="submit" class="btn btn-primary" style="padding:11px 26px;">Update Product →</button>
            <a href="index.php" class="btn btn-outline" style="padding:11px 20px;">Cancel</a>
        </div>
    </form>
</div>

<script>
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
