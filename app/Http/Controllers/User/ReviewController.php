<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function sahinh(){
        $questions = Question::where('kind_id', 1)->get();

        return view('user.reviews.bienbao')->with(['questions' => $questions]);
    }

    public function bienbao(){
        $questions = Question::where('kind_id', 2)->get();

        return view('user.reviews.bienbao')->with(['questions' => $questions]);
    }

    public function luat(){
        $questions = Question::where('kind_id', 3)->get();

        return view('user.reviews.bienbao')->with(['questions' => $questions]);
    }
}
