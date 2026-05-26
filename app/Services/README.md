# Services Directory

Business logic dan service classes untuk aplikasi.

## Penggunaan

```php
use App\Services\InvoiceService;

$invoiceService = new InvoiceService();
$invoice = $invoiceService->createInvoice($data);
```

## Contoh Services

- `InvoiceService` - Logika pembuatan dan pengelolaan invoice
- `TransactionService` - Logika verifikasi transaksi pembayaran
- `AuthService` - Logika autentikasi dan user management
- `MailService` - Logika pengiriman email notifikasi
