<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Archetype extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'description',
    ];

    public function decks()
    {
        return $this->hasMany(Deck::class);
    }

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }
    
    public function tierListItems(): HasMany
    {
        return $this->hasMany(
            TierListItem::class
        );
    }
}
