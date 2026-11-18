<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Premium Indian Beverages | Purity · Refreshment · Excellence';
include __DIR__ . '/includes/header.php';
?>

<!-- ══════════════════════════════════════════════════════════════════════════
     HERO SECTION
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="hero hero-image" id="hero" aria-label="Acrosis Beverages">
  <div class="hero-image-frame">
    <img
      src="<?= appUrl('assets/images/landing main.png') ?>"
      alt="Acrosis Beverages — Taste The Premium"
      class="hero-image-asset"
    >
  </div>

  <div class="hero-image-actions">
    <a href="<?= appUrl('contact.php') ?>" class="btn btn-primary">Contact Us</a>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     STATS BAR
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="stats-bar" aria-label="Company highlights">
  <div class="container">
    <div class="stats-grid">

      <div class="stat-item">
        <div class="stat-number text-gold">
          <span data-count="144">0</span>+
        </div>
        <div class="stat-label">Flavours</div>
      </div>

      <div class="stat-item">
        <div class="stat-number text-gold">2</div>
        <div class="stat-label">Factory Units</div>
      </div>

      <div class="stat-item">
        <div class="stat-number text-gold">
          <span data-count="13000">0</span>
        </div>
        <div class="stat-label">Sq.ft Factory</div>
      </div>

      <div class="stat-item">
        <div class="stat-number text-gold">2026</div>
        <div class="stat-label">Est. Gujarat, India</div>
      </div>

    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     3 PRODUCT SEGMENTS
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="section-pad bg-light" id="segments" aria-labelledby="seg-heading">
  <div class="container">
    <div class="text-center">
      <p class="section-label">Our Portfolio</p>
      <h2 class="section-title" id="seg-heading">Three Premium Segments</h2>
      <p class="section-subtitle">
        Crafted for every occasion — from hydration to celebration.
        Each product is formulated with the finest ingredients and stringent quality checks.
      </p>
    </div>

    <div class="segments-grid">

      <!-- Segment 1: Sparkling Sweet Water -->
      <article class="segment-card fade-in">
        <div class="segment-card-top">
          <div class="segment-icon" aria-hidden="true">💧</div>
          <h3 class="segment-title">Sparkling Sweet Water</h3>
          <span class="segment-container">PET &amp; Glass Bottles</span>
        </div>
        <div class="segment-card-body">
          <p class="segment-desc">
            Fruit-flavored sparkling sweet water — 8-stage purified through Ozonation, UV treatment
            and mineral balancing. Available in 144 natural flavors. No artificial colors, no compromise.
            Tastes like Himalayan spring.
          </p>
          <div class="segment-meta">
            <span class="meta-tag">250 ml</span>
            <span class="meta-tag">500 ml</span>
            <span class="meta-tag">1 L</span>
            <span class="meta-tag">PET &amp; Glass</span>
          </div>
          <a href="<?= appUrl('products.php?segment=1') ?>" class="btn btn-outline btn-sm" style="margin-top:1rem;">Explore Flavors</a>
        </div>
      </article>

      <!-- Segment 2: Natural Fruit Juices Glass -->
      <article class="segment-card fade-in delay-2">
        <div class="segment-card-top">
          <div class="segment-icon" aria-hidden="true">🍊</div>
          <h3 class="segment-title">Natural Fruit Juices</h3>
          <span class="segment-container">Glass Bottles</span>
        </div>
        <div class="segment-card-body">
          <p class="segment-desc">
            100% natural fruit juices — Apple, Mixed Fruit, Guava, Pomegranate and more.
            No preservatives, no artificial colors. Sealed in premium glass bottles to
            preserve farm-fresh taste from orchard to table.
          </p>
          <div class="segment-meta">
            <span class="meta-tag">200 ml</span>
            <span class="meta-tag">300 ml</span>
            <span class="meta-tag">500 ml</span>
            <span class="meta-tag">Glass</span>
          </div>
          <a href="<?= appUrl('products.php?segment=2') ?>" class="btn btn-outline btn-sm" style="margin-top:1rem;">Explore Juices</a>
        </div>
      </article>

      <!-- Segment 3: Premium Soda & Mocktails -->
      <article class="segment-card fade-in delay-3">
        <div class="segment-card-top">
          <div class="segment-icon" aria-hidden="true">🥤</div>
          <h3 class="segment-title">Premium Soda &amp; Mocktails</h3>
          <span class="segment-container">HORECA &amp; Retail</span>
        </div>
        <div class="segment-card-body">
          <p class="segment-desc">
            Bold, effervescent premium sodas and mocktails crafted for Hotels, Restaurants,
            Cafes and modern retail — 144 exotic flavor combinations, from classic Cola to
            Kala Khatta, Mojito, and beyond.
          </p>
          <div class="segment-meta">
            <span class="meta-tag">HORECA</span>
            <span class="meta-tag">144 Flavors</span>
            <span class="meta-tag">Premium</span>
          </div>
          <a href="<?= appUrl('products.php?segment=3') ?>" class="btn btn-outline btn-sm" style="margin-top:1rem;">Explore Soda</a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     TAGLINE BAND
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="tagline-section" aria-label="Brand tagline">
  <p class="tagline-text fade-in">Purity &nbsp;|&nbsp; Refreshment &nbsp;|&nbsp; Excellence</p>
  <p class="tagline-sub fade-in delay-1">The Acrosis Promise — bottled in Gujarat, loved across India</p>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     WHY ACROSIS — 6 PILLARS
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="section-pad bg-white" id="why" aria-labelledby="why-heading">
  <div class="container">
    <div class="text-center">
      <p class="section-label">Why Choose Us</p>
      <h2 class="section-title" id="why-heading">The Acrosis Difference</h2>
      <p class="section-subtitle">
        Six core principles guide every decision we make — from sourcing raw materials
        to delivering the final product to your shelf.
      </p>
    </div>

    <div class="pillar-grid" style="margin-top:3rem;">

      <div class="pillar-card fade-in">
        <div class="pillar-icon" aria-hidden="true">🫧</div>
        <h3 class="pillar-title">Purity</h3>
        <p class="pillar-desc">
          8-stage purification — Ozonation + UV + Mineral Balance. Tastes like Himalayan spring.
          Every batch FSSAI tested. Zero harmful chemicals, pure natural fruit flavors only.
        </p>
      </div>

      <div class="pillar-card fade-in delay-1">
        <div class="pillar-icon" aria-hidden="true">❄️</div>
        <h3 class="pillar-title">Refreshment</h3>
        <p class="pillar-desc">
          Perfectly calibrated carbonation levels and flavour profiles designed
          to deliver a satisfying, invigorating experience every single time.
        </p>
      </div>

      <div class="pillar-card fade-in delay-2">
        <div class="pillar-icon" aria-hidden="true">🏆</div>
        <h3 class="pillar-title">Excellence</h3>
        <p class="pillar-desc">
          FSSAI Central License holder with a 13,000 sq.ft state-of-the-art
          facility in Gujarat. We set standards, not just meet them.
        </p>
      </div>

      <div class="pillar-card fade-in delay-3">
        <div class="pillar-icon" aria-hidden="true">🌱</div>
        <h3 class="pillar-title">Sustainability</h3>
        <p class="pillar-desc">
          GPCB-compliant operations, eco-responsible packaging targets, and
          water conservation at our manufacturing core. Good for you and the planet.
        </p>
      </div>

      <div class="pillar-card fade-in delay-4">
        <div class="pillar-icon" aria-hidden="true">🔍</div>
        <h3 class="pillar-title">Traceability</h3>
        <p class="pillar-desc">
          Full batch traceability from raw ingredient sourcing through production
          to distribution. Every bottle carries a verifiable quality story.
        </p>
      </div>

      <div class="pillar-card fade-in delay-5">
        <div class="pillar-icon" aria-hidden="true">🤝</div>
        <h3 class="pillar-title">Made In Vadodara</h3>
        <p class="pillar-desc">
          Supporting Vocal For Local &amp; Atmanirbhar Bharat. Creating employment in Savli &amp;
          Manjusar, supporting local farmers, and empowering youth — Made In Vadodara, Made For Bharat.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     TRUST & COMPLIANCE SECTION
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="section-pad bg-navy" id="trust" aria-labelledby="trust-heading">
  <div class="container">
    <div class="text-center">
      <p class="section-label">Credentials & Compliance</p>
      <h2 class="section-title text-white" id="trust-heading">Built on Trust</h2>
      <p class="section-subtitle" style="color:rgba(255,255,255,.6);">
        Acrosis Beverages is fully licensed, certified, and compliant with all
        statutory requirements — so you can drink with confidence.
      </p>
    </div>

    <div class="trust-grid">

      <div class="trust-item fade-in">
        <div class="trust-item-icon" aria-hidden="true">📋</div>
        <div class="trust-item-content">
          <strong>FSSAI Central License</strong>
          <p>Certified by the Food Safety and Standards Authority of India at the central level — the highest tier of food safety certification.</p>
        </div>
      </div>

      <div class="trust-item fade-in delay-1">
        <div class="trust-item-icon" aria-hidden="true">🌿</div>
        <div class="trust-item-content">
          <strong>GPCB Approved</strong>
          <p>Gujarat Pollution Control Board compliant manufacturing. We operate within stringent environmental norms for water, effluent, and air quality.</p>
        </div>
      </div>

      <div class="trust-item fade-in delay-2">
        <div class="trust-item-icon" aria-hidden="true">🏛️</div>
        <div class="trust-item-content">
          <strong>RoC Gujarat Registered</strong>
          <p>Incorporated under the Ministry of Corporate Affairs, Registrar of Companies, Gujarat. CIN: U11049GJ2026PTC185842.</p>
        </div>
      </div>

      <div class="trust-item fade-in delay-3">
        <div class="trust-item-icon" aria-hidden="true">🏦</div>
        <div class="trust-item-content">
          <strong>Bankers Support</strong>
          <p>Supported by trusted banking partners to ensure stable and transparent financial operations.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     CTA SECTION
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="cta-band" id="cta" aria-labelledby="cta-heading">
  <div class="container">
    <p class="section-label" style="color:rgba(255,255,255,.7);">Partner With Us</p>
    <h2 class="section-title" id="cta-heading" style="color:var(--white);">Ready to Bring Acrosis to Your Region?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.75);">
      We are actively expanding our distribution network across Gujarat and India.
      Join us and offer your customers a truly premium beverage experience.
    </p>
    <div class="cta-actions">
      <a href="<?= appUrl('contact.php?type=distributor') ?>" class="btn btn-primary">Become a Distributor</a>
      <a href="<?= appUrl('contact.php') ?>" class="btn btn-outline-white">Contact Us</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
