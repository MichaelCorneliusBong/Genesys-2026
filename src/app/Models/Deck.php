<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deck extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail',
        'difficulty',
        'is_active',
    ];

    public function guides(): HasMany
    {
        return $this->hasMany(Guide::class);
    }

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class, 'deck_cards')
            ->withPivot([
                'quantity',
                'card_role',
            ])
            ->withTimestamps();
    }

    public function tierListItems(): HasMany
    {
        return $this->hasMany(TierListItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getTotalGenesysPointsAttribute(): int
{
    return $this->cards
        ->filter(function ($card) {
            return in_array(
                $card->pivot->card_role,
                ['main', 'extra']
            );
        })
        ->sum(function ($card) {
            return $card->genesys_points * $card->pivot->quantity;
        });
    }
}