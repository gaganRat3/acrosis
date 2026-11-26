# Acrosis Beverages - Project Context

This file is a quick reference for future development sessions. Read it before inspecting the whole project. Verify the affected source file before making changes.

## Project overview

- **Application:** Acrosis Beverages Pvt Ltd company website and admin CMS.
- **Stack:** Procedural PHP, MySQL/MariaDB, HTML, CSS, vanilla JavaScript.
- **Local server:** XAMPP/Apache.
- **Local URL:** `http://localhost/acrosis/`
- **Production deployment:** Hostinger main-domain root; see `HOSTINGER_DEPLOYMENT.md`.
- **PHP executable:** `C:\xampp\php\php.exe`
- **Database:** MySQL database `acrosis_db`, configured in `config/db.php`.
- **Database user in local development:** `root` with an empty password by default.
- **No Composer, npm, framework, or automated test suite is present.**

## Directory map

```text
/
├── index.php                 Public homepage
├── about.php                 Company story, leadership, corporate details
├── products.php              Product segments and database product catalogue
├── factory.php               Factory, location, production capabilities
├── quality.php               Quality assurance and purification process
├── gallery.php               Database-backed public image gallery
├── contact.php               Contact cards and general/distributor/career forms
├── config/
│   ├── db.php                Shared MySQL connection
│   └── setup.php             One-time database schema and seed script
├── includes/
│   ├── functions.php         Sessions, sanitization, auth, flash messages, uploads
│   ├── header.php            Public navigation and document head
│   └── footer.php            Public footer, lightbox markup, shared JS include
├── admin/
│   ├── login.php             Admin login
│   ├── logout.php            Admin logout
│   ├── dashboard.php         Counts and recent enquiries
│   ├── includes/
│   │   ├── admin_header.php  Auth guard, sidebar, admin styles and flash output
│   │   └── admin_footer.php  Admin layout close and sidebar JavaScript
│   ├── products/
│   │   ├── index.php         List/filter/delete products
│   │   ├── add.php           Create product and upload image
│   │   └── edit.php          Edit product and replace image
│   ├── enquiries/
│   │   ├── index.php         List/filter/view/delete enquiries
│   │   └── export.php        Export enquiries as Excel-compatible CSV
│   ├── gallery/
│   │   ├── index.php         List/delete gallery images
│   │   └── add.php           Upload gallery image
│   ├── settings/
│   │   └── index.php         Update shared public website settings
│   └── users/
│       ├── index.php         List and activate/deactivate admin users
│       ├── add.php           Create admin user
│       └── edit.php          Edit admin user and optional password
├── assets/
│   ├── css/style.css         Public master stylesheet and responsive layout
│   ├── js/main.js            Public navigation, animation, counters, lightbox
│   └── images/               Static public image assets, including `acrosis-logo.png`
├── uploads/products/         Product images uploaded by the admin
└── uploads/gallery/          Gallery images uploaded by the admin
```

## Public site

`includes/header.php` and `includes/footer.php` are included by public pages. URL generation uses `includes/functions.php::appUrl()`, which supports `/acrosis` locally and `/` on a Hostinger main domain.

Pages:

- `index.php`: hero, company stats, three product segment cards, trust/compliance, distributor CTA.
- `about.php`: story, promoters, corporate identity, company vision.
- `products.php`: three hard-coded segment presentations plus database-backed products.
- `factory.php`: factory address, plot/shed sizes, production lines, utilities, and map content.
- `quality.php`: quality metrics, RO/UV/ozonation process, testing and compliance content.
- `contact.php`: contact information, Google Maps embed, and three enquiry tabs.
- `gallery.php`: public gallery grid backed by the `gallery_images` table; images open in the shared lightbox.

Factory and Quality are currently hidden from the public header/footer navigation, but their PHP files remain in place for later re-enabling.

### Product segments

The segment IDs are shared across setup, admin forms, and public catalogue code:

| ID | Segment | Packaging |
|---:|---|---|
| 1 | Sparkling Water / Sparkling Sweet Water | PET |
| 2 | Premium Juices | Glass bottle |
| 3 | Premium Soda | Aluminum can |

`products.php` reads rows from `products`, orders them by `segment` and `sort_order`, and maps IDs to the public segment slugs `pet`, `glass`, and `can`. The page also contains static marketing content for all three segments.

## Database

Run `http://localhost/acrosis/config/setup.php` once after starting MySQL. It creates:

- `admin_users`: login accounts, roles, active state.
- `products`: segment, name, description, image filename, sizes, flavors, featured flag, sort order, timestamps.
- `enquiries`: general/distributor/career submissions.
- `site_settings`: seeded company settings; currently not broadly consumed by the public templates.
- `gallery_images`: gallery title, uploaded image filename, product segment (0=General, 1–3 map to the product segments), display order, and timestamp. The public gallery page supports filtering by segment.

After setup, delete or restrict access to `config/setup.php`. Change the seeded admin password immediately.

All normal database access goes through `config/db.php`, which creates the global `$conn` `mysqli` connection and sets `utf8mb4`.

## Authentication and sessions

- `includes/functions.php` starts the PHP session when needed.
- `isLoggedIn()` checks `$_SESSION['admin_id']`.
- `requireLogin()` redirects unauthenticated users to `/acrosis/admin/login.php`.
- `admin/includes/admin_header.php` includes the database and helper files, then calls `requireLogin()`.
- Successful login regenerates the session ID and stores admin ID, username, full name, and role.
- Passwords are stored with `password_hash()` and checked with `password_verify()`.
- The current implementation authenticates all logged-in admins; role values are displayed but are not used for granular authorization.

## Enquiries

`contact.php` accepts POST submissions for:

- `general`
- `distributor`
- `career`

Extra distributor/career fields are concatenated into the `message` column. The insert uses a prepared statement. Admins can filter, view, delete, and export enquiries.

## Image uploads

`includes/functions.php::uploadImage()`:

- allows JPEG, PNG, WebP, and GIF;
- limits files to 5 MB;
- verifies image contents with `getimagesize()`;
- creates a generated filename under `uploads/products/`.

Product add/edit pages pass `uploads/products/` as the destination. Existing product images are removed when replaced or deleted.

Gallery add/delete pages use the same helper and store files under `uploads/gallery/`.

## Frontend conventions

- Brand colors: navy `#0D1B2A`, gold `#C9A84C`, teal `#1A6B72`.
- Public fonts: Playfair Display for headings and Inter for body text.
- Public shared styles live in `assets/css/style.css`; page-specific styles may be inline in the PHP page.
- Public JavaScript is an IIFE in `assets/js/main.js`.
- Common public behavior: mobile navigation, sticky nav shadow, smooth anchor scrolling, IntersectionObserver fade-ins, animated counters, and image lightbox.
- Use existing classes and variables before adding new CSS.
- Escape output with `htmlspecialchars()` and preserve prepared statements for user/database values.

## Local setup

1. Start **Apache** and **MySQL** in XAMPP.
2. Confirm PHP works:

   ```powershell
   php -v
   ```

3. Open `http://localhost/acrosis/config/setup.php` once.
4. Open `http://localhost/acrosis/`.
5. Admin login is at `http://localhost/acrosis/admin/login.php`.
6. Remove or restrict `config/setup.php` after initialization.

For CLI syntax checks, run from the project root:

```powershell
Get-ChildItem -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }
```

For the cross-platform automated lint check, run:

```powershell
php tools/lint.php
```

GitHub Actions runs the same check on every push and pull request using `.github/workflows/php-lint.yml`.

## Change checklist

- Read the directly affected page and its included header/footer/helper first.
- Preserve the `/acrosis/` deployment base path and relative admin include paths.
- Use prepared statements for values entering SQL.
- Escape user/database output at render time.
- Keep admin pages behind `requireLogin()`.
- For product changes, check both `products.php` and `admin/products/*`.
- For contact changes, check `contact.php`, `admin/enquiries/*`, and the `enquiries` schema.
- For gallery changes, check `gallery.php`, `admin/gallery/*`, `config/setup.php`, and `uploads/gallery/`.
- For upload changes, check `uploadImage()`, file permissions, and old-image cleanup.
- Run PHP lint on changed PHP files, then manually test the affected URL in Apache.

## Known implementation notes

- The public site contains substantial hard-coded marketing copy; database-managed products are an additional catalogue section, not a replacement for the static segment content.
- `site_settings` stores shared company details; super admins can update them from `admin/settings/index.php`, and public templates read them through `getSetting()`.
- `sanitize()` HTML-escapes input before storage. Do not assume it replaces validation; add explicit validation for fields that require a specific format.
- Admin role values include `super_admin`, `editor`, and code paths also offer `admin`; review role policy before implementing authorization changes.
- There are no migrations or dependency manifests; schema changes currently belong in `config/setup.php` or a separately documented SQL migration.
