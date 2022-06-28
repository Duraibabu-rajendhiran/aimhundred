<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
   
    public function index()
    {
    
        $academic = Academic::latest()->paginate(5);
        return view('academic.index', compact('academic'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|unique:academics,title',
            'from' => 'required',
            'to' => 'required',
            'updated' => 'required'

        ]);


        Academic::create($request->all());
        return redirect()->route('academic.index')
            ->with('success', 'Academic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        //
        return view('academic.edit', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academic $academic)
    {
        //

        $request->validate([
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'updated' => 'required'
        ]);



        $academic->update($request->all());

        return redirect()->route('academic.index')
            ->with('success acedmic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        //

        $academic->delete();

        return redirect()->route('academic.index')
            ->with('success', 'academmic deleted successfully');
    }
}
