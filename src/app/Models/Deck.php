<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Archetype;

class Deck extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail',
        'difficulty',
        'is_active',
        
        'author',
        'source',
        'tournament_name',
        'placement',
        'event_date',
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

    public function archetype()
    {
        return $this->belongsTo(
            Archetype::class
        );
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