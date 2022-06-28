<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\QuestionImport;
use App\Models\Category;
use App\Models\Exammanagement;
use App\Models\Period;
use Maatwebsite\Excel\Facades\Excel;
class QuestionController extends Controller
{
    public function index()
    {

        if(isset($_GET['lesson'])){
            $user = DB::table('questions')
            ->join('boards', 'boards.id', '=', 'questions.board_id')
            ->join('subjects', 'subjects.id', '=', 'questions.subject_id')
            ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
            ->join('media', 'media.id', '=', 'questions.medium_id')
            ->join('periods', 'periods.id', '=', 'questions.class_id')
          ->where('lessons.title',$_GET['lesson'] )
            ->select('boards.title', 'questions.*', 'boards.title as board', 'subjects.subject', 'lessons.title as lesson', 'media.title as medium', 'periods.title as class')
            ->get();
             $boardif=[];
             
        }else{
            $user=[];
            $boardif=[];
        }

        $lesson = DB::table('lessons')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        if(empty(session('SchoolId'))){
            $board = DB::table('boards')->get();
           }elseif(!empty(session('SchoolId'))){
               $board = DB::table('boards')
               ->join('schools','schools.board_id','boards.id')
               ->where('schools.id',session('SchoolId'))
               ->select('boards.id','boards.title')
               ->get();

           }
        $academic = DB::table('academics')->get();
        return view('question.index', compact('board', 'user', 'lesson','subject', 'medium', 'board','boardif', 'class', 'academic'));
    }


    public function groupquestion(){
        if(isset($_GET['lesson'])){
            $user = DB::table('questions')
            ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
          ->where('lessons.title',$_GET['lesson'] )
        ->selectRaw("questions.created_at,lessons.title")
        ->groupby('questions.created_at','lessons.title')
        ->get();
             $boardif=[];
             
        }else{
            $user=[];
            $boardif=[];
        }

        $lesson = DB::table('lessons')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        if(empty(session('SchoolId'))){
            $board = DB::table('boards')->get();
           }elseif(!empty(session('SchoolId'))){
               $board = DB::table('boards')
               ->join('schools','schools.board_id','boards.id')
               ->where('schools.id',session('SchoolId'))
               ->select('boards.id','boards.title')
               ->get();

           }

        $academic = DB::table('academics')->get();
        $user1=true;



        return view('question.index', compact('board', 'user', 'lesson','subject', 'medium', 'board','boardif', 'class', 'academic','user1'));
    }
public function searchstudent(){


if(!empty($_GET['search'])){
    $user = DB::table('students')
    ->where(DB::raw('lower(students.full_name)'), 'like', '%' . strtolower($_GET['student']) . '%')
    ->join('media', 'media.id', '=', 'students.medium_id')
    ->join('periods', 'periods.id', '=', 'students.class_id')
    ->join('academics', 'academics.id', '=', 'students.academic_year')
    ->join('schools', 'schools.id', '=', 'students.school_id')
    ->join('sections', 'sections.id', '=', 'students.section_id')
    ->join('boards', 'boards.id', '=', 'students.board_id')
    ->select('media.title as medium','boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
    ->paginate(10);

}elseif(empty(session('SchoolId')) && isset($_GET['board_id'])){

        $board = $_GET['board_id'];
        $medium = $_GET['medium_id'];
        $class = $_GET['class'];

        $user = DB::table('students')
        ->where('boards.title',$board)
        ->where('media.title',$medium)
        ->where('periods.title',$class)
        ->join('media', 'media.id', '=', 'students.medium_id')
        ->join('periods', 'periods.id', '=', 'students.class_id')
        ->join('academics', 'academics.id', '=', 'students.academic_year')
        ->join('schools', 'schools.id', '=', 'students.school_id')
        ->join('sections', 'sections.id', '=', 'students.section_id')
        ->join('boards', 'boards.id', '=', 'students.board_id')
        ->select('media.title as medium','boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
        ->paginate(10);
        
    }elseif(!empty(session('SchoolId'))){

        $class = $_GET['class'];


        $user = DB::table('students')
        ->where('students.school_id',session('SchoolId'))
        ->where('periods.title',$class)
        ->join('media', 'media.id', '=', 'students.medium_id')
        ->join('periods', 'periods.id', '=', 'students.class_id')
        ->join('academics', 'academics.id', '=', 'students.academic_year')
        ->join('schools', 'schools.id', '=', 'students.school_id')
        ->join('sections', 'sections.id', '=', 'students.section_id')
        ->join('boards', 'boards.id', '=', 'students.board_id')
        ->select('media.title as medium','boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
        ->paginate(10);
   
    }

    $class = DB::table('periods')->get();
           
                 $medium = DB::table('media')->get();
                 $period = DB::table('periods')->get();
                 $academic = DB::table('academics')->get();
                 
                 if(empty(session('SchoolId'))){
                 $board = DB::table('boards')->get();
                }elseif(!empty(session('SchoolId'))){
                    $board = DB::table('boards')
                    ->join('schools','schools.board_id','boards.id')
                    ->where('schools.id',session('SchoolId'))
                    ->select('boards.id','boards.title')
                    ->get();
    
                }
                 $school = DB::table('schools')->get();
                 $section = DB::table('sections')->get();
  

                 return view('student.index', compact('academic', 'school','class', 'section', 'period', 'medium', 'user','board'));
            
}


  
    public function save(Request $request)
    {


        if($request->title){
            
            $question24 = $request->title;
        }elseif($request->title1){
            $question24 = $request->title1;

        }else{
            $question24 ="";
        }


// return $request;

        if($request->file_type =="2"){

$option1 = $request->title_option_1;
$option2 = $request->title_option_2;
$option3 = $request->title_option_3;
$option4 = $request->title_option_4;
$answer0 = $request->title_answer;

        }elseif($request->file_type == "0"){

            $option1 = $request->option_1;
            $option2 = $request->option_2;
            $option3 = $request->option_3;
            $option4 = $request->option_4;
            $answer0 = $request->answer;

            
        }else{

            
            $option1 = "";
            $option2 = "";
            $option3 = "";
            $option4 = "";

            $answer0 = "";
        }

        if ($answer0 == "1") {
            $answer =  $option1;
        } elseif ($answer0 == "2") {
            $answer = $option2;
        } elseif ($answer0 == "3") {
            $answer =  $option3;
        } elseif ($answer0 == "4") {
            $answer =  $option4;
        } else {
            $answer = $answer0;
        }


        $ans = DB::table('lessons')
        ->where('id',$request['lesson_id'])
        ->first();

        $board = $ans->board_id;
        $academic = $request['academic_id'];
        $subject = $ans->subject_id;
        $lesson = $request['lesson_id'];
        $medium = $ans->medium_id;
        $class =$ans->class_id;







        $question = new Question;

        $question->board_id = $board;
        $question->subject_id = $subject;
        $question->lesson_id = $request->get('lesson_id');
        $question->medium_id = $medium;
        $question->class_id = $class;
        $question->academic_id = $request->get('academic_id');
        $question->title = $question24;
        $question->option_1 = $option1;
        $question->option_2 = $option2;
        $question->option_3 =  $option3;
        $question->option_4 = $option4;
        $question->answer =  $answer;
        
        
        $question->answer_image = empty($request->get('answer_image'))?"":$request->get('answer_image');

        if ($request->file('question_image')) {
            $file = $request->file('question_image');
            $destinationPath = 'questions/';
            $profileImage1 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage1 = md5(Str::random(30) . time() . '_' . $request->file('question_image')) . '.' . $request->file('question_image')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage1);
            $question['question_image'] = $profileImage1;
        } 
        if ($request->file('option_image_1')) {
            $file = $request->file('option_image_1');
            $destinationPath = 'questions/';
            $profileImage2 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage2 = md5(Str::random(30) . time() . '_' . $request->file('option_image_1')) . '.' . $request->file('option_image_1')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage2);
            $question['option_image_1'] = $profileImage2;
        }

        if ($request->file('option_image_2')) {
            $file = $request->file('option_image_2');
            $destinationPath = 'questions/';
            $profileImage3 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage3 = md5(Str::random(30) . time() . '_' . $request->file('option_image_2')) . '.' . $request->file('option_image_2')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage3);
            $question['option_image_2'] = $profileImage3;
        }
        if ($request->file('option_image_3')) {
            $file = $request->file('option_image_3');
            $destinationPath = 'questions/';
            $profileImage4 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage4 = md5(Str::random(30) . time() . '_' . $request->file('option_image_3')) . '.' . $request->file('option_image_3')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage4);
            $question['option_image_3'] = $profileImage4;
        }
        if ($request->file('option_image_4')) {
            $file = $request->file('option_image_4');
            $destinationPath = 'questions/';
            $profileImage5 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage5  = md5(Str::random(30) . time() . '_' . $request->file('option_image_4')) . '.' . $request->file('option_image_4')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage5);
            $question['option_image_4'] = $profileImage5;
        }


        $question->save();
        return redirect()->back()
            ->with('success', 'question created successfully.');
    }
    public function store(Request $request)
    {

      
       $ans = DB::table('lessons')
       ->where('id',$request['lesson_id'])
       ->first();
        
        $board = $ans->board_id;
        $academic = $request['academic_id'];
        $subject = $ans->subject_id;
        $lesson = $request['lesson_id'];
        $medium = $ans->medium_id;
        $class =$ans->class_id;

        $request->session()->put('board',  $board);
        $request->session()->put('academic',  $academic);
        $request->session()->put('subject',  $subject);
        $request->session()->put('lesson',  $lesson);
        $request->session()->put('medium',  $medium);
        $request->session()->put('class',  $class);

        Excel::import(new QuestionImport, request()->file('file'));
        return redirect()->back();



    }


    public function show(Question $question)
    {
        return view('question.show', compact('question'));
    }

public function questionDelete(Request $request){

$lesson_id = DB::table("lessons")
->where('title',$request->lesson)
->first();

        $search = DB::table('questions')
            ->where('questions.lesson_id', '=', $lesson_id->id)
            ->where('questions.academic_id', '=', $request->academic_id)
            ->delete();


    if($search){
        return redirect()->back()
            ->with('success', 'question Deleted successfully.');
    }else{
        return redirect()->back()
            ->with('success', 'question Not Deleted');
    }
}


    public function search()
    {      
            
            $search = DB::table('lessons')
             ->where('lessons.board_id', '=', $_GET['board_id'])
             ->where('lessons.medium_id', '=', $_GET['medium_id'])
            ->where('lessons.class_id', '=', $_GET['class_id'])
            ->where('lessons.subject_id', '=', $_GET['subject_id'])
            ->get();
            $boardif =[];
     
            $material = DB::table('materials')
            ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
            ->join('periods', 'periods.id', '=', 'materials.class_id')
            ->join('media', 'media.id', '=', 'materials.medium_id')
            ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
            ->join('boards', 'boards.id', '=', 'materials.board_id')
            ->where('lessons.board_id', '=', $_GET['board_id'])
            ->where('lessons.medium_id', '=', $_GET['medium_id'])
           ->where('lessons.class_id', '=', $_GET['class_id'])
           ->where('lessons.subject_id', '=', $_GET['subject_id'])
            ->select('lessons.title as lesson', 'materials.*','lessons.title as lesson','periods.title as class','subjects.subject','media.title as medium','boards.title as board')
            ->get();


    
        $lesson = DB::table('lessons')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        if(empty(session('SchoolId'))){
            $board = DB::table('boards')->get();
           }elseif(!empty(session('SchoolId'))){
               $board = DB::table('boards')
               ->join('schools','schools.board_id','boards.id')
               ->where('schools.id',session('SchoolId'))
               ->select('boards.id','boards.title')
               ->get();

           }
        $academic = DB::table('academics')->get();
        $alert = "";
        if (sizeof($search) > 0) {
            return view('question.index', compact('search','material','lesson','subject','boardif','medium', 'board', 'class', 'academic'))->with('question table will be filtered');
        } else {
            return redirect()->route('question.index')
                ->with('success', '0 Results Found.');
        }
    }

    public function edit(Request $request, $id)
    {
        $lesson = DB::table('lessons')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        if(empty(session('SchoolId'))){
            $board = DB::table('boards')->get();
           }elseif(!empty(session('SchoolId'))){
               $board = DB::table('boards')
               ->join('schools','schools.board_id','boards.id')
               ->where('schools.id',session('SchoolId'))
               ->select('boards.id','boards.title')
               ->get();

           }


        $academic = DB::table('academics')->get();

        $pannel = DB::table('questions')
            ->where('questions.id', '=', $id)
            ->join('boards', 'boards.id', '=', 'questions.board_id')
            ->join('subjects', 'subjects.id', '=', 'questions.subject_id')
            ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
            ->join('media', 'media.id', '=', 'questions.medium_id')
            ->join('periods', 'periods.id', '=', 'questions.class_id')
            ->select('boards.title', 'questions.*', 'boards.title as board', 'subjects.subject', 'lessons.title as lesson', 'media.title as medium', 'periods.title as class')
            ->get();


           foreach ($pannel as $question) {
            return view('question.edit', compact('question', 'board', 'lesson', 'subject', 'medium', 'board', 'class', 'academic'));
             }
             }
    public function update(Request $request, $id)
    {

        if ($request->get('answer') == "1") {
            $answer = $request->get('option_1');
        } elseif ($request->get('answer') == "2") {
            $answer = $request->get('option_2');
        } elseif ($request->get('answer') == "3") {
            $answer = $request->get('option_3');
        } elseif ($request->get('answer') == "4") {
            $answer = $request->get('option_4');
        } else {
            $answer = $request->get('answer');
        }

        $question = Question::find($id);
        $question->title = $request->get('title');
        $question->option_1 = $request->get('option_1');
        $question->option_2 = $request->get('option_2');
        $question->option_3 = $request->get('option_3');
        $question->option_4 = $request->get('option_4');
        $question->answer = $answer;
        $question->board_id = $request->get('board_id');
        $question->answer_image = empty($request->get('answer_image'))?"":$request->get('answer_image');
        $question->subject_id = $request->get('subject_id');
        $question->lesson_id = $request->get('lesson_id');
        $question->medium_id = $request->get('medium_id');
        $question->class_id = $request->get('class_id');
        $question->academic_id = $request->get('academic_id');

        if ($request->file('question_image')) {
            $file = $request->file('question_image');
            $destinationPath = 'questions/';
            $profileImage1 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage1 = md5(Str::random(30) . time() . '_' . $request->file('question_image')) . '.' . $request->file('question_image')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage1);
            $question['question_image'] = $profileImage1;
        }

        if ($request->file('option_image_1')) {
            $file = $request->file('option_image_1');
            $destinationPath = 'questions/';
            $profileImage2 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage2 = md5(Str::random(30) . time() . '_' . $request->file('option_image_1')) . '.' . $request->file('option_image_1')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage2);
            $question['option_image_1'] = $profileImage2;
        }
        
        if ($request->file('option_image_2')) {
            $file = $request->file('option_image_2');
            $destinationPath = 'questions/';
            $profileImage3 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage3 = md5(Str::random(30) . time() . '_' . $request->file('option_image_2')) . '.' . $request->file('option_image_2')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage3);
            $question['option_image_2'] = $profileImage3;
        }
        
        if ($request->file('option_image_3')) {
            $file = $request->file('option_image_3');
            $destinationPath = 'questions/';
            $profileImage4 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage4 = md5(Str::random(30) . time() . '_' . $request->file('option_image_3')) . '.' . $request->file('option_image_3')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage4);
            $question['option_image_3'] = $profileImage4;

        }
        
        if ($request->file('option_image_4')) {
            $file = $request->file('option_image_4');
            $destinationPath = 'questions/';
            $profileImage5 = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $profileImage5  = md5(Str::random(30) . time() . '_' . $request->file('option_image_4')) . '.' . $request->file('option_image_4')->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage5);
            $question['option_image_4'] = $profileImage5;
        }

        $question->save();

        return redirect()->back()
            ->with('success, Question updated successfully');
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()
            ->with('success', 'Question deleted successfully');
    }

    public function inputquestion(Request $request)
    {
        
        $user = DB::table('questions')
            ->join('boards', 'boards.id', '=', 'questions.board_id')
            ->join('subjects', 'subjects.id', '=', 'subjects.board_id')
            ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
            ->join('media', 'media.id', '=', 'questions.medium_id')
            ->join('periods', 'periods.id', '=', 'questions.class_id')
            ->select('boards.title', 'questions.*', 'boards.title as board', 'subjects.subject', 'lessons.title as lesson', 'media.title as medium', 'periods.title as class')
            ->get();
        $academic = DB::table('academics')->get();
        $lesson = DB::table('lessons')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        $question = Question::latest()->paginate(5);
        return view('question.input', compact('question', 'board', 'user', 'lesson', 'subject', 'medium', 'board', 'class', 'academic'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    ////////////////////////////////////////////////-------Question Management------------------------------////////////////////////


    public function exam()
    {
        $boards = DB::table('boards')
            ->select('boards.id', 'boards.title')
            ->get();
        $class = DB::table('periods')
            ->select('periods.id', 'periods.title')
            ->get();
        $medium = DB::table('media')
            ->select('media.id', 'media.title')
            ->get();
        $questions = DB::table('questions')->get();
        return view('question.exam', compact('boards', 'class', 'medium'));
    }
    

    public function checkquestion()
    {
        
        $category = DB::table('categories')
            ->where('class', '=', $_GET['class'])
            ->where('board', '=', $_GET['board'])
            ->select('no_of_question_sub', 'class', 'time_per_question', 'id as category_id','start_time')
            ->first();

   
         if(empty($category)){
            return redirect()->route('exam')->with('success', 'Not Assigned Category for Board class');
         }


        $question = DB::table('questions')
            ->where('questions.board_id', '=', $_GET['board'])
            ->where('questions.class_id', '=', $_GET['class'])
            ->where('questions.medium_id', '=', $_GET['medium'])
             ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
            ->join('boards', 'boards.id', '=', 'questions.board_id')
            ->select('questions.id','questions.board_id','questions.class_id', 'questions.subject_id')
            ->get();





        $assign = DB::table('exammanagements')
            ->where('questions.board_id', '=', $_GET['board'])
            ->where('questions.class_id', '=', $_GET['class'])
           
            ->where('exammanagements.board_id', '=', $_GET['board'])
            ->where('exammanagements.class_id', '=', $_GET['class'])
           
            ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
            ->select('questions.id', 'exammanagements.subject_id', 'exammanagements.class_id')
            ->get()->unique()->toArray();



    


        $subjects = DB::table('subjects')
        
            ->where('board_id', '=',  $_GET['board'])
            ->where('class_id', '=', $_GET['class'])
            ->select('id as subject_id', 'subject', 'class_id')
            ->orderBy('subject')
            ->get();



            
        $assign = DB::table('exammanagements')
        ->where('questions.board_id', '=', $_GET['board'])
        ->where('questions.class_id', '=', $_GET['class'])
       
        ->where('exammanagements.board_id', '=', $_GET['board'])
        ->where('exammanagements.class_id', '=', $_GET['class'])
       
        ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
    
        ->select('questions.id', 'exammanagements.subject_id', 'exammanagements.class_id')
        ->get();


        if (sizeof($question) > 0) {
            for ($i = 0; $i < sizeof($question); $i++) {
                foreach ($subjects as $data) {
                    if ($question[$i]->subject_id == $data->subject_id) {
                        $sub = array();
                        $sub['quistion_id'] = $question[$i]->id;
                        $sub['subject'] = $data->subject;
                        $sub['subject_id'] = $data->subject_id;
                        $question_array[] = $sub;
                    }
                }
            }
        }

        if (sizeof($assign) > 0) {
            for ($i = 0; $i < sizeof($assign); $i++) {
                foreach ($subjects as $data) {
                    if ($assign[$i]->subject_id == $data->subject_id) {
                        $sub = array();
                        $sub['quistion_id'] = $assign[$i]->id;
                        $sub['subject'] = $data->subject;
                        $sub['subject_id'] = $data->subject_id;
                        $assign_question[] = $sub;
                    }
                }
            }
        }


        if (!isset($assign_question)) {
            $assign_question = [];
        }
        if (!isset($question_array)) {
            $question_array = [];
        }

        $boards = DB::table('boards')
            ->select('boards.id', 'boards.title')
            ->get();
        $class = DB::table('periods')
            ->select('periods.id', 'periods.title')
            ->get();
        $medium = DB::table('media')
            ->select('media.id', 'media.title')
            ->get();

        $subject = DB::table('subjects')->pluck("subject", "id");
        $board_id = $_GET['board'];
        $class_id = $_GET['class'];
        $media = $_GET['medium'];
        
         
        if (sizeof($question) > 0) {
            return view('question.exam', compact(
                'boards',
                'class',
                'media',
                'class_id',
                'board_id',
                'class',
                'medium',
                'subject',
                'subjects',
                'question_array',
                'assign_question',
                'category' 
            
            ));
            
        } else {
            
            if (sizeof($subjects) > 0  && isset($questionnotassign)) {
                return view(
                    'question.exam',
                     compact(
                    'boards',
                    'class',
                    'media',
                    'class_id',
                    'board_id',
                    'class',
                    'medium',
                    'subject',
                    'subjects',
                    'assign_question',
                    'question_array',
                    'category',
                    'questionnotassign'
                 
                ));

            } else {
    return redirect()->route('exam')->with('success', 'Not Assigned Subject For Class And Board');
            }
        }
    }
    
    public function toquestion(Request $request)
    {
        $time =$request->start_time;
        $lesson = DB::table('lessons')
        ->join('questions','questions.lesson_id','=','lessons.id')
        ->select('lessons.id','lessons.title','lessons.subject_id')
        ->get()->unique()->toArray();
        $board = $request['board'];
        $class_id = $request['class'];
        $media = $request['medium'];
        $category = $request['category_id'];
        $subject = $request->subject_id;
        return view('question.quesintern', compact('lesson', 'board', 'class_id','time', 'media', 'category', 'subject'));
   
    }
    
    
  public function getquestion(Request $request)
    {



        $check = DB::table("categories")
        ->where("board", '=', $request->board)
        ->where("class", '=', $request->period)
        ->first();
     

            if ($check) {
                $request->session()->put('category_id', $check->id);
                $request->session()->put('no_question', $check->no_of_question_sub);
            }
            

            $checkexists =DB::table("exammanagements")
            ->where("lesson_id", $request->lesson)
            ->where("class_id", $request->period)
            ->where("board_id", $request->board)
            ->where("medium_id", $request->medium)
            ->orderBy('id','desc')
            ->select('question_id')->get()
            ->toarray();

            foreach($checkexists as $qdata){
             $arr[]=$qdata->question_id;  
            }

            if(!isset($arr)){
              $arr = array();
             }

              $question1 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->whereNotIn('id',$arr)
                ->take(10)->get()->unique();
                
            
if(sizeof($question1) <= $check->no_of_question_sub){

    $question1 = DB::table("questions")
    ->where("lesson_id", $request->lesson)
    ->where("class_id", $request->period)
    ->where("board_id", $request->board)
    ->where("medium_id", $request->medium)
   ->take($check->no_of_question_sub)
    ->orderByRaw("RAND()")->get()->unique();

 }

$question2 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->whereNotIn('id',$arr)
                ->skip(11)->take(10)->get()->unique();

                if(sizeof($question2) <= $check->no_of_question_sub ){

                    $question2 = DB::table("questions")
                    ->where("lesson_id", $request->lesson)
                    ->where("class_id", $request->period)
                    ->where("board_id", $request->board)
                    ->where("medium_id", $request->medium)
                    ->skip(8)->take($check->no_of_question_sub)
                    ->orderByRaw("RAND()")->get()->unique();
                
                }



            $question3 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->whereNotIn('id',$arr)
                ->skip(21)->take(10)->get()->unique();

                if(sizeof($question3)<= $check->no_of_question_sub ){

                    $question3 = DB::table("questions")
                    ->where("lesson_id", $request->lesson)
                    ->where("class_id", $request->period)
                    ->where("board_id", $request->board)
                    ->where("medium_id", $request->medium)
                    
                    ->skip(10)->take($check->no_of_question_sub)
                    ->orderByRaw("RAND()")->get()->unique();
                }



            $question4 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->whereNotIn('id',$arr)
                
                ->skip(31)->take(10)->get()->unique();


                if(sizeof($question4) <= $check->no_of_question_sub ){

                    $question4 = DB::table("questions")
                    ->where("lesson_id", $request->lesson)
                    ->where("class_id", $request->period)
                    ->where("board_id", $request->board)
                    ->where("medium_id", $request->medium)
                    
                    ->skip(40)->take($check->no_of_question_sub)
                    ->orderByRaw("RAND()")->get()->unique();
                }


            $question5 = DB::table("questions")

                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->whereNotIn('id',$arr)
                ->skip(41)->take(10)->get()->unique();




                if(sizeof($question5) <= $check->no_of_question_sub ){

                    $question5 = DB::table("questions")
                    ->where("lesson_id", $request->lesson)
                    ->where("class_id", $request->period)
                    ->where("board_id", $request->board)
                    ->where("medium_id", $request->medium)
                    ->skip(50)->take($check->no_of_question_sub)
                    ->orderByRaw("RAND()")->get()->unique();

                }


            $random1 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->orderByRaw("RAND()")->get()->unique();

            $random2 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->orderByRaw("RAND()")->get()->unique();


            $random3 = DB::table("questions")
                ->where("lesson_id", $request->lesson)
                ->where("class_id", $request->period)
                ->where("board_id", $request->board)
                ->where("medium_id", $request->medium)
                ->orderByRaw("RAND()")->get()->unique();

            foreach ($question1 as $qc) {
                $academic = $qc->academic_id;
            }
            if (sizeof($question1) > 0) {
                $request->session()->put('class_id', $request->period);
                $request->session()->put('academic_id', $academic);
                $request->session()->put('board_id', $request->board);
                $request->session()->put('medium_id', $request->medium);
                $request->session()->put('subject_id', $request->subject);
                $request->session()->put('lesson_id', $request->lesson);
                $request->session()->put('date', $request->date);

                return view('question.getquestion',compact('question1', 'question2', 'question3', 'question4', 'question5', 'random1', 'random2', 'random3'));

            }else{

                return redirect()->route('exam')->with('success', '0 Question found');
 }     
 }


    public function examquestion(Request $request)
    {
        $day1 = $request['day1'];
     

     if(!empty($day1)){
 
    foreach ($day1 as $save_exam) {
        $question = new Exammanagement;
        $question->question_id = $save_exam;
        $question->date = $request['date1'];
        $question->class_id = session('class_id');
        $question->academic_id = session('academic_id');
        $question->subject_id = session('subject_id');
        $question->lesson_id = session('lesson_id');
        $question->medium_id = session('medium_id');
        $question->category_id = session('category_id');
        $question->board_id = session('board_id');
        $question->save();
    }

}

  
        $day2 = $request['day2'];

        if(!empty($day2)>0){


        foreach ($day2 as $save_exam) {
            $question = new Exammanagement;
            $question->question_id = $save_exam;
            $question->date = $request['date2'];
            $question->class_id = session('class_id');
            $question->academic_id = session('academic_id');
            $question->subject_id = session('subject_id');
            $question->lesson_id = session('lesson_id');
            $question->medium_id = session('medium_id');
            $question->board_id = session('board_id');
            $question->category_id = session('category_id');
            $question->save();
        }

    }

        $day3 = $request['day3'];

        if(!empty($day3)>0){


        foreach ($day3 as $save_exam) {
            $question = new Exammanagement;
            $question->question_id = $save_exam;
            $question->date = $request['date3'];
            $question->class_id = session('class_id');
            $question->academic_id = session('academic_id');
            $question->subject_id = session('subject_id');
            $question->lesson_id = session('lesson_id');
            $question->medium_id = session('medium_id');
            $question->board_id = session('board_id');
            $question->category_id = session('category_id');
            $question->save();
        }
    }
        $day4 = $request['day4'];


        if(!empty($day4)>0){

        foreach ($day4 as $save_exam) {
            $question = new Exammanagement;
            $question->question_id = $save_exam;
            $question->date = $request['date4'];
            $question->class_id = session('class_id');
            $question->subject_id = session('subject_id');
            $question->academic_id = session('academic_id');
            $question->lesson_id = session('lesson_id');
            $question->medium_id = session('medium_id');
            $question->board_id = session('board_id');
            $question->category_id = session('category_id');
            $question->save();
        }
    }
        $day5 = $request['day5'];


        if(!empty($day5)>0){
    
        foreach ($day5 as $save_exam) {
            $question = new Exammanagement;
            $question->question_id = $save_exam;
            $question->date = $request['date5'];
            $question->class_id = session('class_id');
            $question->subject_id = session('subject_id');
            $question->academic_id = session('academic_id');
            $question->lesson_id = session('lesson_id');
            $question->medium_id = session('medium_id');
            $question->board_id = session('board_id');
            $question->category_id = session('category_id');
            $question->save();
        }
    }
        return redirect()->route('exam')
            ->with('success', 'Question Added successfully');
    }
}
