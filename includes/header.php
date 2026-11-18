<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

// Determine active page for nav highlighting
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
function navActive(string $page): string {
    global $currentPage;
    return $currentPage === $page ? ' active' : '';
}

// Allow pages to set $pageTitle before including header
$siteName = getSetting('site_name', 'Acrosis Beverages Pvt Ltd');
$siteTagline = getSetting('tagline', 'Purity · Refreshment · Excellence');
$pageTitle = isset($pageTitle) ? $pageTitle . ' — ' . $siteName : $siteName . ' | ' . $siteTagline;
$pageDescriptions = [
    'index' => $siteName . ' creates premium sparkling water, natural juices, and soda with purity, refreshment, and excellence.',
    'about' => 'Learn about ' . $siteName . ', our vision, leadership, and commitment to premium Indian beverages.',
    'products' => 'Explore ' . $siteName . ' premium sparkling water, natural juices, and soda across three beverage segments.',
    'factory' => 'Discover ' . $siteName . ' production units, food-grade facilities, and proposed export-quality juice operations.',
    'quality' => 'See how ' . $siteName . ' maintains purity through water treatment, quality checks, and food-safety processes.',
    'gallery' => 'View the ' . $siteName . ' gallery and explore our brand, products, and production journey.',
    'contact' => 'Contact ' . $siteName . ' for distribution, careers, partnerships, and general enquiries.',
];
$pageDescription = $pageDescription ?? ($pageDescriptions[$currentPage] ?? $pageDescriptions['index']);
$canonicalPath = $currentPage === 'index' ? '' : $currentPage . '.php';
$canonicalUrl = siteUrl($canonicalPath);
$socialImage = siteUrl('assets/images/acrosis_logo_transparent.png');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES) ?>">
  <meta name="theme-color" content="#005B8F">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= htmlspecialchars($siteName, ENT_QUOTES) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($socialImage, ENT_QUOTES) ?>">
  <meta property="og:locale" content="en_IN">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($socialImage, ENT_QUOTES) ?>">
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

<a class="skip-link" href="#main-content">Skip to main content</a>

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
      <li><a href="<?= appUrl('factory.php') ?>"  class="nav-link<?= navActive('factory')  ?>">Factory</a></li>
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
      <li><a href="<?= appUrl('factory.php') ?>"  class="nav-link<?= navActive('factory')  ?>">Factory</a></li>
      <li><a href="<?= appUrl('gallery.php') ?>"  class="nav-link<?= navActive('gallery')  ?>">Gallery</a></li>
      <li><a href="<?= appUrl('contact.php') ?>"  class="nav-link<?= navActive('contact')  ?>">Contact</a></li>
    </ul>
  </div>
</nav>
<!-- end nav -->

<main id="main-content">
