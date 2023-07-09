<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Services\Service;
use Flasher\Laravel\Http\Request;

class AnswerService extends Service
{

    public function getListQuestions()
    {
        $data = Question::all();
        return $data;
    }
    public function create($request, $id)
    {
        $data = $request->all();
        Answer::insert(
            [
                'question_id' => $id,
                'name' => $data['question1'],
                'image' => $data['image_question1']
            ],
            [
                'question_id' => $id,
                'name' => $data['question2'],
                'image' => $data['image_question2']
            ],
            [
                'question_id' => $id,
                'name' => $data['question3'],
                'image' => $data['image_question3']
            ],
            [
                'question_id' => $id,
                'name' => $data['question4'],
                'image' => $data['image_question4']
            ],

        );
    }
}
