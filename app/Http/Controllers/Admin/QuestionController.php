<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Kind;
use App\Models\Question;
use App\Models\Type;
use App\Services\AnswerService;
use App\Services\QuestionService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Câu hỏi';
        $data['questions'] = \App\Services\Admin\QuestionService::getInstance()->getListQuestions();
        return view('admin.questions.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Câu hỏi';
        $data['kinds'] = Kind::all();

        return view('admin.questions.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        $data['title'] = 'Câu trả lời';
        $question = \App\Services\Admin\QuestionService::getInstance()->create($request);
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
        $data['kinds'] = Kind::all();
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
            if ($data1['question' . $i] == null) {
                toastr()->error('Không được để trống các trường câu trả lời');
                return back()->withInput();
            }
        }

        $file_path = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $image_name);
            $file_path = 'storage/images/' . $image_name;
        }

        $question->update([
            'name' => $data1['name'],
            'kind_id' => $data1['kind_id'],
            'number_of_answers' => $data1['number_of_answers'],
            'is_paralysis' => $data1['is_paralysis'] == 1 ? true : false,
            'answer' => $data1['answer'],
            'note' => $data1['note'],
            'image' => $file_path ? $file_path : $question->image
        ]);

        $question->save();

        \App\Services\Admin\AnswerService::getInstance()->update($question, $request);
        $data['title'] = 'Câu hỏi';
        $data['questions'] = \App\Services\Admin\QuestionService::getInstance()->getListQuestions();
        toastr()->success('Cập nhật thành công');
        return redirect(route('admin.questions.index'))->with(['data', $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        \App\Services\Admin\QuestionService::getInstance()->delete($question);
        toastr()->success('Xóa thành công');
        return redirect()->route('admin.questions.index');
    }
}
