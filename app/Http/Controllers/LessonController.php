<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('lessons')
            ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->join('media', 'media.id', '=', 'lessons.medium_id')
            ->join('boards', 'boards.id', '=', 'lessons.board_id')
            ->join('periods', 'periods.id', '=', 'lessons.class_id')
            ->select('subjects.subject', 'lessons.*', 'media.title as medium', 'boards.title as board', 'periods.title as class')
            ->paginate(20);
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        return view('lesson.index', compact('subject', 'user', 'board', 'medium', 'class'));
    }
    public function searchlession(Request $request)
    {
        $search = DB::table('lessons')
            ->where('subject_id', '=', $_GET['subject_id'])
            ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->join('media', 'media.id', '=', 'lessons.medium_id')
            ->join('boards', 'boards.id', '=', 'lessons.board_id')
            ->join('periods', 'periods.id', '=', 'lessons.class_id')
            ->select('subjects.subject', 'lessons.*', 'media.title as medium', 'boards.title as board', 'periods.title as class')
            ->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        if (sizeof($search) > 0) {
            return view('lesson.index', compact('subject', 'search', 'board', 'medium', 'class'));
        } else {
            return view('lesson.index', compact('subject', 'search', 'board', 'medium', 'class'));
        }
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'subject_id' => 'required',
            'board_id' => 'required',
            'class_id' => 'required',
            'medium_id' => 'required',
            'is_delete' => 'required'
        ]);
        $check = DB::table('lessons')
            ->where('title', $request['title'])
            ->where('subject_id', $request['subject_id'])
            ->where('board_id', $request['board_id'])
            ->where('class_id', $request['class_id'])
            ->where('medium_id', $request['medium_id'])
            ->first();
        if (empty($check)) {
            Lesson::create($request->all());
            return redirect()->route('lesson.index')
                ->with('success', 'lesson created successfully.');
        } else {
            return redirect()->route('lesson.index')
                ->with('success', 'lesson Already created successfully.');
        }
    }
    public function edit(Request $request, $id)
    {
        $subject = DB::table('subjects')->get();
        $subject = DB::table('subjects')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        $pannel =  DB::table('lessons')
            ->where('lessons.id', '=', $id)
            ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->join('media', 'media.id', '=', 'lessons.medium_id')
            ->join('boards', 'boards.id', '=', 'lessons.board_id')
            ->join('periods', 'periods.id', '=', 'lessons.class_id')
            ->select('subjects.subject', 'lessons.*', 'media.title as medium', 'boards.title as board', 'periods.title as class')
            ->get();
        foreach ($pannel as $lesson) {
            return view('lesson.edit', compact('lesson', 'subject', 'board', 'medium', 'class'));
        }
    }
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required',
            'subject_id' => 'required',
            'board_id' => 'required',
            'class_id' => 'required',
            'medium_id' => 'required'
        ]);
        $lesson->update($request->all());
        return redirect()->route('lesson.index')
            ->with('success', 'lesson updated successfully');
    }
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson.index')
            ->with('success', 'lesson deleted successfully');
    }
    ////payment group
    ///////////////////// Payment 
    public function paymentg()
    {
        $board = DB::table("boards")->get();
        $sub =   DB::table('subscription_group')
            ->join('boards', 'boards.id', '=', 'subscription_group.board')
            ->select('subscription_group.*', 'boards.title as board_title')
            ->get();
        return view('paymentg.index', compact('board', 'sub'));
    }
    public function payitg(Request $request)
    {
        $insert =   DB::table('subscription_group')->insert(
            array(
                'title'   =>   $request->title,
                'duration'   =>   $request->duration,
                'price'   =>   $request->price,
                'offer'   =>   $request->offer,
                'color'   =>   $request->color,
                'board'   =>   $request->board,
                'user_limit'   =>   $request->user_limit
            )
        );
        return redirect()->back()->with("success", "Inserted Successfully");
    }
    public function callplang(Request $request, $id)
    {
        if (strpos($id, "=")) {
            $req = DB::table("subscription_group")
                ->where('id', $request->plan_id)
                ->first();
            $section = DB::table("sections")
                ->where('id', $id)
                ->first();
            $value1 = explode('=', $id)[1];
            $insert =   DB::table('trans_hist_user')->insert(
                array(
                    'user_id'   =>     $value1,
                    'paid_date'   =>   Carbon::now()->format('Y-m-d'),
                    'payment'   =>   $req->offer,
                    'plan_id'   =>   $req->id,
                    'valid_date'   =>  Carbon::now()->addMonths($req->duration)->format('Y-m-d'),
                )
            );
            return redirect()->back()->with('success', 'User Premium Added Successfully');
        } else {
            $req = DB::table("subscription_group")
                ->where('id', $request->plan_id)
                ->first();
            $section = DB::table("students")
                ->where('id', $id)
                ->first();
            $insert =   DB::table('trans_hist_student')->insert(
                array(
                    'student_id'   =>   $section->id,
                    'paid_date'   =>   Carbon::now()->format('Y-m-d'),
                    'payment'   =>   $req->offer,
                    'plan_id'   =>   $req->id,
                    'valid_date'   =>  Carbon::now()->addMonths($req->duration)->format('Y-m-d'),
                    'class_id'   =>   $section->class_id,
                    'section_id'   =>    $section->section_id
                )
            );
            return redirect()->back()->with('success', 'student Premium Added Successfully');
        }
    }
    public function viewsubg($id)
    {
        if (strpos($id, "=")) {
            $value = false;
            $value1 = $id;
        } else {
            $value = $id;
            $value1 = false;
        }
        $sub =   DB::table('subscription_group')
            ->join('boards', 'boards.id', '=', 'subscription_group.board')
            ->select('subscription_group.*', 'boards.title as board_title')
            ->get();
        return view('paymentg.plan', compact('sub', 'value', 'value1'));
    }
    public function deletepayg($id)
    {
        $data = DB::table("subscription_group")
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('paymentg')
            ->with('success', 'Subscription deleted successfully');
    }
    public function editpayg($id)
    {
        $data = DB::table("subscription_group")
            ->where('subscription_group.id', '=', $id)
            ->join('boards', 'boards.id', '=', 'subscription_group.board')
            ->select('subscription_group.*', 'boards.title as board_title')
            ->first();
        $board = DB::table('boards')->get();
        return view('paymentg.edit', compact('board', 'data'));
    }
    public function updatepayg(Request $request, $id)
    {
        $data = DB::table("subscription_group")
            ->where('subscription_group.id', '=', $id)
            ->update(
                array(
                    'title'   =>   $request->title,
                    'duration'   =>   $request->duration,
                    'price'   =>   $request->price,
                    'offer'   =>   $request->offer,
                    'color'   =>   $request->color,
                    'board'   =>   $request->board,
                    'user_limit'   =>   $request->user_limit
                )
            );
        return redirect()->route('paymentg')
            ->with('success', 'updated successfully');
    }
    public function payg(Request $request)
    {
        $parameters = [
            'transaction_no' => time(),                   // necessary paramenets
            'merchant_id' => env('INDIPAY_MERCHANT_ID'),  // necessary paramenets
            'redirect_url' => url('payment'),             // necessary paramenets
            'cancel_url' => url('payment'),               // necessary paramenets
            'currency' => "INR",                          // necessary paramenets
            'language' => 'EN',                           // necessary paramenets
            'order_id' => 12345,                          // necessary paramenets
            'amount' => 1,                                // necessary paramenets
            'name' => '***** *****',
            'email' => '*****@*****.com',
        ];
        $order = Indipay::prepare($parameters);
        return Indipay::process($order);
    }
    public function viewdetailg()
    {
        $user = DB::table('trans_hist_student')
            ->join('students', 'students.id', 'trans_hist_student.student_id')
            ->select('valid_date', 'paid_date', 'payment', 'students.full_name')
            ->get();
        $school = DB::table('trans_hist_user')
            ->join('management', 'management.id', '=', 'trans_hist_user.user_id')
            ->join('schools', 'schools.id', '=', 'management.school')
            ->select('valid_date', 'paid_date', 'payment', 'schools.school_name')
            ->get();
        return view('paymentg.detail', compact('school', 'user'));
    }
    public function video()
    {
        $video  = DB::table("videos")
            ->join('boards', 'boards.id', 'videos.board_id')
            ->join('periods', 'periods.id', 'videos.class_id')
            ->join('media', 'media.id', 'videos.medium_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'videos.subject_id')
            ->select('videos.*', 'subjects.subject', 'boards.title as board', 'media.title as medium', 'periods.title as class')
            ->get();
        $board = DB::table("boards")->get();
        $class = DB::table("periods")->get();
        $medium = DB::table("media")->get();
        return view('lesson.video', compact('video', 'board', 'class', 'medium'));
    }
    public function videocreate(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'medium_id' => 'required',
            'board_id' => 'required',
            'subject_id' => 'required',
            'descc' => 'required',
            'heading' => 'required'
        ]);
        $input = $request->all();
        $input = $request->all();
        if ($image = $request->file('video')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['video_url'] = "$profileImage";
            $insert = DB::table('videos')
                ->insert(array(
                    "board_id" => $input['board_id'],
                    "class_id" => $input['class_id'],
                    "medium_id" => $input['medium_id'],
                    "video_url" => $input['video_url'],
                    "subject_id" => $input['subject_id'],
                    "heading" => $input['heading'],
                    "descc" => $input['descc']
                ));
        } else {
            $insert = DB::table('videos')
                ->insert(array(
                    "board_id" => $input['board_id'],
                    "class_id" => $input['class_id'],
                    "medium_id" => $input['medium_id'],
                    "subject_id" => $input['subject_id'],
                    "heading" => $input['heading'],
                    "descc" => $input['descc']
                ));
        }
        return redirect()->back()
            ->with('success', 'video Uploaded successfully');
    }
    public function videoedit($id)
    {
        $user = DB::table('videos')
            ->where('videos.id', $id)
            ->join('boards', 'boards.id', 'videos.board_id')
            ->join('periods', 'periods.id', 'videos.class_id')
            ->join('media', 'media.id', 'videos.medium_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'videos.subject_id')
            ->select('boards.title as board', 'subjects.subject', 'periods.title as class', 'media.title as medium', 'videos.*')
            ->first();
        $board = DB::table('boards')
            ->get();
        $class = DB::table('periods')
            ->get();
        $medium = DB::table('media')
            ->get();
        // return redirect()->back();
        return view('lesson.videoedit', compact('user', 'board', 'medium', 'class'));
    }
    public function videoupdate(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'medium_id' => 'required',
            'board_id' => 'required',
            'subject_id' => 'required',
            'descc' => 'required',
            'heading' => 'required'
        ]);
        $input = $request->all();
        $input = $request->all();
        if ($image = $request->file('video')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['video_url'] = "$profileImage";
            $user = DB::table('videos')
                ->where('videos.id', $id)
                ->update(
                    array(
                        "board_id" => $input['board_id'],
                        "class_id" => $input['class_id'],
                        "medium_id" => $input['medium_id'],
                        "subject_id" => $input['subject_id'],
                        "video_url" => $input['video_url'],
                        "heading" => $input['heading'],
                        "descc" => $input['descc']
                    )
                );
        } else {
            $user = DB::table('videos')
                ->where('videos.id', $id)
                ->update(
                    array(
                        "board_id" => $input['board_id'],
                        "class_id" => $input['class_id'],
                        "medium_id" => $input['medium_id'],
                        "subject_id" => $input['subject_id'],
                        "heading" => $input['heading'],
                        "descc" => $input['descc']
                    )
                );
        }
        return redirect('video')
            ->with('success', 'video Updated Successfully');
    }
    public function videodelete($id)
    {
        $user = DB::table('videos')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function AddUser(){
        $management = DB::table('management')
        ->leftJoin('schools','schools.id','=','management.school')
        ->where('management.school_id',session('SchoolId'))
        ->select('management.email','management.fullname','management.phone','management.id')
        ->orderBy('username','desc')
        ->get();


return view('Teacher.index',compact('management'));

}
  

public function addteacher(Request $request){
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:management,email',
            'phone' => 'required',
        ]);


        $save=DB::table('management')
        ->insert(array(
            "fullname" => $request['fullname'],
            "email" =>  strtolower($request['email']),
            'password' => Hash::make("teacher@AH123"),
            "phone" => $request['phone'],
            "school_id" => $request['school_id'],
            "role" => 0,
        ));
if($save){
    return redirect()->route('AddUser')
    ->with('success', 'created successfully.');
}else{
    return redirect()->route('AddUser')
    ->with('success', 'Check Input not Saved.');
} }


public function teacherDelete($id){

    $data= DB::table("management")
    ->where('id',$id)
    ->delete();

    if($data){
        return redirect()->route('AddUser')
        ->with('success', 'Deleted successfully.');
    }else{
        return redirect()->route('AddUser')
        ->with('success', 'Not Delete Try Again');
    }     
}

public function groupquestion(){
    ///
}
};

