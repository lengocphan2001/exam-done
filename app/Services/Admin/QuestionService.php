<?php

namespace App\Services\Admin;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\TypeRequest;
use App\Models\Question;
use App\Models\Type;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $file_path = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $image_name);
            $file_path = 'storage/images/' . $image_name;
        }
        return Question::create([
            'name' => $data['name'],
            'kind_id' => $data['kind_id'],
            'is_paralysis' => ($data['kind_id'] == "1" || $data['kind_id'] == 2) ? false : ($data['is_paralysis'] == "1" ? true : false),
            'number_of_answers' => $data['number_of_answers'],
            'image' => $file_path,
            'answer' => 'A',
            'note' => $data['note'],
        ]);
    }

    public function delete(Question $question)
    {
        $question->delete();
    }
}
