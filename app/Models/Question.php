<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'type_id',
        'correct_answer',
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

}
