# Aplikasi Velodrive

Velodrive adalah aplikasi manajemen rental mobil berbasis Laravel. Aplikasi ini menyediakan pengalaman terpisah untuk pelanggan dan administrator.

## Cara Menggunakan Aplikasi

### Alur pelanggan

1. Buka halaman utama di `http://127.0.0.1:8000`.
2. Daftar akun baru atau masuk dengan akun yang sudah terdaftar.
3. Telusuri daftar mobil yang tersedia dan lihat detail rental.
4. Buat invoice untuk menyewa mobil.
5. Unggah bukti pembayaran pada bagian transaksi.
6. Tinjau rental aktif dan riwayat penyewaan.
7. Perbarui data profil dan kata sandi di halaman profil.

### Alur admin

1. Masuk sebagai pengguna admin.
2. Akses `admin/dashboard` untuk melihat ringkasan data.
3. Kelola mobil di menu `Kelola Mobil`.
4. Kelola invoice di menu `Kelola Invoice`.
5. Verifikasi atau tolak transaksi di menu `Kelola Transaksi`.
6. Kelola pengguna di menu `Kelola User`.
7. Ekspor data laporan di menu `Laporan`.
8. Perbarui profil admin dan kata sandi di halaman `Profile`.

## Persiapan dan Build

1. Salin file lingkungan:

   ```bash
   cp .env.example .env
   ```

2. Instal dependensi PHP:

   ```bash
   composer install
   ```

3. Instal dependensi Node:

   ```bash
   npm install
   ```

4. Buat kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

5. Jalankan migrasi dan seeder jika diperlukan:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Build aset frontend:

   ```bash
   npm run dev
   ```

7. Jalankan aplikasi secara lokal:

   ```bash
   php artisan serve
   ```

## Fitur Utama

- Dashboard berbasis peran untuk pengguna dan admin
- Penelusuran mobil dan pembuatan invoice penyewaan
- Unggah bukti pembayaran dan verifikasi transaksi
- Manajemen profil untuk semua pengguna
- Styling menggunakan Tailwind CSS dan interaktivitas Alpine.js
- Notifikasi menggunakan SweetAlert2

## Struktur Proyek

### Root

- `artisan` — entrypoint CLI Laravel
- `composer.json` — manifest dependensi PHP
- `package.json` — manifest dependensi JavaScript
- `tailwind.config.cjs` — konfigurasi Tailwind CSS v4
- `postcss.config.cjs` — konfigurasi PostCSS
- `vite.config.js` — konfigurasi build Vite
- `IMPLEMENTATION.md` — rencana implementasi migrasi
- `structure.md` — ringkasan struktur proyek

### app

- `app/Http/Controllers/` — controller aplikasi
- `app/Models/` — model Eloquent
- `app/Notifications/` — kelas notifikasi
- `app/Providers/` — service provider

### resources

- `resources/css/` — berkas entry Tailwind CSS
- `resources/js/` — berkas entry Alpine.js dan JavaScript
- `resources/views/` — template Blade untuk layout, admin, dan pengguna

### public

- `public/index.php` — entrypoint publik
- `public/css/` — aset CSS hasil build
- `public/image/` — gambar statis

### routes

- `routes/web.php` — route web
- `routes/console.php` — perintah konsol

### database

- `database/migrations/` — migrasi skema basis data
- `database/seeders/` — kelas seeder basis data
- `database/factories/` — factory model

### tests

- `tests/Feature/` — pengujian fitur
- `tests/Unit/` — pengujian unit

## Catatan

- Aplikasi ini menggunakan template Laravel Blade.
- Frontend menggunakan Tailwind CSS dan Alpine.js.
- Dashboard admin dan pengguna dipisahkan berdasarkan route dan peran.
