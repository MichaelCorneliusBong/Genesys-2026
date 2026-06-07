<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guide extends Model
{
    protected $fillable = [
        'deck_id',
        'title',
        'content',
        'sort_order',
    ];

    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class);
    }
}