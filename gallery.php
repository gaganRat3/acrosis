<?php
$page_title = 'Gallery | Acrosis Beverages';
$pageTitle = 'Gallery';
require_once 'config/db.php';
require_once 'includes/functions.php';

// Segment filter
$segmentFilter = isset($_GET['segment']) ? (int)$_GET['segment'] : -1;
$segmentLabels = [
    1 => 'Sparkling Water',
    2 => 'Premium Juices',
    3 => 'Premium Soda',
];

if ($segmentFilter >= 1 && $segmentFilter <= 3) {
    $stmt = $conn->prepare("SELECT id, title, image_path, segment FROM gallery_images WHERE segment = ? ORDER BY sort_order ASC, id DESC");
    $stmt->bind_param("i", $segmentFilter);
    $stmt->execute();
    $gallery = $stmt->get_result();
} else {
    $segmentFilter = -1;
    $gallery = $conn->query("SELECT id, title, image_path, segment FROM gallery_images ORDER BY sort_order ASC, id DESC");
}

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Gallery</h1>
            <p class="hero-tagline">A glimpse into the Acrosis journey</p>
            <p class="breadcrumb"><a href="<?= appUrl('index.php') ?>">Home</a> / Gallery</p>
        </div>
    </div>
</section>

<section class="section-pad bg-light">
    <div class="container">
        <!-- Segment Filter Tabs -->
        <div class="gallery-filter-bar">
            <p class="filter-label">Filter by Segment</p>
            <div class="gallery-filters">
                <a href="<?= appUrl('gallery.php') ?>" class="filter-tab<?= ($segmentFilter === -1) ? ' active' : '' ?>">
                    <span class="filter-icon">✦</span> All
                </a>
                <a href="<?= appUrl('gallery.php') ?>?segment=1" class="filter-tab<?= ($segmentFilter === 1) ? ' active' : '' ?>">
                    <span class="filter-icon">💧</span> Sparkling Water
                </a>
                <a href="<?= appUrl('gallery.php') ?>?segment=2" class="filter-tab<?= ($segmentFilter === 2) ? ' active' : '' ?>">
                    <span class="filter-icon">🍹</span> Premium Juices
                </a>
                <a href="<?= appUrl('gallery.php') ?>?segment=3" class="filter-tab<?= ($segmentFilter === 3) ? ' active' : '' ?>">
                    <span class="filter-icon">🥤</span> Premium Soda
                </a>
            </div>
        </div>

        <?php if ($gallery && $gallery->num_rows > 0): ?>
            <div class="gallery-grid">
                <?php while ($image = $gallery->fetch_assoc()): ?>
                    <a
                        href="uploads/gallery/<?= htmlspecialchars($image['image_path'], ENT_QUOTES) ?>"
                        class="gallery-card fade-in"
                        data-lightbox
                    >
                        <img
                            src="uploads/gallery/<?= htmlspecialchars($image['image_path'], ENT_QUOTES) ?>"
                            alt="Gallery Image"
                            loading="lazy"
                        >
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="gallery-empty">
                <h2>Gallery coming soon</h2>
                <p>We are preparing photographs from the Acrosis journey. Please check back soon.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.page-hero {
    position: relative;
    min-height: clamp(360px, 46vh, 520px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: calc(var(--nav-h, 72px) + 3rem) 1rem 3.5rem;
    background: linear-gradient(135deg, #005B8F 0%, #008FC4 58%, #16B8D4 100%);
    text-align: center;
    overflow: hidden;
}
.page-hero-overlay {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 20%, rgba(201,168,76,.14), transparent 42%),
        linear-gradient(180deg, rgba(13,27,42,.35), rgba(13,27,42,.72));
    pointer-events: none;
}
.page-hero::after {
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
}
.page-hero-content {
    position: relative;
    z-index: 1;
    width: min(100%, 850px);
    margin-inline: auto;
    text-align: center;
}
.page-hero-content h1 {
    margin: 0 0 .75rem;
    color: var(--white);
    font-family: var(--font-serif);
    font-size: clamp(2.5rem, 7vw, 4.5rem);
    line-height: 1.1;
}
.hero-tagline {
    margin: 0 auto 1rem;
    color: rgba(255,255,255,.82);
    font-size: clamp(1rem, 2.2vw, 1.25rem);
    line-height: 1.6;
}
.breadcrumb {
    color: rgba(255,255,255,.72);
}
.breadcrumb a {
    color: var(--gold-light);
}
.gallery-filter-bar {
    text-align: center;
    margin-bottom: 2.5rem;
}
.filter-label {
    margin: 0 0 1.2rem;
    font-family: var(--font-serif);
    font-size: 1.15rem;
    color: var(--navy);
    letter-spacing: .02em;
    font-weight: 600;
}
.gallery-filters {
    display: grid;
    grid-template-columns: repeat(5, auto);
    justify-content: center;
    gap: .6rem;
    max-width: 720px;
    margin: 0 auto;
}
.filter-tab {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .4rem;
    white-space: nowrap;
    padding: .6rem 1.3rem;
    border: 1.5px solid #d1d5db;
    border-radius: 8px;
    background: var(--white);
    color: #475569;
    font-weight: 500;
    font-size: .88rem;
    text-decoration: none;
    transition: all .25s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.04);
}
.filter-icon {
    font-size: .95rem;
    line-height: 1;
}
.filter-tab:hover {
    border-color: var(--navy);
    color: var(--navy);
    background: #f0f7ff;
    box-shadow: 0 2px 8px rgba(13,27,42,.08);
    transform: translateY(-1px);
}
.filter-tab.active {
    background: var(--navy);
    color: #fff;
    border-color: var(--navy);
    box-shadow: 0 4px 14px rgba(13,27,42,.2);
    transform: translateY(-1px);
}
@media (max-width: 640px) {
    .gallery-filters {
        grid-template-columns: repeat(2, 1fr);
        gap: .5rem;
        padding: 0 .25rem;
    }
    .gallery-filters .filter-tab:first-child {
        grid-column: 1 / -1;
    }
    .filter-tab {
        padding: .55rem .75rem;
        font-size: .84rem;
    }
    .filter-label {
        font-size: 1.05rem;
        margin-bottom: 1rem;
    }
}
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
}
.gallery-card {
    display: block;
    overflow: hidden;
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: transform var(--ease), box-shadow var(--ease);
}
.gallery-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}
.gallery-card img {
    width: 100%;
    aspect-ratio: 4 / 3;
    object-fit: cover;
}
.gallery-caption {
    display: block;
    padding: .9rem 1rem;
    color: var(--navy);
    font-weight: 600;
}
.gallery-empty {
    max-width: 650px;
    margin: 0 auto;
    padding: 5rem 1.5rem;
    text-align: center;
    background: var(--white);
    border-radius: var(--radius-lg);
}
.gallery-empty h2 {
    margin-bottom: .75rem;
    font-family: var(--font-serif);
    color: var(--navy);
}
.gallery-empty p { color: var(--gray-500); }
@media (max-width: 640px) {
    .page-hero {
        min-height: 330px;
        padding: calc(var(--nav-h, 72px) + 2.5rem) 1rem 2.75rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
