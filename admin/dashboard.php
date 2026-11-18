<?php
$page_title = 'Dashboard';
include 'includes/admin_header.php';

$total_products = 0;
$res_p = $conn->query("SELECT COUNT(*) FROM products");
if ($res_p) $total_products = (int)$res_p->fetch_row()[0];

$total_enquiries = 0;
$res_e = $conn->query("SELECT COUNT(*) FROM enquiries");
if ($res_e) $total_enquiries = (int)$res_e->fetch_row()[0];

$total_users = 0;
$res_u = $conn->query("SELECT COUNT(*) FROM admin_users WHERE is_active=1");
if ($res_u) $total_users = (int)$res_u->fetch_row()[0];

$total_gallery = 0;
$res_g = $conn->query("SELECT COUNT(*) FROM gallery_images");
if ($res_g) $total_gallery = (int)$res_g->fetch_row()[0];

$recent_enquiries = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 10");
?>

<!-- Quick Action Header -->
<div class="card" style="margin-bottom:20px; padding:18px 24px;">
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <div>
            <h3 style="font-size:18px; color:#005B8F; margin-bottom:4px;">Welcome to Acrosis Beverages Admin</h3>
            <p style="font-size:13px; color:#64748b;">Manage products catalogue, customer enquiries, and administrative accounts.</p>
        </div>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="products/add.php" class="btn btn-primary">+ Add Product</a>
            <a href="products/index.php" class="btn btn-secondary">View Products</a>
            <a href="users/index.php" class="btn btn-outline">Manage Users</a>
            <a href="enquiries/index.php" class="btn btn-outline">View Enquiries</a>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="stat-cards">
    <div class="stat-card">
        <h3><?= $total_products ?></h3>
        <p>Total Products</p>
    </div>
    <div class="stat-card stat-teal">
        <h3><?= $total_enquiries ?></h3>
        <p>Total Enquiries</p>
    </div>
    <div class="stat-card stat-blue">
        <h3><?= $total_users ?></h3>
        <p>Active Admin Users</p>
    </div>
    <div class="stat-card">
        <h3><?= $total_gallery ?></h3>
        <p>Gallery Images</p>
    </div>
    <div class="stat-card stat-navy">
        <h3>3</h3>
        <p>Product Segments</p>
    </div>
</div>

<!-- Recent Enquiries Card -->
<div class="card">
    <div class="card-header">
        <div class="card-title">Recent Enquiries (Latest 10)</div>
        <div style="display:flex; gap:10px;">
            <a href="enquiries/export.php" class="btn btn-sm btn-outline">Export CSV</a>
            <a href="enquiries/index.php" class="btn btn-sm btn-secondary">View All Enquiries →</a>
        </div>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recent_enquiries && $recent_enquiries->num_rows > 0): ?>
                    <?php while ($row = $recent_enquiries->fetch_assoc()): ?>
                        <?php
                        $badge_class = 'badge-blue';
                        if ($row['type'] === 'distributor') $badge_class = 'badge-gold';
                        if ($row['type'] === 'career') $badge_class = 'badge-green';
                        $msg_snippet = mb_strimwidth($row['message'] ?? '', 0, 45, '...');
                        ?>
                        <tr>
                            <td>#<?= $row['id'] ?></td>
                            <td><span class="badge <?= $badge_class ?>"><?= ucfirst(htmlspecialchars($row['type'])) ?></span></td>
                            <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                            <td><a href="mailto:<?= htmlspecialchars($row['email']) ?>" style="color:#16B8D4; text-decoration:none;"><?= htmlspecialchars($row['email']) ?></a></td>
                            <td><?= htmlspecialchars($row['phone'] ?? '—') ?></td>
                            <td><?= htmlspecialchars($row['city'] ?? '—') ?></td>
                            <td><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></td>
                            <td title="<?= htmlspecialchars($row['message'] ?? '') ?>"><?= htmlspecialchars($msg_snippet) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align:center; padding:30px; color:#888;">
                            No enquiries recorded yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Navigation Card -->
<div class="card">
    <div class="card-header">
        <div class="card-title">Quick Actions &amp; Resources</div>
    </div>
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:16px;">
        <div style="padding:16px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
            <h4 style="font-size:14px; color:#005B8F; margin-bottom:6px;">🧃 Products Catalogue</h4>
            <p style="font-size:12px; color:#64748b; margin-bottom:12px;">Add, edit, and organize PET sparkling water, glass juices, and soda cans.</p>
            <a href="products/index.php" class="btn btn-sm btn-primary">Go to Products →</a>
        </div>
        <div style="padding:16px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
            <h4 style="font-size:14px; color:#005B8F; margin-bottom:6px;">📧 Enquiries &amp; Leads</h4>
            <p style="font-size:12px; color:#64748b; margin-bottom:12px;">Review incoming distributor leads, career applicants, and general queries.</p>
            <a href="enquiries/index.php" class="btn btn-sm btn-secondary">View Leads →</a>
        </div>
        <div style="padding:16px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
            <h4 style="font-size:14px; color:#005B8F; margin-bottom:6px;">🖼️ Gallery</h4>
            <p style="font-size:12px; color:#64748b; margin-bottom:12px;">Upload and organize images displayed on the public gallery page.</p>
            <a href="gallery/index.php" class="btn btn-sm btn-primary">Manage Gallery →</a>
        </div>
        <div style="padding:16px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
            <h4 style="font-size:14px; color:#005B8F; margin-bottom:6px;">👤 User Management</h4>
            <p style="font-size:12px; color:#64748b; margin-bottom:12px;">Control administrative credentials and security access roles.</p>
            <a href="users/index.php" class="btn btn-sm btn-outline">Manage Access →</a>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
