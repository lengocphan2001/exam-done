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
        'type',
        'type_id',
        'difficulty',
        'correct_answer',
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

}
