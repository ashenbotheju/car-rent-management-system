<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser,MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    // Role constants (store in uppercase in DB)
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ROLE_DEFAULT = self::ROLE_USER;

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_USER => 'User',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Make sure role is fillable
    ];

    // Mutator to ensure role is always stored in uppercase
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtoupper(trim($value));
    }

    // Check if user has admin role (case insensitive check)
    public function isAdmin(): bool
    {
        return strtoupper($this->role) === self::ROLE_ADMIN;
    }

    // Check if user has any of the admin variations
    public function isAnyAdmin(): bool
    {
        return in_array(strtoupper($this->role), [
            strtoupper(self::ROLE_ADMIN),
            'ADMINISTRATOR', // Add other variations if needed
        ]);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin(); // Use the case-insensitive check
    }

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
