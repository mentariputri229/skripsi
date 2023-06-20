<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produsen extends Model
{
    protected $guarded = [
        '',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
