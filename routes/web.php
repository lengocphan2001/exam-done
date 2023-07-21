<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\KindController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
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


