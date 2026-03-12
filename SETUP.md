# Setup Guide

## Requirements

- PHP 7.4+ (or newer)
- MySQL 5.7+ / MariaDB
- Apache/Nginx with PHP support
- Composer (optional, only if you reinstall dependencies)

## 1. Clone and Open Project

```bash
git clone https://github.com/sharia143/University-Management-System.git
cd University-Management-System
```

## 2. Configure Database

Edit `View/loginsystem/includes/config.php`:

- `DB_SERVER`
- `DB_USER`
- `DB_PASS`
- `DB_NAME`

## 3. Prepare Database Schema

Import your project SQL schema into MySQL using phpMyAdmin or CLI.

The app also auto-creates a `password_resets` table when password reset is used.

## 4. Run the Project

Point your web server document root to the project folder (or the `View/` folder based on your setup), then open:

- Public site: `/View/index.php`
- User login: `/View/loginsystem/login.php`
- Admin login: `/View/loginsystem/admin/index.php`

## 5. Mail Settings (Password Reset)

Update SMTP values in:

- `View/loginsystem/password-recovery.php`

Set:

- SMTP username
- SMTP password
- sender email/name

## Notes

- Do not commit real credentials.
- For production, use environment variables or secure secrets storage.
