<?php
/**
 * Acrosis Beverages Pvt Ltd — Database Setup Script
 * Run this ONCE to create tables and seed default data.
 * Access: http://localhost/acrosis/config/setup.php
 */


define('DB_HOST', 'localhost');
define('DB_USER', 'u321878734_acrosis');
define('DB_PASS', 'Acrosis@1234');
define('DB_NAME', 'u321878734_acrosis_db');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$safeDbName = str_replace('`', '``', DB_NAME);

if (!$conn->query(
    "CREATE DATABASE IF NOT EXISTS `{$safeDbName}` 
     CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
)) {
    die("Database creation failed: " . $conn->error);
}

if (!$conn->select_db(DB_NAME)) {
    die("Database selection failed: " . $conn->error);
}

$conn->set_charset("utf8mb4");

$queries = [];

// 1. admin_users
$queries[] = "CREATE TABLE IF NOT EXISTS `admin_users` (
  `id`            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username`      VARCHAR(80) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `full_name`     VARCHAR(120) NOT NULL,
  `role`          ENUM('super_admin','editor') NOT NULL DEFAULT 'editor',
  `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
  `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// 2. products
$queries[] = "CREATE TABLE IF NOT EXISTS `products` (
  `id`          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `segment`     TINYINT UNSIGNED NOT NULL COMMENT '1=Sparkling Water PET, 2=Premium Juices Glass, 3=Premium Soda Can',
  `name`        VARCHAR(200) NOT NULL,
  `description` TEXT,
  `image_path`  VARCHAR(300) DEFAULT NULL,
  `sizes`       VARCHAR(300) DEFAULT NULL COMMENT 'e.g. 200ml,500ml,1L',
  `flavors`     TEXT DEFAULT NULL COMMENT 'JSON array of flavors',
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order`  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_segment` (`segment`),
  INDEX `idx_featured` (`is_featured`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// 3. enquiries
$queries[] = "CREATE TABLE IF NOT EXISTS `enquiries` (
  `id`         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `type`       ENUM('general','distributor','career') NOT NULL DEFAULT 'general',
  `name`       VARCHAR(120) NOT NULL,
  `email`      VARCHAR(180) NOT NULL,
  `phone`      VARCHAR(20) DEFAULT NULL,
  `city`       VARCHAR(100) DEFAULT NULL,
  `message`    TEXT DEFAULT NULL,
  `is_read`    TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_type` (`type`),
  INDEX `idx_read` (`is_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// 4. site_settings
$queries[] = "CREATE TABLE IF NOT EXISTS `site_settings` (
  `id`    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `key`   VARCHAR(100) NOT NULL UNIQUE,
  `value` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// 5. gallery_images
$queries[] = "CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id`         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title`      VARCHAR(200) NOT NULL,
  `image_path` VARCHAR(300) NOT NULL,
  `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_gallery_sort` (`sort_order`, `id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// Execute schema
$errors = [];
foreach ($queries as $sql) {
    if (!$conn->query($sql)) {
        $errors[] = $conn->error;
    }
}

// Seed default admin
$adminPass = password_hash('Admin@123', PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT IGNORE INTO `admin_users` (username, password_hash, full_name, role) VALUES (?, ?, ?, ?)");
$username = 'admin';
$fullName = 'Super Admin';
$role     = 'super_admin';
$stmt->bind_param('ssss', $username, $adminPass, $fullName, $role);
$stmt->execute();
$stmt->close();

// Seed site settings
$defaults = [
    ['site_name',        'Acrosis Beverages Pvt Ltd'],
    ['tagline',          'Purity | Refreshment | Excellence'],
    ['email',            'Hello@acrosisbeverages.com'],
    ['phone',            '+91-9409833866'],
    ['address',          'H Tower 401, Shukan 6, Sama Savli Road, Vemali, Vadodara - 390024'],
    ['cin',              'U11049GJ2026PTC185842'],
    ['din',              '06816609'],
    ['fssai_license',    'FSSAI Central License Holder'],
];
$stmt = $conn->prepare("INSERT IGNORE INTO `site_settings` (`key`, `value`) VALUES (?, ?)");
foreach ($defaults as [$k, $v]) {
    $stmt->bind_param('ss', $k, $v);
    $stmt->execute();
}
$stmt->close();

if (empty($errors)) {
    echo "<h2 style='color:green;font-family:sans-serif;'>✅ Setup complete! Database and tables created successfully.</h2>";
    echo "<p style='font-family:sans-serif;'>Default admin → username: <strong>admin</strong> / password: <strong>Admin@123</strong></p>";
    echo "<p style='color:red;font-family:sans-serif;'><strong>Delete or restrict access to this file after setup.</strong></p>";
} else {
    echo "<h2 style='color:red;font-family:sans-serif;'>❌ Errors occurred:</h2><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul>";
}
$conn->close();
?>
