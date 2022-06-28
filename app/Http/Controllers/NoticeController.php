<?php
namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\Medium;
use App\Models\Board;
use Illuminate\Support\Facades\DB;




class NoticeController extends Controller
{
    
    public function index()
    {

            if(empty(session('SchoolId'))){
                $school = DB::table('schools')->get();
                $notices = DB::table('notices')
                ->leftJoin('boards', 'boards.id', '=', 'notices.board_id')
                ->leftJoin('schools', 'schools.id', '=', 'notices.school_id')
                ->select('boards.title as board', 'schools.school_name as school', 'notices.*')
                ->get();
               }elseif(!empty(session('SchoolId'))){
                $school = DB::table('schools')
                 
                   ->where('schools.id',session('SchoolId'))
                   
                   ->get();
                   $notices = DB::table('notices')
                   ->leftJoin('boards', 'boards.id', '=', 'notices.board_id')
                   ->leftJoin('schools', 'schools.id', '=', 'notices.school_id')
                   ->where('schools.id',session('SchoolId'))
                   ->select('boards.title as board', 'schools.school_name as school', 'notices.*')
                   ->get();
    
               }

  
        if(empty(session('SchoolId'))){
            $board = DB::table('boards')->get();
           }elseif(!empty(session('SchoolId'))){
               $board = DB::table('boards')
               ->join('schools','schools.board_id','boards.id')
               ->where('schools.id',session('SchoolId'))
               ->select('boards.id as board_id','schools.id as school_id')
               ->first();

           }
        return view('notice.index', compact('notices', 'school', 'board'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'valid' => 'required '
        ]);

        
        $input = $request->all();


        if ($image = $request->file('image')){
            $destinationPath = 'notices/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Notice::create($input);

        return redirect()->route('notice.index')
            ->with('success', 'notice created successfully.');
            
    }


    public function edit(Notice $notice)
    {
        if(empty(session('SchoolId'))){
            $school = DB::table('schools')->get();

           }elseif(!empty(session('SchoolId'))){
            $school = DB::table('schools')
             
               ->where('schools.id',session('SchoolId'))
               
               ->get();

           }


    if(empty(session('SchoolId'))){
        $board = DB::table('boards')->get();
       }elseif(!empty(session('SchoolId'))){

           $board = DB::table('boards')
           ->join('schools','schools.board_id','boards.id')
           ->where('schools.id',session('SchoolId'))
           ->select('boards.id','boards.title')
           ->get();

       }

        $notice = DB::table('notices')
        ->where('notices.id','=', $notice->id)
        ->leftjoin('boards', 'boards.id', '=', 'notices.board_id')
        ->leftjoin('schools', 'schools.id', '=', 'notices.school_id')
        ->select('boards.title as board', 'schools.school_name as school', 'notices.*')
        ->first();

        return view('notice.edit', compact('notice', 'school', 'board'));
    }


    public function update(Request $request, Notice $notice)
    {
    

        $request->validate([
            'description' => 'required'
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'notices/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
     

        $notice->update($input);
        return redirect()->route('notice.index')
            ->with('success notice updated successfully');
    }


    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notice.index')
            ->with('success', 'Notice deleted successfully');
            
    }
}
