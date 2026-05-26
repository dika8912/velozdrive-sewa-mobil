<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'profile_picture',
    ];

    // ── Accessors ──────────────────────────────────────

    // URL lengkap foto profil, fallback ke avatar default
    public function getProfilePictureUrlAttribute(): string
    {
        if ($this->profile_picture) {
            return asset('storage/' . $this->profile_picture);
        }

        return asset('images/default-avatar.png');
    }

    // Format nomor HP jadi lebih rapi: 0812-3456-7890
    public function getFormattedPhoneAttribute(): string
    {
        if (!$this->phone_number) return '-';

        $phone = preg_replace('/\D/', '', $this->phone_number);

        if (strlen($phone) === 12) {
            return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
        }

        if (strlen($phone) === 11) {
            return substr($phone, 0, 4) . '-' . substr($phone, 4, 3) . '-' . substr($phone, 7);
        }

        return $this->phone_number;
    }

    // ── Relationships ──────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}