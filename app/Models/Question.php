<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'difficulty',
        'type',
        'number_of_answers',
        'correct_answer',
        'note',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

}
