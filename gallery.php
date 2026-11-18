<?php
$page_title = 'Gallery | Acrosis Beverages';
$pageTitle = 'Gallery';
require_once 'config/db.php';
require_once 'includes/functions.php';

$gallery = $conn->query("SELECT id, title, image_path FROM gallery_images ORDER BY sort_order ASC, id DESC");
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
        <?php if ($gallery && $gallery->num_rows > 0): ?>
            <div class="gallery-grid">
                <?php while ($image = $gallery->fetch_assoc()): ?>
                    <a
                        href="uploads/gallery/<?= htmlspecialchars($image['image_path'], ENT_QUOTES) ?>"
                        class="gallery-card fade-in"
                        data-lightbox
                        data-caption="<?= htmlspecialchars($image['title'], ENT_QUOTES) ?>"
                    >
                        <img
                            src="uploads/gallery/<?= htmlspecialchars($image['image_path'], ENT_QUOTES) ?>"
                            alt="<?= htmlspecialchars($image['title'], ENT_QUOTES) ?>"
                            loading="lazy"
                        >
                        <span class="gallery-caption"><?= htmlspecialchars($image['title']) ?></span>
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
