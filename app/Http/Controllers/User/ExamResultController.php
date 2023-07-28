<?php

namespace App\Http\Controllers\User;

use App\Models\ExamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamResultController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $examResult)
    {
        return view('user.exams.result')->with(['exam_result' => $examResult]);
    }

    public function detail($examResult){

        return view('user.exams.detail')->with(['exam' => $examResult]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamResult $examResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResult $examResult)
    {
        //
    }
}
