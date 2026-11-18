<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';
requireLogin();

// Optional filter by enquiry type
$type = sanitize($_GET['type'] ?? '');
$allowed_types = ['general', 'distributor', 'career'];

$sql = "SELECT id, type, name, email, phone, city, message, created_at FROM enquiries";
if (in_array($type, $allowed_types)) {
    $sql .= " WHERE type = '" . $conn->real_escape_string($type) . "'";
}
$sql .= " ORDER BY created_at DESC, id DESC";
$result = $conn->query($sql);

$filename = 'acrosis_enquiries_' . (!empty($type) ? $type . '_' : '') . date('Y-m-d_His') . '.csv';

// Output CSV headers
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Pragma: no-cache');
header('Expires: 0');

// Open output stream
$output = fopen('php://output', 'w');

// Add UTF-8 BOM for Excel compatibility
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// CSV Header row
fputcsv($output, ['ID', 'Type', 'Full Name', 'Email', 'Phone', 'City', 'Message', 'Created At']);

// Output data rows
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [
            $row['id'],
            ucfirst($row['type']),
            $row['name'],
            $row['email'],
            $row['phone'],
            $row['city'],
            $row['message'],
            $row['created_at']
        ]);
    }
}

fclose($output);
exit;
