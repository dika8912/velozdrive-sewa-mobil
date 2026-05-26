<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_id',
        'payment_method',
        'amount',
        'status',
        'payment_proof',
        'paid_at',
    ];

    protected $casts = [
        'amount'  => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    // ── Accessors ──────────────────────────────────────

    // Format amount: Rp 1.950.000
    public function getFormattedAmountAttribute(): string
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    // Format paid_at: 11 Mei 2026, 10:30
    public function getPaidAtFormattedAttribute(): string
    {
        if (!$this->paid_at) return '-';

        return $this->paid_at->translatedFormat('d F Y, H:i');
    }

    // URL bukti pembayaran
    public function getPaymentProofUrlAttribute(): ?string
    {
        if (!$this->payment_proof) return null;

        return asset('storage/' . $this->payment_proof);
    }

    // Badge status pembayaran
    public function getStatusBadgeAttribute(): array
    {
        return match($this->status) {
            'pending'  => ['label' => 'Menunggu Pembayaran', 'color' => 'yellow'],
            'paid'     => ['label' => 'Lunas',               'color' => 'green'],
            'failed'   => ['label' => 'Gagal',               'color' => 'red'],
            'refunded' => ['label' => 'Dikembalikan',        'color' => 'blue'],
            default    => ['label' => $this->status,         'color' => 'gray'],
        };
    }

    // Cek apakah sudah dibayar
    public function getIsPaidAttribute(): bool
    {
        return $this->status === 'paid';
    }

    // ── Relationships ──────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}