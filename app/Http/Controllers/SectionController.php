<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {

        $school = DB::table('schools')
        ->get();

        if(session('SchoolId')){

        $class =  DB::table('school_base_class')
        ->where('school_base_class.school_id',session('SchoolId'))
        ->join('schools','schools.id','school_base_class.school_id')
        ->join('periods','periods.id','school_base_class.class_id')
        ->select('schools.school_name','school_base_class.class_id')
        ->get();



        $section =DB::table('sections')
        ->where('sections.school_id',session('SchoolId'))
        ->join('schools','schools.id','sections.school_id')
        ->select('schools.school_name','sections.title','sections.id')
        ->get();


        }else{
           
            $class =  DB::table('school_base_class')
            ->join('schools','schools.id','school_base_class.school_id')
            ->join('periods','periods.id','school_base_class.class_id')
            ->select('schools.school_name','school_base_class.class_id')
            ->get();
            $section =DB::table('sections')
            ->join('schools','schools.id','sections.school_id')
            ->select('schools.school_name','sections.title','sections.id')
            ->get();


}


if(isset($_GET['search'])){
    $section =DB::table('sections')
    ->where(DB::raw('lower(schools.school_name)'), 'like', '%' . strtolower($_GET['school']) . '%')
    ->join('schools','schools.id','sections.school_id')
    ->select('schools.school_name','sections.title','sections.id')
    ->get();
}

 return view('section.index', compact('section','class','school'));

}


public function classbase(){

$class = DB::table('school_base_class')
->where('school_base_class.school_id',session('SchoolId'))
->join('schools','schools.id','school_base_class.school_id')
->join('periods','periods.id','school_base_class.class_id')
->select('schools.school_name','school_base_class.id','periods.title as class_name')
->get();


$class_admin = DB::table('periods')->get();


return view('section.school',compact('class','class_admin'));

}





public function classbasedelete($id){

    $class = DB::table('school_base_class')
    ->where('id',$id)
    ->delete();

    return redirect()->back();

    }
    
    




    public function store(Request $request)
    {

         $request->validate([
            'title' => 'required',
       
            'school_id' => 'required'            
         ]);
     
         $check=DB::table('sections')
         ->where('title','LIKE',$request['title'].'%')
         ->where('school_id','LIKE',$request['school_id'].'%')
         ->first();

         if(empty($check)){
         $ab = Section::create($request->all());

          return redirect()->route('section.index')
          ->with('success','Section created successfully.');
         
        }else{

            return redirect()->route('section.index')
             ->with('success', 'Section  Already created successfully.');
            
            } 
    
         }


public function store_classbase(Request $request){



$check= DB::table('school_base_class')
->where("school_id",$request->school_id)
->where("class_id",$request->class_id)
->first();


if(empty($check)){
    $save= DB::table('school_base_class')
    ->insert(
    array(
    "school_id"=>$request->school_id,
    "class_id"=>$request->class_id
    ));
    return redirect()->back()
    ->with('success', 'created successfully.');;

}else{
    return redirect()->back()
    ->with('success', 'Class  Already created successfully.');;

}




}


        public function edit(Section $section)
        { 

            $class =  DB::table('school_base_class')
            ->where('school_base_class.school_id',session('SchoolId'))
            ->join('schools','schools.id','school_base_class.school_id')
            ->join('periods','periods.id','school_base_class.class_id')
            ->select('schools.school_name','school_base_class.class_id')
            ->get();

            $section = DB::table('sections')
            ->where('sections.id', '=', $section->id)
            ->join('schools','schools.id','sections.school_id')
            ->select('schools.school_name','sections.title','sections.id')
            ->first();

            return view('section.edit', compact('section','class'));

        }

   public function update(Request $request, Section $section)
  { 

    
    $request->validate([
        'title' => 'required',
        'school_id' => 'required'  
    ]);

    $section->update($request->all());

    return redirect()->route('section.index')->with('success section updated successfully');

}

 public function destroy(Section $section)
{
        $section->delete();
        return redirect()->route('section.index')->with('success', 'section deleted successfully');
    } 

}
