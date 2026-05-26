# Enums Directory

Enumeration classes untuk tipe-tipe konstanta dalam aplikasi.

## Penggunaan

```php
use App\Enums\InvoiceStatus;

$statuses = InvoiceStatus::cases();
// [PENDING, APPROVED, REJECTED, COMPLETED]
```

## Contoh Enums

- `InvoiceStatus` - Status invoice (pending, approved, rejected, completed)
- `TransactionStatus` - Status transaksi pembayaran
- `UserRole` - Role user (admin, customer)
- `CarStatus` - Status kendaraan (available, unavailable, rented)
