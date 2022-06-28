<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use Carbon\Carbon;

class SubjectController extends Controller
{
    public function index()
    {
        if (isset($_GET["board"])) {
            $period = DB::table('subjects')
                ->join('media', 'media.id', '=', 'subjects.medium_id')
                ->join('periods', 'periods.id', '=', 'subjects.class_id')
                ->join('boards', 'boards.id', '=', 'subjects.board_id')
                ->where('boards.title', $_GET["board"])
                ->selectRaw("periods.title,boards.title as board")
                ->groupby('periods.title', 'board')
                ->get();
            $user = false;
        } else {
            $user = DB::table('subjects')
                ->join('boards', 'boards.id', '=', 'subjects.board_id')
                ->selectRaw("boards.title")
                ->groupby('boards.title')
                ->get();
            $period = false;
        }
        $book = DB::table('books')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        return view('subject.subjectview', compact('medium', 'board', 'book', 'class', 'user', 'period'));
    }
    public function  searchsub()
    {
        $search = DB::table('subjects')
            ->where('board_id', '=', $_GET['board'])
            ->where('class_id', '=', $_GET['class'])
            ->where('medium_id', '=', $_GET['medium'])
            ->join('media', 'media.id', '=', 'subjects.medium_id')
            ->join('periods', 'periods.id', '=', 'subjects.class_id')
            ->join('boards', 'boards.id', '=', 'subjects.board_id')
            ->select('boards.title as board', 'periods.title as class', 'subjects.*', 'media.title as medium')
            ->get();
        $book = DB::table('books')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        $searchtest = true;
        if (sizeof($search) > 0) {
            return view('subject.index', compact('medium', 'board', 'book', 'class', 'search', 'searchtest'));
        } else {
            return view('subject.index', compact('medium', 'board', 'book', 'class', 'search', 'searchtest'));
           
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject'  => 'required',
            'is_delete' => 'required',
            'class_id' => 'required',
            // 'subject_image' => 'required',
            'medium_id' => 'required',
            'board_id' => 'required',
        ]);
        $check = DB::table('subjects')
            ->where('subject', $request['subject'])
            ->where('class_id', $request['class_id'])
            ->where('medium_id', $request['medium_id'])
            ->where('board_id', $request['board_id'])
            ->get();
        if (sizeof($check) > 0) {
            return redirect()->route('subject.index')
                ->with('success', 'already subject added.');
        }
        $input = $request->all();
        Subject::create($input);
        return redirect()->route('subject.index')
            ->with('success', 'subject created successfully.');
    }
    public function edit(Request $request, $id)
    {
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        $book = DB::table('books')->get();
        $subject =  DB::table('subjects')
            ->where('subjects.id', '=', $id)
            ->join('media', 'media.id', '=', 'subjects.medium_id')
            ->leftjoin('books', 'books.book_image', '=', 'subjects.subject_image')
            ->join('periods', 'periods.id', '=', 'subjects.class_id')
            ->join('boards', 'boards.id', '=', 'subjects.board_id')
            ->select('boards.title as board', 'periods.title as class', 'books.book_title', 'subjects.*', 'media.title as medium')
            ->first();
        return view('subject.edit', compact('subject', 'medium', 'book', 'board', 'class'));
    }
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject'  => 'required',
            'is_delete' => 'required',
            'class_id' => 'required',
            'medium_id' => 'required',
            'board_id' => 'required',
            'subject_image' => 'required'
        ]);
        $input = $request->all();
        $subject->update($input);
        return redirect()->route('subject.index')
            ->with('success', 'subject updated successfully');
    }
    public function view_sub($id)
    {
        $arr = explode('-for-', $id);
        $user = DB::table('subjects')
            ->join('media', 'media.id', '=', 'subjects.medium_id')
            ->join('periods', 'periods.id', '=', 'subjects.class_id')
            ->join('boards', 'boards.id', '=', 'subjects.board_id')
            ->where('boards.title', $arr[1])
            ->where('periods.title', $arr[0])
            ->select('boards.title as board', 'periods.title as class', 'subjects.*', 'media.title as medium')
            ->get();
        $book = DB::table('books')->get();
        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        return view('subject.index', compact('medium', 'board', 'book', 'class', 'user'));
        return $id;
    }
    public function deletesubject($id)
    {
        $data = DB::table("subjects")
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('subject.index')
            ->with('success', 'subject deleted successfully');
    }
    ///////////////////// Payment 
    public function payment()
    {
        $board = DB::table("boards")->get();
        $sub =   DB::table('subscriptions')
            ->join('boards', 'boards.id', '=', 'subscriptions.board')
            ->select('subscriptions.*', 'boards.title as board_title')
            ->get();
        return view('payment.index', compact('board', 'sub'));
    }
    public function payit(Request $request)
    {
        $insert =   DB::table('subscriptions')->insert(
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
    public function callplan(Request $request, $id)
    {
        if (strpos($id, "=")) {
            $req = DB::table("subscriptions")
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
            $req = DB::table("subscriptions")
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
    public function viewsub($id)
    {
        if (strpos($id, "=")) {
            $value = false;
            $value1 = $id;
        } else {
            $value = $id;
            $value1 = false;
        }
        $sub =   DB::table('subscriptions')
            ->join('boards', 'boards.id', '=', 'subscriptions.board')
            ->select('subscriptions.*', 'boards.title as board_title')
            ->get();
        return view('payment.plan', compact('sub', 'value', 'value1'));
    }
    public function deletepay($id)
    {
        $data = DB::table("subscriptions")
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('payment')
            ->with('success', 'Subscription deleted successfully');
    }
    public function editpay($id)
    {
        $data = DB::table("subscriptions")
            ->where('subscriptions.id', '=', $id)
            ->join('boards', 'boards.id', '=', 'subscriptions.board')
            ->select('subscriptions.*', 'boards.title as board_title')
            ->first();
        $board = DB::table('boards')->get();
        return view('payment.edit', compact('board', 'data'));
    }
    public function updatepay(Request $request, $id)
    {
        $data = DB::table("subscriptions")
            ->where('subscriptions.id', '=', $id)
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
        return redirect()->route('payment')
            ->with('success', 'updated successfully');
    }
    public function pay(Request $request)
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
    public function viewdetail()
    {
        $user = DB::table('trans_hist_student')
            ->join('students', 'students.id', 'trans_hist_student.student_id')
            ->select('valid_date', 'paid_date', 'payment', 'students.full_name')
            ->get();
        return view('payment.detail', compact('user'));
    }

    public function searchvideo()
    {

        $search = DB::table('videos')
            ->where('videos.board_id', $_GET['board_id'])
            ->where('videos.class_id', $_GET['class_id'])
            ->where('videos.medium_id', $_GET['medium_id'])  
            ->where('videos.subject_id', $_GET['subject_id'])  
            ->join('boards', 'boards.id', 'videos.board_id')
            ->join('periods', 'periods.id', 'videos.class_id')
            ->join('media', 'media.id', 'videos.medium_id')
            ->leftjoin('subjects','subjects.id','=','videos.subject_id')
            ->select('videos.*','subjects.subject','boards.title as board', 'media.title as medium', 'periods.title as class')
            ->get();

        $class = DB::table('periods')->get();
        $medium = DB::table('media')->get();
        $board = DB::table('boards')->get();
        if (sizeof($search) > 0) {

            return view('lesson.video', compact('search', 'class', 'medium', 'board'));
            
        } else {
            return view('lesson.video', compact('search', 'class', 'medium', 'board'));

        }
    }
}
