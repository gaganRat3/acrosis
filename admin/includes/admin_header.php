<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__, 2) . '/config/db.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';
requireLogin();

// Calculate relative path to admin root
$current_script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF']);
$current_dir = dirname($current_script);
$in_admin_root = (basename($current_dir) === 'admin');
$admin_base = $in_admin_root ? '' : '../';
$public_base = $in_admin_root ? '../' : '../../';

$page_title_text = $page_title ?? 'Admin | Acrosis';
$admin_name_text = htmlspecialchars($_SESSION['admin_name'] ?? $_SESSION['admin_username'] ?? 'Administrator');
$admin_role_text = htmlspecialchars($_SESSION['admin_role'] ?? 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $page_title_text ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    /* Full admin CSS — sidebar layout */
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family:'Inter',sans-serif; background:#F4F6F8; display:flex; min-height:100vh; color:#1e293b; }
    
    /* Sidebar */
    .sidebar { width:260px; background:#005B8F; color:#fff; display:flex; flex-direction:column; min-height:100vh; position:fixed; left:0; top:0; z-index:100; transition:transform .3s; }
    .sidebar-logo { padding:24px 20px; border-bottom:1px solid rgba(201,168,76,0.3); }
    .sidebar-brand { display:flex; align-items:center; gap:10px; }
    .sidebar-logo img { display:block; width:48px; height:48px; object-fit:contain; }
    .sidebar-brand-name { display:flex; flex-direction:column; line-height:1; }
    .sidebar-brand-name strong { color:#F4C542; font-family:'Playfair Display',serif; font-size:18px; letter-spacing:1.5px; }
    .sidebar-brand-name span { color:#aaa; font-size:9px; letter-spacing:1.8px; margin-top:4px; font-weight:600; }
    .sidebar-logo h1 { font-family:'Playfair Display',serif; color:#F4C542; font-size:20px; letter-spacing:2px; }
    .sidebar-logo p { color:#aaa; font-size:11px; letter-spacing:1px; margin-top:2px; font-weight:600; }
    .sidebar-nav { flex:1; padding:20px 0; overflow-y:auto; }
    .sidebar-nav a { display:flex; align-items:center; gap:12px; padding:12px 20px; color:#ccc; text-decoration:none; font-size:14px; font-weight:500; transition:all .2s; border-left:3px solid transparent; }
    .sidebar-nav a:hover, .sidebar-nav a.active { background:rgba(201,168,76,0.15); color:#F4C542; border-left-color:#F4C542; }
    .sidebar-nav a span { font-size:18px; width:22px; text-align:center; }
    .sidebar-footer { padding:16px 20px; border-top:1px solid rgba(255,255,255,0.1); display:flex; flex-direction:column; gap:8px; }
    .sidebar-footer a { color:#aaa; text-decoration:none; font-size:13px; display:flex; align-items:center; gap:8px; transition:color .2s; }
    .sidebar-footer a:hover { color:#F4C542; }
    
    /* Main Content */
    .main-content { margin-left:260px; flex:1; display:flex; flex-direction:column; min-width:0; }
    .topbar { background:#fff; padding:16px 28px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid #e5e5e5; box-shadow:0 1px 4px rgba(0,0,0,0.05); position:sticky; top:0; z-index:50; }
    .topbar-left { display:flex; align-items:center; gap:14px; }
    .topbar h2 { font-size:20px; color:#005B8F; font-weight:700; }
    .topbar .user-info { display:flex; align-items:center; gap:12px; font-size:14px; color:#666; }
    .topbar .user-info strong { color:#005B8F; }
    .sidebar-toggle-btn { display:none; background:none; border:none; font-size:22px; color:#005B8F; cursor:pointer; }
    
    /* Body & Cards */
    .page-body { padding:28px; flex:1; }
    .card { background:#fff; border-radius:10px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06); margin-bottom:24px; border:1px solid #E2E8F0; }
    .card-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; flex-wrap:wrap; gap:12px; }
    .card-title { font-size:17px; font-weight:700; color:#005B8F; }
    
    /* Buttons */
    .btn { padding:8px 18px; border:none; border-radius:6px; cursor:pointer; font-size:13px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px; font-family:'Inter',sans-serif; transition:all .2s; }
    .btn-primary { background:#F4C542; color:#005B8F; }
    .btn-primary:hover { background:#b8973d; }
    .btn-danger { background:#dc3545; color:#fff; }
    .btn-danger:hover { background:#bb2d3b; }
    .btn-secondary { background:#16B8D4; color:#fff; }
    .btn-secondary:hover { background:#14555b; }
    .btn-outline { background:transparent; border:1px solid #F4C542; color:#005B8F; }
    .btn-outline:hover { background:#F4C542; color:#005B8F; }
    .btn-sm { padding:5px 12px; font-size:12px; }
    
    /* Tables */
    .table-responsive { width:100%; overflow-x:auto; }
    table { width:100%; border-collapse:collapse; text-align:left; }
    table th { background:#F4F6F8; padding:11px 14px; text-align:left; font-size:12px; font-weight:700; color:#555; text-transform:uppercase; letter-spacing:0.5px; border-bottom:2px solid #e5e5e5; }
    table td { padding:12px 14px; border-bottom:1px solid #f0f0f0; font-size:13px; color:#333; vertical-align:middle; }
    table tr:hover td { background:#fafafa; }
    
    /* Stat Cards */
    .stat-cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:18px; margin-bottom:24px; }
    .stat-card { background:#fff; border-radius:10px; padding:20px; box-shadow:0 2px 8px rgba(0,0,0,0.06); border-left:4px solid #F4C542; display:flex; flex-direction:column; justify-content:center; }
    .stat-card.stat-teal { border-left-color:#16B8D4; }
    .stat-card.stat-navy { border-left-color:#005B8F; }
    .stat-card.stat-blue { border-left-color:#2563eb; }
    .stat-card h3 { font-size:30px; color:#005B8F; font-weight:700; font-family:'Playfair Display',serif; }
    .stat-card p { font-size:13px; color:#64748b; margin-top:4px; font-weight:500; }
    
    /* Badges */
    .badge { display:inline-block; padding:4px 9px; border-radius:20px; font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; }
    .badge-gold { background:#FEF3C7; color:#92400E; }
    .badge-blue { background:#DBEAFE; color:#1E40AF; }
    .badge-green { background:#D1FAE5; color:#065F46; }
    .badge-gray { background:#F1F5F9; color:#475569; }
    .badge-red { background:#FEE2E2; color:#991B1B; }
    
    /* Flash messages */
    .flash-success { background:#d4edda; color:#155724; padding:12px 16px; border-radius:6px; margin-bottom:16px; border-left:4px solid #28a745; font-size:14px; font-weight:500; }
    .flash-error { background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:6px; margin-bottom:16px; border-left:4px solid #dc3545; font-size:14px; font-weight:500; }
    
    /* Forms */
    .form-group { margin-bottom:18px; }
    .form-group label { display:block; font-size:13px; font-weight:600; color:#334155; margin-bottom:6px; }
    .form-group input, .form-group textarea, .form-group select { width:100%; padding:10px 14px; border:1.5px solid #CBD5E1; border-radius:6px; font-size:14px; font-family:'Inter',sans-serif; background:#fff; color:#1e293b; transition:border-color .2s; }
    .form-group input:focus, .form-group textarea:focus, .form-group select:focus { outline:none; border-color:#F4C542; box-shadow:0 0 0 3px rgba(201,168,76,0.15); }
    .form-grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    @media(max-width:768px){ .form-grid-2 { grid-template-columns:1fr; } }
    .form-hint { font-size:12px; color:#64748b; margin-top:4px; }
    img.thumb { width:52px; height:52px; object-fit:cover; border-radius:6px; border:1px solid #E2E8F0; background:#f8fafc; }
    .img-preview-box { margin-top:10px; max-width:140px; max-height:140px; border-radius:6px; border:2px dashed #CBD5E1; display:none; object-fit:cover; }
    
    /* Filter tabs */
    .filter-tabs { display:flex; gap:8px; margin-bottom:18px; flex-wrap:wrap; }
    .filter-tab { padding:7px 16px; border-radius:6px; font-size:13px; font-weight:600; text-decoration:none; border:1px solid #CBD5E1; color:#475569; background:#fff; transition:all .2s; }
    .filter-tab:hover, .filter-tab.active { background:#F4C542; border-color:#F4C542; color:#005B8F; }
    
    /* Sidebar overlay for mobile */
    .sidebar-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:90; }
    
    /* Responsive */
    @media(max-width:768px){
      .sidebar { transform:translateX(-260px); }
      .sidebar.open { transform:translateX(0); }
      .sidebar-overlay.open { display:block; }
      .main-content { margin-left:0; }
      .sidebar-toggle-btn { display:block; }
    }
    </style>
</head>
<body>
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
<div class="sidebar" id="adminSidebar">
    <div class="sidebar-logo">
        <div class="sidebar-brand">
            <img src="<?= $public_base ?>assets/images/acrosis_logo_transparent.png" alt="">
            <span class="sidebar-brand-name">
                <strong>ACROSIS</strong>
                <span>BEVERAGES</span>
            </span>
        </div>
        <p>ADMIN PANEL</p>
    </div>
    <nav class="sidebar-nav">
        <a href="<?= $admin_base ?>dashboard.php" <?= (strpos($_SERVER['PHP_SELF'],'dashboard')!==false)?'class="active"':'' ?>>
            <span>📊</span> Dashboard
        </a>
        <a href="<?= $admin_base ?>products/index.php" <?= (strpos($_SERVER['PHP_SELF'],'products')!==false)?'class="active"':'' ?>>
            <span>🧃</span> Products
        </a>
        <a href="<?= $admin_base ?>gallery/index.php" <?= (strpos($_SERVER['PHP_SELF'],'gallery')!==false)?'class="active"':'' ?>>
            <span>🖼️</span> Gallery
        </a>
        <a href="<?= $admin_base ?>users/index.php" <?= (strpos($_SERVER['PHP_SELF'],'users')!==false)?'class="active"':'' ?>>
            <span>👤</span> Admin Users
        </a>
        <a href="<?= $admin_base ?>enquiries/index.php" <?= (strpos($_SERVER['PHP_SELF'],'enquiries')!==false)?'class="active"':'' ?>>
            <span>📧</span> Enquiries
        </a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= $public_base ?>index.php" target="_blank"><span>🌐</span> View Website</a>
        <a href="<?= $admin_base ?>logout.php"><span>🚪</span> Logout</a>
    </div>
</div>

<div class="main-content">
<div class="topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle-btn" onclick="toggleSidebar()" aria-label="Toggle navigation">☰</button>
        <h2><?= $page_title_text ?></h2>
    </div>
    <div class="user-info">
        <span>Logged in as</span>
        <strong><?= $admin_name_text ?></strong>
        <span class="badge badge-gold" style="font-size:10px;"><?= $admin_role_text ?></span>
    </div>
</div>
<div class="page-body">
<?php
$flash = getFlashMessage();
if ($flash): ?>
    <div class="flash-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['msg']) ?>
    </div>
<?php endif; ?>
