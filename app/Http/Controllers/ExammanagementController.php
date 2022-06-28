<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Exammanagement;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ExammanagementController extends Controller
{
   
    public function index()
    {  



  $management = DB::table('exammanagements')
    -> join('subjects','subjects.id','=','exammanagements.subject_id')
    -> join('lessons','lessons.id','=','exammanagements.lesson_id')
    -> join('periods','periods.id','=','exammanagements.class_id')
    -> join('categories','categories.id','=','exammanagements.category_id')
    -> join('media','media.id','=','exammanagements.medium_id')
    -> join('boards','boards.id','=','exammanagements.board_id')
    ->selectRaw("periods.title")
    ->groupby('periods.title')
    ->get();
    return view('exam.index',compact('management'));
    }

public function getuploadview($id){

$lession_id = $id;
$academic= DB::table('academics')->get();
return view('question.Viewupload',compact('lession_id','academic'));

}



public function getddate($id){

$arr=explode('-for-',$id);

$arr1=explode('-delete-',$id);
// return $arr;

if(count($arr1)>1){

  $class_id=DB::table('periods')
  ->where('title',$arr1[0])
  ->first();
  
  $checkshow = DB::table('exammanagements')
  ->where('exammanagements.date',$arr1[1])
  ->where('exammanagements.class_id',$class_id->id)
  ->select('*')
  ->delete();
  

}else{

  $class_id=DB::table('periods')
  ->where('title',$arr[0])
  ->first();
  
  $checkshow = DB::table('exammanagements')
  ->where('exammanagements.date',$arr[1])
  ->where('exammanagements.class_id',$class_id->id)
  ->select('*')
  ->get();
  
  
  if($checkshow[0]->is_show == 0){
  
    $user=DB::table('exammanagements')
    ->where('exammanagements.date',$arr[1])
    ->where('exammanagements.class_id',$class_id->id)
    ->update(array('is_show' => 1));
  
  }else{
  
    $user = DB::table('exammanagements')
    ->where('exammanagements.date',$arr[1])
    ->where('exammanagements.class_id',$class_id->id)
    ->update(array('is_show' => 0));
  }



}


// ?"true":"false";



return redirect()->back();


}


public function getdateit($id)
{

$arr = explode('-for-',$id);

$class_id=DB::table('periods')
->where('title',$arr[1])
->first();

$user = DB::table('exammanagements')
      ->join('subjects', 'subjects.id', '=', 'exammanagements.subject_id')
      ->join('lessons', 'lessons.id', '=', 'exammanagements.lesson_id')
      ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
      ->where('exammanagements.class_id',$class_id->id)
      ->where('exammanagements.date',$arr[0])
      ->select('questions.*')
->get();


  return view('exam.getdate', compact('user'));

}


    public function getdate($id)
    {

         $class_id=DB::table('periods')
         ->where('title',$id)
         ->first();

            $user  = DB::table('exammanagements')
            -> join('subjects','subjects.id','=','exammanagements.subject_id')
            -> join('lessons','lessons.id','=','exammanagements.lesson_id')
            -> join('periods','periods.id','=','exammanagements.class_id')
            -> join('categories','categories.id','=','exammanagements.category_id')
            -> join('media','media.id','=','exammanagements.medium_id')
            -> join('boards','boards.id','=','exammanagements.board_id')
            ->where('exammanagements.class_id',$class_id->id)
            ->selectRaw("exammanagements.date,exammanagements.is_show,periods.title,categories.start_time")
            ->groupby('periods.title','exammanagements.date','is_show','categories.start_time')
            ->orderByDesc('exammanagements.date')
            ->get();
         

        return view('exam.view', compact('user'));

    }

    public function getsubject(){
        $management = DB::table('exammanagements')->get();
    }

  public function deletequestion($id){

    $sub = explode("-sub-",$id);

$delete = DB::table('questions')
->where('class_id',$sub[0])
->where('subject_id',$sub[1])
->delete();
return redirect()->back();



  }


}
