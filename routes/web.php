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
use App\Models\Section;

Auth::routes();

Route::group(['middleware' => ['AuthCheck']], function () {
    //////////////////////------------- Home --------//////////////  
    Route::get('/', function () {
        return view('home');
    });
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['redirect']], function(){
        Route::resource('management', ManagementController::class);
        Route::resource('board', BoardController::class);
        Route::resource('medium', MediumController::class);
        Route::resource('location', LocationController::class);
        Route::resource('lesson', LessonController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('academic', AcademicController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('school', SchoolController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('exammanagement', ExammanagementController::class);
    });
    
    
    Route::resource('section', SectionController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('question', QuestionController::class);

    Route::get('getdate/{id?}', [ExammanagementController::class, 'getdate'])->name('getdate');
    Route::get('getdateit/{id?}', [ExammanagementController::class, 'getdateit'])->name('getdateit');


    // delete  
    Route::get('deletequestion/{id?}', [ExammanagementController::class, 'deletequestion'])->name('deletequestion');
    Route::get('getuploadview/{id?}', [ExammanagementController::class, 'getuploadview'])->name('getuploadview');
    Route::get('getddate/{id?}', [ExammanagementController::class, 'getddate'])->name('getddate');
    Route::get('promote_get', [StudentController::class, 'promote_get'])->name('promote_get');
    Route::get('addbook', [StudentController::class, 'addbook'])->name('addbook');
    Route::post('addbook1', [StudentController::class, 'addbook1'])->name('addbook1');
    Route::get('deletebook/{id?}', [StudentController::class, 'deletebook'])->name('deletebook');

    Route::post('save', [StudentController::class, 'save'])->name('save');
    Route::post('promote', [StudentController::class, 'promote'])->name('promote');

    Route::get('searchlession', [LessonController::class, 'searchlession'])->name('searchlession');
    Route::get('searchsub', [SubjectController::class, 'searchsub'])->name('searchsub');
    Route::get('searchvideo', [SubjectController::class, 'searchvideo'])->name('searchvideo');

    //////////////////////////////////////////////////------- period controller ----/////////////
    
    Route::get('timetable', [PeriodController::class, 'timetable'])->name('timetable');
    Route::get('classbase', [SectionController::class, 'classbase'])->name('classbase');
    Route::get('slotsdelete/{id?}', [PeriodController::class, 'slotsdelete'])->name('slotsdelete');
    Route::get('classbasedelete/{id?}', [SectionController::class, 'classbasedelete'])->name('classbasedelete');
    Route::get('settime', [PeriodController::class, 'settime'])->name('settime');
    Route::get('exboard', [PeriodController::class, 'exboard'])->name('exboard');
    Route::get('exschool', [PeriodController::class, 'exschool'])->name('exschool');
    Route::get('exmedium', [PeriodController::class, 'exmedium'])->name('exmedium');
    Route::get('experiod', [PeriodController::class, 'experiod'])->name('experiod');
    Route::get('exstudent', [PeriodController::class, 'exstudent'])->name('exstudent');
    Route::get('promote_student', [StudentController::class, 'promote_student'])->name('promote_student');
    Route::get('classit', [PeriodController::class, 'classit'])->name('classit');
    Route::get('subjectit', [PeriodController::class, 'subjectit'])->name('subjectit');
    Route::get('boardit', [PeriodController::class, 'boardit'])->name('boardit');
    Route::get('boardt', [PeriodController::class, 'boardt'])->name('boardit');
    Route::get('viwetimet/{id?}', [PeriodController::class, 'viwetimet'])->name('viwetimet');
    Route::get('deletetimes/{id?}', [PeriodController::class, 'deletetimes'])->name('deletetimes');
    Route::get('score', [PeriodController::class, 'score'])->name('score');
    Route::get('addtimeslot', [PeriodController::class, 'addtimeslot'])->name('addtimeslot');

    /////////////////////////////////////////  POST  //////////////////////////////////

    Route::resource('period', PeriodController::class);
    Route::put('savetimeupdate/{id?}', [PeriodController::class, 'savetimeupdate'])->name('savetimeupdate');
    Route::post('saveperiod', [PeriodController::class, 'saveperiod'])->name('saveperiod');
    Route::post('savetimetable', [PeriodController::class, 'savetimetable'])->name('savetimetable');
    Route::post('uploadcsv', [PeriodController::class, 'uploadcsv'])->name('uploadcsv');
    Route::post('viewtimetable', [PeriodController::class, 'viewtimetable'])->name('viewtimetable');
    Route::post('store_classbase', [SectionController::class, 'store_classbase'])->name('store_classbase');
    
    ///////////////////////////////////////////////-------------Question Controller ----------------/////////////////////////
    /////GET


    Route::get('getmedium', [QuestionController::class, 'getmedium'])->name('getmedium');
    Route::get('getperiod', [QuestionController::class, 'getperiod'])->name('getperiod');
    Route::get('getsubject', [QuestionController::class, 'getsubject'])->name('getsubject');
    Route::get('getlession', [QuestionController::class, 'getlesson'])->name('getlession');
    Route::get('getcategory', [QuestionController::class, 'getcategory'])->name('getcategory');
    Route::get('inputquestion', [QuestionController::class, 'inputquestion'])->name('inputquestion');
    Route::get('exam', [QuestionController::class, 'exam'])->name('exam');
    Route::get('searchschool', [SchoolController::class, 'searchschool'])->name('searchschool');


    ////post
    Route::post('examquestion', [QuestionController::class, 'examquestion'])->name('examquestion');
    Route::get('searchstudent', [QuestionController::class, 'searchstudent'])->name('searchstudent');
    Route::get('checkquestion', [QuestionController::class, 'checkquestion'])->name('checkquestion');
    Route::post('getquestion', [QuestionController::class, 'getquestion'])->name('getquestion');
    Route::post('toquestion', [QuestionController::class, 'toquestion'])->name('toquestion');
    Route::post('question/save', [QuestionController::class, 'save'])->name('question.save');
    Route::get('search', [QuestionController::class, 'search'])->name('search');
    Route::post('questionDelete', [QuestionController::class, 'questionDelete'])->name('questionDelete');
    Route::delete('deletesubject/{id?}', [SubjectController::class, 'deletesubject'])->name('deletesubject');


    ////////////////////----------------MainController------------///////////
    Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');

    Route::get('blockview/{id?}', [ManagementController::class, 'blockview'])->name('blockview');
    Route::get('/send-email', [ExammanagementController::class, 'sendEmail']);
    Route::get('/view/{is}', [MaterialController::class, 'view']);
    Route::post('/up/{id}', [ManagementController::class, 'up']);
    Route::get('/block', [ManagementController::class, 'block'])->name('block');
    Route::get('/unblock', [ManagementController::class, 'unblock'])->name('unblock');
    Route::get('/blockit/{id}', [ManagementController::class, 'blockit'])->name('blockit');
    Route::get('/blockit1/{id}', [ManagementController::class, 'blockit1'])->name('blockit1');
   });

Route::get('log/{id}', [ManagementController::class, 'log']);
Route::get('/lockuser/{id}', [ManagementController::class, 'lockuser']);
Route::get('/download/{file_name}', [MaterialController::class, 'download']);
Route::get('downloadex/{id?}', [PeriodController::class, 'downloadex'])->name('downloadex');
Route::get('overall/{id?}', [PeriodController::class, 'overall'])->name('overall');
Route::get('schoolt/{id?}', [PeriodController::class, 'schoolt'])->name('schoolt');
Route::get('overmark/{id?}', [PeriodController::class, 'overmark'])->name('overmark');




Route::post('exceldownload', [PeriodController::class, 'exceldownload'])->name('exceldownload');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/payment', [SubjectController::class, 'payment'])->name('payment');
Route::get('/viewsub/{id}', [SubjectController::class, 'viewsub'])->name('viewsub');
Route::get('/view_sub/{id}', [SubjectController::class, 'view_sub'])->name('view_sub');
Route::post('/callplan/{id}', [SubjectController::class, 'callplan'])->name('callplan');
Route::post('/payit', [SubjectController::class, 'payit'])->name('payit');
Route::get('/deletepay/{id}', [SubjectController::class, 'deletepay'])->name('deletepay');
Route::get('/editpay/{id}', [SubjectController::class, 'editpay'])->name('editpay'); 
Route::get('/viewdetail', [SubjectController::class, 'viewdetail'])->name('viewdetail'); 
Route::post('/updatepay/{id}', [SubjectController::class, 'updatepay'])->name('updatepay'); 

Route::get('/paymentg', [LessonController::class, 'paymentg'])->name('paymentg');
Route::get('/viewsubg/{id}', [LessonController::class, 'viewsubg'])->name('viewsubg');
Route::post('/callplang/{id}', [LessonController::class, 'callplang'])->name('callplang');
Route::post('/payitg', [LessonController::class, 'payitg'])->name('payitg');
Route::get('/deletepayg/{id}', [LessonController::class, 'deletepayg'])->name('deletepayg');
Route::get('/editpayg/{id}', [LessonController::class, 'editpayg'])->name('editpayg'); 
Route::get('/viewdetailg', [LessonController::class, 'viewdetailg'])->name('viewdetailg'); 
Route::post('/updatepayg/{id}', [LessonController::class, 'updatepayg'])->name('updatepayg'); 
Route::get('video', [LessonController::class, 'video'])->name('video');
Route::post('videocreate', [LessonController::class, 'videocreate'])->name('videocreate');
Route::get('videoedit/{id}', [LessonController::class, 'videoedit'])->name('videoedit');
Route::post('videoupdate/{id}', [LessonController::class, 'videoupdate'])->name('videoupdate');
Route::get('videodelete/{id}', [LessonController::class, 'videodelete'])->name('videodelete');
Route::get('teacherDelete/{id}', [LessonController::class, 'teacherDelete'])->name('teacherDelete');
Route::get('AddUser', [LessonController::class, 'AddUser'])->name('AddUser');
Route::post('addteacher', [LessonController::class, 'addteacher'])->name('addteacher');
Route::get('groupquestion', [QuestionController::class, 'groupquestion'])->name('groupquestion');


