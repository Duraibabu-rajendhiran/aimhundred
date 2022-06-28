<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Stroage;
use App\Http\Controllers\MediumController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ExammanagementController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('log/{id}', [ManagementController::class, 'log']);



Route::post('/up/{id}', [ManagementController::class, 'up']);


Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::resource('management', ManagementController::class);
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::get('/download/{file_name}',[MaterialController::class,'download']);

Route::get('/send-email',[ExammanagementController::class,'sendEmail']);
Route::get('/view/{is}',[MaterialController::class,'view']);


Route::group(['middleware' => ['AuthCheck']], function () {

  
    Route::get('/', function () {
        return view('home');
    });

    ///resource file
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::resource('board', BoardController::class);
    Route::resource('medium', MediumController::class);
    Route::resource('section', SectionController::class);
    Route::resource('location', LocationController::class);
    Route::resource('school', SchoolController::class);
    Route::resource('period', PeriodController::class);
    Route::resource('academic', AcademicController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('student', StudentController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('lesson', LessonController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('material', MaterialController::class);
    Route::resource('category', CategoryController::class);
    Route::get('home',[HomeController::class, 'index'])->name('home');

    Route::post('question/save', [QuestionController::class, 'save'])->name('question.save');
    Route::post('search', [QuestionController::class, 'search'])->name('search');
    Route::post('save', [StudentController::class, 'save'])->name('save');
    Route::get('exam', [QuestionController::class, 'exam'])->name('exam');
    Route::get('getmedium', [QuestionController::class, 'getmedium'])->name('getmedium');
    Route::get('getperiod', [QuestionController::class, 'getperiod'])->name('getperiod');
    Route::get('getsubject', [QuestionController::class, 'getsubject'])->name('getsubject');
    Route::get('getlession', [QuestionController::class, 'getlesson'])->name('getlession');
    Route::post('examquestion', [QuestionController::class, 'examquestion'])->name('examquestion');
    Route::get('getcategory', [QuestionController::class, 'getcategory'])->name('getcategory');
    Route::post('getquestion', [QuestionController::class, 'getquestion'])->name('getquestion');
    Route::get('inputquestion', [QuestionController::class, 'inputquestion'])->name('inputquestion');
    Route::resource('exammanagement', ExammanagementController::class);
    Route::post('getdate', [ExammanagementController::class, 'getdate'])->name('getdate');
});
