<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        '',
    ];

    public function usaha(): HasMany
    {
        return $this->HasMany(usaha::class);
    }

    public function produsen(): HasMany
    {
        return $this->HasMany(produsen::class);
    }

    public function benihunggul(): HasMany
    {
        return $this->hasMany(benihunggul::class);
    }

    public function varietaslokal(): HasMany
    {
        return $this->hasMany(varietaslokal::class);
    }

    public function hortikultura(): HasMany
    {
        return $this->hasMany(hortikultura::class);
    }

    public function pengedarhortikultura(): HasMany
    {
        return $this->hasMany(pengedarhortikultura::class);
    }

    public function pengedarlokal(): HasMany
    {
        return $this->hasMany(pengedarlokal::class);
    }

    public function pengedarunggul(): HasMany
    {
        return $this->hasMany(pengedarunggul::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
