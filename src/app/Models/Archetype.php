<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
