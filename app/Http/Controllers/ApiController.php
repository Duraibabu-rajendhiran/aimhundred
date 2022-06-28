<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Board;
use App\Models\Section;
use App\Models\Medium;
use App\Models\Location;
use App\Models\School;
use App\Models\Period;
use App\Models\Academic;
use App\Models\Question;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller
{

    public function login(Request $request)
    {
        $device_id = $request['device_id'];
        $phone = $request['phone'];
        $device_type = $request['device_type'];
        $rules = array(
            "phone" => "required|min:10",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $user1 = DB::table('students')
                ->where('phone', $phone)
                ->get();


   
         $che = DB::table('students')
                ->where('students.phone', $phone)
                ->join('management', 'management.school', 'students.school_id')
                // ->where('management.Deleted_id', '=', 2)
                ->first();

            if (!empty($che)) {
                if($che->Deleted_id == '2'){
                return response()->json([
                    'status' => "Failure",
                    'message' => "Contact AIM100",
                    'response' => 422,
                ]);
            }elseif($che->Deleted_id == '3'){
                $free = 3;
                }else{
                   $free =  false;
                }
            
            }

            foreach ($user1 as $use) {
                $id = $use->id;
            }


            if (isset($device_id) and isset($device_type)) {
                $check_id = DB::table('students')
                    ->where('device_id', $device_id)
                    ->where('device_type', $device_type)
                    ->get();

                if (isset($id)) {

                    if (sizeof($check_id) > 0) {

                    }else{

                        $student = Student::find($id);
                        $student->device_id = $request['device_id'];
                        $student->device_type = $request['device_type'];
                        $student->save();

                    }
                }
                 }


                $user = DB::table('students')
                ->where('phone', $phone)
                ->join('schools', 'schools.id', '=', 'students.school_id')
                ->join('periods', 'periods.id', '=', 'students.class_id')
                ->join('boards', 'boards.id', '=', 'students.board_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->join('media', 'media.id', '=', 'students.medium_id')
                ->join('academics', 'academics.id', '=', 'students.academic_year')
                ->select('students.*', 'schools.school_name as school', 'periods.title as classes',
                 'boards.title as board', 'sections.title as section', 'academics.title as academic', 
                 'media.title as medium')
                ->get();


                $checkpayment = DB::table('trans_hist_student')
                ->where('students.phone', $phone)
                ->leftJoin('students', 'students.id', '=', 'trans_hist_student.student_id')
                ->leftJoin('subscriptions', 'subscriptions.id', '=', 'trans_hist_student.plan_id')
                ->select('valid_date','paid_date','subscriptions.title')
                ->orderBy('trans_hist_student.id','desc')
                ->first();


                if (!empty($checkpayment->valid_date) && $checkpayment->valid_date >= Carbon::now()->format('Y-m-d')) {

                      $date_value = "1";
                      $plan = $checkpayment->title;
               
                    }else{

                     $date_value = "0";
                     $plan ="";
               
                    }

             foreach ($user as $key){
                $logArray = array();
                $logArray['id']  = $key->id;
                $logArray['full_name'] = $key->full_name;
                $logArray['profile_image'] = empty($key->profile_image) ? "" : asset($key->profile_image);
                $logArray['father'] = $key->father;
                $logArray['date_of_birth'] = $key->date_of_birth;
                $logArray['address'] = $key->address;
                $logArray['classes'] = $key->classes;
                $logArray['board'] = $key->board;
                $logArray['school'] = $key->school;
                $logArray['section'] = $key->section;
                $logArray['medium'] = $key->medium;
                $logArray['phone'] = $key->phone;
                $logArray['medium_id'] = $key->medium_id;
                $logArray['academic_year'] = $key->academic;
                $logArray['academic_id'] = $key->academic_year;
                $logArray['device_token'] = $key->device_token;
                $logArray['device_type'] = $key->device_type;
                $logArray['class_id'] = $key->class_id;
                $logArray['device_id'] = $key->device_id;
                $logArray['section_id'] = $key->section_id;
                $logArray['school_id'] = $key->school_id;
                $logArray['device_id'] = $key->device_id;
                $logArray['board_id'] = $key->board_id;
                $logArray['expire_date'] = isset($checkpayment->valid_date)?Carbon::createFromFormat('Y-m-d', $checkpayment->valid_date)->format('d-m-Y'):"";
                $logArray['start_date'] = isset($checkpayment->paid_date)? Carbon::createFromFormat('Y-m-d', $checkpayment->paid_date)->format('d-m-Y'):"";
                $logArray['is_expiry'] = (isset($free) && !empty($free))?"2":$date_value; 
                $logArray['plan_name'] = isset($plan)?$plan:""; 
                $logArray['today_date'] =  Carbon::now()->format('d-m-Y'); 
                $logArray['register_date'] =   Carbon::createFromFormat('Y-m-d H:i:s', $key->created_at)->format('d-m-Y'); 
                $materialsArray[] = $logArray;

            }


            foreach ($user as $users) {
                 $delete_id =  $users->deleted_id;
            }

             $array = [];
             $message = "";
             $status = "";

            if (sizeof($user) > 0) {

                $message = "Suceessfully login Data are listed";
                $status = "Success";
                $res = 200;

            } else {

                $message = "No login Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }



            if (isset($delete_id)) {
 
                if ($delete_id == 0) {
                
                    return response()->json([
                        'status' => $status,
                        'message' => $message,
                        'data' => $materialsArray,
                        'response' => $res
                    ]);

                } else {
                    return response()->json([
                        'status' => "Failure",
                        'message' => "User is Restricted",
                        'data' => $array
                    ]);
                }
            } else {

                return response()->json([
                    'status' => $status,
                    'message' => $message,
                    'data' => $materialsArray,
                    'response' => $res
                ]);
            }
        }
    }



    public function getclass(Request $request)
    {

        $rules = array(
            "school_id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);

        } else {

                if ($request->school_id == 0) {

                 $class = DB::table("periods")
                    ->select('id as class_id', 'title as class_name')
                    ->get();

                 $section = DB::table("sections")
                    ->where('school_id', 0)
                    ->select('id as section_id', 'title as section')
                    ->get();

                 } else {

                 $class = DB::table("school_base_class")
                    ->where('school_base_class.school_id', $request->school_id)
                    ->join('periods', 'periods.id', '=', 'school_base_class.class_id')
                    ->select('periods.id as class_id', 'periods.title as class_name')
                    ->get();

                 $section = DB::table("sections")
                    ->where('school_id', $request->school_id)
                    ->select('id as section_id', 'title as section')
                    ->get();

                 $class1 = DB::table("periods")
                    ->select('id as class_id', 'title as class_name')
                    ->get();

                 $section1 = DB::table("sections")
                    ->where('school_id', 0)
                    ->select('id as section_id', 'title as section')
                    ->get();

                 $class = sizeof($class) > 0 ? $class : $class1;
                 $section = sizeof($section) > 0 ? $section : $section1;

                 }

            return response()->json([
                'status' => 'Success',
                'classes' => $class,
                'sections' => $section,
                'response' => "200"
            ]);
        }
    }


    public function getBoard()
    {
        $board = DB::table('boards')
                ->select('boards.id', 'boards.title as board')
                ->get();

        $message = "";
        $status = "";

        if (sizeof($board) > 0) {
            $message = "Suceessfully Board Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "Board data Records Not Found";
            $status = "Failure";
            $res = 204;
            $board = [];
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $board,
            'response' => $res
        ]);
    }


    public function addBoard(Request $request)
    {
        $board = new Board;
        $board->title = $request->get('title');
        $result = $board->save();
        $message = "";
        $status = "";

         if ($result) {

            $message = "Suceessfully Board added";
            $status = "Success";
            $res = 200;

         } else {

            $message = "No board  Records Found";
            $status = "Failure";
            $res = 204;

         }

         return response()->json([
            'status' => $status,
            'message' => $message,
            'response' => $res
         ]);

    }


    public function getMedium()
    {

        $medium = DB::table('media')
            ->select('media.id as medium_id', 'media.title as medium')
            ->get();


        if (sizeof($medium) > 0) {

            $message = "Suceessfully Medium Data are listed";
            $status = "Success";
            $res = 200;

        } else{

            $message = "No Medium Records Found";
            $status = "Failure";
            $res = 204;
            $medium = [];

        }
        return response()->json([

            'status' => $status,
            'message' => $message,
            'data' => $medium,
            'response' => $res

        ]);
    }


    public function subcription(Request $request)
    {

        $rules = array(
            "plan_id" => "required|exists:subscriptions,id",
            "student_id" => "required|exists:students,id",
            "card_name" => "required",
            "card_number" => "required",
            "cvv" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $student = DB::table("students")
                ->where('id', $request->get('student_id'))
                ->first();

            $req = DB::table("subscriptions")
                ->where('id', $request->plan_id)
                ->first();

            $insert = DB::table('trans_hist_student')->insert(
                array(
                    'student_id'   =>   $student->id,
                    'paid_date'    =>   Carbon::now()->format('Y-m-d'),
                    'payment'      =>   $req->offer,
                    'plan_id'      =>   $req->id,
                    'valid_date'   =>   Carbon::now()->addMonths($req->duration)->format('Y-m-d'),
                    'class_id'     =>   $student->class_id,
                    'section_id'   =>   $student->section_id
                )
            );

            if ($insert) {
                $message = "Suceessfully Completed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "Error Occurred";
                $status = "Failure";
                $res = 204;
            }


            return response()->json([
                'status' => $status,
                'message' => $message,
                'response' => $res
            ]);
        }
    }


    public function addMedium(Request $request)
    {
        $medium = new Medium;
        $medium->title = $request->get('title');
        $result = $medium->save();
        $message = "";
        $status = "";
        if ($result) {
            $message = "Suceessfully medium added";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No medium  Records Found";
            $status = "Failure";
            $res = 204;
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'response' => $res
        ]);
    }


    //////////////////////////////////section////////////////////////////////////////


    public function getSection()
    {
        $section = DB::table('sections')
            ->select('sections.id as section_id', 'sections.title as section')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($section) > 0) {
            $message = "Suceessfully Section Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Section Records Found";
            $status = "Failure";
            $res = 204;
            $section = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $section,
            'response' => $res
        ]);
    }



    public function addSection(Request $request)
    {
        $section = new Section;
        $section->title = $request->get('title');
        $result = $section->save();
        if ($result) {
            $message = "Suceessfully section added";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No sectiuon  Records Found";
            $status = "Failure";
            $res = 204;
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'response' => $res,
        ]);
    }

    /////////////////////////////////////////////----> location <----/////////////////////////////////////////

    public function getLocation($id = null)
    {

        $location = Location::find($id) ?: Location::all();
        $message = "";
        $status = "";

        if (sizeof($location) > 0) {

            $message = "Suceessfully location Data are listed";
            $status = "Success";
            $res = 200;
        } else {

            $message = "No location Records Found";
            $status = "Failure";
            $res = 204;
            $location = [];
        }

        return
            response()->json([

                'status' => $status,
                'message' => $message,
                'data' => $location,
                'response' => $res

            ]);
    }


    public function addLocation(Request $request)
    {
        $location = new Location;
        $location->title = $request->get('title');
        $location->state = $request->get('state');
        $location->district = $request->get('district');
        $location->city = $request->get('city');
        $location->pincode = $request->get('pincode');
        $result = $location->save();
        if ($result) {
            return  response()->json(["result" => "Location Added"]);
        } else {
            return  response()->json(["result" => "Location Not Added"]);
        }
    }


    /////////////////////////////////////////School///////////////


    public function Schooldata(Request $request)
    {




        $rules = array(
            "board_id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {

            $user = DB::table('schools')
                ->join('locations', 'locations.id', '=', 'schools.location_id')
                ->join('boards', 'boards.id', '=', 'schools.board_id')
                ->where('schools.board_id', '=', $request->board_id)
                ->select('boards.title as board', 'locations.city', 'schools.*')
                ->get();
        }

        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully School Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No School Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user,
            'response' => $res
        ]);
    }


    public function addSchool(Request $request)
    {
        $school = new School;
        $school->title = $request->get('title');
        $school->location_id = $request->get('location_id');
        $school->door_number = $request->get('door_number');
        $school->street = $request->get('street');
        $school->school_name = $request->get('school_name');
        $school->board_id = $request->get('board_id');
        $result = $school->save();
        if ($result) {
            return  response()->json(["result" => "School data Added"]);
        } else {
            return  response()->json(["result" => "School Not Added"]);
        }
    }

    /////////////////////////////////////////class///////////////


    public function periodData()
    {
        $user = DB::table('periods')
            ->select('periods.id as class_id', 'periods.title as classes')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully Class Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Class Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return  $user;
    }

     /////////////////////////// 

    public function addPeriod(Request $request)
    {
        $period = new Period;
        $period->title = $request->get('title');
        $result = $period->save();
        $message = "";
        $status = "";
        if ($result) {
            $message = "Suceessfully medium added";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No medium table Found";
            $status = "Failure";
            $res = 204;
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'response' => $res
        ]);
    }

    /////////////////////////Acedimic////////////////////////////


    public function getAcademic($id = null)
    {
        $user =  DB::table('academics')
            ->select('academics.id as academic_id', 'academics.title as academic_year')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully Academics Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Academics Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user,
            'response' => $res
        ]);
    }

    public function addAcademic(Request $request)
    {
        $Academic = new Academic;
        $Academic->title = $request->get('title');
        $Academic->from = $request->get('from');
        $Academic->to = $request->get('to');
        $Academic->updated = $request->get('updated');
        $result = $Academic->save();
        if ($result) {
            return  response()->json(["result" => "Academic Added"]);
        } else {
            return  response()->json(["result" => "Academic Not Added"]);
        }
    }

    ////////////////////////////////////////////////Student//////////////////////////////////////////////////

    function Studentdata()
    {
        $user = DB::table('students')
            ->join('media', 'media.id', '=', 'students.medium_id')
            ->join('periods', 'periods.id', '=', 'students.class_id')
            ->join('academics', 'academics.id', '=', 'students.academic_year')
            ->join('schools', 'schools.id', '=', 'students.school_id')
            ->join('sections', 'sections.id', '=', 'students.section_id')
            ->select('media.title as medium', 'periods.title as classes', 'students.*', 'academics.title as academic', 'schools.school_name', 'sections.title as section')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully Students Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Studensts Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user,
            'response' => $res
        ]);
    }
    public function addStudent(Request $request)
    {
        $rules = array(
            "full_name" => "required",
            "father" => "required",
            "class_id" => "required",
            "section_id" => "required",
            "medium_id" => "required",
            "school_id" => "required",
            "phone" => "required|unique:students,phone",
            "address" => "required",
            "board_id" => "required",
            "date_of_birth" => "required",
            "device_token" => "required",
            "academic_year" => "required",
            "device_id" => "required",
            "device_type" => "required",
        );
   


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {

            $img = $request->get('profile_image');

            if (isset($img)) {

                define('UPLOAD_DIR', 'students/');
                $img = $request->get('profile_image');
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = UPLOAD_DIR . uniqid() . '.png';
                $success = file_put_contents($file, $data);
            } else {
                $file = "";
            }

            $student = new Student;
            $student->full_name = $request->get('full_name');
            $student->father = $request->get('father');
            $student->class_id = $request->get('class_id');
            $student->section_id = $request->get('section_id');
            $student->medium_id = $request->get('medium_id');
            $student->school_id = $request->get('school_id');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->board_id = $request->get('board_id');
            $student->profile_image = $file;
            $student->date_of_birth = $request->get('date_of_birth');
            $student->device_token = $request->get('device_token');
            $student->academic_year = $request->get('academic_year');
            $student->device_id = $request->get('device_id');
            $student->device_type = $request->get('device_type');
            $result = $student->save();
            $message = "";
            $status = "";
            if ($result) {
                $message = "Suceessfully Students Data are added";
                $status = "Success";
                $res = 200;
            } else {
                $message = "student not added";
                $status = "Failure";

                $res = 204;
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'response' => $res
            ]);
        }
    }




    public function updateStudent(Request $request)
    {
        $rules = array(
            "id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $img = $request->get('profile_image');
            //   return $img;
            if (isset($img)) {

                define('UPLOAD_DIR', 'students/');

                $img = $request->get('profile_image');

                $img = str_replace('data:image/png;base64,', '', $img);

                $img = str_replace(' ', '+', $img);

                $data = base64_decode($img);

                $file = UPLOAD_DIR . uniqid() . '.png';

                $success = file_put_contents($file, $data);

            } else {

                $file = "";
            }
            $student = Student::find($request->id);
            $student->full_name = $request->full_name;
            $student->father = $request->father;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->medium_id = $request->medium_id;
            $student->school_id = $request->school_id;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->profile_image = $file;
            $student->device_token = $request->device_token;
            $student->date_of_birth = $request->date_of_birth;
            $student->academic_year = $request->academic_id;
            $student->device_id = $request->device_id;
            $student->device_type = $request->device_type;
            $result = $student->save();
           
            if($result) {

                $message = "Suceessfully Students Data are updated";
                $status = "Success";
                $res = 200;

            }else{

                $message = "student is not updated";
                $status = "Failure";
                $res = 204;

            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'updated_profile' => empty($student->profile_image) ? "" : asset($student->profile_image),
                'response' => $res
            ]);
        }
    }


    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $result = $student->delete();
        
        if ($result) {

            return  response()->json(["result" => "Student Deleted"]);

        } else {

            return  response()->json(["result" => "Student Not Deleted"]);

        }
    }



    //////////////////////////////////////////////--------Question--------------/////////////////////////////////////////


    function Questiondata()
    {
        $user =  DB::table('questions')
            ->join('boards', 'boards.id', '=', 'questions.board_id')
            ->join('subjects', 'subjects.id', '=', 'subjects.board_id')
            ->join('lessons', 'lessons.id', '=', 'questions.lesson_id')
            ->join('media', 'media.id', '=', 'questions.medium_id')
            ->join('periods', 'periods.id', '=', 'questions.class_id')
            ->select('boards.title', 'questions.*', 'boards.title as board', 'subjects.subject', 'lessons.title as lesson', 'media.title as medium', 'periods.title as class')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully Questions Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Questions Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user,
            'response' => $res
        ]);
    }
    public function addQuestion(Request $request)
    {
        $student = new Question;
        $student->title = $request->get('title');
        $student->option_1 = $request->get('option_1');
        $student->option_2 = $request->get('option_2');
        $student->option_3 = $request->get('option_3');
        $student->option_4 = $request->get('option_4');
        $student->board_id = $request->get('board_id');
        $student->subject_id = $request->get('subject_id');
        $student->lesson_id = $request->get('lesson_id');
        $student->medium_id = $request->get('medium_id');
        $student->class_id = $request->get('class_id');
        $student->answer = $request->get('answer');
        $result = $student->save();
        if ($result) {
            return  response()->json(["result" => "Question Added"]);
        } else {
            return  response()->json(["result" => "Question Not Added"]);
        }
    }


    /////////////////////////////////////////////////////////// Question Api //////////////////////////////

    public function checkid(Request $request)
    {
        $user = DB::table('students')
            ->where('id', $request->get('user_id'))
            ->select('students.device_id')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            $message = "Suceessfully Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Records Found";
            $status = "Failure";
            $res = 204;
            $user = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'user' => $user,
        ]);
    }



    public function transcationhist(Request $request){
        
         $rules = array(

         "student_id" => "required | exists:students,id" 
          
         );
    
         $validator = Validator::make($request->all(), $rules);
       
         if ($validator->fails()) {
       
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
     
         }else{
      
            $payment_hist = DB::table('trans_hist_student')
            ->where('students.id', $request->student_id)
            ->Join('students', 'students.id', '=', 'trans_hist_student.student_id')
            ->Join('subscriptions', 'subscriptions.id', '=', 'trans_hist_student.plan_id')
            ->select('valid_date','paid_date',
            'subscriptions.title as plan_title',
            'trans_hist_student.payment',
            'trans_hist_student.ref_number',
            'subscriptions.duration')
            ->get();

         foreach($payment_hist as $data){
                $questionArray = array();
                $questionArray['plan'] = $data->plan_title;
                $questionArray['payment'] = $data->payment;
                $questionArray['paid_date'] = $data->paid_date;
                $questionArray['end_date'] = $data->valid_date;
                $questionArray['month'] = $data->duration;
                $questionArray['ref_number'] = empty($data->ref_number)?"123456789012":$data->ref_number;
                $mat[]=$questionArray;
           }  

        if (sizeof($payment_hist) > 0) {

            $message = "Suceessfully Data are listed";
            $status = "Success";
            $res = 200;
            
        } else {

            $message = "No Records Found";
            $status = "Failure";
            $res = 204;
            $mat = [];
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'user' => !isset($mat)?[]:$mat,
        ]);

 }

    }


    ///////////////////////////////////////////////Question api///////////////////

    public function questionapi(Request $request)
    {
        $rules = array(
            "medium_id" => "required|exists:exammanagements,medium_id",
            "board_id" => "required|exists:exammanagements,board_id",
            "class_id" => "required|exists:exammanagements,class_id",
            "student_id" => "required|exists:students,id",
            "date" => "required"

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {


            $student_name = DB::table('students')
                ->where('id', '=', $request['student_id'])
                ->first();

            $check = DB::table('management')
                ->join('students', 'students.school_id', 'management.school')
                ->where('management.school', $student_name->school_id)
                ->where('students.id', $request['student_id'])
                ->where('management.Deleted_id', 0)
                ->where('students.deleted_id', 0)
                ->get();


            if (!count($check) > 0) {
                return  response()->json([
                    'status' => 204,
                    'message' => "Failure"
                ]);
            }



            $today = strtr($request['date'], '/', '-');

            $date =  date('Y-m-d', strtotime($today));

            $user = DB::table('exammanagements')
                ->join('academics', 'academics.id', '=', 'exammanagements.academic_id')
                ->join('subjects', 'subjects.id', '=', 'exammanagements.subject_id')
                ->join('categories', 'categories.id', '=', 'exammanagements.category_id')
                ->join('periods', 'periods.id', '=', 'exammanagements.class_id')
                ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
                ->join('lessons', 'lessons.id', '=', 'exammanagements.lesson_id')
                ->join('boards', 'boards.id', '=', 'exammanagements.board_id')
                ->join('media', 'media.id', '=', 'exammanagements.medium_id')
                ->where('exammanagements.medium_id', $request['medium_id'])
                ->where('exammanagements.board_id', $request['board_id'])
                ->where('exammanagements.class_id', $request['class_id'])
                ->where('exammanagements.date', $date)
                ->where('exammanagements.is_show', 0)
                ->select(
                    'exammanagements.board_id',
                    'exammanagements.medium_id',
                    'exammanagements.class_id',
                    'exammanagements.academic_id',
                    'exammanagements.subject_id',
                    'exammanagements.date',
                    'questions.title as title',
                    'questions.option_1',
                    'questions.option_2',
                    'questions.option_3',
                    'questions.option_4',
                    'questions.answer',
                    'questions.question_image',
                    'questions.option_image_1',
                    'questions.option_image_2',
                    'questions.option_image_3',
                    'questions.option_image_4',
                    'questions.answer_image',
                    'categories.time_per_question',
                    'categories.no_of_question_sub',
                    'categories.class',
                    'categories.start_time',
                    'subjects.subject',
                    'lessons.title as lesson',
                    'periods.title as classes',
                    'boards.title as board',
                    'media.title as medium',
                    'academics.title as academic_year',
                )->get();


            $user1 = DB::table('exammanagements')
                ->join('subjects', 'subjects.id', '=', 'exammanagements.subject_id')
                ->where('exammanagements.medium_id', $request['medium_id'])
                ->where('exammanagements.board_id', $request['board_id'])
                ->where('exammanagements.class_id', $request['class_id'])
                ->where('exammanagements.date', $date)
                ->selectRaw("exammanagements.class_id,exammanagements.lesson_id,exammanagements.subject_id,exammanagements.medium_id,exammanagements.date,subjects.subject")
                ->groupby('exammanagements.class_id', 'exammanagements.lesson_id', 'exammanagements.subject_id', 'exammanagements.medium_id', 'exammanagements.date', 'subjects.subject')

                ->get();
            $message = "";
            $status = "";

            date_default_timezone_set("Asia/Kolkata");

            $time = date("H:i");
            $datecheck = date('d/m/Y');
            $checkadded = DB::table('results')
                ->join('subjects', 'subjects.id', '=', 'results.subject_id')
                ->where('results.student_id', $request['student_id'])
                ->where('results.date', $datecheck)
                ->select('subject')
                ->get();

            foreach ($checkadded as $sub_id) {

                $subject_id[] = $sub_id->subject;
            }

            if (!isset($subject_id)) {
                $subject_id = [];
            }

            function contains($str, array $arr)
            {
                
                foreach ($arr as $a) {
                    if (stripos($str, $a) !== false)
                        return 0;
                }

                return 1;
            }

            if (sizeof($user) > 0) {
                foreach ($user1 as $value) {
                    unset($head);
                    $header = array();
                    $header['subject'] = $value->subject;
                    $header['subject_id'] = $value->subject_id;
                    $header['lesson_id'] = $value->lesson_id;
                    $header['date'] = $value->date;

                    foreach ($user as $key) {

                        $questionArray = array();
                        if ($key->subject_id  == $value->subject_id && contains($key->subject, $subject_id) && $key->class_id == $value->class_id && $key->date == $value->date &&  $value->medium_id == $key->medium_id) {

                            $check = explode(":", $key->time_per_question);
                            $check1 = $check[0] * 60 + $check[1];

                            $questionArray['seconds_per_question'] = $check1;
                            $questionArray['time_per_question'] = $key->time_per_question;
                            $questionArray['no_of_question_sub'] = $key->no_of_question_sub;
                            $questionArray['start_time'] = $key->start_time;
                            $questionArray['subject'] = $key->subject;
                            $questionArray['subject_id'] = $key->subject_id;
                            $questionArray['date'] = $key->date;
                           
                            if ($key->title != null) {
                                $questionArray['title'] = $key->title;
                            } else {
                                $questionArray['title'] = "";
                            }
                            if ($key->option_1 != null) {
                                $questionArray['option_1'] = $key->option_1;
                            } else {
                                $questionArray['option_1'] = "";
                            }
                            if ($key->option_2 != null) {
                                $questionArray['option_2'] = $key->option_2;
                            } else {
                                $questionArray['option_2'] = "";
                            }

                            if ($key->option_3 != null) {
                                $questionArray['option_3'] = $key->option_3;
                            } else {
                                $questionArray['option_3'] = "";
                            }
                            if ($key->option_4 != null) {
                                $questionArray['option_4'] = $key->option_4;
                            } else {
                                $questionArray['option_4'] = "";
                            }
                            if ($key->answer != null) {
                                $questionArray['answer'] = $key->answer;
                            } else {
                                $questionArray['answer'] = "";
                            }


                            if ($key->question_image != ",") {

                                $questionArray['question_image'] =  asset("questions/" . $key->question_image);
                            } else {

                                $questionArray['question_image'] = "";
                            }
                            if ($key->option_image_1 != ",") {
                                $questionArray['option_image_1'] =  asset("questions/" .  $key->option_image_1);
                            } else {
                                $questionArray['option_image_1'] = "";
                            }
                            if ($key->option_image_2 != ",") {
                                $questionArray['option_image_2'] =  asset("questions/" .  $key->option_image_2);
                            } else {
                                $questionArray['option_image_2'] = "";
                            }

                            if ($key->option_image_3 != ",") {

                                $questionArray['option_image_3'] =  asset("questions/" . $key->option_image_3);
                            } else {

                                $questionArray['option_image_3'] = "";
                            }
                            if ($key->option_image_4 != ",") {

                                $questionArray['option_image_4'] =  asset("questions/" .  $key->option_image_4);
                            } else {

                                $questionArray['option_image_4'] = "";
                            }

                            if ($key->answer_image != "," || $key->answer_image == null) {
                                if ($key->answer_image == "1" && $key->option_image_1 != ",") {
                                    $questionArray['answer_image'] =  asset("questions/" . $key->option_image_1);
                                } elseif ($key->answer_image == "2" && $key->option_image_2 != ",") {
                                    $questionArray['answer_image'] =  asset("questions/" . $key->option_image_2);
                                } elseif ($key->answer_image == "3" && $key->option_image_3 != ",") {
                                    $questionArray['answer_image'] =  asset("questions/" . $key->option_image_3);
                                } elseif ($key->answer_image == "4" && $key->option_image_4 != ",") {

                                    $questionArray['answer_image'] =  asset("questions/" . $key->option_image_4);
                                } else {
                                    $questionArray['answer_image'] = $key->answer_image;
                                }
                            } else {
                                $questionArray['answer_image'] = "";
                            }

                            $head[] = $questionArray;
                        }
                    }
                    if (isset($head)) {
                        $header['question'] = $head;
                        $materialsArray[] = $header;
                    }
                }


                date_default_timezone_set("Asia/Kolkata");
                $time = date("H:i");

                // if($time >= '21:00' && $time  <= '23:59'){
                if (!empty($user) && empty($materialsArray)) {
                    $status = "Failure";
                    $materialsArray = [];
                    $message = "You Already Submited your Exam";
                } elseif (true) {
                    $materialsArray = empty($materialsArray) ? "" : $materialsArray;
                    $message = "Suceessfully Data are listed";
                    $status = "Success";
                } else {

                    $status = "Failure";
                    $materialsArray = [];

                    $date = date("Y/m/d");
                    $date = date('d-m-Y', strtotime($date . ' 0 day'));
                    $message = "Please come on  09:00 PM  " . $date;
                }


                $res = 200;
            } else {
                $message = "No Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }
            
            date_default_timezone_set("Asia/Kolkata");

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $materialsArray,
                'server_time' => date("H:i"),
            ]);
        }
    }

    public function gettomorrowexam(Request $request)
    {
        $rules = array(
            "medium_id" => "required",
            "board_id" => "required",
            "class_id" => "required",
            "student_id" => "required|exists:students,id",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $date_i = date("Y/m/d");
            $date1 = date('Y-m-d', strtotime($date_i . ' +0 day'));


            $score = DB::table('results')
            ->where('student_id', $request['student_id'])
            ->whereDate('created_at', $date1)
            ->first();
            
        if (empty($score)) {
            $is_exam = 0;
            $date1 = date('Y-m-d', strtotime($date_i . ' +0 day'));
        } else {
            $date1 = date('Y-m-d', strtotime($date_i . ' +1 day'));
            $is_exam = 1;
        }



            $user1 = DB::table('exammanagements')
                ->where('exammanagements.medium_id', $request['medium_id'])
                ->where('exammanagements.board_id', $request['board_id'])
                ->where('exammanagements.class_id', $request['class_id'])
                ->where('exammanagements.date', $date1)
                ->join('categories', 'categories.id', '=', 'exammanagements.category_id')
                ->select('exammanagements.*', 'categories.time_per_question', 'categories.start_time')
                ->first();



$total_quest_size = DB::table('results')
->where('student_id',$request["student_id"])
->get();




$total_mark = DB::table('results')
->where('results.student_id', $request['student_id'])
->selectRaw("SUM(marks) as total_mark")
->first();
            if (!empty($user1)) {
                $time_base = $user1->start_time;
                date_default_timezone_set("Asia/Kolkata");
                $time = date("H:i");
            }
       

            if (isset($time_base)) {


           


                if ($time_base >= $time) {
                    $date = date("Y/m/d");
                    $date = date('Y-m-d', strtotime($date . ' +0 day'));
                } else {
                    $date = date("Y/m/d");
                    $date = date('Y-m-d', strtotime($date . ' +1 day'));
                }




          
if($is_exam){
    $date = date("Y/m/d");
    $date = date('Y-m-d', strtotime($date . ' +1 day'));
}

                $user = DB::table('exammanagements')
                    ->join('subjects', 'subjects.id', '=', 'exammanagements.subject_id')
                    ->join('periods', 'periods.id', '=', 'exammanagements.class_id')
                    ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
                    ->join('lessons', 'lessons.id', '=', 'exammanagements.lesson_id')
                    ->join('boards', 'boards.id', '=', 'exammanagements.board_id')
                    ->join('media', 'media.id', '=', 'exammanagements.medium_id')
                    ->join('academics', 'academics.id', '=', 'exammanagements.academic_id')
                    ->join('categories', 'categories.id', '=', 'exammanagements.category_id')
                    ->select(
                        'subjects.subject',
                        'subjects.id as subject_id',
                        'subjects.subject_image',
                        'media.title as medium',
                        'boards.title as board',
                        'academics.title as academic_year',
                        'categories.no_of_question_sub',
                        'lessons.title as lesson',
                        'lessons.id as lesson_id',
                        'periods.title as classes',
                        'categories.time_per_question',
                        'exammanagements.medium_id',
                        DB::raw('DATE_FORMAT(exammanagements.date, "%d-%m-%Y") as date'),
                        'exammanagements.board_id',
                        'exammanagements.id',
                        'exammanagements.class_id',
                        'categories.start_time'
                    )
                    ->where('exammanagements.medium_id', $request['medium_id'])
                    ->where('exammanagements.board_id', $request['board_id'])
                    ->where('exammanagements.class_id', $request['class_id'])
                    ->from('exammanagements')
                    ->where('exammanagements.date', $date)
                    ->get()->groupBy('subject', 'lesson');

            } else {
                $user = [];
            }
            $message = "";
            $status = "";
            $i = '';
            if (sizeof($user) > 0) {
                foreach ($user as $key => $value) {
                    $i = 1;
                    $logArray = array();
                    $logArray['subject'] = $key;
                    $logArray['is_exam_submitted'] = $is_exam;
                    $logArray['total_marks'] = empty($total_mark->total_mark)?0:$total_mark->total_mark;
                    $logArray['total_question'] = sizeof($total_quest_size);


                    foreach ($value as $result) {
                        $logArray['subject_id'] = $result->subject_id;
                        $logArray['subject'] = $result->subject;
                        $logArray['date'] = $result->date;
                        $logArray['start_time'] = $result->start_time;
                        $logArray['subject_image'] = asset("subjects/" . $result->subject_image);
                        $logArray['time_per_question'] = $result->time_per_question;
                        $logArray['lesson_id'] = $result->lesson_id;
                        $logArray['lesson'] = $result->lesson;
                        $logArray['no_of_question_sub'] = $result->no_of_question_sub;

                        if ($i == 1) {

                            break;
                        }
                    }

                    $materialsArray[] = $logArray;
                }
                $materialsArray = $materialsArray;
                $message = "Suceessfully Data are listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $materialsArray,
                'response' => $res,
            ]);
        }
    }
    public function allsubjects(Request $request)
    {
        $user = DB::table('subjects')
            ->where('subjects.medium_id', $request['medium_id'])
            ->where('subjects.board_id', $request['board_id'])
            ->where('subjects.class_id', $request['class_id'])
            ->leftjoin('books', 'books.book_image', '=', 'subjects.subject_image')
            ->select('subjects.subject', 'books.book_color','subjects.id as subject_id', 'subject_image')
            ->get();

        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            foreach ($user as $key) {
                $subjectArray = array();
                $subjectArray['subject_id'] = $key->subject_id;
                $subjectArray['subject'] = $key->subject;
                $subjectArray['color'] = empty($key->book_color)?"":$key->book_color;
                $subjectArray['subject_image'] = asset("subjects/" . $key->subject_image);
                $materialsArray[] = $subjectArray;
            }
            
            $message = "Suceessfully Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Records Found";
            $status = "Failure";
            $res = 204;
            $materialsArray = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' =>  $materialsArray
        ]);
    }
    public function alllessons(Request $request)
    {
        $user = DB::table('lessons')
            ->where('lessons.subject_id', $request['subject_id'])
            ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->select('subjects.subject', 'lessons.id as lesson_id', 'subjects.subject_image', 'lessons.title as lesson_name')
            ->get();
        $message = "";
        $status = "";
        if (sizeof($user) > 0) {
            foreach ($user as $key) {
                $subjectArray = array();
                $subjectArray['subject'] = $key->subject;
                $subjectArray['lesson_id'] = $key->lesson_id;
                $subjectArray['lesson_name'] = $key->lesson_name;
                $subjectArray['subject_image'] =  asset("subjects/" . $key->subject_image);
                $materialsArray[] = $subjectArray;
            }
            $message = "Suceessfully Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Records Found";
            $status = "Failure";
            $res = 204;
            $materialsArray = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $materialsArray,
        ]);
    }



    public function listvideo(Request $request){



        $rules = array(

            "student_id" => "required|exists:students,id"
       
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {

        $std = Student::find($request['student_id']);


        // return $std;
$data = DB::table('videos')
->where('videos.medium_id',$std->medium_id)
->where('videos.class_id',$std->class_id)
->where('videos.board_id',$std->board_id)
->join('boards','boards.id','videos.board_id')
->join('periods','periods.id','videos.class_id')
->join('media','media.id','videos.medium_id')
->leftjoin('subjects','subjects.id','=','videos.subject_id')
->select('videos.video_url', 'subjects.subject_image','videos.descc','videos.heading','boards.title as board','videos.id as video_id','media.title as medium','periods.title as classes')
->get();


if (sizeof($data) > 0) {

    foreach ($data as $key) {
        $total_videos=DB::table('videos')
        ->where('id',$key->video_id)
        ->orderBy('videos.id','desc')
        ->first();
        $bannerArray = array();
        $bannerArray['board'] = $key->board;
        $bannerArray['video_id'] = $key->video_id;
        $bannerArray['classes'] = $key->classes;
        $bannerArray['heading'] = $key->heading;
        $bannerArray['medium'] = $key->medium;
        $bannerArray['likes'] =empty($total_videos->likes_count)?"0":$total_videos->likes_count;
        $bannerArray['video_url']  = empty( $key->video_url)?"":asset("uploads/" . $key->video_url);
        $bannerArray['desc']  = $key->descc;
        $bannerArray['subject_image'] =empty($key->subject_image)?"": asset("subjects/" . $key->subject_image);
        $bannerArray['thumbnail']  = "";
        $data1[] = $bannerArray;
    }

    $message = "Suceessfully Data are listed";
    $status = "Success";
    $res = 200;
    $materialsArray = $data1;

} else {

    $message = "No Records Found";
    $status = "Failure";
    $res = 204;
    $materialsArray = [];

}
return response()->json([
    'status' => $status,
    'message' => $message,
    'data' => $materialsArray,
]);

        }
    }
    public function allmaterials(Request $request)
    {



        $rules = array(
            "class_id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $class  = $request['class_id'];
            $subject = $request['subject_id'];
            $lesson = $request['lesson_id'];
            $filetype = $request['file_type'];
            if (isset($filetype)) {
                $user = DB::table('materials')
                    ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
                    ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
                    ->select('materials.id as material_id', 'materials.file_type', 'materials.file_name', 'materials.created_at as date_time', 'lessons.title as lesson_name', 'lessons.class_id', 'subjects.subject')
                    ->where('lessons.class_id', $class)
                    ->where('lessons.subject_id', $subject)
                    ->where('materials.lesson_id', $lesson)
                    ->where('materials.file_type', $filetype)
                    ->get();
            } elseif (isset($subject)) {
                $user = DB::table('materials')
                    ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
                    ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
                    ->select('materials.id as material_id', 'materials.file_type', 'materials.file_name', 'materials.created_at as date_time', 'lessons.title as lesson_name', 'lessons.class_id', 'subjects.subject')
                    ->where('lessons.class_id', $class)
                    ->where('lessons.subject_id', $subject)
                    ->get();
            } elseif (isset($lesson)) {
                $user = DB::table('materials')
                    ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
                    ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
                    ->select('materials.id as material_id', 'materials.file_type', 'materials.file_name', 'materials.created_at as date_time', 'lessons.title as lesson_name', 'lessons.class_id', 'subjects.subject')
                    ->where('lessons.class_id', $class)
                    ->where('materials.lesson_id', $lesson)
                    ->get();
            } else {
                $user = DB::table('materials')
                    ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
                    ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
                    ->select('materials.id as material_id', 'materials.file_type', 'materials.file_name', 'materials.created_at as date_time', 'lessons.title as lesson_name', 'lessons.class_id', 'subjects.subject')
                    ->where('lessons.class_id', $class)
                    ->get();
            }

            
            if (sizeof($user) > 0) {
                foreach ($user as $key) {
                    $tempMaterialsArray = array();
                    $file_type = $key->file_type;
                    $tempMaterialsArray['material_id'] = $key->material_id;
                    $tempMaterialsArray['subject'] = $key->subject;
                    $tempMaterialsArray['file_type'] = $key->file_type;
                    $tempMaterialsArray['file_name'] = $key->file_name;
                    $tempMaterialsArray['lesson_name'] = $key->lesson_name;
                    $tempMaterialsArray['date_time'] = $key->date_time;
                    if ($file_type == 0) {
                        $tempMaterialsArray['material_download_url'] = asset("download/" . $key->file_name);
                        $tempMaterialsArray['material_view']  =  asset("view/" . $key->material_id);
                    } else {
                        $tumb = trim($key->file_name, "https://youtu.be/");
                        $tempMaterialsArray['tumbnail'] = "https://img.youtube.com/vi/$tumb/mqdefault.jpg";
                        $tempMaterialsArray['material_download_url'] = "";
                        $tempMaterialsArray['material_view']  = "";
                    }
                    $materialsArray[] = $tempMaterialsArray;
                }
                $message = "Suceessfully Data are listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $materialsArray
            ]);
        }
    }
    function bannerlist()
    {
        $user = DB::table('banners')
            ->select('banners.id as banner_id', 'banners.title as banner_name', 'banners.description', 'banners.banner_image')
            ->get();
        if (sizeof($user) > 0) {
            foreach ($user as $key) {
                $bannerArray = array();
                $bannerArray['banner_id'] = $key->banner_id;
                $bannerArray['banner_name'] = $key->banner_name;
                $bannerArray['description'] = $key->description;
                $bannerArray['banner_image']  = asset("banners/" . $key->banner_image);
                $materialsArray[] = $bannerArray;
            }
            $message = "Suceessfully Data are listed";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No Records Found";
            $status = "Failure";
            $res = 204;
            $materialsArray = [];
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $materialsArray
        ]);
    }

    public function noticelist(Request $request)
    {
        $rules = array(
            "board_id" => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);

        } else{

            if (empty($request['school_id'])) {

                $user = DB::table('notices')
                    ->where('notices.board_id', '=', null)
                    ->where('notices.school_id', '=', null)
                    ->leftjoin('boards', 'boards.id', '=', 'notices.board_id')
                    ->leftjoin('schools', 'schools.id', '=', 'notices.school_id')
                    ->select('boards.title as board', 'schools.school_name as school', 'notices.*')
                    ->get();

            } else {

                $user = DB::table('notices')
                    ->where('notices.board_id', $request['board_id'])
                    ->where('notices.school_id', $request['school_id'])
                    ->orwhere('notices.board_id', '=', null)
                    ->orwhere('notices.school_id', '=', null)
                    ->leftjoin('boards', 'boards.id', '=', 'notices.board_id')
                    ->leftjoin('schools', 'schools.id', '=', 'notices.school_id')
                    ->select('boards.title as board', 'schools.school_name as school', 'notices.*')
                    ->get();

                }

                if (sizeof($user) > 0) {

                    foreach ($user as $key) {
                    $noticeArray = array();
                    $not = $key->image;
                    $noticeArray['image'] =  empty($not) ? "" : asset("notices/" . $key->image);
                    $noticeArray['board'] = empty($key->board) ? "" : $key->board;
                    $noticeArray['school'] = empty($key->school) ? "" : $key->school;
                    $noticeArray['board_id'] = empty($key->board_id) ? "" : $key->board_id;
                    $noticeArray['school_id'] = empty($key->school_id) ? "" : $key->school_id;
                    $noticeArray['description'] = $key->description;
                    $noticeArray['script'] = '<script type="text/javascript" async
                    src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
                  </script>';
                    $noticeArray['date'] = $key->created_at;
                    $materialsArray[] = $noticeArray;
                }
                $message = "Suceessfully Data are listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $materialsArray,
                'response' => $res
            ]);
        }
    }
    public function addresult(Request $request)
    {
        $rules = array(

            "class_id" => "required|exists:periods,id",
            "subject_id" => "required|exists:subjects,id",
            "date" => "required",
            "total" => "required",
            "student_id" => "required|exists:students,id",
            "medium_id" => "required|exists:media,id",
            "lesson_id" => "required|exists:lessons,id",
            "correct" => "required",
            "wrong" => "required",
            "school_id" => "required",
            "marks" => "required",
            "time_left" => "required",

        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            
            $value = explode(':',$request->get('server_time'));
            date_default_timezone_set("Asia/Kolkata");
        
            if($value[0] == 21){
               $value = $value[1]-00;
           }else{
               $value = '00';
           }
   

            $student = new Result;
            $student->date = $request->get('date');
            $student->subject_id = $request->get('subject_id');
            $student->total = $request->get('total');
            $student->student_id = $request->get('student_id');
            $student->medium_id = $request->get('medium_id');
            $student->lesson_id = $request->get('lesson_id');
            $student->correct = $request->get('correct');
            $student->wrong = $request->get('wrong');
            $student->class_id = $request->get('class_id');
            $student->school_id = $request->get('school_id');
            $student->marks = $request->get('marks');
            $student->time_left = $request->get('time_left')+$value;
            $result = $student->save();
            $message = "";
            $status = "";


      $servertime =date('H:i');


        }
        if ($result) {
            $message = "Suceessfully Result data added";
            $status = "Success";
            $res = 200;
        } else {
            $message = "No result Found";
            $status = "Failure";
            $res = 204;
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'response' => $res,
            'server_time' => date("H:i"),
        ]);
    }
    public function resultout(Request $request)
    {

        $rules = array(
            "student_id" => "required|exists:results,student_id",
            "school_id" => "required|exists:results,school_id",
            "medium_id" => "required|exists:results,medium_id",
            "class_id" => "required|exists:results,class_id",
        );

        $othercheck = Student::find($request['student_id']);

        if (empty($othercheck)) {

            return response()->json([
                'status' => "Failure",
                'message' => "Student Name is Invalid",
                'response' => 422,
            ]);
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json([
                'status' => "Failure",
                'message' => "No Results Found",
                'response' => 422,
            ]);
        } else {

            $use = DB::table('results')
                ->where('results.medium_id', $request['medium_id'])
                ->where('results.class_id', $request['class_id'])
                ->where('results.school_id', $request['school_id'])
                ->join('students', 'students.id', '=', 'results.student_id')
                ->selectRaw("SUM(time_left) as total_time,SUM(marks) as total_mark,student_id,students.full_name,students.profile_image")
                ->groupby('results.student_id', 'students.full_name', 'students.profile_image')
                ->orderBy('total_mark', 'desc')
                ->orderBy('total_time', 'asc')
                ->get();
            $a = 0;


            foreach ($use as $rank) {

                if ($rank->student_id == $request['student_id']) {
                    
                    $Array = array();
                    $Array['total_time'] = $rank->total_time;
                    $Array['total_mark'] = $rank->total_mark;
                    $Array['student_id'] = $rank->student_id;
                    $Array['full_name'] = $rank->full_name;
                    $Array['profile_image'] = empty($rank->profile_image) ? "" : asset($rank->profile_image);
                    $Array['rank'] = ++$a;
                    $Array['id'] = 0;
                    $single[] = $Array;

                } else {

                    $resultArray = array();
                    $resultArray['total_time'] = $rank->total_time;
                    $resultArray['total_mark'] = $rank->total_mark;
                    $resultArray['student_id'] = $rank->student_id;
                    $resultArray['full_name'] = $rank->full_name;
                    $resultArray['profile_image'] =  empty($rank->profile_image) ? "" : asset($rank->profile_image);
                    $resultArray['rank'] = ++$a;
                    $resultArray['id'] = $a;
                    $outputArray[] = $resultArray;
                }
            }

            $single = isset($single) ? $single : [];
            $outputArray = isset($outputArray) ? $outputArray : [];
            if (sizeof($outputArray) > 0 || sizeof($single) > 0) {
                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No result Found";
                $status = "Failure";
                $res = 204;
                $single = [];
                $outputArray = [];
            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'studentdata' => $single,
                'data' =>  $outputArray,
                'response' => $res
            ]);
        }
    }


    public function allresultout(Request $request)
    {

        $rules = array(
            "student_id" => "required"
        );

        $othercheck = Student::find($request['student_id']);
        if (empty($othercheck)) {

            return response()->json([
                'status' => "Failure",
                'message' => "Student Name is Invalid",
                'response' => 422,
            ]);
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json([
                'status' => "Failure",
                'message' => "No Results Found",
                'response' => 422,
            ]);
        } else {

            $student = $request->student_id;
            $data_list = DB::table('students')
                ->where('id', '=', $student)
                ->first();

               $use = DB::table('results')
                ->where('results.medium_id', $data_list->medium_id)
                ->where('results.class_id', $data_list->class_id)
                ->join('students', 'students.id', '=', 'results.student_id')
                ->join('schools', 'schools.id', '=', 'results.school_id')
                ->selectRaw("SUM(time_left) as total_time,SUM(marks) as total_mark,student_id,students.full_name,schools.school_name,students.profile_image")
                ->groupby('results.student_id', 'students.full_name', 'students.profile_image', 'schools.school_name')
                ->orderBy('total_mark', 'desc')
                ->orderBy('total_time', 'asc')
                ->get();
                 $a = 0;

               foreach ($use as $rank) {
              
             if ($rank->student_id == $request['student_id']) {
                    $Array = array();
                    $Array['rank'] = ++$a;
                    $Array['full_name'] = $rank->full_name;
                    $Array['school_name'] = $rank->school_name;
                    $Array['bonus_time_sec'] = $rank->total_time;
                    $Array['total_mark'] = $rank->total_mark;
                    $Array['profile_image'] = empty($rank->profile_image) ? "" : asset($rank->profile_image);
                    $single[] = $Array;
              
                }else{

                    $resultArray = array();
                    $resultArray['rank'] = ++$a;
                    $resultArray['full_name'] = $rank->full_name;
                    $resultArray['school_name'] = $rank->school_name;
                    $resultArray['bonus_time_sec'] = $rank->total_time;
                    $resultArray['total_mark'] = $rank->total_mark;
                    $resultArray['profile_image'] = empty($rank->profile_image) ? "" : asset($rank->profile_image);
                    $outputArray[] = $resultArray;
                }

            }

            $single = isset($single) ? $single : [];
            $outputArray = isset($outputArray) ? $outputArray : [];
            if (sizeof($outputArray) > 0 || sizeof($single) > 0) {
                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No result Found";
                $status = "Failure";
                $res = 204;
                $single = [];
                $outputArray = [];
            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'studentdata' => $single,
                'overalldata' =>  $outputArray,
                'response' => $res
            ]);
        }
    }




    public function studentresult(Request $request)
    {
        $rules = array(
            "student_id" => "required|exists:results,student_id",
            "subject_id" => "required|exists:results,subject_id",
        );
        $othercheck = Student::find($request['student_id']);
        if (empty($othercheck)) {
            return response()->json([
                'status' => "Failure",
                'message' => "Student Name is Invalid",
                'response' => 422,
            ]);
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
           
            return response()->json([
                'status' => "Failure",
                'message' => "No Results Found",
                'response' => 422,
            ]);
       
        } else {
            $score = DB::table('results')
                ->where('results.student_id', $request['student_id'])
                ->where('results.subject_id', $request['subject_id'])
                ->join('subjects', 'subjects.id', '=', 'results.subject_id')
                ->orderBy("results.created_at", 'desc')
                ->select('subjects.subject', 'total', 'correct', 'results.date', 'time_left')
                ->get()->groupby('date');
            if (sizeof($score) > 0) {
                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;
                $i = 1;
              
                foreach ($score as $data => $sco) {
                    $dat = array();
                    $dat['date'] = $data;
                    $dat['id'] = $i++;
                    $empty = "";
                    foreach ($sco as $result) {
                        $dat['marks'] = $result->correct . "/" . $result->total;
                        $dat['time'] =  $result->time_left;
                    }
                    $final[] = $dat;
                }
            } else {
                $message = "No result  Records Found";
                $status = "Failure";
                $res = 204;
                $final = [];
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $final,
                'response' => $res
            ]);
        }

    }



    public function praticeapi(Request $request)
    {
        $rules = array(
            "subject_id" => "required|exists:exammanagements,subject_id",
            "class_id" => "required|exists:exammanagements,class_id",
            "medium_id" => "required|exists:exammanagements,medium_id",
            "board_id" => "required|exists:exammanagements,board_id",
            "student_id" => "required",
            "date" => "required"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {

            $academicid = DB::table('students')
                ->where('students.id', '=', $request['student_id'])
                ->join('academics', 'academics.id', 'students.academic_year')
                ->first();

            $today = strtr($request['date'], '/', '-');
            $date =  date('Y-m-d', strtotime($today));
            $checkExam = DB::table('exammanagements')
                ->where('exammanagements.date', '<=', $date)
                ->where('exammanagements.class_id', $request['class_id'])
                ->where('exammanagements.medium_id', $request['medium_id'])
                ->where('exammanagements.board_id', $request['board_id'])
                ->where('exammanagements.subject_id', $request['subject_id'])
                ->join('questions', 'exammanagements.question_id', 'questions.id')
                ->selectRaw("exammanagements.date")
                ->groupby('exammanagements.date')
                 ->orderBy('exammanagements.date', 'desc')
                ->get();
            $a = 1;
            $date_i = date("Y/m/d");
            $date1 = date('Y-m-d', strtotime($date_i . ' +0 day'));


            $score = DB::table('results')
            ->where('student_id', $request['student_id'])
            ->whereDate('created_at', $date1)
            ->first();
            
            
            ////testing api
                
            if (empty($score)) {
                $date1 = date('Y-m-d', strtotime($date_i . ' +0 day'));
            } else {
                $date1 = date('Y-m-d', strtotime($date_i . ' +1 day'));
              
            }
    



            foreach ($checkExam as $data) {
                if($data->date !=   $date1){
                $resultArray = array();
                $resultArray['id'] = $a;
                $resultArray['date'] = $data->date;
                $outputArray[] = $resultArray;
                $a++;
                }
            }

            if (isset($outputArray) && sizeof($outputArray) > 0) {
                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No result  Records Found";
                $status = "Failure";
                $res = 204;
                $outputArray = [];
            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $outputArray,
                'response' => $res
            ]);
        }
    }





    public function  praticedetailapi(Request $request)
    {



        $rules = array(

            "date" => "required|exists:exammanagements,date",
            "student_id" => "required",
            "subject_id" => "required"

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $student = DB::table('students')
                ->where('id', $request['student_id'])
                ->first();
            $user = DB::table('exammanagements')
                ->where('exammanagements.date', $request['date'])
                ->where('exammanagements.class_id', $student->class_id)
                ->where('exammanagements.subject_id', $request['subject_id'])
                ->where('exammanagements.medium_id', $student->medium_id)
                ->where('exammanagements.board_id', $student->board_id)
                ->select(
                    'exammanagements.board_id',
                    'exammanagements.medium_id',
                    'exammanagements.class_id',
                    'exammanagements.academic_id',
                    'exammanagements.subject_id',
                    'exammanagements.date',
                    'questions.title as title',
                    'questions.option_1',
                    'questions.option_2',
                    'questions.option_3',
                    'questions.option_4',
                    'questions.answer',
                    'questions.question_image',
                    'questions.option_image_1',
                    'questions.option_image_2',
                    'questions.option_image_3',
                    'questions.option_image_4',
                    'questions.answer_image',
                    'categories.time_per_question',
                    'categories.no_of_question_sub',
                    'categories.class',
                    'categories.start_time',
                    'subjects.subject',
                    'lessons.title as lesson',
                    'periods.title as classes',
                    'boards.title as board',
                    'media.title as medium',
                    'academics.title as academic_year',
                )

                ->join('academics', 'academics.id', '=', 'exammanagements.academic_id')
                ->join('subjects', 'subjects.id', '=', 'exammanagements.subject_id')
                ->join('categories', 'categories.id', '=', 'exammanagements.category_id')
                ->join('periods', 'periods.id', '=', 'exammanagements.class_id')
                ->join('questions', 'questions.id', '=', 'exammanagements.question_id')
                ->join('lessons', 'lessons.id', '=', 'exammanagements.lesson_id')
                ->join('boards', 'boards.id', '=', 'exammanagements.board_id')
                ->join('media', 'media.id', '=', 'exammanagements.medium_id')
                ->get();

            if (sizeof($user) > 0) {
                foreach ($user as $key) {
                    $questionArray = array();
                    $questionArray['board_id'] = $key->board_id;
                    $questionArray['medium_id'] = $key->medium_id;
                    $questionArray['class_id'] = $key->class_id;
                    $questionArray['academic_id'] = $key->academic_id;
                    $questionArray['subject_id'] = $key->subject_id;
                    $questionArray['date'] = $key->date;
                    if ($key->title != null) {
                        $questionArray['title'] = $key->title;
                    } else {
                        $questionArray['title'] = "";
                    }

                    if ($key->option_1 != null) {
                        $questionArray['option_1'] = $key->option_1;
                    } else {
                        $questionArray['option_1'] = "";
                    }

                    if ($key->option_2 != null) {
                        $questionArray['option_2'] = $key->option_2;
                    } else {
                        $questionArray['option_2'] = "";
                    }
                    if ($key->option_3 != null) {
                        $questionArray['option_3'] = $key->option_3;
                    } else {
                        $questionArray['option_3'] = "";
                    }
                    if ($key->option_4 != null) {
                        $questionArray['option_4'] = $key->option_4;
                    } else {
                        $questionArray['option_4'] = "";
                    }
                    if ($key->answer != null) {
                        $questionArray['answer'] = $key->answer;
                    } else {
                        $questionArray['answer'] = "";
                    }
                    if ($key->question_image != ",") {
                        $questionArray['question_image'] =  asset("questions/" . $key->question_image);
                    } else {
                        $questionArray['question_image'] = "";
                    }
                    if ($key->option_image_1 != ",") {
                        $questionArray['option_image_1'] =  asset("questions/" .  $key->option_image_1);
                    } else {
                        $questionArray['option_image_1'] = "";
                    }
                    if ($key->option_image_2 != ",") {
                        $questionArray['option_image_2'] =  asset("questions/" .  $key->option_image_2);
                    } else {
                        $questionArray['option_image_2'] = "";
                    }
                    if ($key->option_image_3 != ",") {
                        $questionArray['option_image_3'] =  asset("questions/" . $key->option_image_3);
                    } else {
                        $questionArray['option_image_3'] = "";
                    }
                    if ($key->option_image_4 != ",") {
                        $questionArray['option_image_4'] =  asset("questions/" .  $key->option_image_4);
                    } else {
                        $questionArray['option_image_4'] = "";
                    }
                    if ($key->answer_image != "," || $key->answer_image == null) {
                        if ($key->answer_image == "1" && $key->option_image_1 != ",") {
                            $questionArray['answer_image'] =  asset("questions/" . $key->option_image_1);
                        } elseif ($key->answer_image == "2" && $key->option_image_2 != ",") {
                            $questionArray['answer_image'] =  asset("questions/" . $key->option_image_2);
                        } elseif ($key->answer_image == "3" && $key->option_image_3 != ",") {
                            $questionArray['answer_image'] =  asset("questions/" . $key->option_image_3);
                        } elseif ($key->answer_image == "4" && $key->option_image_4 != ",") {
                            $questionArray['answer_image'] =  asset("questions/" . $key->option_image_4);
                        } else {
                            $questionArray['answer_image'] = $key->answer_image;
                        }
                    } else {
                        $questionArray['answer_image'] = "";
                    }
                    $check = explode(":", $key->time_per_question);
                    $check1 = $check[0] * 60 + $check[1];
                    $questionArray['seconds_per_question'] = $check1;
                    $questionArray['time_per_question'] = $key->time_per_question;
                    $questionArray['no_of_question_sub'] = $key->no_of_question_sub;
                    $questionArray['start_time'] = $key->start_time;
                    $questionArray['subject'] = $key->subject;
                    $questionArray['lesson'] = $key->lesson;
                    $questionArray['classes'] = $key->classes;
                    $questionArray['board'] = $key->board;
                    $questionArray['medium'] = $key->medium;
                    $questionArray['academic_year'] = $key->academic_year;
                    $materialsArray[] = $questionArray;
                }
                $message = "Suceessfully Data are listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No  Records Found";
                $status = "Failure";
                $res = 204;
                $materialsArray = [];
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' =>  $materialsArray,
                'response' => $res
            ]);
        }
    }

    public function timetable(Request $request)
    {
        $rules = array(
            "student_id" => "required|exists:students,id"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $student = DB::table('students')
                ->where('id', $request->student_id)
                ->first();
            $time = DB::table("times")
                ->join("schools", 'schools.id', '=', 'times.school_id')
                ->join("periods", 'periods.id', '=', 'times.class_id')
                ->join("media", 'media.id', '=', 'times.medium_id')
                ->join("slots", 'slots.id', '=', 'times.timeslot_id')

                ->where('times.class_id', $student->class_id)
                ->where('media.id', $student->medium_id)
                ->where('schools.id', $student->school_id)
                ->select('times.day', 'times.id', 'times.subject_id as subject', 'slots.start_time', 'slots.end_time', 'slots.period')
                ->get();

            $arr = [];
            foreach ($time as $data) {
                if ('Monday' == $data->day) {
                    $arr['Monday'][] = $data;
                }
            }

            if (!isset($arr['Monday'])) {
                $arr['Monday'] = array();
            }
            foreach ($time as $data) {
                if ('Tuesday' == $data->day) {
                    $arr['Tuesday'][] = $data;
                }
            }
            if (!isset($arr['Tuesday'])) {
                $arr['Tuesday'] = array();
            }
            foreach ($time as $data) {
                if ('Wednesday' == $data->day) {
                    $arr['Wednesday'][] = $data;
                }
            }
            if (!isset($arr['Wednesday'])) {
                $arr['Wednesday'] = array();
            }
            foreach ($time as $data) {
                if ('Thursday' == $data->day) {
                    $arr['Thursday'][] = $data;
                }
            }
            if (!isset($arr['Thursday'])) {
                $arr['Thursday'] = array();
            }
            foreach ($time as $data) {
                if ('Friday' == $data->day) {
                    $arr['Friday'][] = $data;
                }
            }
            if (!isset($arr['Friday'])) {
                $arr['Friday'] = array();
            }
            foreach ($time as $data) {
                if ('Saturday' == $data->day) {
                    $arr['Saturday'][] = $data;
                }
            }
            if (!isset($arr['Saturday'])) {
                $arr['Saturday'] = array();
            }
            foreach ($time as $data) {
                if ('Sunday' == $data->day) {
                    $arr['Sunday'][] = $data;
                }
            }
            if (!isset($arr['Sunday'])) {
                $arr['Sunday'] = array();
            }
            $time =  $arr;
            if (isset($time) && sizeof($time) > 0) {
                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;
            } else {
                $message = "No result  Records Found";
                $status = "Failure";
                $res = 204;
                $time = [];
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $time,
                'response' => $res
            ]);
        }
    }


    public  function getpayment(Request $request)
    {
        $rules = array(
            "board_id" => "required|exists:boards,id"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "Failure",
                'message' => $validator->errors()->first(),
                'response' => 422,
            ]);
        } else {
            $table = DB::table('subscriptions')
                ->where('board', $request->get('board_id'))
                ->orderBy('duration', 'asc')
                ->get();
            if(isset($table) && sizeof($table) > 0 ) {

                $message = "Suceessfully Result data Listed";
                $status = "Success";
                $res = 200;

            }else{

                $message = "No result  Records Found";
                $status = "Failure";
                $res = 204;
                $table = [];

            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $table,
                'response' => $res
            ]);
        }
    }


public function hitcount(){
    date_default_timezone_set("Asia/Kolkata");

return  date("H:i");

    // $date = new \DateTime;
    // $check_if_exists = DB::table('visitor')->where('ip', $_SERVER['REMOTE_ADDR'])->first();
    // $get_visit_day = DB::table('visitor')->select('visit_date')->where('ip', $_SERVER['REMOTE_ADDR'])->first();
    
    // $value = Carbon::now();
    
    // if(!$check_if_exists)
    // {
    
    //     DB::table('visitor')->insert(array('ip' => $_SERVER['REMOTE_ADDR'], 'hits' => '1', 'visit_date' => $date));
    
    // }else{
    
    //     DB::table('visitor')->where('ip', $_SERVER['REMOTE_ADDR'])->increment('hits');
    // }
    
    
    // $value = Carbon::now();
    
    // if ($check_if_exists && date_format($value, 'd') != date('d')) {
    
    //     DB::table('visitor')->insert(array('ip' => $_SERVER['REMOTE_ADDR'], 'hits' => '1', 'visit_date' => $date));
    // }


    // return response()->json([
    //     'status' => "working"
        
    // ]);
}

public function addremovelikes(Request $request){
    $rules = array(
        "user_id" => "required",
        "video_id" => "required"
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return response()->json([
            'status' => "Failure",
            'message' => $validator->errors()->first(),
            'response' => 422,
        ]);
    } else {
    $check_if_exists =  DB::table('likes')
    ->where('video_id',$request->video_id)
    ->where('user_id',$request->user_id)
    ->first();
   $video =  DB::table('likes')
    ->where('video_id',$request->video_id)
    ->get();


if(!$check_if_exists)
    {
    
      $data =  DB::table('likes')
      ->insert(
            array(
            'video_id' => $request->video_id, 
            'user_id' => $request->user_id, 
            'likes_count' => count($video)+1,
            ));
    
    }else{
       
        $data1 =  DB::table('likes')
        ->where('video_id',$request->video_id)
        ->where('user_id',$request->user_id)
        ->delete();
    }
    }

    return response()->json([
        'status' =>'Success',
        'message' => isset($data)?"liked":"unliked",
        'response' => 200
    ]);

}

}
