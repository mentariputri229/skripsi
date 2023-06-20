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
}
