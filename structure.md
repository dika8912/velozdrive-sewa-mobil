# Project Structure

This document describes the key folders and files in the Velodrive project.

## Root

- `.editorconfig`
- `.env`
- `.env.example`
- `.gitattributes`
- `.gitignore`
- `artisan`
- `composer.json`
- `composer.lock`
- `package.json`
- `package-lock.json`
- `phpunit.xml`
- `postcss.config.cjs`
- `tailwind.config.cjs`
- `vite.config.js`
- `README.md`
- `GEMINI.md`
- `IMPLEMENTATION.md`
- `structure.md`

## app

- `app/Http/Controllers/`
  - `AdminDashboardController.php`
  - `AuthController.php`
  - `Controller.php`
  - `HomeController.php`
  - `InvoiceController.php`
  - `LaporanController.php`
  - `MobilController.php`
  - `ProfileController.php`
  - `TransaksiController.php`
  - `UserController.php`
  - `UserDashboardController.php`
- `app/Http/Middleware/`
- `app/Http/Requests/`
- `app/Http/Controllers/Notifications/`
- `app/Http/Providers/`
- `app/Models/`
  - `Invoice.php`
  - `Mobil.php`
  - `Transaction.php`
  - `User.php`
  - `UserProfile.php`
- `app/Notifications/`
- `app/Providers/`

## bootstrap

- `bootstrap/app.php`
- `bootstrap/providers.php`
- `bootstrap/cache/`

## config

Contains Laravel configuration files such as `app.php`, `auth.php`, `database.php`, `mail.php`, `queue.php`, and more.

## database

- `database/factories/`
- `database/migrations/`
- `database/seeders/`

## public

- `public/css/`
- `public/image/`
- `public/index.php`
- `public/robots.txt`

## resources

- `resources/css/`
  - `app.css`
  - `admin.css`
- `resources/js/`
  - `app.js`
  - `admin.js`
- `resources/views/`
  - `admin/`
  - `auth/`
  - `components/`
  - `layouts/`
  - `user/`

## routes

- `routes/web.php`
- `routes/console.php`

## storage

- `storage/app/`
- `storage/framework/`
- `storage/logs/`

## tests

- `tests/Feature/`
- `tests/Unit/`

## vendor

- PHP dependencies installed by Composer

---

This `structure.md` is intentionally high-level: it captures the main project organization and the main directories used by the application. If you want, I can also add a deeper tree view for individual folders such as `resources/views` or `database/migrations`. 