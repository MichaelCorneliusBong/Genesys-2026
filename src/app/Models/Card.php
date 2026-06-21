<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Card extends Model
{
    protected $fillable = [
        'ygoprodeck_id',
        'name',
        'slug',
        'image_url',
        'local_image',
        'type',
        'attribute',
        'genesys_points',
        'raw_data',
        'last_synced_at',
    ];

    protected $casts = [
        'raw_data' => 'array',
        'last_synced_at' => 'datetime',
    ];

    protected $appends = [
    'image_path',
    ];

    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->local_image);
    }

    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class, 'deck_cards')
            ->withPivot([
                'quantity',
                'card_role',
            ])
            ->withTimestamps();
    }

    public function hasLocalImage(): bool
    {
        if (! $this->local_image) {
            return false;
        }

        return Storage::disk('public')
            ->exists($this->local_image);
    }
}