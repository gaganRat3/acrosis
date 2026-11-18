<?php
$page_title = 'Website Settings';
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';
requireRole('super_admin');

$settingDefaults = [
    'site_name' => 'Acrosis Beverages Pvt Ltd',
    'tagline' => 'Purity · Refreshment · Excellence',
    'email' => 'Hello@acrosisbeverages.com',
    'phone' => '+91-9409833866',
    'address' => 'H Tower 401, Shukan 6, Sama Savli Road, Vemali, Vadodara - 390024',
];

$settings = [];
foreach ($settingDefaults as $key => $fallback) {
    $settings[$key] = getSetting($key, $fallback);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireCsrfToken();

    $submitted = [];
    foreach ($settingDefaults as $key => $fallback) {
        $submitted[$key] = trim((string)($_POST[$key] ?? ''));
    }

    if ($submitted['site_name'] === '' || strlen($submitted['site_name']) > 120) {
        $error = 'Company name is required and must be 120 characters or fewer.';
    } elseif ($submitted['tagline'] === '' || strlen($submitted['tagline']) > 200) {
        $error = 'Tagline is required and must be 200 characters or fewer.';
    } elseif (!filter_var($submitted['email'], FILTER_VALIDATE_EMAIL) || strlen($submitted['email']) > 180) {
        $error = 'Please enter a valid email address.';
    } elseif (!preg_match('/^\+?[0-9][0-9\s().-]{6,19}$/', $submitted['phone'])) {
        $error = 'Please enter a valid helpline number.';
    } elseif ($submitted['address'] === '' || strlen($submitted['address']) > 300) {
        $error = 'Registered address is required and must be 300 characters or fewer.';
    }

    if ($error === '') {
        $stmt = $conn->prepare(
            "INSERT INTO site_settings (`key`, `value`) VALUES (?, ?)
             ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)"
        );

        foreach ($submitted as $key => $value) {
            $stmt->bind_param('ss', $key, $value);
            if (!$stmt->execute()) {
                $error = 'Failed to save website settings.';
                break;
            }
        }
        $stmt->close();

        if ($error === '') {
            flashMessage('success', 'Website settings updated successfully.');
            redirect('index.php');
        }
    }

    $settings = $submitted;
}

include '../includes/admin_header.php';
?>

<div class="card" style="max-width:800px; margin:0 auto;">
    <div class="card-header">
        <div>
            <div class="card-title">Website Settings</div>
            <p style="font-size:13px; color:#64748b; margin-top:2px;">
                Update shared company information used across the public website.
            </p>
        </div>
    </div>

    <?php if ($error): ?>
        <div class="flash-error"><?= htmlspecialchars($error, ENT_QUOTES) ?></div>
    <?php endif; ?>

    <form method="POST">
        <?= csrfField() ?>

        <div class="form-group">
            <label for="site_name">Company Name</label>
            <input id="site_name" type="text" name="site_name" maxlength="120" required
                   value="<?= htmlspecialchars($settings['site_name'], ENT_QUOTES) ?>">
        </div>

        <div class="form-group">
            <label for="tagline">Tagline</label>
            <input id="tagline" type="text" name="tagline" maxlength="200" required
                   value="<?= htmlspecialchars($settings['tagline'], ENT_QUOTES) ?>">
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label for="email">Contact Email</label>
                <input id="email" type="email" name="email" maxlength="180" required
                       value="<?= htmlspecialchars($settings['email'], ENT_QUOTES) ?>">
            </div>
            <div class="form-group">
                <label for="phone">Helpline Number</label>
                <input id="phone" type="tel" name="phone" maxlength="20" required
                       value="<?= htmlspecialchars($settings['phone'], ENT_QUOTES) ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="address">Registered Address</label>
            <textarea id="address" name="address" maxlength="300" rows="3" required><?= htmlspecialchars($settings['address'], ENT_QUOTES) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:11px 26px;">
            Save Website Settings →
        </button>
    </form>
</div>

<?php include '../includes/admin_footer.php'; ?>
