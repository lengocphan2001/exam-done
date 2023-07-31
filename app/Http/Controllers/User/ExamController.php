<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamResultQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['exams'] = Exam::all();
        return view('user.exams.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        dd($data);
        $exam_result = ExamResult::create([
            'exam_id' => $id,
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'correct_answer' => 0
        ]);

        $exam = Exam::where('id', $id)->first();
        $questions = $exam->questions;
        for ($i = 0; $i < 25; $i++) {
            $question_id = $questions[$i]->question_id;
            $question = Question::where('id', $question_id)->first();

            if ($request->get('radio-group' . $question->id)) {
                if ($request->get('radio-group' . $question->id) == $question->answer) {
                    $exam_result->update([
                        'correct_answer' => $exam_result->correct_answer + 1
                    ]);
                    
                    $exam_result->save();
                }
                
            }
            ExamResultQuestion::create([
                'exam_result_id' => $exam_result->id,
                'question_id' => $question->id,
                'is_true' => $request->get('radio-group' . $question->id) == $question->answer ? true : false
            ]);
        }
        // dd($exam_result->examQuestions);
        

        return view('user.exams.result')->with(['exam' => $exam_result]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return view('user.exams.show')->with(['exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}