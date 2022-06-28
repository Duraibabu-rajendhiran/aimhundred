<?php
namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Period;
use App\Models\Slot;
use App\Models\Time;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Exports\QuestionExport;
use App\Exports\ResultExport;
use App\Exports\ResultExport1;
use Illuminate\Support\Facades\Session;
class PeriodController extends Controller
{
    public function index()
    {
        $period = Period::
        orderByRaw('CONVERT(title, SIGNED) asc')
        ->get();
        return view('period.index', compact('period'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:periods,title',
            'updated' => 'required',
        ]);
        Period::create($request->all());
        return redirect()->route('period.index')
            ->with('success', 'Class added successfully.');
    }
    public function edit(Period $period)
    {
        return view('period.edit', compact('period'));
    }
    public function update(Request $request, Period $period)
    {
        $request->validate([
            'title' => 'required',
            'updated' => 'required',
        ]);
        $period->update($request->all());
        return redirect()->route('period.index')
            ->with('success', 'class updated successfully');
    }
    
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('period.index')
            ->with('success', 'Class deleted successfully');
    }

    public function score()
    {
        if (empty(session('SchoolId'))) {
            $class = DB::table('periods')->get();
        } elseif (!empty(session('SchoolId'))) {
            $class = DB::table('periods')
                ->join('results', 'results.class_id', '=', 'periods.id')
                ->where('results.school_id', '=', session('SchoolId'))
                ->select('periods.id', 'periods.title')
                ->get()->unique()->toArray();
        }
        $board = DB::table('boards')->get();
        return view('period.score', compact('board', 'class'));
    }

    public function exceldownload(Request $request)
    {
        $fetchdata = DB::table('results')
            ->where("results.class_id", $request->class)
            ->where("results.school_id", $request->school)
            ->join('periods', 'periods.id', 'results.class_id')
            ->join('students', 'students.id', 'results.student_id')
            ->join('schools', 'schools.id', 'results.school_id')
            ->select('students.full_name', 'schools.school_name', 'periods.title as class', 'students.id')
            ->get()->unique();
            // dd($fetchdata);
        if (empty(session('SchoolId'))) {
            $class = DB::table('periods')->get();
        } elseif (!empty(session('SchoolId'))) {
            $class = DB::table('periods')
                ->join('results', 'results.class_id', '=', 'periods.id')
                ->where('results.school_id', '=', session('SchoolId'))
                ->select('periods.id', 'periods.title')
                ->get()->unique()->toArray();
        }
        
        $board = DB::table('boards')->get();
        return view('period.score', compact('fetchdata', 'board', 'class'));
     }

     public function overall($id){
        $student = $id;
        $student_name = DB::table('students')
            ->where('id', '=', $student)
            ->first();

            $val = DB::table('students')
            ->where('students.id', '=', $student)
            ->join('schools','schools.id','students.school_id')
            ->join('periods','periods.id','students.class_id')
            ->select('schools.school_name','periods.title')
            ->first();
             session()->pull('head1');

Session::put('head1', $val);

            $use = DB::table('results')
                ->where('results.medium_id', $student_name->medium_id)
                ->where('results.class_id', $student_name->class_id)
                ->where('results.school_id', $student_name->school_id)
                ->join('students', 'students.id', '=', 'results.student_id')
                ->selectRaw("SUM(time_left) as total_time,SUM(marks) as total_mark,student_id,students.full_name,students.profile_image")
                ->groupby('results.student_id', 'students.full_name', 'students.profile_image')
                ->orderBy('total_mark', 'desc')
                ->orderBy('total_time', 'asc')
                ->get();

            $a = 0;
            
            foreach ($use as $rank) {
                if ($rank->student_id == $id) {
                    $Array = array();
                    $Array['rank'] = ++$a;
                    $Array['full_name'] = $rank->full_name;
                    $Array['total_time'] = substr($rank->total_time/60,0,3)."Mintes";
                    $Array['total_mark'] = $rank->total_mark;
                    $single[] = $Array;
                    
                } else {

                    $resultArray = array();
                    $resultArray['rank'] = ++$a;
                    $resultArray['full_name'] = $rank->full_name;
                    $resultArray['total_time'] = substr($rank->total_time/60,0,3)."Mintes";
                    $resultArray['total_mark'] = $rank->total_mark;
                 
                    $outputArray[] = $resultArray;
                }
            }

            if(!isset($single)){
                $single = array();
            }

            if(!isset($outputArray)){
                $outputArray = array();
            }

 $value = array_merge($single,$outputArray);

 return Excel::download(new ResultExport($value), $student_name->full_name . $student . '.xlsx');

 }



     public function overmark($id){
 
        $student = $id;
        $student_name = DB::table('students')
            ->where('id', '=', $student)
            ->first();

            $val = DB::table('students')
            ->where('students.id', '=', $student)
            ->join('schools','schools.id','students.school_id')
            ->join('periods','periods.id','students.class_id')
            ->select('schools.school_name','periods.title')
            ->first();
       
session()->pull('head1');
Session::put('head1', $val);
            $use = DB::table('results')
                ->where('results.medium_id', $student_name->medium_id)
                ->where('results.class_id', $student_name->class_id)
                ->join('students', 'students.id', '=', 'results.student_id')
                ->join('schools', 'schools.id', '=', 'results.school_id')
                ->selectRaw("SUM(time_left) as total_time,SUM(marks) as total_mark,student_id,students.full_name,students.profile_image,schools.school_name")
                ->groupby('results.student_id', 'students.full_name', 'students.profile_image','schools.school_name')
                ->orderBy('total_mark', 'desc')
                ->orderBy('total_time', 'asc')
                ->get();

            $a = 0;
            
            foreach ($use as $rank) {
                if ($rank->student_id == $id) {
                    $Array = array();
                    $Array['rank'] = ++$a;
                    $Array['full_name'] = $rank->full_name;
                    $Array['school_name'] = $rank->school_name;
                    $Array['total_time'] = substr($rank->total_time/60,0,3)."Mintes";
                    $Array['total_mark'] = $rank->total_mark;
                    $single[] = $Array;
                    
                } else {

                    $resultArray = array();
                    $resultArray['rank'] = ++$a;
                    $resultArray['full_name'] = $rank->full_name;
                    $resultArray['school_name'] = $rank->school_name;
                    $resultArray['total_time'] = substr($rank->total_time/60,0,3)."Mintes";
                    $resultArray['total_mark'] = $rank->total_mark;
                 
                    $outputArray[] = $resultArray;
                }
            }

            if(!isset($single)){
                $single = array();
            }

            if(!isset($outputArray)){
                $outputArray = array();
            }

 $value = array_merge($single,$outputArray);

 return Excel::download(new ResultExport1($value), $student_name->full_name . $student . '.xlsx');

     }


    public function downloadex(Request $request, $id)
    {
        $student = $id;
             $student_name = DB::table('students')
             ->where('id', '=', $student)
             ->first();
            
             $val = DB::table('students')
             ->where('students.id', '=', $student)
             ->join('schools','schools.id','students.school_id')
             ->join('periods','periods.id','students.class_id')
             ->select('schools.school_name','periods.title','students.full_name')
             ->first();
             
session()->pull('head1');
Session::put('head1', $val);

             $startdate = date('d/m/Y', strtotime($_GET['startdate']));
             $enddate = date('d/m/Y', strtotime($_GET['enddate']));

          $array1 =  DB::table('results')
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('sections', 'sections.id', '=', 'students.section_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')
            ->where("students.id", $id)
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->selectRaw("subjects.subject")
            ->groupby('subjects.subject')
            ->get();
        
        $dat[] = "date";
        foreach ($array1 as $data) {
            $dat[] = $data->subject . "(M-T)";
        }
        session()->pull('head');
        Session::put('head', $dat);
        $array =  DB::table('results')
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('sections', 'sections.id', '=', 'students.section_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')
            ->where("students.id", $student)
            ->whereBetween('date',[$startdate,$enddate])
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->orderBy("results.created_at", 'desc')
            ->select('results.date', 'subjects.subject', 'total', 'correct')
            ->get()->groupBy('date');
            
            Session::put('startdate', $startdate);
            Session::put('enddate', $enddate); 

        if (!empty($array)) {
            return Excel::download(new QuestionExport($student), $student_name->full_name . $student . '.xlsx');
        } else {
            return redirect('score');
        }
    }
    public function exboard(Request $request)
    {
        $cities = DB::table("results")
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')
            ->where("boards.id", $request->board_id)
            ->select(
                'media.id as medium_id',
                'media.title as medium_title',
            )
            ->pluck("medium_title", "medium_id");
            
        return response()->json($cities);

    }


    public function schoolt(Request $request)
    {

    $class = DB::table("students")
        ->where("students.school_id", $request->scool_id)
        ->join('periods', 'periods.id', '=', 'students.class_id')
            ->select(
                'periods.id as class_id',
                'periods.title as class',
            )
            ->pluck("class", "class_id");


            return $request->school_id;
        return response()->json($class);
    }






    public function exmedium(Request $request)
    {
        $school = DB::table("results")
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->where("media.id", $request->medium_id)
            ->select(
                'schools.school_name',
                'schools.id as school_id',
            )
            ->pluck("school_name", "school_id");
        return response()->json($school);
    }



    public function classit(Request $request)
    {
        $school = DB::table("subjects")
            ->where("class_id", $request->class_id)
            ->where("board_id", $request->board_id)
            ->where("medium_id", $request->medium_id)
            ->select(
                'subjects.subject',
                'subjects.id',
            )
            ->pluck("subject", "id");
        return response()->json($school);
    }


    public function subjectit(Request $request)
    {
        $school = DB::table("lessons")
            ->where("subject_id", $request->subject_id)
            ->select(
                'lessons.title',
                'lessons.id',
            )
            ->pluck("title", "id");
        return response()->json($school);
    }



    public function boardit(Request $request)
    {
        $school = DB::table("media")
            ->where("board_id", $request->board_id)
            ->select(
                'title',
                'id',
            )
            ->pluck("title", "id");
        return response()->json($school);
    }


    public function boardt(Request $request)
    {
        $school = DB::table("schools")
            ->where("board_id", $request->board_id)
            ->select(
                'school_name',
                'id',
            )
            ->pluck("school_name", "id");
        return response()->json($school);
    }

    
    public function exschool(Request $request)
    {
        $school = DB::table("results")
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->where("schools.id", $request->school_id)
            ->select(
                'periods.title as class_title',
                'periods.id as period_id',
            )
            ->pluck("class_title", "period_id");
        return response()->json($school);
    }
    public function experiod(Request $request)
    {
        $school = DB::table("results")
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->where("periods.id", $request->class_id)
            ->select(
                'subjects.subject',
                'subjects.id as subject_id',
            )
            ->pluck("subject", "subject_id")->unique()->toArray();
        return response()->json($school);
    }
    public function exstudent(Request $request)
    {

        $school = DB::table("results")
            ->join('students', 'students.id', '=', 'results.student_id')
            ->join('media', 'media.id', '=', 'results.medium_id')
            ->join('schools', 'schools.id', '=', 'results.school_id')
            ->join('periods', 'periods.id', '=', 'results.class_id')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')
            ->where("periods.id", $request->class_id)
            ->where("boards.id", $request->board_id)
            ->where("media.id", $request->medium_id)
            ->where("schools.id", $request->school_id)
            ->where("subjects.id", $request->subject_id)
            ->select(
                'students.id as student_id',
                'students.full_name as student_name',
            )->pluck("student_name", "student_id")->unique()->toArray();

        return response()->json($school);

    }
    public function uploadcsv(Request $request)
    {
        $lesson = DB::table('lessons')
            ->where("board_id", '=', $request['board'])
            ->where("medium_id", '=', $request['medium'])
            ->where("class_id", '=', $request['class'])
            ->where("subject_id", '=', $request->subject_id)
            ->get();
        $academic = DB::table('academics')->get();
        $board = $request['board'];
        $class_id = $request['class'];
        $media = $request['medium'];
        $subject = $request->subject_id;
        return view('question.quesintern', compact('academic', 'lesson', 'board', 'class_id', 'media', 'subject'));

    }

    public function timetable(Request $request)
    {

        $school = DB::table("schools")->get();
        if (empty(session('SchoolId'))) {
            $userdata = DB::table('slots')
                ->join('schools', 'schools.id', '=', 'slots.school_id')
                ->select('slots.*', 'schools.school_name')
                ->get()->groupBy('school_name');
        } else {
            $userdata = DB::table('slots')
                ->where('schools.id', '=', session('SchoolId'))
                ->join('schools', 'schools.id', '=', 'slots.school_id')
                ->select('slots.*', 'schools.school_name')
                ->get()->groupBy('school_name');
        }
        return view('timetable.period', compact('school', 'userdata'));

    }
    public function addtimeslot()
    {
        if (empty(session('SchoolId'))  && isset($_GET['school'])) {
            $timetable = DB::table("slots")
                ->where('school_id', $_GET['school'])
                ->get();
            $board = DB::table('schools')
                ->where('id', $_GET['school'])
                ->select('board_id as id')
                ->first();
            $board_id = $board->id;
        } else {
            $timetable = DB::table("slots")
                ->where('school_id', (session('SchoolId')))
                ->get();
        }

        $school = DB::table('schools')
            ->join('slots', 'slots.school_id', '=', 'schools.id')
            ->select('schools.id', 'schools.school_name')
            ->get()->unique()->toArray();

        $board = DB::table('boards')
            ->join('schools', 'schools.board_id', 'boards.id')
            ->where('schools.id', session('SchoolId'))
            ->select('boards.id', 'boards.title')
            ->first();

        $class = DB::table("periods")
            ->get();

        $medium = DB::table("media")->get();

        $section = DB::table("sections")->get();


        if (!empty(session('SchoolId'))) {

            $section = DB::table("sections")
            ->where('sections.school_id', (session('SchoolId')))
            ->get();
        }

        $subject = [];
        $school1 = "";
        $class1 = "";
        $medium1 = "";
        $section1 = "";

        if (isset($_GET['medium'])) {
            if (!empty(session('SchoolId'))) {
                $board = DB::table('boards')
                    ->join('schools', 'schools.board_id', 'boards.id')
                    ->where('schools.id', session('SchoolId'))
                    ->select('boards.id', 'boards.title')
                    ->first();
                $board_id = $board->id;
            }

            $subject = DB::table("subjects")
                ->where('board_id', $board_id)
                ->where('medium_id', $_GET['medium'])
                ->where('class_id', $_GET['class'])
                ->get();

            if (!empty(session('SchoolId'))) {
                $school1 = session('SchoolId');
            } else {
                $school1 = $_GET['school'];
            }

            $class1 = $_GET['class'];
            $medium1 = $_GET['medium'];
            $section1 = $_GET['section'];

        }

        return view('timetable.vieweditslot', compact('timetable', 'school', 'class', 'school1', 'class1', 'medium1', 'section1', 'medium', 'section', 'subject'));
    
    }

    public function settime()
    {
        if (empty(session('SchoolId'))) {

            $time = DB::table("times")
                ->join("schools", 'schools.id', '=', 'times.school_id')
                ->join("periods", 'periods.id', '=', 'times.class_id')
                ->join("media", 'media.id', '=', 'times.medium_id')
                ->join("sections", 'sections.id', '=', 'times.section_id')
                ->join('slots', 'slots.id', '=', 'times.timeslot_id')
                ->selectRaw("schools.school_name,periods.title as class,media.title as medium,sections.title as section")
                ->groupby('school_name', 'class', 'medium', 'section')
                ->get();

        } else {

            $time = DB::table("times")
                ->join("schools", 'schools.id', '=', 'times.school_id')
                ->join("periods", 'periods.id', '=', 'times.class_id')
                ->join("media", 'media.id', '=', 'times.medium_id')
                ->join("sections", 'sections.id', '=', 'times.section_id')
                ->join('slots', 'slots.id', '=', 'times.timeslot_id')
                ->where('times.school_id', session('SchoolId'))
                ->selectRaw("schools.school_name,periods.title as class,media.title as medium,sections.title as section")
                ->groupby('school_name', 'class', 'medium', 'section')
                ->get();

        }
        return view('timetable.slot', compact('time'));
    }
    public function viwetimet($id)
    {
        $timetable = DB::table("slots")
            ->join('schools', 'schools.id', 'slots.school_id')
            ->where('schools.school_name', $id)
            ->select('slots.*')
            ->get();
        return view('timetable.view', compact('timetable'));
    }
    public function savetimetable(Request $request)
    {
        $school = $request['school'];
        $class = $request['class'];
        $medium = $request['medium'];
        $section = $request['section'];
        $day1 = $request['day1'];
        $size = count(array_filter($request['period1']));
        if (count(array_filter($request['subject1'])) == $size) {
            for ($i = 0; count(array_filter($request['subject1'])) > $i; $i++) {
                
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject1'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day1;
                $insert->save();

            }
        }
        $day2 = $request['day2'];
        if (count(array_filter($request['subject2'])) == $size) {
            for ($i = 0; count(array_filter($request['subject2'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject2'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day2;
                $insert->save();
            }
        }
        $day3 = $request['day3'];
        if (count(array_filter($request['subject3'])) == $size) {
            for ($i = 0; count(array_filter($request['subject3'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject3'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day3;
                $insert->save();
            }
        }
        $day4 = $request['day4'];
        if (count(array_filter($request['subject4'])) == $size) {
            for ($i = 0; count(array_filter($request['subject4'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject4'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day4;
                $insert->save();
            }
        }
        $day5 = $request['day5'];
        if (count(array_filter($request['subject5'])) == $size) {
            for ($i = 0; count(array_filter($request['subject5'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject5'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day5;
                $insert->save();
            }
        }
        $day6 = $request['day6'];
        if (count(array_filter($request['subject6'])) == $size) {
            for ($i = 0; count(array_filter($request['subject6'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject6'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day6;
                $insert->save();
            }
        }
        $day7 = $request['day7'];
        if (count(array_filter($request['subject7'])) == $size) {
            for ($i = 0; count(array_filter($request['subject7'])) > $i; $i++) {
                $insert = new Time;
                $insert->school_id = $school;
                $insert->class_id = $class;
                $insert->medium_id = $medium;
                $insert->section_id = $section;
                $insert->subject_id = $request['subject7'][$i];
                $insert->timeslot_id = $request['period1'][$i];
                $insert->day = $day7;
                $insert->save();
            }
        }
        if (isset($insert)) {
            return redirect()->route('settime')
                ->with('success', 'inserted successfully');
        } else {
            return redirect()->route('settime')
                ->with('success', 'not inserted your some Data');
        }
    }
    public function savetimeupdate(Request $request, $id)
    {
        $input = Slot::find($id);
        $input->period = $request->get('period');
        $input->start_time = $request->get('start_time');
        $input->end_time = $request->get('end_time');
        $input->save();
        return redirect()->back();
    }
    public function viewtimetable(Request $request)
    {
        $time = DB::table("times")
            ->join("schools", 'schools.id', '=', 'times.school_id')
            ->join("periods", 'periods.id', '=', 'times.class_id')
            ->join("media", 'media.id', '=', 'times.medium_id')
            ->join("sections", 'sections.id', '=', 'times.section_id')
            ->join("slots", 'slots.id', '=', 'times.timeslot_id')
            ->where('sections.title', $request->section)
            ->where('periods.title', $request->class)
            ->where('media.title', $request->medium)
            ->where('schools.school_name', $request->school)
            ->select('times.day', 'times.id', 'times.subject_id as subject', 'slots.start_time', 'slots.end_time', 'slots.period', 'times.school_id', 'times.class_id')
            ->get()->groupBy('day');
        $time1 = DB::table("times")
            ->join("slots", 'slots.id', '=', 'times.timeslot_id')
            ->join("schools", 'schools.id', '=', 'times.school_id')
            ->join("periods", 'periods.id', '=', 'times.class_id')
            ->join("media", 'media.id', '=', 'times.medium_id')
            ->join("sections", 'sections.id', '=', 'times.section_id')
            ->where('sections.title', $request->section)
            ->where('periods.title', $request->class)
            ->where('media.title', $request->medium)
            ->where('schools.school_name', $request->school)
            ->select('slots.period')
            ->get()->unique()->toArray();

        return view('timetable.viewtime', compact('time', 'time1'));

    }
    public function deletetimes(Request $request, $id)
    {
        $delete = DB::table('times')
            ->where('day',  explode('&', $id)[0])
            ->where('school_id',  explode('&', $id)[2])
            ->where('class_id',  explode('&', $id)[1])
            ->delete();

        return redirect('settime')->with('success', 'deleted');

    }

    public function slotsdelete(Request $request, $id)
    {

        DB::table('slots')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }
    public function saveperiod(Request $request)
    {

        $request->validate([

            'school_id' => 'required',
            'period' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        $start_time = array_filter($request->start_time);
        $end_time   = array_filter($request->end_time);
        $period     = array_filter($request->period);
        $school     = $request->school_id;


        $check = DB::table('slots')
            ->where('school_id', $request->school_id)
            ->where('period', $request->period)
            ->where('start_time', $request->start_time)
            ->where('end_time', $request->end_time)
            ->first();

        if ($check) {
            return redirect()->route('timetable')
            ->with('success', 'data already inserted');

        } else {

            for ($i = 0; count(array_filter($start_time)) > $i; $i++) {

                $insert = new Slot;
                $insert->school_id = $school;
                $insert->period = $period[$i];
                $insert->end_time = empty($end_time[$i]) ? implode("", $end_time) : $end_time[$i];
                $insert->start_time = empty($start_time[$i]) ? implode("", $start_time) : $start_time[$i];
                $insert->save();
            }

        }

        if ($insert){

            return redirect()->route('timetable')
                ->with('success', 'time is inserted successfully');

        } else {
            
            return redirect()->route('timetable')
                ->with('success', 'not inserted your Data');
        }
    }
}
