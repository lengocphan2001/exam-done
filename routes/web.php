<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.layout');
});

Route::get('/test', function(){
    return view('admin.questions.create');
});

Route::resource('types', TypeController::class);
Route::resource('questions', QuestionController::class);
