<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Type;
use App\Services\AnswerService;
use App\Services\QuestionService;
use App\Services\TypeService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Câu hỏi';
        $data['questions'] = QuestionService::getInstance()->getListQuestions();
        return view('admin.questions.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Câu hỏi';

        return view('admin.questions.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        $data['title'] = 'Câu trả lời';
        $question = QuestionService::getInstance()->create($request);
        $data['question_id'] = $question->id;
        toastr()->success('Thêm câu hỏi thành công');

        return view('admin.answers.create')->with(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $data['title'] = 'Thông tin chi tiết';
        $data['question'] = $question;
        $data['answers'] = $question->answers();

        return view('admin.questions.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $data['title'] = 'Thông tin chi tiết';
        $data['question'] = $question;

        return view('admin.questions.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data1 = $request->all();
        for ($i = 1; $i <= $question->number_of_answers; $i++) {
            if ($data1['question1'] == null) {
                toastr()->error('Không được để trống các trường');
                return back()->withInput();
            }
        }

        $question->update([
            'name' => $data1['name'],
            'type' => $data1['type'],
            'number_of_answers' => $data1['number_of_answers'],
            'difficulty' => $data1['difficulty'],
            'answer' => $data1['correct_answer'],
            'note' => $data1['note'],
        ]);

        $question->save();

        AnswerService::getInstance()->update($question, $request);
        $data['title'] = 'Câu hỏi';
        $data['questions'] = QuestionService::getInstance()->getListQuestions();
        toastr()->success('Cập nhật thành công');
        return redirect(route('questions.index'))->with(['data', $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        QuestionService::getInstance()->delete($question);
        toastr()->success('Xóa thành công');
        return redirect()->route('questions.index');
    }
}
