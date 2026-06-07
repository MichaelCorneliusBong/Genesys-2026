<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TierListItem extends Model
{
    protected $fillable = [
        'tier_list_id',
        'deck_id',
        'tier',
        'ranking',
    ];

    public function tierList(): BelongsTo
    {
        return $this->belongsTo(TierList::class);
    }

    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class);
    }
}