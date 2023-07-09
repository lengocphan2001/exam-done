<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
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
        $data['title'] = 'Danh sách câu trả lời';
        $data['question'] = $question;
        $data['types'] = TypeService::getInstance()->getListTypes();
        $data['answers'] = $question->answer();
        
        return view('admin.questions.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
