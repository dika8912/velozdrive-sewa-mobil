<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'durasi_hari',
        'total_harga',
        'status',
        'alamat_pengambilan',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
        'total_harga'     => 'decimal:2',
    ];

    // ── Accessors ──────────────────────────────────────

    // Format total harga: Rp 1.950.000
    public function getFormattedTotalHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    // Format tanggal mulai: 12 Mei 2026
    public function getTanggalMulaiFormattedAttribute(): string
    {
        return $this->tanggal_mulai->translatedFormat('d F Y');
    }

    // Format tanggal selesai: 15 Mei 2026
    public function getTanggalSelesaiFormattedAttribute(): string
    {
        return $this->tanggal_selesai->translatedFormat('d F Y');
    }

    // Rentang tanggal: 12 – 15 Mei 2026
    public function getRentangTanggalAttribute(): string
    {
        return $this->tanggal_mulai->format('d') . ' – ' .
               $this->tanggal_selesai->translatedFormat('d F Y');
    }

    // Durasi dalam teks: 3 Hari
    public function getDurasiLabelAttribute(): string
    {
        return $this->durasi_hari . ' Hari';
    }

    // Badge status
    public function getStatusBadgeAttribute(): array
    {
        return match($this->status) {
            'pending'   => ['label' => 'Menunggu',    'color' => 'yellow'],
            'confirmed' => ['label' => 'Dikonfirmasi','color' => 'blue'],
            'ongoing'   => ['label' => 'Berlangsung', 'color' => 'green'],
            'completed' => ['label' => 'Selesai',     'color' => 'gray'],
            'cancelled' => ['label' => 'Dibatalkan',  'color' => 'red'],
            default     => ['label' => $this->status, 'color' => 'gray'],
        };
    }

    // Cek apakah invoice masih aktif
    public function getIsAktifAttribute(): bool
    {
        return in_array($this->status, ['pending', 'confirmed', 'ongoing']);
    }

    // ── Relationships ──────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}