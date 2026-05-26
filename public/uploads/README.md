# Public Uploads Directory

Directory untuk menyimpan file yang di-upload oleh user.

## Penggunaan

Subdirectories yang direkomendasikan:
- `payment-proofs/` - Bukti pembayaran dari transaksi
- `documents/` - Dokumen identitas dan dokumen lainnya
- `profiles/` - Foto profil user
- `cars/` - Foto kendaraan

## Keamanan

- Pastikan file permission diatur dengan benar (644)
- Validate file type dan size sebelum upload
- Store sensitive files di `storage/app/private/`
- Implement virus scanning untuk file uploads
