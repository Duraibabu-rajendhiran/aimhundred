<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BoardController extends Controller
{
    public function index()
    {
        
        $board = Board::latest()->paginate(5);
        return view('board.index', compact('board'))
        ->with('i', (request()->input('page', 1) - 1) * 8);

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:boards,title',
            'updated' => 'required',
        ]);
        Board::create($request->all());
        return redirect()->route('board.index')
            ->with('success', 'Board created successfully.');
    }

    public function edit(Board $board)
    {
        return view('board.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {

        $request->validate([
            'title' => 'required',
            'updated' => 'required'
        ]);

        $board->update($request->all());
        return redirect()->route('board.index')
        ->with('success', 'Board updated successfully');

    }


    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('board.index')
        ->with('success', 'Board deleted successfully');
    }

}
