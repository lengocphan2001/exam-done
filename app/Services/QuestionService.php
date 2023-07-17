<?php

namespace App\Services;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\TypeRequest;
use App\Models\Question;
use App\Models\Type;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class QuestionService extends Service
{

    public function getListQuestions()
    {
        $data = Question::all();
        return $data;
    }
    public function create(QuestionRequest $request)
    {
        $data = $request->all();
        return Question::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'number_of_answers' => $data['number_of_answers'],
            'difficulty' => $data['difficulty'],
            'answer' => 'A',
            'note' => $data['note'],
        ]);
    }

    public function delete(Question $question)
    {
        $question->delete();
    }
}
