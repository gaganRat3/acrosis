<?php
// Create local DB and tables for XAMPP
$conn = new mysqli('localhost', 'root', '');
if ($conn->connect_error) {
    echo "MySQL connect FAILED: " . $conn->connect_error . "\n";
    exit(1);
}

$conn->query("CREATE DATABASE IF NOT EXISTS acrosis_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$conn->select_db('acrosis_db');
echo "Database acrosis_db: READY\n";

// Tables
$sql = "
CREATE TABLE IF NOT EXISTS admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  role ENUM('super_admin','admin') NOT NULL DEFAULT 'admin',
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  segment TINYINT NOT NULL COMMENT '1=PET Water,2=Glass Juice,3=Soda',
  name VARCHAR(200) NOT NULL,
  description TEXT,
  image_path VARCHAR(255),
  sizes VARCHAR(100),
  flavors TEXT,
  is_featured TINYINT(1) NOT NULL DEFAULT 0,
  sort_order SMALLINT NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type ENUM('general','distributor','career') NOT NULL DEFAULT 'general',
  name VARCHAR(120),
  email VARCHAR(200),
  phone VARCHAR(30),
  city VARCHAR(80),
  message TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS site_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  `key` VARCHAR(100) NOT NULL UNIQUE,
  value TEXT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200),
  description TEXT,
  image_path VARCHAR(255) NOT NULL,
  sort_order SMALLINT NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

foreach (array_filter(array_map('trim', explode(';', $sql))) as $q) {
    if ($q && $conn->query($q) === false) {
        echo "ERROR: " . $conn->error . " — Query: " . substr($q, 0, 60) . "\n";
    }
}

// Seed admin user
$existing = $conn->query("SELECT id FROM admin_users WHERE username='admin'")->num_rows;
if ($existing === 0) {
    $hash = password_hash('Admin@123', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO admin_users (username, password_hash, full_name, role) VALUES (?, ?, 'Super Admin', 'super_admin')");
    $stmt->bind_param("ss", $username, $hash);
    $username = 'admin';
    $stmt->execute();
    echo "Admin user seeded: admin / Admin@123\n";
} else {
    echo "Admin user already exists\n";
}

// Seed site settings
$settings = [
    ['site_name', 'Acrosis Beverages Pvt Ltd'],
    ['tagline', 'Purity | Refreshment | Excellence'],
    ['email', 'Hello@acrosisbeverages.com'],
    ['phone', '+91-9409833866'],
    ['address', 'H Tower 401, Shukan 6, Sama Savli Road, Vemali, Vadodara - 390024'],
];
foreach ($settings as [$k, $v]) {
    $conn->query("INSERT IGNORE INTO site_settings (`key`, value) VALUES ('$k', '$v')");
}
echo "Site settings seeded\n";

$tables = $conn->query("SHOW TABLES");
echo "\nTables created (" . $tables->num_rows . "):\n";
while ($r = $tables->fetch_row()) echo "  - " . $r[0] . "\n";

echo "\n✅ Local DB setup COMPLETE\n";
echo "Login at: http://localhost/acrosis/admin/login.php\n";
echo "Username: admin | Password: Admin@123\n";
