<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usaha extends Model
{
    protected $guarded = [
        '',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
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
}
