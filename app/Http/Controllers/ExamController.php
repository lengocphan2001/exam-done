<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\Question;
use App\Services\ExamService;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Bài thi';
        $data['exams'] = ExamService::getInstance()->getListExams();
        return view('admin.exams.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Bài thi';
        return view('admin.exams.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        $data['title'] = 'Bài thi';
        $data['exams'] = ExamService::getInstance()->getListExams();
        $exam = ExamService::getInstance()->create($request);
        if (!$exam){
            return redirect()->back()->withInput();
        }
        $question = Question::all()->random(min(Question::all()->count(), intval($exam->number_of_questions)));
        foreach ($question as $question){
            ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_id' => $question->id
            ]);
        };

        toastr()->success('Thêm bài thi thành công');
        return redirect(route('exams.index'))->with(['data', $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        $data['title'] = 'Thông tin chi tiết';
        $data['exam'] = $exam;
        // dd($exam->questions()->first());

        return view('admin.exams.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        toastr()->success('Xóa thành công');
        return redirect(route('exams.index'));
    }
}
