<?php
/**
 * Acrosis Beverages — Shared Helper Functions
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Sanitize user input.
 */
function sanitize(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Build a URL relative to the application root.
 *
 * Local XAMPP uses /acrosis while a Hostinger main domain uses /.
 */
function appUrl(string $path = ''): string {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = (strpos($scriptName, '/acrosis/') === 0 || $scriptName === '/acrosis')
        ? '/acrosis'
        : '';
    return $basePath . ($path !== '' ? '/' . ltrim($path, '/') : '');
}

/**
 * Redirect to a URL and exit.
 */
function redirect(string $url): void {
    header("Location: $url");
    exit;
}

/**
 * Check if admin is logged in.
 */
function isLoggedIn(): bool {
    return isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']);
}

/**
 * Redirect to login if not authenticated.
 */
function requireLogin(): void {
    if (!isLoggedIn()) {
        redirect(appUrl('admin/login.php'));
    }
}

/**
 * Store a flash message in session.
 */
function flashMessage(string $type, string $msg): void {
    $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
}

/**
 * Retrieve and clear a flash message.
 * Returns array ['type'=>..., 'msg'=>...] or null.
 */
function getFlashMessage(): ?array {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

/**
 * Upload an image file.
 *
 * @param  array  $file      $_FILES element
 * @param  string $dest_dir  Destination directory (absolute path, with trailing slash)
 * @return string|false      Filename on success, false on failure
 */
function uploadImage(array $file, string $dest_dir): string|false {
    $allowed_types = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $max_size      = 5 * 1024 * 1024; // 5 MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    if (!in_array($file['type'], $allowed_types, true)) {
        return false;
    }
    if ($file['size'] > $max_size) {
        return false;
    }

    // Verify it is actually an image
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return false;
    }

    if (!is_dir($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_', true) . '.' . strtolower($ext);
    $dest     = rtrim($dest_dir, '/\\') . DIRECTORY_SEPARATOR . $filename;

    if (move_uploaded_file($file['tmp_name'], $dest)) {
        return $filename;
    }
    return false;
}

/**
 * Render a flash message HTML block (call after getFlashMessage).
 */
function renderFlash(): void {
    $flash = getFlashMessage();
    if (!$flash) return;
    $type  = htmlspecialchars($flash['type'], ENT_QUOTES);
    $msg   = htmlspecialchars($flash['msg'],  ENT_QUOTES);
    echo "<div class=\"flash flash-{$type}\" role=\"alert\">{$msg}</div>";
}
?>
