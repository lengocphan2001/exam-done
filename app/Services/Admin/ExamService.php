<?php
namespace App\Services\Admin;

use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Services\Service;

class ExamService extends Service{

    public function getListExams(){
        $data = Exam::all();
        return $data;
    }
    public function create(ExamRequest $request){
        $data = $request->all();
        return Exam::create([
            'name' => $data['name'],
            'duration' => 19,
            'topic' => $data['topic'],
            'number_of_questions' => 25,
        ]);
    }

    public function delete(Exam $exam){
        $exam->delete();
    }
}
