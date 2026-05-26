# Velodrive Web App

Velodrive is a car rental management web application built on Laravel. It provides separate experiences for customers and administrators.

## Application Usage

### Customer workflow

1. Open the home page at `http://127.0.0.1:8000`.
2. Register a new account or log in with existing credentials.
3. Browse available cars and check rental details.
4. Create invoices to rent cars.
5. Upload payment proof in the transaction section.
6. Review active rentals and rental history.
7. Update profile information and password on the profile page.

### Admin workflow

1. Log in as an admin user.
2. Access `admin/dashboard` for summary statistics.
3. Manage cars under `Kelola Mobil`.
4. Manage invoices under `Kelola Invoice`.
5. Verify or reject transactions under `Kelola Transaksi`.
6. Manage users under `Kelola User`.
7. Export report data from `Laporan`.
8. Update admin profile and password from `Profile`.

## Setup and Build

1. Copy environment file:

   ```bash
   cp .env.example .env
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install Node dependencies:

   ```bash
   npm install
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Run migrations and seeders if needed:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Build frontend assets:

   ```bash
   npm run dev
   ```

7. Run the app locally:

   ```bash
   php artisan serve
   ```

## Main Features

- Role-based dashboard for users and admins
- Car browsing and rental invoice creation
- Payment transaction upload and verification
- Profile management for all users
- Tailwind CSS-based styling and Alpine.js interactivity
- SweetAlert2 notifications for alerts

## Project Structure

Struktur proyek Velodrive mengikuti standar Laravel dengan organisasi yang jelas:

```
velodrive-web/
├── app/                          # Core aplikasi Laravel
│   ├── Enums/                    # Enum types (status, roles, dll)
│   ├── Events/                   # Event classes
│   ├── Http/
│   │   ├── Controllers/          # HTTP controllers (user & admin)
│   │   ├── Middleware/           # Custom middleware
│   │   └── Requests/             # Form request validation
│   ├── Jobs/                     # Queued jobs
│   ├── Listeners/                # Event listeners
│   ├── Models/                   # Eloquent models
│   ├── Notifications/            # Notification classes
│   ├── Providers/                # Service providers
│   ├── Rules/                    # Custom validation rules
│   ├── Services/                 # Business logic & services
│   └── Traits/                   # Reusable traits
├── bootstrap/                    # Bootstrap aplikasi & cache
├── config/                       # File konfigurasi aplikasi
├── database/
│   ├── factories/                # Model factories untuk testing
│   ├── migrations/               # Database migrations
│   ├── seeders/
│   │   └── sample-data/          # Sample data untuk development
│   └── seeders/                  # Database seeders
├── public/                       # Entry point publik
│   ├── build/                    # Built assets (Vite output)
│   ├── css/                      # CSS files (compiled)
│   ├── image/                    # Image assets
│   ├── uploads/                  # User uploads (payment proofs, etc)
│   ├── index.php                 # Application entry point
│   └── robots.txt
├── resources/
│   ├── css/                      # Source CSS files
│   ├── js/
│   │   ├── app.js               # Main app script
│   │   ├── admin.js             # Admin scripts
│   │   └── bootstrap.js         # Bootstrap script
│   └── views/                    # Blade templates
│       ├── admin/               # Admin templates
│       ├── auth/                # Authentication templates
│       ├── components/          # Reusable components
│       ├── errors/              # Error pages (404, 500, etc)
│       ├── layouts/             # Layout templates
│       └── user/                # User templates
├── routes/
│   ├── console.php              # Artisan commands
│   └── web.php                  # Web routes
├── storage/
│   ├── app/
│   │   ├── private/             # Private file storage
│   │   └── public/              # Public file storage
│   ├── framework/               # Framework cache & views
│   ├── logs/                    # Application logs
│   └── sessions/                # Session data
├── tests/                       # Unit & feature tests
├── vendor/                      # Composer dependencies
├── composer.json                # PHP dependencies
├── package.json                 # Node.js dependencies
├── vite.config.js              # Vite bundler configuration
├── tailwind.config.cjs         # Tailwind CSS configuration
├── postcss.config.cjs          # PostCSS configuration
├── phpunit.xml                 # PHPUnit testing config
└── .env                        # Environment variables (not in repo)
```

### Direktori Penting

**App Directory (`app/`)**
- **Controllers** — Menangani HTTP requests dan business logic
- **Models** — Eloquent models untuk database interaction
- **Services** — Reusable business logic dan service classes
- **Requests** — Form validation dan data normalization
- **Middleware** — HTTP middleware untuk filtering requests
- **Events & Listeners** — Event-driven architecture
- **Jobs** — Background jobs untuk queue processing
- **Rules** — Custom validation rules
- **Traits** — Reusable trait untuk code sharing

**Database (`database/`)**
- **Migrations** — Schema changes dan table definitions
- **Seeders** — Populate database dengan data dummy
- **Factories** — Generate fake data untuk testing

**Resources (`resources/`)**
- **Views** — Blade templates untuk rendering UI
- **CSS/JS** — Source assets sebelum compilation

**Public (`public/`)**
- **Uploads** — User-generated files (payment proofs, documents)
- **Build** — Compiled assets dari Vite

File konfigurasi utama:

- `composer.json` — manifest dependensi PHP
- `package.json` — manifest dependensi JavaScript
- `postcss.config.cjs` — konfigurasi PostCSS
- `tailwind.config.cjs` — konfigurasi Tailwind CSS
- `vite.config.js` — pengaturan bundler Vite

### Notes

- The app uses Laravel Blade templates.
- Tailwind CSS and Alpine.js power the frontend behavior.
- Admin and user dashboards are separated by route and role.
