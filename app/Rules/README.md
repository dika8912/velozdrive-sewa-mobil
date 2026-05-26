# Rules Directory

Custom validation rules untuk validasi form yang kompleks.

## Penggunaan

```php
use App\Rules\ValidCarLicense;

$validated = $request->validate([
    'license_plate' => [new ValidCarLicense()],
]);
```

## Contoh Rules

- `ValidCarLicense` - Validasi plat nomor kendaraan
- `UniqueEmail` - Validasi email unik dengan kondisi tertentu
- `ValidPaymentProof` - Validasi bukti pembayaran
