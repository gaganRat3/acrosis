<?php
$page_title = 'Our Products | Acrosis Beverages';
$pageTitle = 'Our Products';
require_once 'config/db.php';
require_once 'includes/functions.php';
include 'includes/header.php';
?>

<!-- 1. Page Hero -->
<div class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Our Products</h1>
            <p class="hero-tagline">144 Natural Flavors Across 3 Premium Segments</p>
            <p class="breadcrumb"><a href="<?= appUrl('index.php') ?>">Home</a> / Products</p>
        </div>
    </div>
</div>

<!-- 2. JS Filter Tabs -->
<section class="filter-bar-section">
    <div class="container">
        <div class="filter-tabs">
            <button class="filter-btn active" data-filter="all" aria-pressed="true">All Products</button>
            <button class="filter-btn" data-filter="pet" aria-pressed="false">🫧 Sparkling Water (PET)</button>
            <button class="filter-btn" data-filter="glass" aria-pressed="false">🥤 Premium Juices (Glass)</button>
            <button class="filter-btn" data-filter="can" aria-pressed="false">🥫 Soda Cans (Aluminum)</button>
        </div>
    </div>
</section>

<!-- 3. Three Segment Sections -->

<!-- Segment 1: Sparkling Sweet Water (PET) -->
<div class="segment-section" data-segment="pet" id="segment-pet">
    <div class="container">
        <div class="segment-card fade-in">
            <div class="segment-header">
                <div class="segment-badge-wrap">
                    <span class="segment-num">Segment 01</span>
                    <span class="segment-tag pet-tag">Food-Grade PET</span>
                </div>
                <h2 class="segment-title">Sparkling Sweet Water <span class="text-gold">(PET Bottle)</span></h2>
                <p class="segment-lead">Experience bubbly, crisp effervescence combined with the unmatched purity of triple-purified water and natural fruit aromatics. Ultra-low mineral TDS &lt;50 and a balanced pH 7.2 make this India's cleanest sparkling refreshment.</p>
            </div>

            <div class="segment-grid">
                <!-- Specifications Column -->
                <div class="segment-spec-col">
                    <h3 class="spec-heading">Product Specifications</h3>
                    <ul class="spec-list">
                        <li>
                            <span class="spec-k">Sugar Content</span>
                            <span class="spec-v text-teal font-semibold">Low Sugar</span>
                        </li>
                        <li>
                            <span class="spec-k">Water Quality</span>
                            <span class="spec-v">TDS &lt;50 PPM</span>
                        </li>
                        <li>
                            <span class="spec-k">Purification</span>
                            <span class="spec-v">RO + UV + Ozonation</span>
                        </li>
                        <li>
                            <span class="spec-k">pH Level</span>
                            <span class="spec-v">7.2 (Neutral Balanced)</span>
                        </li>
                        <li>
                            <span class="spec-k">Available Sizes</span>
                            <span class="spec-v">250ml / 500ml / 1000ml</span>
                        </li>
                    </ul>

                    <!-- Badges -->
                    <div class="badge-group">
                        <span class="badge badge-teal">Low Sugar</span>
                        <span class="badge badge-navy">Triple Purified</span>
                        <span class="badge badge-gold">pH Balanced</span>
                    </div>

                    <!-- Size options -->
                    <div class="sizes-row">
                        <span class="size-label">Select Pack:</span>
                        <span class="size-pill active">250 ml</span>
                        <span class="size-pill">500 ml</span>
                        <span class="size-pill">1000 ml</span>
                    </div>
                </div>

                <!-- 12 Flavor Chips Column -->
                <div class="segment-flavor-col">
                    <h3 class="spec-heading">Featured Flavors <span class="flavor-count">(12 of 144+ Varieties)</span></h3>
                    <p class="flavor-desc">Natural infusions crafted from authentic botanical and fruit extracts:</p>
                    <div class="flavor-chips-grid">
                        <span class="flavor-chip">🌿 Natural</span>
                        <span class="flavor-chip">🍋 Lemon</span>
                        <span class="flavor-chip">🍊 Orange</span>
                        <span class="flavor-chip">🍓 Strawberry</span>
                        <span class="flavor-chip">🥭 Mango</span>
                        <span class="flavor-chip">🌱 Mint</span>
                        <span class="flavor-chip">🍍 Pineapple</span>
                        <span class="flavor-chip">🍈 Guava</span>
                        <span class="flavor-chip">🍒 Litchi</span>
                        <span class="flavor-chip">🥝 Kiwi</span>
                        <span class="flavor-chip">🌹 Rose</span>
                        <span class="flavor-chip">🌈 Mixed Fruit</span>
                    </div>
                    <div class="flavor-more-box">
                        <span class="more-badge">+132 More Custom Flavors</span>
                        <p class="more-text">India's largest flavor portfolio with zero direct competitors nationwide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Segment 2: Premium Juices (Glass Bottle) -->
<div class="segment-section bg-light" data-segment="glass" id="segment-glass">
    <div class="container">
        <div class="segment-card fade-in">
            <div class="segment-header">
                <div class="segment-badge-wrap">
                    <span class="segment-num">Segment 02</span>
                    <span class="segment-tag glass-tag">Flint Glass Bottle</span>
                </div>
                <h2 class="segment-title">Premium Juices <span class="text-gold">(Glass Bottle)</span></h2>
                <p class="segment-lead">Handcrafted from 100% natural fruit concentrates with zero preservatives. Preserved in recyclable glass bottles to lock in orchard-fresh aroma, micro-nutrients, and rich authentic taste from farm to bottle.</p>
            </div>

            <div class="segment-grid">
                <!-- Specifications Column -->
                <div class="segment-spec-col">
                    <h3 class="spec-heading">Product Specifications</h3>
                    <ul class="spec-list">
                        <li>
                            <span class="spec-k">Ingredients</span>
                            <span class="spec-v text-teal font-semibold">100% Natural</span>
                        </li>
                        <li>
                            <span class="spec-k">Preservatives</span>
                            <span class="spec-v">No Preservatives</span>
                        </li>
                        <li>
                            <span class="spec-k">Sourcing Origin</span>
                            <span class="spec-v">Farm-to-Bottle</span>
                        </li>
                        <li>
                            <span class="spec-k">Flavor Spectrum</span>
                            <span class="spec-v">144 Flavors</span>
                        </li>
                        <li>
                            <span class="spec-k">Available Sizes</span>
                            <span class="spec-v">250ml / 500ml / 1000ml</span>
                        </li>
                    </ul>

                    <!-- Badges -->
                    <div class="badge-group">
                        <span class="badge badge-teal">100% Natural</span>
                        <span class="badge badge-navy">No Preservatives</span>
                        <span class="badge badge-gold">Glass Bottle</span>
                    </div>

                    <!-- Size options -->
                    <div class="sizes-row">
                        <span class="size-label">Select Pack:</span>
                        <span class="size-pill active">250 ml</span>
                        <span class="size-pill">500 ml</span>
                        <span class="size-pill">1000 ml</span>
                    </div>
                </div>

                <!-- Flavors Column -->
                <div class="segment-flavor-col">
                    <h3 class="spec-heading">Signature Flavors</h3>
                    <p class="flavor-desc">Pure fruit extracts bottled in pristine, sterile glass packaging:</p>
                    <div class="flavor-chips-grid">
                        <span class="flavor-chip">🥭 Mango</span>
                        <span class="flavor-chip">🍊 Orange</span>
                        <span class="flavor-chip">🍒 Litchi</span>
                        <span class="flavor-chip">🥝 Kiwi</span>
                        <span class="flavor-chip">🍈 Guava</span>
                        <span class="flavor-chip">🌈 Mix Fruit</span>
                        <span class="flavor-chip">🥤 Cola</span>
                        <span class="flavor-chip">🌿 Jeera</span>
                        <span class="flavor-chip">🌶️ Masala</span>
                    </div>
                    <div class="flavor-more-box">
                        <span class="more-badge">+135 More Custom Flavors</span>
                        <p class="more-text">From tropical exotic blends to regional Indian classics, crafted to perfection.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Segment 3: Premium Soda Cans (Aluminum) -->
<div class="segment-section" data-segment="can" id="segment-can">
    <div class="container">
        <div class="segment-card fade-in">
            <div class="segment-header">
                <div class="segment-badge-wrap">
                    <span class="segment-num">Segment 03</span>
                    <span class="segment-tag can-tag">Infinitely Recyclable Aluminum</span>
                </div>
                <h2 class="segment-title">Premium Soda Cans <span class="text-gold">(Aluminum)</span></h2>
                <p class="segment-lead">Modern, chilled, and endlessly recyclable. Our high-carbonation sparkling soda cans deliver intense refreshment with an ultra-satisfying fizz, packed in sleek aluminum designed for active on-the-go lifestyle.</p>
            </div>

            <div class="segment-grid">
                <!-- Specifications Column -->
                <div class="segment-spec-col">
                    <h3 class="spec-heading">Product Specifications</h3>
                    <ul class="spec-list">
                        <li>
                            <span class="spec-k">Beverage Type</span>
                            <span class="spec-v text-teal font-semibold">Sparkling Soda</span>
                        </li>
                        <li>
                            <span class="spec-k">Flavor Diversity</span>
                            <span class="spec-v">144 Flavors</span>
                        </li>
                        <li>
                            <span class="spec-k">Packaging Material</span>
                            <span class="spec-v">Aluminum Can</span>
                        </li>
                        <li>
                            <span class="spec-k">Recyclability</span>
                            <span class="spec-v">100% Infinite Recyclable</span>
                        </li>
                        <li>
                            <span class="spec-k">Available Sizes</span>
                            <span class="spec-v">250ml / 330ml / 500ml</span>
                        </li>
                    </ul>

                    <!-- Badges -->
                    <div class="badge-group">
                        <span class="badge badge-navy">Aluminum Can</span>
                        <span class="badge badge-teal">Recyclable</span>
                        <span class="badge badge-gold">Premium Sparkling</span>
                    </div>

                    <!-- Size options -->
                    <div class="sizes-row">
                        <span class="size-label">Select Pack:</span>
                        <span class="size-pill active">250 ml</span>
                        <span class="size-pill">330 ml</span>
                        <span class="size-pill">500 ml</span>
                    </div>
                </div>

                <!-- Flavors Column -->
                <div class="segment-flavor-col">
                    <h3 class="spec-heading">Signature Flavors</h3>
                    <p class="flavor-desc">Sparkling soda explosions with high fizz retention:</p>
                    <div class="flavor-chips-grid">
                        <span class="flavor-chip">🥤 Cola</span>
                        <span class="flavor-chip">🍊 Orange</span>
                        <span class="flavor-chip">🍋 Lemon</span>
                        <span class="flavor-chip">🌶️ Masala Soda</span>
                        <span class="flavor-chip">🌿 Jeera Soda</span>
                    </div>
                    <div class="flavor-more-box">
                        <span class="more-badge">+139 More Custom Flavors</span>
                        <p class="more-text">Chilled perfection in convenient, lightweight, eco-friendly aluminum cans.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dynamic Products from DB -->
<?php
if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    $result = $conn->query("SELECT * FROM products ORDER BY segment, sort_order ASC");
    if ($result && $result->num_rows > 0) {
        echo '<section class="section-pad bg-light dynamic-catalog-section">';
        echo '<div class="container">';
        echo '<div class="section-header text-center fade-in">';
        echo '<span class="section-label">Live Inventory</span>';
        echo '<h2 class="section-title">Database <span class="text-gold">Catalog</span></h2>';
        echo '<p class="section-subtitle">Real-time products fetched directly from our master inventory</p>';
        echo '</div>';
        echo '<div class="products-grid">';
        while ($row = $result->fetch_assoc()) {
            $segName = 'PET Sparkling Water';
            $segSlug = 'pet';
            if ($row['segment'] == 2) { $segName = 'Glass Premium Juice'; $segSlug = 'glass'; }
            else if ($row['segment'] == 3) { $segName = 'Aluminum Soda Can'; $segSlug = 'can'; }

            $imageHtml = '';
            if (!empty($row['image_path'])) {
                $imageHtml = '<div class="prod-card-thumb"><img src="uploads/products/' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['name']) . '"></div>';
            } else {
                $icon = ($row['segment'] == 1 ? '🫧' : ($row['segment'] == 2 ? '🥤' : '🥫'));
                $imageHtml = '<div class="prod-card-thumb placeholder-thumb"><span>' . $icon . '</span></div>';
            }

            echo '<div class="product-card fade-in" data-segment="' . $segSlug . '">';
            echo $imageHtml;
            echo '<div class="prod-card-content">';
            echo '<span class="prod-segment-badge seg-' . $segSlug . '">' . htmlspecialchars($segName) . '</span>';
            echo '<h3 class="prod-card-title">' . htmlspecialchars($row['name']) . '</h3>';
            if (!empty($row['description'])) {
                echo '<p class="prod-card-desc">' . htmlspecialchars($row['description']) . '</p>';
            }
            if (!empty($row['sizes'])) {
                echo '<div class="prod-card-sizes"><strong>Sizes:</strong> ' . htmlspecialchars($row['sizes']) . '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div>'; // .products-grid
        echo '</div>'; // .container
        echo '</section>';
    }
}
?>

<style>
/* ── Products Page Styles ────────────────────────────────────── */
.hero-tagline {
    font-size: 1.15rem;
    color: #FFE28A;
    font-weight: 500;
    margin-bottom: 0.85rem;
    letter-spacing: 0.02em;
}

/* ── Filter Bar ─────────────────────────────────────────────── */
.filter-bar-section {
    background: #005B8F;
    padding: 1.25rem 0;
    position: sticky;
    top: var(--nav-h, 72px);
    z-index: 50;
    border-bottom: 1px solid rgba(201, 168, 76, 0.3);
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.25);
}
.filter-tabs {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0.75rem;
}
.filter-btn {
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.85);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 30px;
    padding: 0.65rem 1.6rem;
    font-family: 'Inter', system-ui, sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}
.filter-btn:hover,
.filter-btn.active {
    background: #F4C542;
    color: #005B8F;
    border-color: #F4C542;
    box-shadow: 0 4px 15px rgba(201, 168, 76, 0.35);
}

/* ── Segment Section Card ────────────────────────────────────── */
.segment-section {
    padding: 4.5rem 0;
}
.segment-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 3rem 2.5rem;
    box-shadow: 0 4px 30px rgba(13, 27, 42, 0.06);
    border-top: 4px solid #F4C542;
}
.segment-header {
    border-bottom: 2px solid #EEF0F2;
    padding-bottom: 2rem;
    margin-bottom: 2.5rem;
}
.segment-badge-wrap {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.85rem;
}
.segment-num {
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #F4C542;
}
.segment-tag {
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.pet-tag { background: #E0F2FE; color: #0284C7; }
.glass-tag { background: #FEF3C7; color: #D97706; }
.can-tag { background: #F1F5F9; color: #475569; }

.segment-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(1.8rem, 3.5vw, 2.5rem);
    color: #005B8F;
    margin-bottom: 0.85rem;
}
.segment-lead {
    font-size: 1.05rem;
    color: #4B5563;
    line-height: 1.7;
    max-width: 800px;
    margin-bottom: 1.5rem;
}
.segment-price-box {
    display: inline-flex;
    align-items: baseline;
    gap: 0.75rem;
    background: #005B8F;
    padding: 0.75rem 1.5rem;
    border-radius: 30px;
}
.price-from {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.85rem;
}
.price-val {
    color: #F4C542;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.8rem;
    font-weight: 700;
}
.price-segment {
    color: #FFE28A;
    font-size: 0.8rem;
    font-weight: 600;
}

/* ── Segment Grid ───────────────────────────────────────────── */
.segment-grid {
    display: grid;
    grid-template-columns: 1fr 1.25fr;
    gap: 3.5rem;
}
.spec-heading {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.35rem;
    color: #005B8F;
    margin-bottom: 1.25rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #F4C542;
    display: inline-block;
}
.spec-list {
    list-style: none;
    margin-bottom: 1.75rem;
}
.spec-list li {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem 0;
    border-bottom: 1px solid #EEF0F2;
    font-size: 0.92rem;
}
.spec-k {
    color: #6B7280;
}
.spec-v {
    font-weight: 600;
    color: #005B8F;
}

/* Badges */
.badge-group {
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
    margin-bottom: 1.75rem;
}
.badge {
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.03em;
}
.badge-teal { background: rgba(26, 107, 114, 0.12); color: #16B8D4; }
.badge-navy { background: rgba(13, 27, 42, 0.1); color: #005B8F; }
.badge-gold { background: rgba(201, 168, 76, 0.15); color: #C99518; }

/* Sizes Row */
.sizes-row {
    display: flex;
    align-items: center;
    gap: 0.6rem;
}
.size-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #4B5563;
}
.size-pill {
    background: #F4F6F8;
    color: #1F2937;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    border: 1px solid #D8DCE0;
    cursor: pointer;
    transition: all 0.2s ease;
}
.size-pill.active,
.size-pill:hover {
    background: #005B8F;
    color: #F4C542;
    border-color: #005B8F;
}

/* Flavor Chips Grid */
.flavor-desc {
    color: #6B7280;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}
.flavor-chips-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.75rem;
    margin-bottom: 1.75rem;
}
.flavor-chip {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #F4F6F8;
    color: #005B8F;
    padding: 0.75rem 0.9rem;
    border-radius: 10px;
    font-size: 0.88rem;
    font-weight: 600;
    border: 1px solid #E5E7EB;
    transition: all 0.25s ease;
    text-align: center;
}
.flavor-chip:hover {
    background: #FFFFFF;
    border-color: #F4C542;
    box-shadow: 0 4px 15px rgba(201, 168, 76, 0.2);
    transform: translateY(-2px);
}
.flavor-more-box {
    background: #005B8F;
    color: #FFFFFF;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
}
.more-badge {
    background: #F4C542;
    color: #005B8F;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    white-space: nowrap;
}
.more-text {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    line-height: 1.45;
}

/* ── Products Grid (Dynamic DB) ─────────────────────────────── */
.dynamic-catalog-section {
    padding: 5rem 0;
}
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2.5rem;
}
.product-card {
    background: #FFFFFF;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.08);
    border: 1px solid #EEF0F2;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}
.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(13, 27, 42, 0.14);
}
.prod-card-thumb {
    height: 190px;
    background: #F4F6F8;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.prod-card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.placeholder-thumb span {
    font-size: 4rem;
}
.prod-card-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.prod-segment-badge {
    display: inline-block;
    align-self: flex-start;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 0.25rem 0.65rem;
    border-radius: 12px;
    margin-bottom: 0.75rem;
}
.seg-pet { background: #E0F2FE; color: #0284C7; }
.seg-glass { background: #FEF3C7; color: #D97706; }
.seg-can { background: #F1F5F9; color: #475569; }
.prod-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.2rem;
    color: #005B8F;
    margin-bottom: 0.5rem;
}
.prod-card-desc {
    font-size: 0.88rem;
    color: #6B7280;
    line-height: 1.6;
    margin-bottom: 1rem;
    flex: 1;
}
.prod-card-sizes {
    font-size: 0.8rem;
    color: #1F2937;
    border-top: 1px solid #F3F4F6;
    padding-top: 0.75rem;
}

/* ── Responsive Queries ─────────────────────────────────────── */
@media (max-width: 992px) {
    .segment-grid {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    .flavor-chips-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    .qr-steps-container {
        flex-direction: column;
    }
    .qr-arrow-sep {
        transform: rotate(90deg);
        margin: 0.5rem 0;
    }
    .qr-card-step {
        width: 100%;
    }
}
@media (max-width: 640px) {
    .flavor-chips-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .segment-card {
        padding: 2rem 1.5rem;
    }
    .flavor-more-box {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<!-- 6. Inline Tab Filter JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const segmentSections = document.querySelectorAll('.segment-section');
    const productCards = document.querySelectorAll('.product-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Toggle active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterBtns.forEach(b => b.setAttribute('aria-pressed', b === this ? 'true' : 'false'));

            // Filter main segment sections
            segmentSections.forEach(section => {
                const seg = section.getAttribute('data-segment');
                if (filter === 'all' || seg === filter) {
                    section.style.display = 'block';
                    setTimeout(() => { section.style.opacity = '1'; }, 20);
                } else {
                    section.style.display = 'none';
                    section.style.opacity = '0';
                }
            });

            // Filter dynamic product cards if present
            productCards.forEach(card => {
                const seg = card.getAttribute('data-segment');
                if (filter === 'all' || seg === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });

            // If a specific segment was clicked, smooth scroll to it
            if (filter !== 'all') {
                const targetEl = document.getElementById('segment-' + filter);
                if (targetEl) {
                    const navH = 80;
                    const topPos = targetEl.getBoundingClientRect().top + window.pageYOffset - navH;
                    window.scrollTo({ top: topPos, behavior: 'smooth' });
                }
            }
        });
    });

    // Size pill selector toggle within each card
    document.querySelectorAll('.sizes-row').forEach(row => {
        const pills = row.querySelectorAll('.size-pill');
        pills.forEach(pill => {
            pill.addEventListener('click', function() {
                pills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>