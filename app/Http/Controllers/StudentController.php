<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    public function index()
    {


        if (isset($_GET['id'])) {
            $user = DB::table('students')
                ->where('students.school_id', '=', $_GET['id'])
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->select('media.title as medium', 'boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')

                ->paginate(10);
        } elseif (empty(session('SchoolId'))) {

            $user = DB::table('students')
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->select('media.title as medium', 'boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')

                ->paginate(10);
        } elseif (!empty(session('SchoolId'))) {


            $user = DB::table('students')
                ->where('students.school_id', session('SchoolId'))
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->select('media.title as medium', 'boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')

                ->paginate(10);
        }

        if (!isset($user)) {
            $user = array();
        }


        if (!empty(session('SchoolId'))) {

            $class =  DB::table('school_base_class')
                ->where('school_base_class.school_id', session('SchoolId'))
                ->join('periods', 'periods.id', 'school_base_class.class_id')
                ->select('periods.id', 'periods.title')
                ->get();

            $period =  DB::table('school_base_class')
                ->where('school_base_class.school_id', session('SchoolId'))
                ->join('periods', 'periods.id', 'school_base_class.class_id')
                ->select('periods.id', 'periods.title')
                ->get();


            $section = DB::table('sections')
                ->where('school_id', session('SchoolId'))
                ->get();
        } else {

            $section = DB::table('sections')
            ->where('sections.school_id','0')
            ->get();
            $class = DB::table('periods')->get();
            $period = DB::table('periods')->get();
        }

        $medium = DB::table('media')->get();
        $academic = DB::table('academics')->get();

        if (empty(session('SchoolId'))) {

            $board = DB::table('boards')->get();
        } elseif (!empty(session('SchoolId'))) {

            $board = DB::table('boards')
                ->join('schools', 'schools.board_id', 'boards.id')
                ->where('schools.id', session('SchoolId'))
                ->select('boards.id', 'boards.title')
                ->get();
        }

        $school = DB::table('schools')->get();

        return view('student.index', compact('academic', 'school', 'class', 'section', 'period', 'medium', 'user', 'board'));
    }



    public function promote_get()
    {

        if (empty(session('SchoolId'))) {

            $user = DB::table('students')
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->select('media.title as medium', 'boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
                ->paginate(10);


            $class = DB::table('periods')
                ->select('periods.id', 'periods.title')
                ->get();

            $period =  DB::table('periods')
                ->select('periods.id', 'periods.title')
                ->get();

            $section = DB::table('sections')
                ->get();
        } elseif (!empty(session('SchoolId'))) {

            $class = DB::table('school_base_class')
                ->where('school_base_class.school_id', session('SchoolId'))
                ->join('periods', 'periods.id', '=', 'school_base_class.class_id')
                ->select('periods.id', 'periods.title')
                ->get();
            $period = DB::table('school_base_class')
                ->where('school_base_class.school_id', session('SchoolId'))
                ->join('periods', 'periods.id', '=', 'school_base_class.class_id')
                ->select('periods.id', 'periods.title')
                ->get();
            $section = DB::table('sections')
                ->where('sections.school_id', session('SchoolId'))
                ->get();

            $user = DB::table('students')
                ->where('students.school_id', session('SchoolId'))
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->select(
                    'media.title as medium',
                    'boards.title as board',
                    'periods.title as class',
                    'students.*',
                    'academics.title as academic',
                    'schools.school_name',
                    'sections.title as section'
                )
                ->paginate(10);
        }






        $medium = DB::table('media')->get();

        $academic = DB::table('academics')
            ->get();

        if (empty(session('SchoolId'))) {
            $board = DB::table('boards')->get();
        } elseif (!empty(session('SchoolId'))) {
            $board = DB::table('boards')
                ->join('schools', 'schools.board_id', 'boards.id')
                ->where('schools.id', session('SchoolId'))
                ->select('boards.id', 'boards.title')
                ->get();
        }

        $school = DB::table('schools')->get();


        return view('student.promote', compact('academic', 'school', 'class', 'section', 'period', 'medium', 'user', 'board'));
    }


    public function promote_student(Request $request)
    {

        $school = DB::table("students")
            ->where("students.class_id", $request->class_id)
            ->where("students.medium_id", $request->medium_id)
            ->where("students.section_id", $request->section_id)
            ->where("students.school_id", $request->school_id)
            ->select(
                'students.id as student_id',
                'students.full_name as student_name',
            )->pluck("student_name", "student_id")->unique()->toArray();

        return response()->json($school);
    }

    public function promote(Request $request)
    {

        if (isset($request['student_id'])) {

            $result = DB::table('students')
                ->where('school_id', $request->get('school_id'))
                ->where('class_id', $request->get('class_id1'))
                ->where('medium_id', $request->get('medium_id1'))
                ->where('section_id', $request->get('section_id1'))
                ->where('id', $request->get('student_id'))
                ->update([
                    'class_id' => $request->get('class_id2'),
                    'medium_id' => $request->get('medium_id2'),
                    'section_id' => $request->get('section_id2'),
                ]);
        } else {

            $result = DB::table('students')
                ->where('school_id', $request->get('school_id'))
                ->where('class_id', $request->get('class_id1'))
                ->where('medium_id', $request->get('medium_id1'))
                ->where('section_id', $request->get('section_id1'))
                ->update([
                    'class_id' => $request->get('class_id2'),
                    'medium_id' => $request->get('medium_id2'),
                    'section_id' => $request->get('section_id2'),
                ]);
        }
        return redirect()->route('promote_get')
            ->with('success', 'student updated to Next class Successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'father' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
            'medium_id' => 'required',
            'date_of_birth' => 'required',
            'school_id' => 'required',
            "phone" => "required|unique:students,phone",
            'address' => 'required',
            'deleted_id' => 'required',
            'academic_year' => 'required',
            'device_id' => 'required',
            'device_type' => 'required',

        ]);



        $board = DB::table('schools')
            ->where('id', $request->school_id)
            ->first();



        $board = $board->board_id;

        $input = $request->all();

        if ($image = $request->file('profile_image')) {
            $destinationPath = 'students/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile_image'] = "students/$profileImage";
        }
        $input['board_id'] = $board;
        Student::create($input);
        return redirect()->route('student.index')
            ->with('success', 'student created successfully.');
    }





    public function save(Request $request)
    {

        $academic = $request['academic_year'];
        $medium = $request['medium_id'];
        $class = $request['class_id'];
        $section = $request['section_id'];
        $school = $request['school_id'];
        $device_id = $request['device_id'];
        $device_type = $request['device_type'];
        $deleted_id = $request['deleted_id'];
        $board = DB::table('schools')
            ->where('id', $school)
            ->first();



        $board = $board->board_id;


        $request->session()->put('board',  $board);
        $request->session()->put('academic',  $academic);
        $request->session()->put('section',  $section);
        $request->session()->put('school',  $school);
        $request->session()->put('medium',  $medium);
        $request->session()->put('class',  $class);
        $request->session()->put('device_id',  $device_id);
        $request->session()->put('deleted_id',  $deleted_id);
        $request->session()->put('device_type',  $device_type);

        Excel::import(new StudentImport, request()->file('file'));

        return redirect()->route('student.index')
            ->with('success', 'students list created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $medium = DB::table('media')->get();
        $period = DB::table('periods')->get();
        $academic = DB::table('academics')->get();
        if (empty(session('SchoolId'))) {
            $board = DB::table('boards')->get();
        } elseif (!empty(session('SchoolId'))) {
            $board = DB::table('boards')
                ->join('schools', 'schools.board_id', 'boards.id')
                ->where('schools.id', session('SchoolId'))
                ->select('boards.id', 'boards.title')
                ->get();
        }
        $school = DB::table('schools')->get();
        $section = DB::table('sections')->get();
        $pannel =  DB::table('students')

            ->where('students.id', '=', $id)
            ->join('media', 'media.id', '=', 'students.medium_id')
            ->join('periods', 'periods.id', '=', 'students.class_id')
            ->join('academics', 'academics.id', '=', 'students.academic_year')
            ->join('schools', 'schools.id', '=', 'students.school_id')
            ->join('sections', 'sections.id', '=', 'students.section_id')
            ->join('boards', 'boards.id', '=', 'students.board_id')

            ->select('media.title as medium', 'boards.title as board', 'periods.title as class', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
            ->get();

        foreach ($pannel as $student) {

            return view('student.edit', compact('student', 'academic', 'school', 'section', 'period', 'medium', 'board'));
        }
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'full_name' => 'required',
            'father' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
            'medium_id' => 'required',
            'school_id' => 'required',
            'board_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'deleted_id' => 'required',
            'academic_year' => 'required',
            'device_id' => 'required',
            'device_type' => 'required',

        ]);

        $input = $request->all();
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'students/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile_image'] = "students/$profileImage";
        } else {
            unset($input['profile_image']);
        }

        $student->update($input);
        return redirect()->route('student.index')
            ->with('success student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')
            ->with('success', 'student deleted successfully');
    }


    public function addbook()
    {

        $book = DB::table("books")->get();

        return view('subject.addbook', compact('book'));
    }

    public function addbook1(Request $request)
    {


        $input = $request->all();

        if ($image = $request->file('book_image')) {
            $destinationPath = 'subjects/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['subject_image'] = "$profileImage";
        }

        $insert = DB::table('books')
            ->insert(array(
                "book_title" => $input['book_title'],
                "book_image" => $input['subject_image'],
                "book_color" => $input['book_color']
            )
        );

        return redirect()->back();
    }

    function deletebook($id)
    {
        DB::table('books')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
}
