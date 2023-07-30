<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\KindController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ExamController as UserExamController;
use App\Http\Controllers\User\ExamResultController;
use App\Http\Controllers\User\ExamResultQuestionController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserAuthController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.postLogin');

Route::get('login', [UserAuthController::class, 'loginForm'])->name('login');
Route::post('login', [UserAuthController::class, 'login'])->name('postLogin');

Route::get('register', [UserAuthController::class, 'registerForm'])->name('register');
Route::post('register', [UserAuthController::class, 'register'])->name('postRegister');

Route::get('dashboard', function(){
    return view('user.dashboard');
})->name('dashboard');


Route::middleware(['middleware' => 'checkUserLogin'])->group(function (){
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('profile', [UserAuthController::class, 'profile'])->name('profile');
    Route::put('update', [UserAuthController::class, 'update'])->name('update');
});
Route::name('admin.')->middleware(['middleware' => 'checkAdminLogin'])->group(function () {
    Route::get('/', function () {
        return view('admin.auth.profile');
    });
    Route::resource('questions', QuestionController::class);
    Route::resource('users', UserController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('kinds', KindController::class);
    Route::resource('answers', AnswerController::class)->except('store');
    Route::post('/answers/{id}', [AnswerController::class, 'store'])->name('answers.store');
    Route::get('admin/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('admin/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');
});
Route::resource('exam', App\Http\Controllers\User\ExamController::class)->except('store');
Route::post('/exam/{id}', [App\Http\Controllers\User\ExamController::class, 'store'])->name('exam.store');
Route::resource('result', ExamResultController::class);
Route::get('result/detail/{exam}', [ExamResultController::class, 'detail'])->name('result.detail');
Route::resource('resultquestion', ExamResultQuestionController::class);
Route::get('/history', [UserAuthController::class, 'history'])->name('history');
Route::get('/congratulation', function(){
    return view('user.exams.result');
});

Route::get('reviews/sahinh', [ReviewController::class, 'sahinh'])->name('reviews.sahinh');
Route::get('reviews/bienbao', [ReviewController::class, 'bienbao'])->name('reviews.bienbao');
Route::get('reviews/luat', [ReviewController::class, 'luat'])->name('reviews.luat');



