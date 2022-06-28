<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\Contactmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    
    public function index()
    {
        $school = DB::table('schools')
        ->join('locations','locations.id','=','schools.location_id')
        ->join('boards','boards.id','=','schools.board_id')
        ->select('schools.id','schools.school_name','locations.city','boards.title as board')
        ->get();

        $management = DB::table('management')
        ->leftJoin('schools','schools.id','=','management.school')
        ->select('schools.school_name','schools.mobile as schoolphone','management.email','management.username','management.fullname','management.phone',
        'management.id','management.Deleted_id')
        ->orderBy('username','desc')
        ->get();

        $management1 = DB::table('management')
        ->leftJoin('schools','schools.id','=','management.school')
        ->select('schools.school_name','schools.mobile as schoolphone','management.email','management.username','management.fullname','management.phone',
        'management.id','management.Deleted_id')
        ->orderBy('username','asc')
        ->get();
        $management3 = DB::table('management')
        ->leftJoin('schools','schools.id','=','management.school')
        ->where('management.school_id','!=','0')
        ->select('management.email','management.fullname','management.phone','management.id')
        ->orderBy('username','desc')
        ->get();
        return view('management.index', compact('management','management3','management1','school'));

    }

public function block(Request $request){
 
    $school =  session('SchoolId');

    $class = DB::table('students')
    ->where('students.school_id',$school)
    ->join('periods','periods.id','=','students.class_id')
    ->join('sections','sections.id','=','students.section_id')
    ->join('media','media.id','=','students.medium_id')
    ->selectRaw("periods.title as class, sections.title as section,
    students.class_id,students.section_id,students.deleted_id,students.medium_id,media.title as medium")
    ->groupby('class','section','class_id','section_id','deleted_id','medium','medium_id')
    ->get();

    $board  =  DB::table('boards')->get();
    
    return view('school.block',compact('board','class','school'));

}

   public function blockview($id){

     $data = explode('$$$',$id);

     $student = DB::table('students')
     ->where('students.class_id',$data[0])
     ->where('students.section_id',$data[1])
     ->where('students.medium_id',$data[2])
     ->where('students.school_id',session('SchoolId'))
     ->join('periods', 'periods.id', '=', 'students.class_id')
     ->join('sections', 'sections.id', '=', 'students.section_id')
     ->select('sections.title as section', 'periods.title as class', 'students.*')
     ->get();
    return view('school.blockview',compact('student'));

}

public function blockit($id){

$data = explode('$$$',$id);

$checkshow = DB::table('students')
 ->where('students.class_id',$data[0])
 ->where('students.section_id',$data[1])
 ->where('students.medium_id',$data[2])
 ->where('students.school_id',session('SchoolId'))
 ->select('deleted_id')
 ->get();



    if($checkshow[0]->deleted_id == 0){

        $update = DB::table('students')
        ->where('students.class_id',$data[0])
        ->where('students.section_id',$data[1])
        ->where('students.medium_id',$data[2])
        ->where('students.school_id',session('SchoolId'))
        ->update(array('deleted_id' => 1));
      
      }else{
      
        $update = DB::table('students')
        ->where('students.class_id',$data[0])
        ->where('students.section_id',$data[1])
        ->where('students.medium_id',$data[2])
        ->where('students.school_id',session('SchoolId'))
        ->update(array('deleted_id' => 0));
      }

      return redirect()->back();

}






public function blockit1($id){

    $data = explode('$$$',$id);
    $checkshow = DB::table('students')
     ->where('students.class_id',$data[0])
     ->where('students.section_id',$data[1])
     ->where('students.full_name',$data[2])
     ->select('deleted_id')
    ->get();
    
    
    
        if($checkshow[0]->deleted_id == 0){
            $update = DB::table('students')
            ->where('students.class_id',$data[0])
            ->where('students.section_id',$data[1])
            ->where('students.full_name',$data[2])
            ->update(array('deleted_id' => 1));
          
          }else{
          
            $update = DB::table('students')
            ->where('students.class_id',$data[0])
            ->where('students.section_id',$data[1])
            ->where('students.full_name',$data[2])
            ->update(array('deleted_id' => 0));
          }
    
          return redirect()->back();
    
    }
    

public function unblock(){

    $class = DB::table('students')
    ->where('students.school_id',session('SchoolId'))
    ->join('periods','periods.id','=','students.class_id')
    ->join('sections','sections.id','=','students.section_id')
    ->join('media','media.id','=','students.medium_id')
    ->selectRaw("periods.title as class, sections.title as section,
    students.class_id,students.section_id,students.deleted_id,students.medium_id,media.title as medium")
    ->groupby('class','section','class_id','section_id','deleted_id','medium','medium_id')
    ->get();
      
        $school = session('SchoolId');
        $board = DB::table('boards')->get();
         return view('school.block',compact('board','class','school'));

}

public function lockuser(Request $request,$id){
  


$value =$request->id;


if($value != 3 ){

    if($value){
        $management = Management::find($id);   


        if($management->Deleted_id == 0){
            
        $management->Deleted_id = 1;
 
        }else{
            
        $management->Deleted_id = 0;
        
         } 
        $management->save();
       
     return redirect()->back();

    }else{

        $management = Management::find($id);   
        if($management->Deleted_id == 0){
    
        $management->Deleted_id = 2;

        }else{            
        $management->Deleted_id = 0;

         } 

         $management->save();
       
     return redirect()->back();

    }


}else{
    $management = Management::find($id);            
    if($management->Deleted_id == 3){
            
        $management->Deleted_id = 0;
 
        }else{
            
        $management->Deleted_id = 3;
        
         } 
     $management->save();
   
 return redirect()->back();
}

}


 public function store(Request $request)
    {

        $rules = array(
           "email" => "required|unique:management,email",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('management.index')
            ->with('success', $validator->errors());
            
        } else {
            if($request->role == "1"){
                $school= DB::table('schools')
                ->where('school_id','=',$request->school_id)
                ->first();
              
                $email = $school->emial;

            }else{
                
                $email = $request->email;
            }

        //  return $request;

        
        $management = new Management;
        $management->username = $request->username;
        $management->school = $request->school_id;
        $management->fullname = $request->fullname;
        $management->phone = $request->phone;
        $management->email = $email;
        $management->role = $request->role;
        $management->deleted_id = $request->deleted_id;
        $management->password = Hash::make($request->password);
        $management->save();
        $details=[
            'phone' => $request->phone,
            'body'=>$management->id

        ];

//    $mail= Mail::to($request->email)->send(new Contactmail($details));

    return redirect()->route('management.index')
            ->with('success', 'management created successfully.');

   

    }
}


    public function up(Request $request,$id)
    {


if($request->password == $request->password1){

  $management = Management::find($id);
        // return $request;
        $management->password = Hash::make($request->password);
        $management= $management->save();
        return redirect('student');
        
}else{
    return "PASSWORD CANNOT BE MATCH";
}
        
        
    }

           public function log($id){
              $id= $id;
             return view('management.email', compact('id'));
    }



    public function destroy(Management $management)
    {
        $management->delete();
        return redirect()->route('management.index')
            ->with('success', 'management deleted successfully');
    }
}