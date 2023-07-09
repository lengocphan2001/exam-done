<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Services\AnswerService;
use App\Services\QuestionService;
use App\Services\TypeService;
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
        if ($data1['question1'] == null || $data1['question2'] == null || $data1['question3'] == null || $data1['question4'] == null){
            toastr()->error('Không được để trống các trường câu hỏi');
            return back()->withInput();
        }else{
            AnswerService::getInstance()->create($request, $id);
            $data['title'] = 'Câu hỏi';
            $data['questions'] = QuestionService::getInstance()->getListQuestions();
            toastr()->success('Thêm các câu trả lời thành công');
            return redirect(route('questions.index'))->with(['data', $data]);
        }
    }


    public function show(Answer $answer)
    {
        //
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
