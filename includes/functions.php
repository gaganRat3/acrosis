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
 * Generate or retrieve the current session CSRF token.
 */
function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validate a submitted CSRF token.
 */
function verifyCsrfToken(?string $token): bool {
    return is_string($token)
        && !empty($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Return a hidden CSRF form field.
 */
function csrfField(): string {
    return '<input type="hidden" name="csrf_token" value="' .
        htmlspecialchars(csrfToken(), ENT_QUOTES, 'UTF-8') . '">';
}

/**
 * Require a valid CSRF token for a state-changing request.
 */
function requireCsrfToken(): void {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? null)) {
        http_response_code(403);
        exit('Invalid security token. Please go back and try again.');
    }
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
 * Build an absolute public URL for SEO metadata.
 */
function siteUrl(string $path = ''): string {
    $baseUrl = getenv('ACROSIS_SITE_URL') ?: 'https://acrosisbeverages.com';
    return rtrim($baseUrl, '/') . ($path !== '' ? '/' . ltrim($path, '/') : '');
}

/**
 * Read a site setting once per request.
 */
function getSetting(string $key, string $fallback = ''): string {
    static $settings;

    if ($settings === null) {
        $settings = [];
        global $conn;

        if (isset($conn) && $conn instanceof mysqli) {
            $result = $conn->query("SELECT `key`, `value` FROM site_settings");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $settings[$row['key']] = (string)($row['value'] ?? '');
                }
            } else {
                error_log('Unable to load site settings: ' . $conn->error);
            }
        }
    }

    return $settings[$key] ?? $fallback;
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
 * Check whether the logged-in administrator has one of the supplied roles.
 */
function hasRole(string|array $roles): bool {
    $roles = (array)$roles;
    return isLoggedIn() && in_array($_SESSION['admin_role'] ?? '', $roles, true);
}

/**
 * Require one of the supplied administrator roles.
 */
function requireRole(string|array $roles): void {
    requireLogin();
    if (!hasRole($roles)) {
        http_response_code(403);
        exit('You do not have permission to access this page.');
    }
}

/**
 * Apply a basic session-based login throttle.
 */
function loginRateLimitExceeded(): bool {
    $now = time();
    $window = 15 * 60;
    $attempts = $_SESSION['login_attempts'] ?? [];
    $attempts = array_values(array_filter($attempts, static function ($timestamp) use ($now, $window) {
        return is_int($timestamp) && ($now - $timestamp) < $window;
    }));
    $_SESSION['login_attempts'] = $attempts;
    return count($attempts) >= 5;
}

function recordFailedLogin(): void {
    $_SESSION['login_attempts'][] = time();
}

function clearLoginAttempts(): void {
    unset($_SESSION['login_attempts']);
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
