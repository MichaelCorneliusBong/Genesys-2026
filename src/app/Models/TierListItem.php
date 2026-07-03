<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TierListItem extends Model
{
    protected $fillable = [

        'tier_list_id',

        'archetype_id',

        'tier',

        'position',

    ];

    public function tierList(): BelongsTo
    {
        return $this->belongsTo(
            TierList::class
        );
    }

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(
            Archetype::class
        );
    }
}