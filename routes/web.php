<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\KindController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ExamResultController;
use App\Http\Controllers\User\ExamResultQuestionController;
use App\Http\Controllers\User\UserAuthController;
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
Route::resource('resultquestion', ExamResultQuestionController::class);


