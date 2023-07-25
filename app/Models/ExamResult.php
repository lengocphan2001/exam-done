<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'user_id',
        'correct_answer'
    ];

    public function examQuestions(){
        return $this->hasMany(ExamResultQuestion::class, 'exam_result_id');
    }
}
