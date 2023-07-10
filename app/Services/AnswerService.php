<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Services\Service;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Arr;

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
        $destination_path = 'public/storage/images/answers';
        $image1 = $request->file('image_question1');
        $path1 = '';
        if ($image1) {
            $image1_name = $image1->getClientOriginalName() .$id;
            $path1 = $request->file('image_question1')->storeAs($destination_path, $image1_name);
        }

        $image2 = $request->file('image_question2');
        $path2 = '';
        if ($image2) {
            $image2_name = $image2->getClientOriginalName() .$id;
            $path2 = $request->file('image_question2')->storeAs($destination_path, $image2_name);
        }

        $image3 = $request->file('image_question3');
        $path3 = '';
        if ($image3) {
            $image3_name = $image3->getClientOriginalName() .$id;
            $path3 = $request->file('image_question3')->storeAs($destination_path, $image3_name);
        }

        $image4 = $request->file('image_question4');
        $path4 = '';
        if ($image4) {
            $image4_name = $image4->getClientOriginalName() .$id;
            $path4 = $request->file('image_question4')->storeAs($destination_path, $image4_name);
        }

        Answer::create([
            'question_id' => $id,
            'answer' => $data['question1'],
            'image' => str_replace('public', 'storage', $path1)
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question2'],
            'image' => str_replace('public', 'storage', $path2)
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question3'],
            'image' => str_replace('public', 'storage', $path3)
        ]);
        Answer::create([
            'question_id' => $id,
            'answer' => $data['question4'],
            'image' => str_replace('public', 'storage', $path4)
        ]);
    }

    public function update(Question $question, $request){
        $answers = $question->answers()->pluck('id');
        $destination_path = 'public/storage/images/answers';

        $answer1 = Answer::find($answers[0]);
        $answer2 = Answer::find($answers[1]);
        $answer3 = Answer::find($answers[2]);
        $answer4 = Answer::find($answers[3]);
        $answer1->update([
            'answer' => $request->question1,
        ]);
        $answer1->save();
        $image1 = $request->file('image_question1');
        $path1 = '';
        if ($image1) {
            $image1_name = $image1->getClientOriginalName();
            $path1 = $request->file('image_question1')->storeAs($destination_path, $image1_name);
            $answer1->update([
                'image' => str_replace('public', 'storage', $path1)
            ]);
            $answer1->save();
        }

        $answer2->update([
            'answer' => $request->question2,
        ]);
        $answer2->save();

        $image2 = $request->file('image_question2');
        $path2 = '';
        if ($image2) {
            $image2_name = $image2->getClientOriginalName();
            $path2 = $request->file('image_question2')->storeAs($destination_path, $image2_name);
            $answer2->update([
                'image' => str_replace('public', 'storage', $path2)
            ]);
            $answer2->save();
        }

$answer3->update([
            'answer' => $request->question3,
        ]);
        $answer3->save();
        $image3 = $request->file('image_question3');
        $path3 = '';
        if ($image3) {
            $image3_name = $image3->getClientOriginalName();
            $path3 = $request->file('image_question3')->storeAs($destination_path, $image3_name);
            $answer3->update([
                'image' => str_replace('public', 'storage', $path3)
            ]);
            $answer3->save();
        }

        $answer4->update([
            'answer' => $request->question4,
        ]);
        $answer4->save();
        $image4 = $request->file('image_question4');
        $path4 = '';
        if ($image4) {
            $image4_name = $image4->getClientOriginalName();
            $path4 = $request->file('image_question4')->storeAs($destination_path, $image4_name);
            $answer4->update([
                'image' => str_replace('public', 'storage', $path4)
            ]);
            $answer4->save();
        }
    }
}
