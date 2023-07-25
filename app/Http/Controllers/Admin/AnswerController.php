<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Services\AnswerService;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $data1 = $request->all();
        $question = Question::where('id', $id)->first();
        for ($x = 1; $x <= $question->number_of_answers; $x++) {
            if ($data1['question' . $x] == null) {
                toastr()->error('Không được để trống các trường câu hỏi');
                return back()->withInput();
            }
            \App\Services\Admin\AnswerService::getInstance()->create($request, $id);
            $data['title'] = 'Câu hỏi';
            $data['questions'] = \App\Services\Admin\QuestionService::getInstance()->getListQuestions();
            toastr()->success('Thêm các câu trả lời thành công');
            return redirect(route('admin.questions.index'))->with(['data', $data]);
        }
    }


    public function show(Answer $answer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
