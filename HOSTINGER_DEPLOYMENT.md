# Hostinger Deployment

This project is configured for a Hostinger **main-domain root** deployment.

## 1. Create the database

In Hostinger hPanel:

1. Open **Databases -> MySQL Databases**.
2. Create a database, database user, and strong password.
3. Note the complete database name, username, host, and password. Hostinger commonly prefixes database names and users with the account name.

## 2. Configure the database connection

Before or after uploading, edit `config/db.php` and `config/setup.php`, replacing the fallback values with the same Hostinger values:

```php
define('DB_HOST', getenv('ACROSIS_DB_HOST') ?: 'HOSTINGER_DB_HOST');
define('DB_USER', getenv('ACROSIS_DB_USER') ?: 'HOSTINGER_DB_USER');
define('DB_PASS', getenv('ACROSIS_DB_PASS') ?: 'HOSTINGER_DB_PASSWORD');
define('DB_NAME', getenv('ACROSIS_DB_NAME') ?: 'HOSTINGER_DB_NAME');
```

The four values must match in both files. If your Hostinger plan supports PHP environment variables, you can set `ACROSIS_DB_HOST`, `ACROSIS_DB_USER`, `ACROSIS_DB_PASS`, and `ACROSIS_DB_NAME` instead.

Do not commit or share the real password.

## 3. Upload the files

Upload the contents of this project into the domain's `public_html` directory. The expected production layout is:

```text
public_html/
├── index.php
├── about.php
├── products.php
├── gallery.php
├── contact.php
├── config/
├── includes/
├── assets/
├── admin/
└── uploads/
```

Do not upload the project as an extra `acrosis` directory under `public_html`; this is a main-domain deployment.

## 4. Create the tables

After the database credentials are configured, open:

```text
https://your-domain.com/config/setup.php
```

Confirm that setup completes successfully, then delete or restrict `config/setup.php`. Change the seeded admin password immediately.

## 5. Permissions

The web server must be able to write to:

```text
uploads/products/
uploads/gallery/
```

Use the normal Hostinger directory permissions first. Only adjust permissions through hPanel if uploads fail; do not make the entire project writable.

## 6. Verify

Check:

- `https://your-domain.com/`
- `https://your-domain.com/about.php`
- `https://your-domain.com/products.php`
- `https://your-domain.com/gallery.php`
- `https://your-domain.com/contact.php`
- `https://your-domain.com/admin/login.php`
- Product and gallery image uploads
- Contact form submission
- Admin CSV export

The URL helper automatically uses `/acrosis` on local XAMPP and `/` on the Hostinger main domain.
