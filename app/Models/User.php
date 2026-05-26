<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

// Override default reset notification
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        ];
        
        protected $hidden = [
            'password',
            'remember_token',
            ];
            
            protected $casts = [
                'email_verified_at' => 'datetime',
                'password'          => 'hashed',
                ];
                
                // ── Accessors ──────────────────────────────────────
                
                // Nama dengan huruf kapital tiap kata
                public function getNameAttribute($value): string
                {
                    return ucwords($value);
                    }

                    // Cek apakah user adalah admin
                    public function getIsAdminAttribute(): bool
                    {
                        return $this->role === 'admin';
                        }
                        
                        // Label role yang lebih rapi
                        public function getRoleLabelAttribute(): string
                        {
                            return match($this->role) {
                                'admin' => '👑 Admin',
                                'user'  => '👤 User',
                                default => $this->role,
        };
        }
        
        // ── Relationships ──────────────────────────────────
        
        public function profile()
        {
            return $this->hasOne(UserProfile::class);
            }
            
            public function invoices()
            {
                return $this->hasMany(Invoice::class);
                }
                
                public function transactions()
                {
                    return $this->hasMany(Transaction::class);
    }
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    }