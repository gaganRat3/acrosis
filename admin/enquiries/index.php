<?php
$page_title = 'Enquiries & Leads';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

// Handle Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    requireCsrfToken();
    $del_id = (int)$_POST['delete_id'];
    $del_stmt = $conn->prepare("DELETE FROM enquiries WHERE id = ?");
    $del_stmt->bind_param("i", $del_id);
    if ($del_stmt->execute()) {
        flashMessage('success', 'Enquiry #' . $del_id . ' deleted successfully.');
    } else {
        flashMessage('error', 'Failed to delete enquiry.');
    }
    redirect('index.php' . (!empty($_GET['type']) ? '?type=' . urlencode($_GET['type']) : ''));
}

include '../includes/admin_header.php';

$filter_type = sanitize($_GET['type'] ?? '');
$allowed_types = ['general', 'distributor', 'career'];

$sql = "SELECT * FROM enquiries";
if (in_array($filter_type, $allowed_types)) {
    $sql .= " WHERE type = '" . $conn->real_escape_string($filter_type) . "'";
}
$sql .= " ORDER BY created_at DESC, id DESC";
$enquiries = $conn->query($sql);

// Counts for tabs
$cnt_all = $conn->query("SELECT COUNT(*) FROM enquiries")->fetch_row()[0] ?? 0;
$cnt_gen = $conn->query("SELECT COUNT(*) FROM enquiries WHERE type='general'")->fetch_row()[0] ?? 0;
$cnt_dis = $conn->query("SELECT COUNT(*) FROM enquiries WHERE type='distributor'")->fetch_row()[0] ?? 0;
$cnt_car = $conn->query("SELECT COUNT(*) FROM enquiries WHERE type='career'")->fetch_row()[0] ?? 0;
?>

<div class="card">
    <div class="card-header">
        <div>
            <div class="card-title">Enquiries &amp; Customer Submissions</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">View and respond to general, distributor, and job applications.</p>
        </div>
        <div style="display:flex; gap:10px;">
            <a href="export.php<?= !empty($filter_type) ? '?type=' . urlencode($filter_type) : '' ?>" class="btn btn-primary">
                <span>📥</span> Export CSV
            </a>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <a href="index.php" class="filter-tab <?= empty($filter_type) ? 'active' : '' ?>">
            All (<?= $cnt_all ?>)
        </a>
        <a href="index.php?type=general" class="filter-tab <?= $filter_type === 'general' ? 'active' : '' ?>">
            💬 General (<?= $cnt_gen ?>)
        </a>
        <a href="index.php?type=distributor" class="filter-tab <?= $filter_type === 'distributor' ? 'active' : '' ?>">
            🤝 Distributor (<?= $cnt_dis ?>)
        </a>
        <a href="index.php?type=career" class="filter-tab <?= $filter_type === 'career' ? 'active' : '' ?>">
            💼 Career (<?= $cnt_car ?>)
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width:55px;">ID</th>
                    <th style="width:105px;">Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Message</th>
                    <th style="width:130px;">Date</th>
                    <th style="width:130px; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($enquiries && $enquiries->num_rows > 0): ?>
                    <?php while ($e = $enquiries->fetch_assoc()): ?>
                        <?php
                        $badge_cls = 'badge-blue';
                        if ($e['type'] === 'distributor') $badge_cls = 'badge-gold';
                        if ($e['type'] === 'career') $badge_cls = 'badge-green';
                        
                        $raw_msg = $e['message'] ?? '';
                        $short_msg = mb_strimwidth($raw_msg, 0, 50, '...');
                        ?>
                        <tr>
                            <td>#<?= $e['id'] ?></td>
                            <td><span class="badge <?= $badge_cls ?>"><?= ucfirst(htmlspecialchars($e['type'])) ?></span></td>
                            <td><strong><?= htmlspecialchars($e['name']) ?></strong></td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($e['email']) ?>" style="color:#16B8D4; text-decoration:none;">
                                    <?= htmlspecialchars($e['email']) ?>
                                </a>
                            </td>
                            <td>
                                <?php if (!empty($e['phone'])): ?>
                                    <a href="tel:<?= htmlspecialchars($e['phone']) ?>" style="color:#334155; text-decoration:none;">
                                        <?= htmlspecialchars($e['phone']) ?>
                                    </a>
                                <?php else: ?>
                                    <span style="color:#94a3b8;">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($e['city'] ?? '—') ?></td>
                            <td>
                                <span title="<?= htmlspecialchars($raw_msg) ?>" style="cursor:help;">
                                    <?= htmlspecialchars($short_msg) ?>
                                </span>
                            </td>
                            <td><?= date('d M Y, h:i A', strtotime($e['created_at'])) ?></td>
                            <td style="text-align:center;">
                                <div style="display:inline-flex; gap:6px;">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="viewModal(<?= htmlspecialchars(json_encode($e), ENT_QUOTES) ?>)">
                                        View
                                    </button>
                                    <form method="POST" action="index.php<?= !empty($filter_type) ? '?type=' . urlencode($filter_type) : '' ?>" style="display:inline;" onsubmit="return confirm('Delete enquiry #<?= $e['id'] ?>?');">
                                        <?= csrfField() ?>
                                        <input type="hidden" name="delete_id" value="<?= $e['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align:center; padding:35px; color:#888;">
                            No enquiries found in this category.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Simple Detail Modal -->
<div id="enquiryModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:999; align-items:center; justify-content:center; padding:20px;">
    <div style="background:#fff; border-radius:12px; max-width:600px; width:100%; max-height:85vh; overflow-y:auto; padding:24px; box-shadow:0 20px 60px rgba(0,0,0,0.3); position:relative;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid #E2E8F0; padding-bottom:12px;">
            <h3 id="modalTitle" style="font-size:18px; color:#005B8F;">Enquiry Details</h3>
            <button onclick="closeModal()" style="background:none; border:none; font-size:24px; cursor:pointer; color:#64748b;">&times;</button>
        </div>
        <div id="modalBody" style="font-size:14px; line-height:1.7; color:#334155;"></div>
        <div style="text-align:right; margin-top:20px; padding-top:12px; border-top:1px solid #E2E8F0;">
            <button onclick="closeModal()" class="btn btn-primary">Close</button>
        </div>
    </div>
</div>

<script>
function viewModal(data) {
    document.getElementById('modalTitle').innerText = 'Enquiry #' + data.id + ' — ' + (data.type.toUpperCase());
    let html = `
        <div style="margin-bottom:12px;"><strong>Submitted By:</strong> ${escapeHtml(data.name)}</div>
        <div style="margin-bottom:12px;"><strong>Email:</strong> <a href="mailto:${escapeHtml(data.email)}" style="color:#16B8D4;">${escapeHtml(data.email)}</a></div>
        <div style="margin-bottom:12px;"><strong>Phone:</strong> ${escapeHtml(data.phone || 'N/A')}</div>
        <div style="margin-bottom:12px;"><strong>City:</strong> ${escapeHtml(data.city || 'N/A')}</div>
        <div style="margin-bottom:12px;"><strong>Date Received:</strong> ${escapeHtml(data.created_at)}</div>
        <div style="margin-top:16px; padding:14px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
            <strong>Message / Details:</strong>
            <p style="white-space:pre-wrap; margin-top:6px; color:#1e293b;">${escapeHtml(data.message || 'No additional message provided.')}</p>
        </div>
    `;
    document.getElementById('modalBody').innerHTML = html;
    document.getElementById('enquiryModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('enquiryModal').style.display = 'none';
}

function escapeHtml(text) {
    if (!text) return '';
    return String(text).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
}

window.addEventListener('click', function(e) {
    const modal = document.getElementById('enquiryModal');
    if (e.target === modal) {
        closeModal();
    }
});
</script>

<?php include '../includes/admin_footer.php'; ?>
