<?php
$page_title = 'Products Management';
include '../includes/admin_header.php';

// Handle Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $del_id = (int)$_POST['delete_id'];
    $stmt = $conn->prepare("SELECT image_path FROM products WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        if (!empty($row['image_path'])) {
            $img_file = dirname(__DIR__, 2) . '/uploads/products/' . $row['image_path'];
            if (file_exists($img_file)) {
                @unlink($img_file);
            }
        }
    }
    $del_stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $del_stmt->bind_param("i", $del_id);
    if ($del_stmt->execute()) {
        flashMessage('success', 'Product deleted successfully.');
    } else {
        flashMessage('error', 'Failed to delete product.');
    }
    redirect('index.php');
}

// Handle Segment Filtering
$segment_filter = isset($_GET['segment']) ? (int)$_GET['segment'] : 0;
$segments = [
    1 => 'Sparkling Water (PET)',
    2 => 'Premium Juices (Glass)',
    3 => 'Premium Soda (Can)'
];

$sql = "SELECT * FROM products";
if ($segment_filter > 0 && isset($segments[$segment_filter])) {
    $sql .= " WHERE segment = " . (int)$segment_filter;
}
$sql .= " ORDER BY sort_order ASC, id DESC";
$products = $conn->query($sql);
?>

<div class="card">
    <div class="card-header">
        <div>
            <div class="card-title">Products Catalogue</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">Manage drinks across all three core beverage segments.</p>
        </div>
        <div>
            <a href="add.php" class="btn btn-primary">+ Add New Product</a>
        </div>
    </div>

    <!-- Segment Filter Tabs -->
    <div class="filter-tabs">
        <a href="index.php" class="filter-tab <?= $segment_filter === 0 ? 'active' : '' ?>">All Segments</a>
        <?php foreach ($segments as $s_id => $s_name): ?>
            <a href="index.php?segment=<?= $s_id ?>" class="filter-tab <?= $segment_filter === $s_id ? 'active' : '' ?>"><?= $s_name ?></a>
        <?php endforeach; ?>
    </div>

    <!-- Products Table -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">ID</th>
                    <th style="width:70px;">Thumbnail</th>
                    <th>Name</th>
                    <th>Segment</th>
                    <th>Featured</th>
                    <th>Sort Order</th>
                    <th style="width:160px; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products && $products->num_rows > 0): ?>
                    <?php while ($p = $products->fetch_assoc()): ?>
                        <?php
                        $seg_title = $segments[$p['segment']] ?? ('Segment ' . $p['segment']);
                        $img_src = !empty($p['image_path']) ? '../../uploads/products/' . htmlspecialchars($p['image_path']) : '';
                        ?>
                        <tr>
                            <td>#<?= $p['id'] ?></td>
                            <td>
                                <?php if (!empty($img_src)): ?>
                                    <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="thumb">
                                <?php else: ?>
                                    <div class="thumb" style="display:flex; align-items:center; justify-content:center; font-size:22px; color:#94a3b8;">🥤</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?= htmlspecialchars($p['name']) ?></strong>
                                <?php if (!empty($p['sizes'])): ?>
                                    <div style="font-size:12px; color:#64748b; margin-top:2px;">Sizes: <?= htmlspecialchars($p['sizes']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?= $p['segment'] == 1 ? 'badge-blue' : ($p['segment'] == 2 ? 'badge-gold' : 'badge-green') ?>">
                                    <?= htmlspecialchars($seg_title) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($p['is_featured']): ?>
                                    <span class="badge badge-gold">★ Featured</span>
                                <?php else: ?>
                                    <span class="badge badge-gray">Standard</span>
                                <?php endif; ?>
                            </td>
                            <td><?= (int)$p['sort_order'] ?></td>
                            <td style="text-align:center;">
                                <div style="display:inline-flex; gap:6px;">
                                    <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <form method="POST" action="index.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to permanently delete this product?');">
                                        <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center; padding:35px; color:#888;">
                            No products found. Click <strong>+ Add New Product</strong> above to add one.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/admin_footer.php'; ?>
