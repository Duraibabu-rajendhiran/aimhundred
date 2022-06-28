<?php

namespace App\Http\Controllers;

use App\Models\Medium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medium = Medium::latest()->paginate(5);
        return view('medium.index', compact('medium'))
       ->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|unique:media,title',
            'updated' => 'required',
   

        ]);
        Medium::create($request->all());

        return redirect()->route('medium.index')

            ->with('success', 'medium created successfully.');
    }

    public function edit(Medium $medium)
    {
        return view('medium.edit', compact('medium'));
    }


    public function update(Request $request, Medium $medium)
    {

        $request->validate([
            'title' => 'required',
            'updated' => 'required',
        ]);

        $medium->update($request->all());


        return redirect()->route('medium.index')
            ->with('success medium updated successfully');

    }

   
    public function destroy(Medium $medium)
    {
      
        $medium->delete();

        return redirect()->route('medium.index')
            ->with('success', 'academmic deleted successfully');
    }
}
