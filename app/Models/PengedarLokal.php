<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengedarLokal extends Model
{
    protected $guarded = [
        '',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }

    public function usaha(): BelongsTo
    {
        return $this->belongsTo(usaha::class);
    }

    public function produsen(): BelongsTo
    {
        return $this->belongsTo(produsen::class);
    }
}
