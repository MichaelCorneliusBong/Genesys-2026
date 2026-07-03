<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Archetype;

class Guide extends Model
{
    protected $fillable = [
        'archetype_id',
        'title',
        'slug',
        'description',
        'content',
    ];

    public function archetype()
    {
        return $this->belongsTo(
            Archetype::class
        );
    }
}