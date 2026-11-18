<?php
$page_title = 'Our Factory | Acrosis Beverages';
$pageTitle = 'Our Factory';
include 'includes/header.php';
?>

<!-- 1. Page Hero -->
<div class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Our Factory Units</h1>
            <p class="hero-tagline">Two Proposed Food-Grade Production Units — Lamdapura, Savli &amp; Manjusar GIDC, Vadodara</p>
            <p class="breadcrumb"><a href="<?= appUrl('index.php') ?>">Home</a> / Factory</p>
        </div>
    </div>
</div>

<!-- 2. Stats Bar -->
<section class="factory-stats-bar-section">
    <div class="container">
        <div class="stats-bar-grid fade-in">
            <div class="stat-bar-card">
                <div class="sb-icon">📐</div>
                <div class="sb-val text-gold">13,000 <span class="sb-unit">Sq.ft</span></div>
                <div class="sb-label">Plot Area</div>
            </div>
            <div class="stat-bar-card">
                <div class="sb-icon">🏭</div>
                <div class="sb-val text-gold">10,500 <span class="sb-unit">Sq.ft</span></div>
                <div class="sb-label">Production Shed</div>
            </div>
            <div class="stat-bar-card">
                <div class="sb-icon">⚡</div>
                <div class="sb-val text-gold">100 <span class="sb-unit">KV</span></div>
                <div class="sb-label">Power (MGVCL)</div>
            </div>
            <div class="stat-bar-card">
                <div class="sb-icon">⚙️</div>
                <div class="sb-val text-gold">3 <span class="sb-unit">Lines</span></div>
                <div class="sb-label">Production Lines</div>
            </div>
            <div class="stat-bar-card featured-bar-card">
                <div class="sb-icon">💰</div>
                <div class="sb-val text-gold">₹1.25 <span class="sb-unit">Cr</span></div>
                <div class="sb-label">Machinery Investment</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Location Card & Google Map — DUAL UNITS -->
<section class="section-pad bg-white">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Our Proposed Factory Units</span>
            <h2 class="section-title">Two Strategic <span class="text-gold">Industrial Locations</span></h2>
            <p class="section-subtitle">Both units strategically located in Vadodara's prime industrial belt — near Mumbai-Delhi Industrial Corridor, with seamless PAN India logistics</p>
        </div>

        <!-- UNIT 01 -->
        <div class="location-layout-grid fade-in" style="margin-top:2.5rem;">
            <div class="location-card">
                <div class="loc-badge" style="background:#005B8F;color:#F4C542;">Unit 01 — Main Production Unit</div>
                <h3 class="loc-card-title">Fruits Flavors Sparkling Sweet Water</h3>
                <p style="font-size:0.85rem;color:#1A6B72;font-weight:600;margin-bottom:1rem;">PET &amp; Glass Bottle Packing</p>

                <div class="loc-address-group">
                    <div class="loc-item">
                        <div class="loc-icon">📍</div>
                        <div>
                            <strong>Acrosis Beverages Private Limited</strong>
                            <p>90, Shiv Industrial Park, Lamdapura, Savli, Vadodara - 391775</p>
                            <p style="font-size:0.82rem;color:#6B7280;">Nirma Canal Road, Near Manjusar-Alindra, Savli Taluka</p>
                            <span class="loc-meta">Plot 13,000 SQFT · Production Shed 10,500 SQFT · 100KV Power</span>
                        </div>
                    </div>
                    <div class="loc-item">
                        <div class="loc-icon">🏢</div>
                        <div>
                            <strong>Registered Office</strong>
                            <p>H Tower 401, Shukan 6, Sama Savli Road, Vemali, Vadodara - 390024, Gujarat, India</p>
                            <span class="loc-meta">CIN: U11049GJ2026PTC185842</span>
                        </div>
                    </div>
                </div>

                <div class="loc-highlights">
                    <div class="lh-pill">🛣️ Nirma Canal Road, Savli</div>
                    <div class="lh-pill">🚚 Near Mumbai-Delhi Corridor</div>
                    <div class="lh-pill">⚡ 100KV MGVCL Sanctioned</div>
                    <div class="lh-pill">🏭 13,000 Sq.ft Industrial Plot</div>
                </div>
            </div>

            <!-- Google Maps Embed -->
            <div class="map-container-card">
                <div class="map-header">
                    <span>📍 Unit 01: Shiv Industrial Park, Savli</span>
                    <span class="map-status">PET &amp; Glass Unit</span>
                </div>
                <div class="map-iframe-wrap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58970.0!2d73.1723!3d22.3119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5873b7a7b0f%3A0xcba33c5c6d395e1b!2sVadodara%2C+Gujarat!5e0!3m2!1sen!2sin!4v1"
                        width="100%"
                        height="350"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Unit 01 — Shiv Industrial Park, Lamdapura, Savli, Vadodara">
                    </iframe>
                </div>
                <div class="map-footer">
                    <span>Shiv Industrial Park, Lamdapura, Savli — Vadodara, Gujarat - 391775</span>
                </div>
            </div>
        </div>

        <!-- UNIT 02 -->
        <div class="location-layout-grid fade-in" style="margin-top:3rem;">
            <div class="location-card">
                <div class="loc-badge" style="background:#1A6B72;color:#fff;">Unit 02 — Expansion Unit</div>
                <h3 class="loc-card-title">Fruits Flavors Juices</h3>
                <p style="font-size:0.85rem;color:#1A6B72;font-weight:600;margin-bottom:1rem;">Glass Bottles Packing</p>

                <div class="loc-address-group">
                    <div class="loc-item">
                        <div class="loc-icon">📍</div>
                        <div>
                            <strong>Acrosis Beverages Pvt Ltd</strong>
                            <p>Shankar Industrial Park, Opp Gate No 1, Manjusar GIDC, Manjusar, Savli Road, Vadodara - 391775</p>
                            <p style="font-size:0.82rem;color:#6B7280;">Near Manjusar Village, Savli Road</p>
                            <span class="loc-meta">Natural Fruit Juices — Glass Bottle Production</span>
                        </div>
                    </div>
                    <div class="loc-item">
                        <div class="loc-icon">🌐</div>
                        <div>
                            <strong>Contact</strong>
                            <p>+91-9409833866 · Hello@acrosisbeverages.com</p>
                            <p>www.acrosisbeverages.com · www.acrosisbeverages.in</p>
                        </div>
                    </div>
                </div>

                <div class="loc-highlights">
                    <div class="lh-pill">🏭 Manjusar GIDC Zone</div>
                    <div class="lh-pill">🍊 Juice Glass Bottle Unit</div>
                    <div class="lh-pill">🚚 Savli Road Connectivity</div>
                    <div class="lh-pill">📦 Expansion Phase</div>
                </div>
            </div>

            <!-- Google Maps Embed Unit 02 -->
            <div class="map-container-card">
                <div class="map-header">
                    <span>📍 Unit 02: Manjusar GIDC, Vadodara</span>
                    <span class="map-status">Juice Glass Unit</span>
                </div>
                <div class="map-iframe-wrap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58970.0!2d73.2200!3d22.3800!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5b4b8c3e78b%3A0x3e7a9d6c5b4d3e1a!2sManjusar%2C+Gujarat!5e0!3m2!1sen!2sin!4v1"
                        width="100%"
                        height="350"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Unit 02 — Shankar Industrial Park, Manjusar GIDC, Vadodara">
                    </iframe>
                </div>
                <div class="map-footer">
                    <span>Shankar Industrial Park, Manjusar GIDC, Savli Road — Vadodara - 391775</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 4. Infrastructure 4-Card Grid -->
<section class="section-pad bg-light">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Engineering Specifications</span>
            <h2 class="section-title">World-Class <span class="text-gold">Infrastructure</span></h2>
            <p class="section-subtitle">Engineered to conform with the strictest international hygiene and food manufacturing benchmarks</p>
        </div>

        <div class="infra-4card-grid">
            <!-- Card 1: Building -->
            <div class="infra-card fade-in">
                <div class="infra-card-top">
                    <div class="infra-icon-wrap">🏗️</div>
                    <h3 class="infra-title">Building &amp; Structure</h3>
                </div>
                <div class="infra-body">
                    <ul class="infra-specs-list">
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>PEB + RCC Structure</strong>
                                <p>Heavy-duty Pre-Engineered Building structure with 500 sq.ft integrated administrative office block.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>PUF Insulated Roof</strong>
                                <p>High-thermal-resistance sandwich panels ensure constant interior temperature control.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>20–28 ft Clear Height</strong>
                                <p>Exceptional vertical clearance accommodating automated overhead conveyors and blowers.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>Food Grade Epoxy Floor</strong>
                                <p>Anti-bacterial, seamless, chemical-resistant resin floor complying with FSSAI hygiene audits.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 2: Power -->
            <div class="infra-card fade-in">
                <div class="infra-card-top">
                    <div class="infra-icon-wrap">⚡</div>
                    <h3 class="infra-title">Power &amp; Electrical</h3>
                </div>
                <div class="infra-body">
                    <ul class="infra-specs-list">
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>100KV MGVCL Sanction</strong>
                                <p>Dedicated high-tension industrial feeder directly from Madhya Gujarat Vij Company Ltd.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>3-Phase Industrial Power</strong>
                                <p>Engineered busbar distribution powering high-torque compressors and precision bottling units.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>100KVA Transformer</strong>
                                <p>Dedicated on-premises industrial step-down transformer for surge-free operational stability.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>DG Backup Generator</strong>
                                <p>Automatic mains failure diesel generator backup eliminating production disruptions.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 3: Production -->
            <div class="infra-card fade-in">
                <div class="infra-card-top">
                    <div class="infra-icon-wrap">⚙️</div>
                    <h3 class="infra-title">Production Lines</h3>
                </div>
                <div class="infra-body">
                    <ul class="infra-specs-list">
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>PET Blowing Machine</strong>
                                <p>High-efficiency rotary stretch blow molder operating at <strong>6,000 BPH</strong> speed.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>Glass Filling Machine</strong>
                                <p>Precision isobaric volumetric glass filler and crown capper rated at <strong>3,000 BPH</strong>.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>Can Filling Machine</strong>
                                <p>Automated rotary monoblock counter-pressure aluminum can filler at <strong>5,000 BPH</strong>.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>Combined Capacity: 14,000 BPH</strong>
                                <p>Total combined throughput of 14,000 units per hour across all three simultaneous formats.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 4: Water -->
            <div class="infra-card fade-in">
                <div class="infra-card-top">
                    <div class="infra-icon-wrap">💧</div>
                    <h3 class="infra-title">Water Treatment Plant</h3>
                </div>
                <div class="infra-body">
                    <ul class="infra-specs-list">
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>RO + UV + Ozonation</strong>
                                <p>State-of-the-art 3-stage purification ensuring microbial sterility and mineral purity.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>TDS &lt;50 PPM</strong>
                                <p>Total dissolved solids reduced below 50 PPM for supreme crispness and pure flavor clarity.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>pH 7.2 Neutral Balance</strong>
                                <p>Precision alkaline buffer system calibrating water to optimum physiologic neutral pH 7.2.</p>
                            </div>
                        </li>
                        <li>
                            <span class="check-ico">✓</span>
                            <div>
                                <strong>In-House QC Lab</strong>
                                <p>On-site chemical, physical, and microbiological laboratory testing every continuous batch.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Machine Investment HTML Table -->
<section class="section-pad bg-white">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Capital Investment</span>
            <h2 class="section-title">Machinery &amp; Equipment <span class="text-gold">Investment</span></h2>
            <p class="section-subtitle">Capital outlay of ₹1.25 Crore dedicated to high-speed European-grade automated manufacturing</p>
        </div>

        <div class="table-responsive-wrapper fade-in">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Equipment</th>
                        <th>Capacity</th>
                        <th>Investment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>PET Blowing Machine</strong>
                            <div class="table-sub">Automated rotary bottle stretch molder &amp; air conveyor</div>
                        </td>
                        <td><span class="cap-tag">6000 BPH</span></td>
                        <td class="table-price text-gold">Rs 35 Lakh</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Glass Filling Machine</strong>
                            <div class="table-sub">Monoblock rinser, isobaric filler &amp; crown capper</div>
                        </td>
                        <td><span class="cap-tag">3000 BPH</span></td>
                        <td class="table-price text-gold">Rs 30 Lakh</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Can Filling Machine</strong>
                            <div class="table-sub">Rotary counter-pressure filler &amp; automated seamer</div>
                        </td>
                        <td><span class="cap-tag">5000 BPH</span></td>
                        <td class="table-price text-gold">Rs 35 Lakh</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>RO + UV + Ozonation</strong>
                            <div class="table-sub">3-Stage industrial pure water purification treatment plant</div>
                        </td>
                        <td><span class="cap-tag text-muted">—</span></td>
                        <td class="table-price text-gold">Rs 15 Lakh</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Lab Equipment</strong>
                            <div class="table-sub">Spectrophotometer, TDS/pH meters, autoclave &amp; sensory suite</div>
                        </td>
                        <td><span class="cap-tag text-muted">—</span></td>
                        <td class="table-price text-gold">Rs 10 Lakh</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th>—</th>
                        <th class="table-total-price">Rs 1.25 Crore</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<!-- 6. Process Flow with CSS Arrows via ::after -->
<section class="section-pad bg-light">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label">Manufacturing Journey</span>
            <h2 class="section-title">Production <span class="text-gold">Process Flow</span></h2>
            <p class="section-subtitle">The systematic 7-stage quality pathway every Acrosis beverage traverses</p>
        </div>

        <div class="process-flow fade-in">
            <!-- Step 1 -->
            <div class="process-step">
                <div class="pstep-num">01</div>
                <div class="pstep-icon">🌾</div>
                <h4 class="pstep-title">Raw Material</h4>
                <p class="pstep-desc">Inspection of natural flavors, preforms, glass &amp; cans.</p>
            </div>

            <!-- Step 2 -->
            <div class="process-step">
                <div class="pstep-num">02</div>
                <div class="pstep-icon">💧</div>
                <h4 class="pstep-title">Water Treatment</h4>
                <p class="pstep-desc">RO + UV + Ozonation triple purification, TDS &lt;50, pH 7.2.</p>
            </div>

            <!-- Step 3 -->
            <div class="process-step">
                <div class="pstep-num">03</div>
                <div class="pstep-icon">🧪</div>
                <h4 class="pstep-title">Blending</h4>
                <p class="pstep-desc">Precision micro-metered infusion of 144+ natural essences.</p>
            </div>

            <!-- Step 4 -->
            <div class="process-step">
                <div class="pstep-num">04</div>
                <div class="pstep-icon">⚙️</div>
                <h4 class="pstep-title">Production</h4>
                <p class="pstep-desc">Simultaneous automated PET, Glass, and Can bottling lines.</p>
            </div>

            <!-- Step 5 -->
            <div class="process-step pstep-highlight">
                <div class="pstep-num">05</div>
                <div class="pstep-icon">🔬</div>
                <h4 class="pstep-title">QC Lab</h4>
                <p class="pstep-desc">Rigorous microbiological, chemical, and sensory clearance.</p>
            </div>

            <!-- Step 6 -->
            <div class="process-step">
                <div class="pstep-num">06</div>
                <div class="pstep-icon">📦</div>
                <h4 class="pstep-title">Packaging</h4>
                <p class="pstep-desc">Laser QR traceability coding, sealing, carton pack &amp; palletizing.</p>
            </div>

            <!-- Step 7 -->
            <div class="process-step">
                <div class="pstep-num">07</div>
                <div class="pstep-icon">🚚</div>
                <h4 class="pstep-title">Distribution</h4>
                <p class="pstep-desc">Dispatch to 100+ Pan-India distributors via cold-chain.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Green Factory Section -->
<section class="section-pad bg-navy green-factory-section">
    <div class="container">
        <div class="section-header text-center fade-in">
            <span class="section-label" style="color:#F4C542;border-color:#F4C542;">Sustainability</span>
            <h2 class="section-title text-white">Green Factory <span class="text-gold">Commitment</span></h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.75);">Harmonizing high-speed beverage production with environmental stewardship</p>
        </div>

        <div class="green-cards-grid fade-in">
            <!-- 1. Solar Future -->
            <div class="green-card">
                <div class="green-icon">☀️</div>
                <h3 class="green-card-title">Solar Future</h3>
                <p class="green-card-desc">Phase 2 rooftop solar PV installation engineered to supply up to 40% of daytime manufacturing energy requirements, transitioning toward net-zero carbon operations.</p>
                <span class="green-badge green-badge-plan">Target 2028</span>
            </div>

            <!-- 2. PET Recyclable -->
            <div class="green-card">
                <div class="green-icon">♻️</div>
                <h3 class="green-card-title">PET Recyclable</h3>
                <p class="green-card-desc">100% recyclable food-grade PET resin. Partnered with authorized regional recycling aggregators with QR consumer education printed on every single bottle.</p>
                <span class="green-badge green-badge-active">100% Recyclable</span>
            </div>

            <!-- 3. Glass Reusable -->
            <div class="green-card">
                <div class="green-icon">🫙</div>
                <h3 class="green-card-title">Glass Reusable</h3>
                <p class="green-card-desc">Our glass bottles are reusable, non-reactive, and endlessly recyclable without degradation, maintaining supreme freshness with zero chemical leaching.</p>
                <span class="green-badge green-badge-active">Circular Eco-Choice</span>
            </div>

            <!-- 4. Aluminum Recyclable -->
            <div class="green-card">
                <div class="green-icon">🥫</div>
                <h3 class="green-card-title">Aluminum Recyclable</h3>
                <p class="green-card-desc">Aluminum represents the planet's most recycled container material. 75% of all aluminum ever made remains in productive circular use today.</p>
                <span class="green-badge green-badge-active">Infinite Lifecycle</span>
            </div>

            <!-- 5. GPCB Green -->
            <div class="green-card green-highlight-card">
                <div class="green-icon">🌿</div>
                <h3 class="green-card-title">GPCB Green Category</h3>
                <p class="green-card-desc">Certified under Gujarat Pollution Control Board Green Category as a non-polluting facility with zero hazardous chemical discharge and closed-loop wash water recycling.</p>
                <span class="green-badge green-badge-cert">GPCB Certified</span>
            </div>
        </div>
    </div>
</section>

<style>
/* ── Stats Bar Section ──────────────────────────────────────── */
.factory-stats-bar-section {
    background: #005B8F;
    padding: 2rem 0;
    border-bottom: 2px solid rgba(201, 168, 76, 0.3);
}
.stats-bar-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1.25rem;
}
.stat-bar-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 1.5rem 1rem;
    text-align: center;
    transition: transform 0.3s ease, border-color 0.3s ease;
}
.stat-bar-card:hover {
    transform: translateY(-4px);
    border-color: #F4C542;
    background: rgba(201, 168, 76, 0.1);
}
.featured-bar-card {
    background: rgba(201, 168, 76, 0.12);
    border-color: #F4C542;
}
.sb-icon {
    font-size: 1.75rem;
    margin-bottom: 0.5rem;
}
.sb-val {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1.2;
}
.sb-unit {
    font-size: 0.85rem;
    font-family: 'Inter', system-ui, sans-serif;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 400;
}
.sb-label {
    font-size: 0.78rem;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-top: 0.35rem;
}

/* ── Location Grid ──────────────────────────────────────────── */
.location-layout-grid {
    display: grid;
    grid-template-columns: 1fr 1.25fr;
    gap: 2.5rem;
    align-items: stretch;
    margin-top: 2rem;
}
.location-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 2.5rem;
    box-shadow: 0 4px 25px rgba(13, 27, 42, 0.08);
    border-left: 4px solid #F4C542;
    display: flex;
    flex-direction: column;
}
.loc-badge {
    display: inline-block;
    align-self: flex-start;
    background: rgba(201, 168, 76, 0.15);
    color: #C99518;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    margin-bottom: 1rem;
}
.loc-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.45rem;
    color: #005B8F;
    margin-bottom: 1.5rem;
}
.loc-address-group {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
    flex: 1;
}
.loc-item {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}
.loc-icon {
    font-size: 1.75rem;
    flex-shrink: 0;
}
.loc-item strong {
    display: block;
    color: #005B8F;
    font-size: 1rem;
    margin-bottom: 0.25rem;
}
.loc-item p {
    color: #4B5563;
    font-size: 0.9rem;
    line-height: 1.55;
    margin-bottom: 0.25rem;
}
.loc-meta {
    font-size: 0.78rem;
    color: #16B8D4;
    font-weight: 600;
}
.loc-highlights {
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
}
.lh-pill {
    background: #F4F6F8;
    color: #1F2937;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    border: 1px solid #D8DCE0;
}

/* Map Card */
.map-container-card {
    background: #FFFFFF;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 25px rgba(13, 27, 42, 0.08);
    border: 1px solid #EEF0F2;
    display: flex;
    flex-direction: column;
}
.map-header {
    background: #005B8F;
    color: #FFFFFF;
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.88rem;
    font-weight: 600;
}
.map-status {
    background: #16B8D4;
    color: #FFFFFF;
    font-size: 0.75rem;
    padding: 0.2rem 0.6rem;
    border-radius: 15px;
}
.map-iframe-wrap {
    flex: 1;
    min-height: 350px;
}
.map-iframe-wrap iframe {
    width: 100%;
    height: 100%;
    min-height: 350px;
    display: block;
}
.map-footer {
    background: #F4F6F8;
    color: #4B5563;
    font-size: 0.8rem;
    padding: 0.75rem 1.5rem;
    text-align: center;
}

/* ── Infrastructure 4-Card Grid ─────────────────────────────── */
.infra-4card-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
    margin-top: 2.5rem;
}
.infra-card {
    background: #FFFFFF;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 25px rgba(13, 27, 42, 0.08);
    border: 1px solid #EEF0F2;
    transition: transform 0.3s ease;
}
.infra-card:hover {
    transform: translateY(-4px);
}
.infra-card-top {
    background: #005B8F;
    padding: 1.5rem 2rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    border-bottom: 3px solid #F4C542;
}
.infra-icon-wrap {
    font-size: 2.25rem;
}
.infra-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.25rem;
    color: #FFFFFF;
}
.infra-body {
    padding: 2rem;
}
.infra-specs-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}
.infra-specs-list li {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}
.check-ico {
    color: #F4C542;
    font-weight: 700;
    font-size: 1.1rem;
    flex-shrink: 0;
    margin-top: 2px;
}
.infra-specs-list strong {
    display: block;
    color: #005B8F;
    font-size: 0.95rem;
    margin-bottom: 0.2rem;
}
.infra-specs-list p {
    color: #6B7280;
    font-size: 0.86rem;
    line-height: 1.5;
    margin: 0;
}

/* ── Data Table Styling ─────────────────────────────────────── */
.table-responsive-wrapper {
    overflow-x: auto;
    margin-top: 2rem;
    box-shadow: 0 4px 30px rgba(13, 27, 42, 0.08);
    border-radius: 14px;
}
.data-table {
    width: 100%;
    border-collapse: collapse;
    background: #FFFFFF;
    text-align: left;
    font-family: 'Inter', system-ui, sans-serif;
}
.data-table thead th {
    background: #005B8F;
    color: #F4C542;
    padding: 1.25rem 1.75rem;
    font-size: 0.88rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border-bottom: 3px solid #F4C542;
}
.data-table tbody tr {
    border-bottom: 1px solid #EEF0F2;
    transition: background 0.2s ease;
}
.data-table tbody tr:hover {
    background: rgba(201, 168, 76, 0.05);
}
.data-table tbody td {
    padding: 1.25rem 1.75rem;
    color: #1F2937;
    font-size: 0.95rem;
    vertical-align: middle;
}
.table-sub {
    font-size: 0.8rem;
    color: #6B7280;
    margin-top: 0.25rem;
}
.cap-tag {
    background: #F4F6F8;
    color: #005B8F;
    font-weight: 600;
    padding: 0.35rem 0.85rem;
    border-radius: 15px;
    font-size: 0.85rem;
    border: 1px solid #D8DCE0;
}
.table-price {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.15rem;
    font-weight: 700;
}
.data-table tfoot th {
    background: #005B8F;
    color: #FFFFFF;
    padding: 1.4rem 1.75rem;
    font-size: 1.1rem;
    font-weight: 700;
    border-top: 3px solid #F4C542;
}
.table-total-price {
    color: #F4C542 !important;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.4rem !important;
    font-weight: 700;
}

/* ── Process Flow with CSS Arrows ───────────────────────────── */
.process-flow {
    display: flex;
    align-items: stretch;
    justify-content: space-between;
    gap: 1.5rem;
    margin-top: 2.5rem;
    position: relative;
}
.process-step {
    flex: 1;
    position: relative;
    background: #FFFFFF;
    border: 1px solid #D8DCE0;
    border-radius: 14px;
    padding: 2rem 1rem 1.75rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(13, 27, 42, 0.06);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.process-step:hover {
    transform: translateY(-5px);
    border-color: #F4C542;
    box-shadow: 0 8px 30px rgba(201, 168, 76, 0.2);
}
.process-step:not(:last-child)::after {
    content: '➔';
    position: absolute;
    right: -1.15rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.35rem;
    color: #F4C542;
    font-weight: 700;
    z-index: 2;
}
.pstep-highlight {
    background: #005B8F;
    color: #FFFFFF;
    border-color: #F4C542;
}
.pstep-highlight .pstep-title {
    color: #F4C542;
}
.pstep-highlight .pstep-desc {
    color: rgba(255, 255, 255, 0.8);
}
.pstep-num {
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    color: #F4C542;
    margin-bottom: 0.5rem;
}
.pstep-icon {
    font-size: 2rem;
    margin-bottom: 0.75rem;
}
.pstep-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.05rem;
    color: #005B8F;
    margin-bottom: 0.5rem;
    font-weight: 700;
}
.pstep-desc {
    font-size: 0.78rem;
    color: #6B7280;
    line-height: 1.45;
}

/* ── Green Factory Section ──────────────────────────────────── */
.green-factory-section {
    background: #005B8F;
}
.green-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.75rem;
    margin-top: 2.5rem;
}
.green-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 14px;
    padding: 2.25rem 1.75rem;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}
.green-card:hover {
    background: rgba(201, 168, 76, 0.08);
    border-color: #F4C542;
    transform: translateY(-4px);
}
.green-highlight-card {
    grid-column: span 2;
    background: rgba(26, 107, 114, 0.18);
    border-color: #16B8D4;
}
.green-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}
.green-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.25rem;
    color: #FFFFFF;
    margin-bottom: 0.75rem;
}
.green-card-desc {
    color: rgba(255, 255, 255, 0.75);
    font-size: 0.9rem;
    line-height: 1.65;
    margin-bottom: 1.5rem;
    flex: 1;
}
.green-badge {
    align-self: flex-start;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.35rem 0.9rem;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.green-badge-plan { background: rgba(201, 168, 76, 0.2); color: #FFE28A; }
.green-badge-active { background: rgba(34, 197, 94, 0.2); color: #4ADE80; }
.green-badge-cert { background: rgba(26, 107, 114, 0.4); color: #5EEAD4; }

/* ── Responsive Media Queries ───────────────────────────────── */
@media (max-width: 1200px) {
    .stats-bar-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    .process-flow {
        flex-wrap: wrap;
        gap: 1.75rem;
    }
    .process-step {
        flex: 1 1 calc(33.333% - 1.75rem);
        min-width: 180px;
    }
    .process-step:not(:last-child)::after {
        display: none;
    }
}
@media (max-width: 992px) {
    .location-layout-grid {
        grid-template-columns: 1fr;
    }
    .infra-4card-grid {
        grid-template-columns: 1fr;
    }
    .green-cards-grid {
        grid-template-columns: 1fr;
    }
    .green-highlight-card {
        grid-column: span 1;
    }
}
@media (max-width: 768px) {
    .stats-bar-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .process-flow {
        flex-direction: column;
    }
    .process-step {
        width: 100%;
    }
}
@media (max-width: 480px) {
    .stats-bar-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include 'includes/footer.php'; ?>