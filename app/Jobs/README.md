# Jobs Directory

Queued jobs untuk background processing.

## Penggunaan

```php
use App\Jobs\SendNotificationEmail;

SendNotificationEmail::dispatch($user, $data);
```

## Contoh Jobs

- `SendNotificationEmail` - Kirim email notifikasi asynchronous
- `ProcessPaymentProof` - Process bukti pembayaran
- `GenerateMonthlyReport` - Generate laporan bulanan
- `CleanupExpiredInvoices` - Cleanup invoice yang expired
