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
            'duration' => $data['duration'],
            'topic' => $data['topic'],
            'number_of_questions' => $data['number_of_questions'],
        ]);
    }

    public function delete(Exam $exam){
        $exam->delete();
    }
}
