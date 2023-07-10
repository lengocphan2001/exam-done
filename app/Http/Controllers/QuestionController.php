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
        $data['types'] = TypeService::getInstance()->getListTypes();

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
        $data['types'] = TypeService::getInstance()->getListTypes();
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
        $data['types'] = TypeService::getInstance()->getListTypes();

        return view('admin.questions.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data1 = $request->all();
        if ($data1['question1'] == null || $data1['question2'] == null || $data1['question3'] == null || $data1['question4'] == null || $data1['name'] == null){
            toastr()->error('Không được để trống các trường');
            return back()->withInput();
        }else{
            $question->update([
                'name' => $data1['name'],
                'type_id' => $data1['type_id'],
                'type' => Type::where('id', $data1['type_id'])->first()->name,
                'difficulty' => $data1['difficulty']
            ]);

            $question->save();

            AnswerService::getInstance()->update($question, $request);
            $data['title'] = 'Câu hỏi';
            $data['questions'] = QuestionService::getInstance()->getListQuestions();
            toastr()->success('Cập nhật thành công');
            return redirect(route('questions.index'))->with(['data', $data]);
        }
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
