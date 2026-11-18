<?php
$page_title = 'Contact Us | Acrosis Beverages';
$pageTitle  = 'Contact Us | Acrosis Beverages';
require_once 'config/db.php';
require_once 'includes/functions.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['enquiry_type']) || isset($_POST['form_type']))) {
    $type  = sanitize($_POST['enquiry_type'] ?? $_POST['form_type']);
    $name  = sanitize($_POST['name']  ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $city  = sanitize($_POST['city']  ?? '');
    $raw_message = sanitize($_POST['message'] ?? '');
    
    // Collect extra structured fields if submitted
    $extra = [];
    if (!empty($_POST['company_name'])) $extra[] = "Company: " . sanitize($_POST['company_name']);
    if (!empty($_POST['state'])) $extra[] = "State: " . sanitize($_POST['state']);
    if (!empty($_POST['current_brands'])) $extra[] = "Current Brands: " . sanitize($_POST['current_brands']);
    if (!empty($_POST['investment_capacity'])) $extra[] = "Investment Capacity: " . sanitize($_POST['investment_capacity']);
    if (!empty($_POST['position_applied'])) $extra[] = "Position Applied: " . sanitize($_POST['position_applied']);
    if (!empty($_POST['experience'])) $extra[] = "Experience: " . sanitize($_POST['experience']);

    $message = !empty($extra) ? implode(" | ", $extra) . ($raw_message ? "\n\n" . $raw_message : '') : $raw_message;

    $stmt = $conn->prepare("INSERT INTO enquiries (type, name, email, phone, city, message, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $type, $name, $email, $phone, $city, $message);
    if ($stmt->execute()) {
        flashMessage('success', 'Thank you! Your enquiry has been submitted. We will contact you within 24 hours.');
    } else {
        flashMessage('error', 'Something went wrong. Please try again.');
    }
    redirect('contact.php');
}

include 'includes/header.php';
?>

<!-- ═══════════════════════════════ PAGE HERO ═══════════════════════════════ -->
<section class="hero hero-contact">
  <div class="hero-overlay"></div>
  <div class="container hero-content text-center">
    <span class="hero-eyebrow">Connect With Us</span>
    <h1 class="hero-title">Get In Touch</h1>
    <p class="hero-sub">We welcome enquiries for trade distribution, careers, and corporate partnerships.</p>
  </div>
</section>

<!-- ═══════════════════════════════ FLASH MESSAGES ═══════════════════════════════ -->
<div class="container flash-container">
  <?php renderFlash(); ?>
</div>

<!-- ═══════════════════════════════ CONTACT CARDS (3+1 COLUMNS) ═══════════════════════════════ -->
<section class="section-pad bg-white">
  <div class="container">
    <div class="contact-grid" style="grid-template-columns:repeat(2,1fr);">
      <!-- Card 1: Registered Office -->
      <div class="contact-card fade-in">
        <div class="contact-card-icon">🏛️</div>
        <h3>Registered Office</h3>
        <p class="contact-card-text">
          H Tower 401, Shukan 6,<br>
          Sama Savli Road, Vemali,<br>
          Vadodara - 390024,<br>
          Gujarat, India
        </p>
        <div class="contact-card-badge">Corporate HQ &amp; Administration</div>
      </div>

      <!-- Card 2: Unit 01 Factory -->
      <div class="contact-card fade-in">
        <div class="contact-card-icon">🏭</div>
        <h3>Unit 01 — Main Production</h3>
        <p class="contact-card-text">
          90, Shiv Industrial Park,<br>
          Lamdapura, Savli,<br>
          Vadodara - 391775, Gujarat<br>
          <small style="color:#1A6B72;font-weight:600;">PET &amp; Glass Bottle — Sparkling Sweet Water</small>
        </p>
        <div class="contact-card-badge">Plot 13,000 · Shed 10,500 Sq.ft · 100KV</div>
      </div>

      <!-- Card 3: Unit 02 Factory -->
      <div class="contact-card fade-in">
        <div class="contact-card-icon">🏗️</div>
        <h3>Unit 02 — Expansion Unit</h3>
        <p class="contact-card-text">
          Shankar Industrial Park,<br>
          Opp Gate No 1, Manjusar GIDC,<br>
          Savli Road, Vadodara - 391775<br>
          <small style="color:#1A6B72;font-weight:600;">Fruits Flavors Juices — Glass Bottles Packing</small>
        </p>
        <div class="contact-card-badge">Near Manjusar Village, Savli Road</div>
      </div>

      <!-- Card 4: Reach Us -->
      <div class="contact-card fade-in">
        <div class="contact-card-icon">📞</div>
        <h3>Reach Us</h3>
        <div class="contact-reach-list">
          <p>
            <strong>Mobile:</strong><br>
            <a href="tel:+919409833866" class="contact-link">+91-9409833866</a>
          </p>
          <p>
            <strong>Email:</strong><br>
            <a href="mailto:Hello@acrosisbeverages.com" class="contact-link">Hello@acrosisbeverages.com</a>
          </p>
          <p>
            <strong>Web:</strong><br>
            <a href="https://www.acrosisbeverages.com" target="_blank" rel="noopener" class="contact-link">www.acrosisbeverages.com</a> /
            <a href="https://www.acrosisbeverages.in" target="_blank" rel="noopener" class="contact-link">www.acrosisbeverages.in</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ INQUIRY FORMS WITH TABS ═══════════════════════════════ -->
<section class="section-pad bg-light">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-label">Direct Communication</span>
      <h2>Send Us an Enquiry</h2>
      <p class="section-desc">Select the nature of your enquiry below for prompt handling by the responsible department</p>
    </div>

    <div class="enquiry-tabs-wrapper">
      <!-- Tabs Navigation -->
      <div class="tab-buttons" role="tablist">
        <button class="tab-btn active" onclick="openTab(event, 'tab-general')" role="tab" aria-selected="true">
          💬 General Inquiry
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-distributor')" role="tab" aria-selected="false">
          🤝 Distributor Inquiry
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-career')" role="tab" aria-selected="false">
          💼 Career
        </button>
      </div>

      <div class="tab-content-container">
        <!-- TAB 1: General Inquiry -->
        <div id="tab-general" class="tab-pane active" role="tabpanel">
          <form method="POST" action="contact.php" class="styled-form">
            <input type="hidden" name="enquiry_type" value="general">
            <div class="form-grid-2">
              <div class="form-group">
                <label>Full Name <span class="req">*</span></label>
                <input type="text" name="name" placeholder="e.g. Rahul Sharma" required>
              </div>
              <div class="form-group">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" placeholder="e.g. rahul@example.com" required>
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>Phone Number <span class="req">*</span></label>
                <input type="tel" name="phone" placeholder="e.g. +91 9876543210" required>
              </div>
              <div class="form-group">
                <label>City</label>
                <input type="text" name="city" placeholder="e.g. Vadodara">
              </div>
            </div>
            <div class="form-group">
              <label>Message <span class="req">*</span></label>
              <textarea name="message" rows="5" placeholder="Please share details about your inquiry..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Submit General Enquiry →</button>
          </form>
        </div>

        <!-- TAB 2: Distributor Inquiry -->
        <div id="tab-distributor" class="tab-pane" role="tabpanel">
          <form method="POST" action="contact.php" class="styled-form">
            <input type="hidden" name="enquiry_type" value="distributor">
            <div class="form-grid-2">
              <div class="form-group">
                <label>Contact Name <span class="req">*</span></label>
                <input type="text" name="name" placeholder="Full name of representative" required>
              </div>
              <div class="form-group">
                <label>Company / Firm Name <span class="req">*</span></label>
                <input type="text" name="company_name" placeholder="Enterprise or Agency name" required>
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>City <span class="req">*</span></label>
                <input type="text" name="city" placeholder="e.g. Ahmedabad, Surat, Rajkot" required>
              </div>
              <div class="form-group">
                <label>State <span class="req">*</span></label>
                <input type="text" name="state" placeholder="e.g. Gujarat" required>
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>Current Brands Handled</label>
                <input type="text" name="current_brands" placeholder="e.g. Beverage / FMCG brands or None">
              </div>
              <div class="form-group">
                <label>Investment Capacity <span class="req">*</span></label>
                <select name="investment_capacity" required>
                  <option value="">Select Investment Capacity</option>
                  <option value="Below 5L">Below 5L</option>
                  <option value="5-10L">5-10L</option>
                  <option value="10-25L">10-25L</option>
                  <option value="Above 25L">Above 25L</option>
                </select>
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" placeholder="you@business.com" required>
              </div>
              <div class="form-group">
                <label>Phone / Mobile <span class="req">*</span></label>
                <input type="tel" name="phone" placeholder="+91 9876543210" required>
              </div>
            </div>
            <div class="form-group">
              <label>Message / Distribution Area Coverage</label>
              <textarea name="message" rows="4" placeholder="Mention your warehousing capacity, vehicle fleet, and target territory..."></textarea>
            </div>
            <button type="submit" class="btn-submit">Submit Distributor Application →</button>
          </form>
        </div>

        <!-- TAB 3: Career -->
        <div id="tab-career" class="tab-pane" role="tabpanel">
          <form method="POST" action="contact.php" class="styled-form">
            <input type="hidden" name="enquiry_type" value="career">
            <div class="form-grid-2">
              <div class="form-group">
                <label>Candidate Name <span class="req">*</span></label>
                <input type="text" name="name" placeholder="Your full legal name" required>
              </div>
              <div class="form-group">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" placeholder="you@example.com" required>
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>Phone Number <span class="req">*</span></label>
                <input type="tel" name="phone" placeholder="+91 9876543210" required>
              </div>
              <div class="form-group">
                <label>City</label>
                <input type="text" name="city" placeholder="Current residence city">
              </div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label>Position Applied For <span class="req">*</span></label>
                <input type="text" name="position_applied" placeholder="e.g. QC Officer, Machine Operator, Sales Manager" required>
              </div>
              <div class="form-group">
                <label>Experience (Years)</label>
                <input type="text" name="experience" placeholder="e.g. Fresher / 3 Years FMCG">
              </div>
            </div>
            <div class="form-group">
              <label>Message / Profile Summary <span class="req">*</span></label>
              <textarea name="message" rows="4" placeholder="Briefly highlight your technical background, qualifications, and notice period..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Submit Career Application →</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ GOOGLE MAPS SECTION ═══════════════════════════════ -->
<section class="map-wrapper">
  <div class="map-bar">
    <div class="container text-center">
      <h3>Our Locations — Vadodara, Gujarat, India</h3>
      <p style="color:rgba(255,255,255,0.7);font-size:0.9rem;margin-top:0.35rem;">Unit 01: Shiv Industrial Park, Lamdapura, Savli · Unit 02: Shankar Industrial Park, Manjusar GIDC</p>
    </div>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58970.0!2d73.1723!3d22.3119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5873b7a7b0f%3A0xcba33c5c6d395e1b!2sVadodara%2C+Gujarat!5e0!3m2!1sen!2sin!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<style>
/* Contact Page Custom Styles */
.hero-contact {
  background: linear-gradient(135deg, var(--navy, #005B8F) 0%, #00749F 55%, var(--teal, #16B8D4) 100%);
  min-height: clamp(420px, 52vh, 620px);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}
.hero-contact .hero-content {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 900px;
  padding: calc(var(--nav-h) + 3rem) 1.25rem 4rem;
  box-sizing: border-box;
}
.hero-contact .hero-eyebrow {
  display: block;
  margin-bottom: 1rem;
  color: var(--gold, #F4C542);
}
.hero-contact .hero-title {
  margin-bottom: 1.25rem;
  font-size: clamp(2.75rem, 7vw, 5.25rem);
  text-wrap: balance;
}
.hero-contact .hero-sub {
  max-width: 680px;
  margin: 0 auto;
  color: rgba(255,255,255,.82);
  font-size: clamp(1rem, 2vw, 1.2rem);
  line-height: 1.7;
  text-wrap: balance;
}

.flash-container {
  margin-top: 2rem;
}
.flash {
  padding: 1rem 1.5rem;
  border-radius: 8px;
  margin-bottom: 1rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.flash-success {
  background: #d1fae5;
  color: #065f46;
  border: 1px solid #6ee7b7;
}
.flash-error {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fca5a5;
}

/* Contact Cards */
.contact-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}
@media (max-width: 1050px) {
  .contact-grid { gap: 1.25rem; }
}
@media (max-width: 760px) {
  .contact-grid { grid-template-columns: 1fr; }
  .hero-contact { min-height: 390px; }
  .hero-contact .hero-content {
    padding: calc(var(--nav-h) + 2.5rem) 1rem 3rem;
  }
  .hero-contact .hero-title {
    font-size: clamp(2.35rem, 12vw, 4rem);
  }
}
.contact-card {
  background: #fff;
  border: 1px solid #E2E8F0;
  border-radius: 14px;
  padding: 2.25rem 1.75rem;
  text-align: center;
  box-shadow: 0 4px 16px rgba(13,27,42,0.04);
  transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
  display: flex;
  flex-direction: column;
}
.contact-card:hover {
  transform: translateY(-5px);
  border-color: var(--gold, #F4C542);
  box-shadow: 0 14px 30px rgba(13,27,42,0.08);
}
.contact-card-icon { font-size: 2.75rem; margin-bottom: 0.75rem; }
.contact-card h3 {
  font-family: 'Playfair Display', serif;
  font-size: 1.35rem;
  color: var(--navy, #005B8F);
  margin-bottom: 0.85rem;
}
.contact-card-text {
  font-size: 0.92rem;
  color: #475569;
  line-height: 1.7;
  flex: 1;
}
.contact-card-badge {
  display: inline-block;
  margin-top: 1rem;
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--teal, #16B8D4);
  background: #E6F4F5;
  padding: 0.35rem 0.85rem;
  border-radius: 20px;
}
.contact-reach-list {
  text-align: left;
  font-size: 0.9rem;
  color: #475569;
  line-height: 1.6;
}
.contact-reach-list p { margin-bottom: 0.75rem; }
.contact-link {
  color: var(--teal, #16B8D4);
  text-decoration: none;
  font-weight: 500;
  transition: color 0.2s ease;
}
.contact-link:hover {
  color: var(--gold, #F4C542);
  text-decoration: underline;
}

/* Tabs & Form */
.enquiry-tabs-wrapper {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 10px 40px rgba(13,27,42,0.07);
  overflow: hidden;
  max-width: 900px;
  margin: 2.5rem auto 0;
  border: 1px solid #E2E8F0;
}
.section-header {
  max-width: 760px;
  margin-inline: auto;
}
.section-header h2 {
  margin: .35rem 0 .75rem;
  font-family: var(--font-serif);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  line-height: 1.2;
  color: var(--navy, #005B8F);
}
.section-desc {
  max-width: 620px;
  margin-inline: auto;
  color: #475569;
  line-height: 1.7;
}
.tab-buttons {
  display: flex;
  background: var(--navy, #005B8F);
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
@media (max-width: 650px) {
  .tab-buttons { flex-direction: column; }
}
.tab-btn {
  flex: 1;
  padding: 1.25rem 1rem;
  background: transparent;
  color: rgba(255,255,255,0.7);
  border: none;
  border-bottom: 3px solid transparent;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  font-family: 'Inter', sans-serif;
  text-align: center;
}
.tab-btn:hover {
  color: #fff;
  background: rgba(255,255,255,0.05);
}
.tab-btn.active {
  color: var(--gold, #F4C542);
  border-bottom-color: var(--gold, #F4C542);
  background: rgba(201,168,76,0.1);
}
.tab-content-container {
  padding: 2.5rem;
}
@media (max-width: 600px) {
  .tab-content-container { padding: 1.5rem; }
}
.tab-pane {
  display: none;
}
.tab-pane.active {
  display: block;
}

/* Styled Form */
.styled-form .form-grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.25rem;
}
@media (max-width: 650px) {
  .styled-form .form-grid-2 { grid-template-columns: 1fr; gap: 0; }
}
.styled-form .form-group {
  margin-bottom: 1.25rem;
}
.styled-form label {
  display: block;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--navy, #005B8F);
  margin-bottom: 0.45rem;
}
.styled-form .req { color: #dc2626; }
.styled-form input[type="text"],
.styled-form input[type="email"],
.styled-form input[type="tel"],
.styled-form select,
.styled-form textarea {
  width: 100%;
  padding: 0.85rem 1rem;
  border: 1.5px solid #CBD5E1;
  border-radius: 8px;
  font-family: 'Inter', sans-serif;
  font-size: 0.92rem;
  color: #1e293b;
  background: #F8FAFC;
  transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
  box-sizing: border-box;
}
.styled-form input:focus,
.styled-form select:focus,
.styled-form textarea:focus {
  outline: none;
  background: #fff;
  border-color: var(--gold, #F4C542);
  box-shadow: 0 0 0 3px rgba(201,168,76,0.15);
}
.styled-form textarea { resize: vertical; }

.btn-submit {
  width: 100%;
  padding: 1.1rem;
  background: var(--navy, #005B8F);
  color: var(--gold, #F4C542);
  border: 1px solid var(--gold, #F4C542);
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 0.5rem;
  font-family: 'Inter', sans-serif;
  letter-spacing: 0.5px;
}
.btn-submit:hover {
  background: var(--gold, #F4C542);
  color: var(--navy, #005B8F);
  box-shadow: 0 6px 20px rgba(201,168,76,0.3);
}

/* Map */
.map-wrapper {
  position: relative;
  background: var(--navy, #005B8F);
}
.map-bar {
  background: var(--navy, #005B8F);
  padding: 1.25rem 0;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.map-bar h3 {
  font-family: 'Playfair Display', serif;
  color: var(--gold, #F4C542);
  font-size: 1.15rem;
}
.map-wrapper iframe {
  display: block;
}
</style>

<script>
function openTab(evt, tabId) {
  const panes = document.querySelectorAll('.tab-pane');
  panes.forEach(p => p.classList.remove('active'));

  const btns = document.querySelectorAll('.tab-btn');
  btns.forEach(b => {
    b.classList.remove('active');
    b.setAttribute('aria-selected', 'false');
  });

  document.getElementById(tabId).classList.add('active');
  evt.currentTarget.classList.add('active');
  evt.currentTarget.setAttribute('aria-selected', 'true');
}

// Auto-switch tab if url contains ?type=distributor or ?type=career
document.addEventListener('DOMContentLoaded', function() {
  const params = new URLSearchParams(window.location.search);
  const type = params.get('type');
  if (type === 'distributor') {
    const dBtn = document.querySelectorAll('.tab-btn')[1];
    if (dBtn) dBtn.click();
  } else if (type === 'career') {
    const cBtn = document.querySelectorAll('.tab-btn')[2];
    if (cBtn) cBtn.click();
  }
});
</script>

<!-- ═══ JOIN THE ACROSIS FAMILY ═══ -->
<section class="cta-band" style="background:linear-gradient(135deg,#005B8F,#0D1B2A);">
  <div class="container" style="text-align:center;">
    <p class="section-label" style="color:rgba(255,255,255,0.7);">Join The Acrosis Family</p>
    <h2 style="color:#F4C542;font-family:'Playfair Display',serif;font-size:clamp(1.8rem,4vw,2.75rem);margin:0.5rem 0 1rem;">Distributors · Super Stockists · HORECA Partners</h2>
    <p style="color:rgba(255,255,255,0.8);max-width:680px;margin:0 auto 1.5rem;line-height:1.75;">
      We are inviting distributors, super stockists, retailers, and HORECA partners across Gujarat &amp; India to join our journey.
      Be a part of a brand that is going to be India's next big beverage revolution.
      Every bottle of Acrosis goes through <strong style="color:#F4C542;">12 quality checks</strong> — FSSAI &amp; ISO food safety compliant.
    </p>
    <p style="color:#F4C542;font-size:1.25rem;font-weight:700;letter-spacing:1px;">
      📞 Call Now: <a href="tel:+919409833866" style="color:#F4C542;text-decoration:none;">+91-9409833866</a>
    </p>
    <p style="color:rgba(255,255,255,0.6);font-size:0.9rem;margin-top:0.5rem;font-style:italic;">Taste The Premium — Mahadev Har 🙏</p>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
