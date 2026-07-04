<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    protected $fillable = [

        'user_id',

        'quiz_type',

        'score',

        'total_question',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}