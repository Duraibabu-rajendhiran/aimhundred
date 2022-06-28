<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Response;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use File;

class MaterialController extends Controller
{

    public function index()
    {
        


if(isset($_GET['lesson'])){
        $user = DB::table('materials')
            ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
            ->join('periods', 'periods.id', '=', 'materials.class_id')
            ->join('media', 'media.id', '=', 'materials.medium_id')
            ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
            ->join('boards', 'boards.id', '=', 'materials.board_id')
            ->where('lessons.title',$_GET['lesson'])
            ->select('lessons.title as lesson', 'materials.*','lessons.title as lesson','periods.title as class','subjects.subject','media.title as medium','boards.title as board')
            ->get();
}else{

    $user = DB::table('materials')
    ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
    ->join('periods', 'periods.id', '=', 'materials.class_id')
    ->join('media', 'media.id', '=', 'materials.medium_id')
    ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
    ->join('boards', 'boards.id', '=', 'materials.board_id')
    
    ->select('lessons.title as lesson', 'materials.*','lessons.title as lesson','periods.title as class','subjects.subject','media.title as medium','boards.title as board')
    ->get();

}
        $board = DB::table('boards')->get();
        $medium = DB::table('media')->get();
        $class = DB::table('periods')->get();
      return view('material.index', compact( 'board','medium', 'class', 'user'));
        
    }




    public function store(Request $request)
    {

        if ($request['file_type'] == 0) {
            $request->validate([
               'file_type' => 'required',
                'file_name' => 'required|mimetypes:application/pdf',
            ]);

            $ans = DB::table('lessons')
            ->where('id',$request['lesson_id'])
            ->first();

            $input = $request->all();
            $input['board_id'] = $ans->board_id;
            $input['subject_id'] = $ans->subject_id;
            $input['medium_id'] = $ans->medium_id;
            $input['class_id'] = $ans->class_id;
           
            if ($image = $request->file('file_name')) {
                $destinationPath = 'public/materials/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['file_name'] = "$profileImage";
            }

            Material::create($input);

        } else {


   $yt_url = $request->get('file_name1');
   $url_parsed_arr = parse_url($yt_url);


if(empty($url_parsed_arr['host'])){
    return redirect()->route('material.index')
    ->with('success', 'INVALID VIDEO LINK');
}
   if ($url_parsed_arr['host'] == "youtu.be") {
    $ans = DB::table('lessons')
    ->where('id',$request['lesson_id'])
    ->first();

    $material = new Material;
    
    $material->board_id = $ans->board_id;
    $material->subject_id = $ans->subject_id;
    $material->medium_id = $ans->medium_id;
    $material->class_id = $ans->class_id;

    $material->lesson_id = $request->get('lesson_id');
    $material->file_type = $request->get('file_type');
    $material->file_name = $request->get('file_name1');

    $material->save();
   } else {
    return redirect()->route('material.index')
    ->with('success', 'INVALID VIDEO LINK');
   }


          
        }
        return redirect()->route('material.index')
            ->with('success', 'material created successfully.');

    }



    public function edit(Request $request, $id)
    {
        $board = DB::table('boards')->get();
        $medium = DB::table('media')->get();
        $class = DB::table('periods')->get();
        $material =  DB::table('materials')
            ->where('materials.id', '=', $id)
            ->join('lessons', 'lessons.id', '=', 'materials.lesson_id')
            ->join('periods', 'periods.id', '=', 'materials.class_id')
            ->join('media', 'media.id', '=', 'materials.medium_id')
            ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
            ->join('boards', 'boards.id', '=', 'materials.board_id')
            ->select('lessons.title as lesson', 'materials.*','lessons.title as lesson','periods.title as class','subjects.subject','media.title as medium','boards.title as board')
            ->first();    
            return view('material.edit', compact('material', 'board','medium', 'class'));
     
 
    }


    public function update(Request $request,Material $material)
    {

            $request->validate([
                'lesson_id' => 'required',
                'board_id' => 'required',
                'class_id' => 'required',
                'medium_id' => 'required',
                'subject_id' => 'required',
                'file_type' => 'required',
            ]);
    
            $input = $request->all();
            if ($image = $request->file('file_name')) {
                $destinationPath = 'public/materials/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['file_name'] = "$profileImage";
            }

           
            $material->update($input);
  

        return redirect()->route('material.index')

            ->with('success', 'material updated successfully');
    }


    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('material.index')
            ->with('success', 'material deleted successfully');
    }


    public function download(Request $request, $file_name)
    {
        $pathToFile = public_path('materials/'.$file_name);
        

          if(file_exists(public_path('materials/'.$file_name))) {

            return response()->download($pathToFile);

          }else{

           return redirect()->back();

          }
      

    }


    public function view($id)
    {
       $data = Material::find($id);
       return redirect(asset('public/materials/'.$data->file_name));

    }
}
