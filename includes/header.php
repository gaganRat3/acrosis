<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../includes/functions.php';

// Determine active page for nav highlighting
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
function navActive(string $page): string {
    global $currentPage;
    return $currentPage === $page ? ' active' : '';
}

// Allow pages to set $pageTitle before including header
$pageTitle = isset($pageTitle) ? $pageTitle . ' — Acrosis Beverages Pvt Ltd' : 'Acrosis Beverages Pvt Ltd | Purity · Refreshment · Excellence';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Acrosis Beverages Pvt Ltd — Premium Indian beverage brand offering sparkling water, juices and soda. Purity. Refreshment. Excellence.">
  <meta name="theme-color" content="#005B8F">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES) ?></title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Shared stylesheet -->
  <link rel="stylesheet" href="<?= appUrl('assets/css/style.css') ?>?v=<?= filemtime(__DIR__ . '/../assets/css/style.css') ?>">

  <!-- Favicon placeholder -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%230D1B2A'/><text y='.9em' font-size='80' fill='%23C9A84C'>A</text></svg>">
</head>
<body>

<!-- ═══════════════════════════════ NAVIGATION ═══════════════════════════════ -->
<nav class="site-nav" id="siteNav" role="navigation" aria-label="Main navigation">
  <div class="nav-inner container">

    <!-- Logo -->
    <a href="<?= appUrl('index.php') ?>" class="nav-logo" aria-label="Acrosis Beverages Home">
      <img src="<?= appUrl('assets/images/acrosis_logo_transparent.png') ?>" alt="" class="brand-logo">
      <span class="brand-name">
        <span class="logo-primary">ACROSIS</span>
        <span class="logo-sub">BEVERAGES</span>
      </span>
    </a>

    <!-- Desktop links -->
    <ul class="nav-links" role="list">
      <li><a href="<?= appUrl('index.php') ?>"    class="nav-link<?= navActive('index')    ?>">Home</a></li>
      <li><a href="<?= appUrl('about.php') ?>"    class="nav-link<?= navActive('about')    ?>">About</a></li>
      <li><a href="<?= appUrl('products.php') ?>" class="nav-link<?= navActive('products') ?>">Products</a></li>
      <li><a href="<?= appUrl('gallery.php') ?>"  class="nav-link<?= navActive('gallery')  ?>">Gallery</a></li>
      <li><a href="<?= appUrl('contact.php') ?>"  class="nav-link<?= navActive('contact')  ?>">Contact</a></li>
    </ul>

    <!-- Hamburger (mobile) -->
    <button class="hamburger" id="hamburger" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileMenu">
      <span></span><span></span><span></span>
    </button>
  </div>

  <!-- Mobile menu drawer -->
  <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <ul role="list">
      <li><a href="<?= appUrl('index.php') ?>"    class="nav-link<?= navActive('index')    ?>">Home</a></li>
      <li><a href="<?= appUrl('about.php') ?>"    class="nav-link<?= navActive('about')    ?>">About</a></li>
      <li><a href="<?= appUrl('products.php') ?>" class="nav-link<?= navActive('products') ?>">Products</a></li>
      <li><a href="<?= appUrl('gallery.php') ?>"  class="nav-link<?= navActive('gallery')  ?>">Gallery</a></li>
      <li><a href="<?= appUrl('contact.php') ?>"  class="nav-link<?= navActive('contact')  ?>">Contact</a></li>
    </ul>
  </div>
</nav>
<!-- end nav -->
