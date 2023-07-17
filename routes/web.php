<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExamController;
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

Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.postLogin');

Route::group(['middleware' => 'checkAdminLogin'], function () {
    Route::get('/', function () {
        return view('admin.auth.profile');
    });
    Route::resource('questions', QuestionController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('answers', AnswerController::class)->except('store');
    Route::post('/answers/{id}', [AnswerController::class, 'store'])->name('answers.store');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
