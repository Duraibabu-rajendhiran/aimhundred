<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 

/////

Route::post('/login',[ApiController::class,'login']);
Route::get('/list-class',[ApiController::class,'periodData']);
Route::get('/list-Academic',[ApiController::class,'getAcademic']);
Route::post('/list-School',[ApiController::class,'Schooldata']);
Route::get('/list-Medium',[ApiController::class,'getMedium']);
Route::get('/list-Section',[ApiController::class,'getSection']);
Route::get('/list-Board',[ApiController::class,'getBoard']);
Route::post('/add-Board',[ApiController::class,'addBoard']);
Route::post('/studentresult',[ApiController::class,'studentresult']);
Route::post('/Board-update',[ApiController::class,'updateBoard']);
Route::post('/list-Notice',[ApiController::class,'noticelist']);
Route::delete('/delete-Board',[ApiController::class,'deleteBoard']);


//////   Medium Api /////

Route::post('/add-Medium',[ApiController::class,'addMedium']);
Route::post('/Medium-update',[ApiController::class,'updateMedium']);
Route::delete('/delete-Medium',[ApiController::class,'deleteMedium']);


//////Section Api ///////
Route::post('/add-Secton',[ApiController::class,'addSection']);
Route::post('/Secton-update',[ApiController::class,'updateSecton']);
Route::delete('/delete-Secton',[ApiController::class,'deleteSecton']);


/////location Api ///////////
Route::get('/get-Location',[ApiController::class,'getLocation']);
Route::post('/add-Location',[ApiController::class,'addLocation']);
Route::post('/Location-update',[ApiController::class,'updateLocation']);
Route::delete('/delete-Location',[ApiController::class,'deleteLocation']);


//////////////////////////////////////school Api /////////////////////
Route::post('/add-School',[ApiController::class,'addSchool']);
Route::post('/School-update',[ApiController::class,'updateSchool']);
Route::delete('/delete-School',[ApiController::class,'deleteSchool']);

/////////////////////////////////////Class Api ////////////////////////

Route::post('/add-Class',[ApiController::class,'addPeriod']);

Route::post('/Class-update',[ApiController::class,'updatePeriod']);
Route::delete('/delete-Class',[ApiController::class,'deletePeriod']);

/////////////////////////////////////Academic Api /////////////////////

Route::post('/add-Academic',[ApiController::class,'addAcademic']);
Route::post('/Academic-update',[ApiController::class,'updateAcademic']);
Route::delete('/delete-Academic',[ApiController::class,'deleteAcademic']);

////////////////////////////////////////StudentApi //////////////////////
Route::post('/Student-update',[ApiController::class,'updateStudent']);
Route::delete('/delete-Student',[ApiController::class,'deleteStudent']);
Route::get('/Student-data',[ApiController::class,'Studentdata']);


////////////////////////////////////////////--------Question data----------------------////////////////////////////////////////

Route::post('/add-Question',[ApiController::class,'addQuestion']);
Route::post('/Question-update',[ApiController::class,'updateQuestion']);
Route::delete('/delete-Question',[ApiController::class,'deleteQuestion']);
Route::get('/Question-data',[ApiController::class,'Questiondata']);

//////////////////////////////////////////////////////////-------Question Api----------------------//////////////////////////////////////////

Route::post('/exam',[ApiController::class,'QuestionApi']);
Route::post('/check-device-id',[ApiController::class,'checkid']);
Route::post('/getquestionlist',[ApiController::class,'questionapi']);
Route::post('/gettomorrowsexam',[ApiController::class,'gettomorrowexam']);

//////////////////////////////////////////////////////////-------Add student---------------------//////////////////////////

Route::post('/Registration',[ApiController::class,'addStudent']);
Route::post('/add-list',[ApiController::class,'add-list']);
Route::post('/List_All_Subject',[ApiController::class,'allsubjects']);
Route::post('/List_All_Lessons',[ApiController::class,'alllessons']);
Route::post('/List_All_Materials',[ApiController::class,'allmaterials']);
Route::get('/list_all_banners',[ApiController::class,'bannerlist']);

////////////////////////////////////////--------Exam Api =----------------///////////////////

Route::post('/submitexam',[ApiController::class,'addresult']);
Route::post('/score',[ApiController::class,'resultout']);
Route::post('/allscore',[ApiController::class,'allresultout']);
Route::post('/praticeapi',[ApiController::class,'praticeapi']);
Route::post('/praticedetailapi',[ApiController::class,'praticedetailapi']);


////////////////////////////////////-----------Time Table ---------------------//////////

Route::post('/timetable',[ApiController::class,'timetable']);
Route::post('/getclass',[ApiController::class,'getclass']);
Route::post('/list_subscriptions_plan',[ApiController::class,'getpayment']);
Route::post('/purchase_plan',[ApiController::class,'subcription']);
Route::post('/transcationhist',[ApiController::class,'transcationhist']);
Route::post('/listvideo',[ApiController::class,'listvideo']);
Route::get('/hitcount',[ApiController::class,'hitcount']);
Route::post('/addremovelikes',[ApiController::class,'addremovelikes']);