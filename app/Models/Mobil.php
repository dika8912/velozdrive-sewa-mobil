<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'harga',
        'tipe_mobil',
        'transmisi',
        'jumlah_kursi',
        'kilometer',
        'bahan_bakar',
        'fitur',
        'gambar',
        'status',
    ];

    protected $casts = [
        'fitur' => 'array',
        'harga' => 'decimal:2',
    ];

    // ── Accessors ──────────────────────────────────────

    // Format harga: Rp 650.000
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Format kilometer: 15.000 km
    public function getFormattedKilometerAttribute(): string
    {
        return number_format($this->kilometer, 0, ',', '.') . ' km';
    }

    // URL gambar mobil, fallback ke gambar default
    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }

        return asset('images/default-car.png');
    }

    // Badge status dengan warna (untuk UI)
    public function getStatusBadgeAttribute(): array
    {
        return match($this->status) {
            'tersedia'        => ['label' => 'Tersedia',        'color' => 'green'],
            'disewa'          => ['label' => 'Sedang Disewa',   'color' => 'yellow'],
            'tidak_tersedia'  => ['label' => 'Tidak Tersedia',  'color' => 'red'],
            default           => ['label' => $this->status,     'color' => 'gray'],
        };
    }

    // Cek apakah mobil bisa dipesan
    public function getIsTersediaAttribute(): bool
    {
        return $this->status === 'tersedia';
    }

    // ── Relationships ──────────────────────────────────

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}