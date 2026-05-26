# Traits Directory

Reusable traits untuk menambahkan fungsionalitas ke classes.

## Penggunaan

```php
use App\Traits\HasTimestamps;

class MyModel {
    use HasTimestamps;
}
```

## Contoh Traits

- `Searchable` - Trait untuk menambahkan kemampuan pencarian
- `HasAuditLog` - Trait untuk mencatat perubahan data
- `Filterable` - Trait untuk filtering data query
