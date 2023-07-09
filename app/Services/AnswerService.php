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
        $destination_path = 'public/images/answers';
        $image1 = $request->file('image_question1');
        $path1 = '';
        if ($image1) {
            $image1_name = $image1->getClientOriginalName();
            $path1 = $request->file('image_question1')->storeAs($destination_path, $image1_name);
        }

        $image2 = $request->file('image_question2');
        $path2 = '';
        if ($image2) {
            $image2_name = $image2->getClientOriginalName();
            $path2 = $request->file('image_question2')->storeAs($destination_path, $image2_name);
        }

        $image3 = $request->file('image_question3');
        $path3 = '';
        if ($image3) {
            $image3_name = $image3->getClientOriginalName();
            $path3 = $request->file('image_question3')->storeAs($destination_path, $image3_name);
        }

        $image4 = $request->file('image_question4');
        $path4 = '';
        if ($image4) {
            $image4_name = $image4->getClientOriginalName();
            $path4 = $request->file('image_question4')->storeAs($destination_path, $image4_name);
        }

        Answer::create([
            'question_id' => $id,
            'answer' => $data['question1'],
            'image' => $path1
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question2'],
            'image' => $path2
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question3'],
            'image' => $path3
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question4'],
            'image' => $path4
        ]);
    }
}
