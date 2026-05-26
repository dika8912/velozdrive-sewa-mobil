# Events & Listeners Directory

Event-driven architecture untuk aplikasi.

## Penggunaan

```php
use App\Events\InvoiceCreated;
use App\Listeners\SendInvoiceNotification;

event(new InvoiceCreated($invoice));
```

## Contoh Events

- `InvoiceCreated` - Event ketika invoice baru dibuat
- `TransactionVerified` - Event ketika transaksi diverifikasi
- `PaymentApproved` - Event ketika pembayaran disetujui
- `UserRegistered` - Event ketika user baru mendaftar

## Contoh Listeners

- `SendInvoiceNotification` - Kirim notifikasi saat invoice dibuat
- `UpdateInvoiceStatus` - Update status invoice
- `SendEmailConfirmation` - Kirim email konfirmasi
