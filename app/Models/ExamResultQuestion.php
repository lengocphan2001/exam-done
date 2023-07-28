<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResultQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_result_id',
        'question_id',
        'is_true'
    ];

    public function examResult(){
        return $this->belongsTo(ExamResult::class);
    }
}
