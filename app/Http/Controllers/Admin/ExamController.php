<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $data['exams'] = \App\Services\Admin\ExamService::getInstance()->getListExams();
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
        // if (Question::all()->count() < 25) {
        //     toastr()->error('Không đủ số lượng câu hỏi');
        //     return back();
        // } else {
        //     if (Question::where([['is_paralysis', '=', 1], ['kind_id', '=', 1]])->get()->count() < 1) {
        //         toastr()->error('Không đủ số lượng câu hỏi điểm liệt');
        //         return back();
        //     } else if (Question::where('kind_id', 1)->get()->count() < 5) {
        //         toastr()->error('Không đủ số lượng câu hỏi sa hình');
        //         return back();
        //     } else if (Question::where('kind_id', 2)->get()->count() < 5) {
        //         toastr()->error('Không đủ số lượng câu hỏi biển báo');
        //         return back();
        //     } else if (Question::where('kind_id', 3)->get()->count() < 15) {
        //         toastr()->error('Không đủ số lượng câu hỏi luật giao thông');
        //         return back();
        //     } else {
        //         $data['exams'] = \App\Services\Admin\ExamService::getInstance()->getListExams();
        //         $exam = \App\Services\Admin\ExamService::getInstance()->create($request);
        //         if (!$exam) {
        //             return redirect()->back()->withInput();
        //         }
        //         $question = Question::where('kind_id', 1)->get()->random(5);
        //         foreach ($question as $question) {
        //             ExamQuestion::create([
        //                 'exam_id' => $exam->id,
        //                 'question_id' => $question->id
        //             ]);
        //         };
        //         $question = Question::where('kind_id', 2)->get()->random(5);
        //         foreach ($question as $question) {
        //             ExamQuestion::create([
        //                 'exam_id' => $exam->id,
        //                 'question_id' => $question->id
        //             ]);
        //         };
        //         $question = Question::where([['kind_id', '=', 3], ['is_paralysis', '!=', 3]])->get()->random(14);
        //         foreach ($question as $question) {
        //             ExamQuestion::create([
        //                 'exam_id' => $exam->id,
        //                 'question_id' => $question->id
        //             ]);
        //         };
        //         $question = Question::where([['kind_id', '=', 3], ['is_paralysis', '=', 1]])->get()->random(1);
        //         foreach ($question as $question) {
        //             ExamQuestion::create([
        //                 'exam_id' => $exam->id,
        //                 'question_id' => $question->id
        //             ]);
        //         };
        //         // random 5 sa hình, 5 biển báo, 15 giao thông db
        //         toastr()->success('Thêm bài thi thành công');
        //         return redirect(route('admin.exams.index'))->with(['data', $data]);
        //     }
        // }
        $data['exams'] = \App\Services\Admin\ExamService::getInstance()->getListExams();
        $exam = \App\Services\Admin\ExamService::getInstance()->create($request);
        if (!$exam) {
            return redirect()->back()->withInput();
        }
        $question = Question::all()->random(5);
        foreach ($question as $question) {
            ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_id' => $question->id
            ]);
        };
        return redirect(route('admin.exams.index'))->with(['data', $data]);
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
        return redirect(route('admin.exams.index'));
    }
}
