<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TierList extends Model
{
    protected $fillable = [
        'title',
        'season',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(TierListItem::class);
    }
}