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

    public function getDescriptionAttribute()
    {
        return $this->raw_data['desc'] ?? null;
    }

    public function getAtkAttribute()
    {
        return $this->raw_data['atk'] ?? null;
    }

    public function getDefAttribute()
    {
        return $this->raw_data['def'] ?? null;
    }

    public function getLevelAttribute()
    {
        return $this->raw_data['level'] ?? null;
    }

    public function getRaceAttribute()
    {
        return $this->raw_data['race'] ?? null;
    }

    public function getAttributeNameAttribute()
    {
        return $this->raw_data['attribute'] ?? $this->attribute;
    }

    public function getFormattedDescriptionAttribute()
    {
        $desc = $this->description;

        if (! $desc) {
            return null;
        }

        $frame = $this->raw_data['frameType'] ?? null;

        $framesWithRequirement = [
            'fusion',
            'ritual',
            'synchro',
            'xyz',
            'link',
        ];

        if (! in_array($frame, $framesWithRequirement)) {
            return $desc;
        }

        $lines = preg_split("/\r\n|\n|\r/", $desc);

        if (count($lines) < 2) {
            return $desc;
        }

        $requirement = array_shift($lines);

        return $requirement . "\n\n" . implode("\n", $lines);
    }
}