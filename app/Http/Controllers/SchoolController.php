<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\Management;
use Illuminate\Support\Facades\Hash;


class SchoolController extends Controller
{
    public function index()
    {

            $user = DB::table('schools')

            ->join('locations', 'locations.id', '=', 'schools.location_id')
            ->join('boards', 'boards.id', '=', 'schools.board_id')
            ->select('boards.title', 'locations.city','locations.district','locations.state', 'schools.*')
            ->get(); 


        $location = DB::table('locations')->get();
        $board = DB::table('boards')->get();
        return view('school.index', compact('location', 'board', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);   
    }

public function searchschool(){
$city =  explode('--',$_GET['location_id']);
$board =  $_GET['board_id'];

    $user = DB::table('schools')
    ->join('locations', 'locations.id', '=', 'schools.location_id')
    ->join('boards', 'boards.id', '=', 'schools.board_id')
    ->where('locations.city','=',$city)
    ->where('boards.title','=',$board)
    ->select('boards.title', 'locations.city','locations.district','locations.state', 'schools.*')
    ->get();
$location = DB::table('locations')->get();
$board = DB::table('boards')->get();
return view('school.index', compact('location', 'board', 'user'))
    ->with('i', (request()->input('page', 1) - 1) * 5); 
}


    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required',
            'door_number' => 'required',
            'street' => 'required',
            'school_name' => 'required',
            'board_id' => 'required',
            "email" => 'required|unique:management,email',
            'mobile' => 'required',
     
        ]);

      $hel =  School::create($request->all());
        $management = new Management;
        $management->school = $hel->id;
        $management->fullname = $request->fullname;
        $management->phone = $request->phone;
        $management->email = strtolower($request->email);
        $management->role = 0;
        $management->deleted_id = "0";
        $management->password = Hash::make("Proskools@123");
        $management->save();
        return redirect()->route('school.index')
              ->with('success', 'school created successfully.');

    }

    public function edit(Request $request, $id)
    {
        $location = DB::table('locations')->get();
        $board = DB::table('boards')->get();
        $pannel = DB::table('schools')
        ->where('schools.id','=',$id)
        ->join('locations', 'locations.id', '=', 'schools.location_id')
        ->join('boards', 'boards.id', '=', 'schools.board_id')
        ->select('boards.title', 'locations.city', 'locations.state','locations.district', 'schools.*')
        ->get();

        foreach ($pannel as $school) {
            return view('school.edit', compact('school', 'location', 'board'));
        }

    }

    public function update(Request $request, School $school)
    {
    $request->validate([

            'location_id' => 'required',
            'door_number' => 'required',
            'street' => 'required',
            'school_name' => 'required',
            'board_id' => 'required',
            'email' => 'required',
            'mobile' => 'required',


    ]);



    $school->update($request->all());
       $user = DB::table('management')
       
        ->where('school','=',$school->id)
       ->update(array(
        'phone' => $request->phone,
        'email' => strtolower($request->email),
        'role' => 0,
        'deleted_id' => '0'
    ));


        return redirect()->route('school.index')

            ->with('success', 'school updated successfully');
    }


    public function destroy(School $school)
    {

       $school->delete();
        return redirect()->route('school.index')

            ->with('success', 'school deleted successfully');
    }
}
