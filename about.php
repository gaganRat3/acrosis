<?php
$page_title = 'About Us | Acrosis Beverages';
$pageTitle = 'About Us';
include 'includes/header.php';
$registeredAddress = getSetting('address', 'H Tower 401, Shukan 6, Sama Savli Road, Vemali, Vadodara - 390024');
?>

<!-- 1. Page Hero -->
<div class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>About Us</h1>
            <p class="breadcrumb"><a href="<?= appUrl('index.php') ?>">Home</a> / About Us</p>
        </div>
    </div>
</div>

<!-- 2. Our Story -->
<section class="section-pad bg-white">
    <div class="container">
        <div class="story-grid">
            <div class="story-left fade-in">
                <span class="section-label">Our Story</span>
                <h2 class="section-title">Where Science Meets Taste — <span class="text-gold">Born In Vadodara, Made For Bharat</span></h2>
                <p class="story-lead">We are not just another beverage company. We are <strong>Acrosis</strong> — where <em>"Acro"</em> means <strong>peak / premium</strong> and <em>"Sis"</em> means <strong>sisterhood of taste &amp; trust</strong>. Together, Acrosis stands for India's most premium, trusted beverage experience.</p>
                <p>Founded by <strong>Hitenkumar Upendrakumar Jha</strong>, a passionate entrepreneur and 30-year engineering veteran from Vadodara, Acrosis started with one simple question: <em>Why should premium taste be only for foreign brands?</em></p>
                <p>With years of research in beverage formulation, food technology, and deep market understanding, we set up our base in <strong>Vadodara — The Cultural Capital &amp; Industrial Hub of Gujarat</strong> — strategically located near the Mumbai-Delhi Industrial Corridor, with access to the best fruits, the best water, and the best talent.</p>
                <p>Today, we operate from <strong>two proposed state-of-the-art factory units</strong> — ready to serve PAN India and global export markets in UAE, USA, and UK. Our mission: craft <strong>144 exotic natural flavors</strong> — from Alphonso Mango to Blue Curacao, from Kala Khatta to Kiwi — in fruit-flavored sparkling sweet water and natural fruit juices.</p>
                <div class="story-pillars">
                    <span class="pillar-tag">✓ 8-Stage Water Purification</span>
                    <span class="pillar-tag">✓ 100% Natural, No Preservatives</span>
                    <span class="pillar-tag">✓ 144 Exotic Natural Flavors</span>
                    <span class="pillar-tag">✓ FSSAI &amp; ISO Compliant</span>
                    <span class="pillar-tag">✓ Vocal For Local — Made In Vadodara</span>
                </div>
            </div>
            <div class="story-right fade-in">
                <div class="stat-boxes-grid">
                    <div class="stat-box">
                        <div class="stat-box-icon">📜</div>
                        <div class="stat-box-label">CIN (Corporate Identity)</div>
                        <div class="stat-box-val text-gold">U11049GJ2026PTC185842</div>
                        <div class="stat-box-sub">Registrar of Companies (RoC Gujarat)</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-box-icon">📅</div>
                        <div class="stat-box-label">Incorporated</div>
                        <div class="stat-box-val text-gold">Year 2026</div>
                        <div class="stat-box-sub">Companies Act, 2013 — Private Limited</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-box-icon">🏢</div>
                        <div class="stat-box-label">Registered Office</div>
                        <div class="stat-box-val">Vadodara, Gujarat</div>
                        <div class="stat-box-sub"><?= htmlspecialchars($registeredAddress, ENT_QUOTES) ?></div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-box-icon">🏭</div>
                        <div class="stat-box-label">Factory Units</div>
                        <div class="stat-box-val">2 Proposed Units</div>
                        <div class="stat-box-sub">Lamdapura Savli · Manjusar GIDC — Vadodara</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Leadership / Promoters -->
<section class="section-pad bg-light">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Leadership</span>
            <h2 class="section-title">The Promoters Behind <span class="text-gold">Acrosis</span></h2>
            <p class="section-subtitle">A synergy of 30 years of engineering prowess and visionary healthcare leadership</p>
        </div>
        <div class="leadership-grid">
            <!-- Card 1: Hitenkumar Upendrakumar Jha -->
            <div class="leader-card fade-in">
                <div class="avatar">H</div>
                <div class="leader-designation">CEO &amp; Chairman</div>
                <h3 class="leader-name">Hitenkumar Upendrakumar Jha</h3>
                <div class="leader-badge-grid">
                    <span class="l-badge">BE Engineer</span>
                    <span class="l-badge">30 Years Exp</span>
                    <span class="l-badge">DIN: 06816609</span>
                    <span class="l-badge highlight">65% Stake</span>
                </div>
                <p class="leader-bio">A seasoned technocrat with three decades of engineering and project execution leadership, Hitenkumar spearheads Acrosis Beverages with industrial precision. From spearheading the ₹1.25 Crore automated machinery setup to designing the 10,500 sq.ft food-grade facility, his engineering philosophy ensures that every bottling line achieves optimum efficiency and uncompromised microbiological purity.</p>
                <div class="stake-container">
                    <div class="stake-label-wrap">
                        <span>Equity Stake</span>
                        <strong>65%</strong>
                    </div>
                    <div class="stake-track">
                        <div class="stake-bar gold-bar" style="width: 65%;"></div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Archna Jha -->
            <div class="leader-card fade-in">
                <div class="avatar">A</div>
                <div class="leader-designation">Co-Director &amp; MD Healthcare Expert</div>
                <h3 class="leader-name">Archna Jha</h3>
                <div class="leader-badge-grid">
                    <span class="l-badge">Physiotherapist</span>
                    <span class="l-badge">MD Healthcare Expert</span>
                    <span class="l-badge">Wellness Champion</span>
                    <span class="l-badge highlight">35% Stake</span>
                </div>
                <p class="leader-bio">Bringing deep medical, wellness, and health science domain expertise, Archna Jha anchors Acrosis's steadfast focus on consumer health. As a Physiotherapist and healthcare professional, she oversees our raw material sourcing standards, ensuring zero harmful chemicals, strict nutritional balance, neutral pH 7.2 water, and pure natural fruit extracts across our 144+ beverage portfolio.</p>
                <div class="stake-container">
                    <div class="stake-label-wrap">
                        <span>Equity Stake</span>
                        <strong>35%</strong>
                    </div>
                    <div class="stake-track">
                        <div class="stake-bar teal-bar" style="width: 35%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Company Timeline -->
<section class="section-pad bg-white">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Milestones</span>
            <h2 class="section-title">Company <span class="text-gold">Timeline</span></h2>
            <p class="section-subtitle">Our journey from inception to becoming India's premier beverage powerhouse and global exporter</p>
        </div>
        <div class="timeline">
            <!-- Item 1: Nov 2026 -->
            <div class="timeline-item timeline-left fade-in">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <span class="timeline-year text-gold">Nov 2026</span>
                    <h4 class="timeline-title">Company Incorporated</h4>
                    <p class="timeline-desc">Acrosis Beverages Private Limited incorporated under RoC Gujarat with Corporate Identity Number <strong>CIN: U11049GJ2026PTC185842</strong>. Registered office established at Vadodara, Gujarat.</p>
                </div>
            </div>

            <!-- Item 2: Nov 2026 -->
            <div class="timeline-item timeline-right fade-in">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <span class="timeline-year text-gold">Nov 2026</span>
                    <h4 class="timeline-title">Factory Acquired</h4>
                    <p class="timeline-desc">Acquired 13,000 sq.ft industrial plot at 90, Shiv Industrial Park, Lamdapura, Savli, Vadodara. Commenced 10,500 sq.ft food-grade PEB production shed construction with 100KV MGVCL industrial power sanction.</p>
                </div>
            </div>

            <!-- Item 3: 2027 -->
            <div class="timeline-item timeline-left fade-in">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <span class="timeline-year text-gold">2027</span>
                    <h4 class="timeline-title">3 Production Lines Launch</h4>
                    <p class="timeline-desc">Commissioning of ₹1.25 Cr automated machinery across 3 high-speed production lines: PET Blowing &amp; Filling (6,000 BPH), Glass Bottle Line (3,000 BPH), and Aluminum Can Line (5,000 BPH) with triple water purification plant.</p>
                </div>
            </div>

            <!-- Item 4: 2028 -->
            <div class="timeline-item timeline-right fade-in">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <span class="timeline-year text-gold">2028</span>
                    <h4 class="timeline-title">100 Distributors Pan India</h4>
                    <p class="timeline-desc">Rapid retail scaling with 100 active exclusive distributors spanning key consumption markets in Gujarat, Maharashtra, Rajasthan, Madhya Pradesh, and Delhi NCR.</p>
                </div>
            </div>

            <!-- Item 5: 2030 -->
            <div class="timeline-item timeline-left fade-in">
                <div class="timeline-marker milestone"></div>
                <div class="timeline-content milestone-box">
                    <span class="timeline-year text-gold">2030</span>
                    <h4 class="timeline-title">India's No.1 Premium Beverage Brand</h4>
                    <p class="timeline-desc">Attaining peak national leadership with 300+ distributors across India, ubiquitous supermarket and HoReCa presence, and over 144 natural flavor varieties available nationwide.</p>
                </div>
            </div>

            <!-- Item 6: 2032 -->
            <div class="timeline-item timeline-right fade-in">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <span class="timeline-year text-gold">2032</span>
                    <h4 class="timeline-title">Global Expansion — UAE, USA, UK</h4>
                    <p class="timeline-desc">Launching international export operations across key global markets including UAE (Middle East), the United States, and the United Kingdom, bringing authentic Indian premium beverages to the world.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Mission Vision Values -->
<section class="section-pad bg-light">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Core Philosophy</span>
            <h2 class="section-title">Mission, Vision &amp; <span class="text-gold">Values</span></h2>
            <p class="section-subtitle">The guiding principles that inspire every beverage crafted in our facility</p>
        </div>
        <div class="mvv-grid">
            <!-- Mission -->
            <div class="mvv-card fade-in">
                <div class="mvv-icon">🎯</div>
                <h3 class="mvv-title">Our Mission</h3>
                <ul style="font-size:0.9rem;line-height:1.75;color:#4B5563;text-align:left;padding-left:1.1rem;margin:0;">
                    <li>Craft <strong>100% safe, FSSAI compliant</strong> sparkling &amp; juice beverages with natural fruit flavors.</li>
                    <li>Build <strong>sustainable, automated, food-grade factories</strong> — 20-28 ft PEB RCC roof, epoxy flooring, 100KV power.</li>
                    <li>Create <strong>employment in Savli &amp; Manjusar</strong> — support local farmers &amp; youth.</li>
                    <li>Deliver <em>Taste The Premium</em> at an <strong>affordable, accessible price</strong> for every Indian.</li>
                </ul>
            </div>
            <!-- Vision -->
            <div class="mvv-card mvv-highlight fade-in">
                <div class="mvv-icon">🏆</div>
                <h3 class="mvv-title">Our Vision</h3>
                <p>To become <strong>India's Most Loved Premium Beverage Brand</strong> — Known for purity, innovation, and 144 natural flavors — Available in every Indian's hand — From Kirana to 5-Star — From Vadodara to Dubai.</p>
                <p style="margin-top:0.75rem;font-size:0.85rem;opacity:0.85;">Pan India by 2030 · 300 Distributors · Export to UAE, USA, UK · Listed Company Future.</p>
            </div>
            <!-- Values -->
            <div class="mvv-card fade-in">
                <div class="mvv-icon">💎</div>
                <h3 class="mvv-title">Our Values</h3>
                <p><strong>Purity</strong> — No compromise on quality. <strong>Refreshment</strong> — 144 natural flavors for every mood. <strong>Excellence</strong> — FSSAI &amp; ISO food safety standards. <strong>Sustainability</strong> — Vocal For Local, farmer support, Atmanirbhar Bharat. <strong>Transparency</strong> — 12 quality checks on every bottle.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Certifications -->
<section class="section-pad bg-white">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Trust &amp; Compliance</span>
            <h2 class="section-title">Regulatory <span class="text-gold">Certifications</span></h2>
            <p class="section-subtitle">Fully licensed and compliant with national regulatory authorities</p>
        </div>
        <div class="certifications-row fade-in">
            <div class="cert-badge-item">
                <div class="cert-icon">🏛️</div>
                <div class="cert-title">FSSAI Central License</div>
                <div class="cert-meta">Food Safety &amp; Standards Authority of India</div>
            </div>
            <div class="cert-badge-item">
                <div class="cert-icon">🌿</div>
                <div class="cert-title">GPCB Green Category</div>
                <div class="cert-meta">Gujarat Pollution Control Board Non-Polluting</div>
            </div>
            <div class="cert-badge-item">
                <div class="cert-icon">📜</div>
                <div class="cert-title">RoC Gujarat</div>
                <div class="cert-meta">Govt of India Ministry of Corporate Affairs</div>
            </div>
            <div class="cert-badge-item">
                <div class="cert-icon">✅</div>
                <div class="cert-title">Food Grade Compliance</div>
                <div class="cert-meta">IS / ISO Compliant Packaging &amp; Epoxy Floors</div>
            </div>
        </div>
    </div>
</section>

<style>
/* ── Page Hero Styles ────────────────────────────────────────── */
.page-hero {
    position: relative;
    background: linear-gradient(135deg, #005B8F 0%, #008FC4 60%, #16B8D4 100%);
    padding: calc(var(--nav-h, 72px) + 3.5rem) 0 3.5rem;
    text-align: center;
    overflow: hidden;
}
.page-hero-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(13,27,42,0.65) 0%, rgba(13,27,42,0.92) 100%);
    pointer-events: none;
}
.page-hero-content {
    position: relative;
    z-index: 2;
}
.page-hero-content h1 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(2.2rem, 5vw, 3.5rem);
    font-weight: 700;
    color: #FFFFFF;
    margin-bottom: 0.75rem;
    letter-spacing: -0.01em;
}
.breadcrumb {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.7);
    font-family: 'Inter', system-ui, sans-serif;
}
.breadcrumb a {
    color: #F4C542;
    transition: color 0.2s ease;
}
.breadcrumb a:hover {
    color: #FFE28A;
    text-decoration: underline;
}

/* ── Story Grid ─────────────────────────────────────────────── */
.story-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 3.5rem;
    align-items: center;
}
.story-lead {
    font-size: 1.125rem;
    color: #1F2937;
    line-height: 1.75;
    margin-bottom: 1rem;
}
.story-left p {
    color: #4B5563;
    line-height: 1.75;
    margin-bottom: 1.25rem;
}
.story-pillars {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin-top: 1.5rem;
}
.pillar-tag {
    background: #F4F6F8;
    color: #16B8D4;
    padding: 0.5rem 1rem;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 600;
    border: 1px solid rgba(26, 107, 114, 0.2);
}
.stat-boxes-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}
.stat-box {
    background: #005B8F;
    color: #FFFFFF;
    border-radius: 12px;
    padding: 1.6rem 1.25rem;
    border-bottom: 3px solid #F4C542;
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.stat-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(13, 27, 42, 0.2);
}
.stat-box-icon {
    font-size: 1.75rem;
    margin-bottom: 0.6rem;
}
.stat-box-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 0.4rem;
}
.stat-box-val {
    font-size: 1.05rem;
    font-weight: 700;
    line-height: 1.35;
    word-break: break-word;
    margin-bottom: 0.35rem;
}
.stat-box-sub {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.4;
}

/* ── Leadership / Promoters ─────────────────────────────────── */
.leadership-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2.5rem;
    margin-top: 2.5rem;
}
.leader-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 3rem 2.25rem 2.5rem;
    text-align: center;
    box-shadow: 0 4px 25px rgba(13, 27, 42, 0.08);
    border-top: 4px solid #F4C542;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.leader-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(13, 27, 42, 0.14);
}
.avatar {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    background: linear-gradient(135deg, #F4C542, #FFE28A);
    color: #005B8F;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.25rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 20px rgba(201, 168, 76, 0.4);
    border: 3px solid #005B8F;
    margin: 0 auto 1.5rem;
}
.leader-designation {
    display: inline-block;
    background: rgba(201, 168, 76, 0.12);
    color: #C99518;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 0.35rem 1rem;
    border-radius: 20px;
    margin-bottom: 0.75rem;
}
.leader-name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.45rem;
    color: #005B8F;
    margin-bottom: 1.25rem;
}
.leader-badge-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}
.l-badge {
    background: #F4F6F8;
    color: #1F2937;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 0.35rem 0.8rem;
    border-radius: 15px;
    border: 1px solid #D8DCE0;
}
.l-badge.highlight {
    background: #005B8F;
    color: #F4C542;
    border-color: #005B8F;
}
.leader-bio {
    font-size: 0.925rem;
    color: #4B5563;
    line-height: 1.7;
    margin-bottom: 1.75rem;
    text-align: left;
}
.stake-container {
    background: #F4F6F8;
    padding: 1rem 1.25rem;
    border-radius: 10px;
}
.stake-label-wrap {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    color: #1F2937;
    margin-bottom: 0.5rem;
}
.stake-track {
    height: 8px;
    background: #D8DCE0;
    border-radius: 10px;
    overflow: hidden;
}
.stake-bar {
    height: 100%;
    border-radius: 10px;
}
.gold-bar { background: #F4C542; }
.teal-bar { background: #16B8D4; }

/* ── Company Timeline ───────────────────────────────────────── */
.timeline {
    position: relative;
    max-width: 900px;
    margin: 3.5rem auto 0;
    padding: 1rem 0;
}
.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #F4C542, #16B8D4);
    transform: translateX(-50%);
}
.timeline-item {
    position: relative;
    width: 50%;
    padding: 1rem 2.5rem 2.5rem;
    box-sizing: border-box;
}
.timeline-left {
    left: 0;
    text-align: right;
}
.timeline-right {
    left: 50%;
    text-align: left;
}
.timeline-marker {
    position: absolute;
    top: 1.4rem;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #F4C542;
    border: 3px solid #FFFFFF;
    box-shadow: 0 0 0 3px #F4C542;
    z-index: 2;
}
.timeline-left .timeline-marker {
    right: -8px;
}
.timeline-right .timeline-marker {
    left: -8px;
}
.timeline-marker.milestone {
    width: 22px;
    height: 22px;
    box-shadow: 0 0 0 4px #F4C542, 0 0 15px rgba(201,168,76,0.6);
}
.timeline-left .timeline-marker.milestone { right: -11px; }
.timeline-right .timeline-marker.milestone { left: -11px; }

.timeline-content {
    background: #FFFFFF;
    border-radius: 12px;
    padding: 1.5rem 1.75rem;
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.08);
    border-top: 3px solid #F4C542;
    transition: transform 0.3s ease;
}
.timeline-content:hover {
    transform: translateY(-3px);
}
.timeline-content.milestone-box {
    background: #005B8F;
    color: #FFFFFF;
    border-top-color: #F4C542;
}
.timeline-content.milestone-box .timeline-title {
    color: #FFFFFF;
}
.timeline-content.milestone-box .timeline-desc {
    color: rgba(255, 255, 255, 0.85);
}
.timeline-year {
    display: inline-block;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 0.35rem;
}
.timeline-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.15rem;
    color: #005B8F;
    margin-bottom: 0.5rem;
}
.timeline-desc {
    font-size: 0.9rem;
    color: #4B5563;
    line-height: 1.6;
}

/* ── Mission, Vision & Values ───────────────────────────────── */
.mvv-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-top: 2.5rem;
}
.mvv-card {
    background: #FFFFFF;
    border-radius: 14px;
    padding: 2.25rem 1.75rem;
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.08);
    border-top: 4px solid #D8DCE0;
    transition: transform 0.3s ease, border-color 0.3s ease;
}
.mvv-card:hover {
    transform: translateY(-5px);
    border-top-color: #F4C542;
}
.mvv-highlight {
    background: #005B8F;
    color: #FFFFFF;
    border-top-color: #F4C542;
}
.mvv-highlight .mvv-title {
    color: #F4C542;
}
.mvv-highlight p {
    color: rgba(255, 255, 255, 0.85);
}
.mvv-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}
.mvv-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.35rem;
    color: #005B8F;
    margin-bottom: 0.85rem;
}
.mvv-card p {
    font-size: 0.92rem;
    line-height: 1.7;
    color: #4B5563;
}

/* ── Certifications Row ─────────────────────────────────────── */
.certifications-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-top: 2.5rem;
}
.cert-badge-item {
    background: #F4F6F8;
    border: 1px solid #D8DCE0;
    border-radius: 14px;
    padding: 1.75rem 1.25rem;
    text-align: center;
    transition: transform 0.3s ease, border-color 0.3s ease;
}
.cert-badge-item:hover {
    transform: translateY(-4px);
    border-color: #F4C542;
    background: #FFFFFF;
    box-shadow: 0 6px 20px rgba(201, 168, 76, 0.15);
}
.cert-icon {
    font-size: 2.25rem;
    margin-bottom: 0.85rem;
}
.cert-title {
    font-weight: 700;
    color: #005B8F;
    font-size: 0.95rem;
    margin-bottom: 0.35rem;
}
.cert-meta {
    font-size: 0.78rem;
    color: #6B7280;
    line-height: 1.4;
}

/* ── Responsive Queries ─────────────────────────────────────── */
@media (max-width: 992px) {
    .story-grid {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    .leadership-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    .mvv-grid {
        grid-template-columns: 1fr;
    }
    .certifications-row {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 768px) {
    .timeline::before {
        left: 20px;
    }
    .timeline-item {
        width: 100%;
        padding-left: 50px;
        padding-right: 10px;
    }
    .timeline-left, .timeline-right {
        left: 0;
        text-align: left;
    }
    .timeline-left .timeline-marker, .timeline-right .timeline-marker {
        left: 11px;
        right: auto;
    }
    .timeline-left .timeline-marker.milestone, .timeline-right .timeline-marker.milestone {
        left: 8px;
        right: auto;
    }
    .stat-boxes-grid {
        grid-template-columns: 1fr;
    }
    .certifications-row {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include 'includes/footer.php'; ?>