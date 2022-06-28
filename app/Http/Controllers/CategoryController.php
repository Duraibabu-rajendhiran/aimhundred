<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index()
    {
        $user = DB::table('categories')
            ->join('periods', 'periods.id', '=', 'categories.class')
            ->join('boards', 'boards.id', '=', 'categories.board')
            ->select(
                'categories.*',
                'boards.title as boards',
                'periods.title as classes',
                'time_per_question',
                'no_of_question_sub',
                'start_time'
            )->get();
        $board = DB::table('boards')->get();
  
        $class = DB::table('periods')->get();
        return view('category.index', compact('user', 'board','class'));
    }

    public function store(Request $request)
    {
     
        $request->validate([
           
            'no_of_question_sub' => 'required',
            'start_time' => 'required',
            'time_limit1' => 'required'
        ]);

        if (!isset($request['time_limit2']) || empty($request['time_limit2'])) {
            $timer = "00";
        } else {
            $timer = $request['time_limit2'];
        }



        $time = $request['time_limit1'] . ":" . $timer;
        $check = DB::table('categories')
            ->where('board', $request->board)
            ->where('class', $request->class)
            ->first();
        if (!empty($check)) {
            return redirect()->route('category.index')
                ->with('success', 'Class already Added You can Only Update or Delete');
       
        }
        $insert = new Category;
        $insert['board'] = $request->board;
        $insert['class'] = $request->class;
        $insert['time_per_question'] = $time;
        $insert['no_of_question_sub'] = $request->no_of_question_sub;
        $insert['start_time'] = $request->start_time;
        $insert->save();
        
        return redirect()->route('category.index')
            ->with('success', 'category created successfully.');

    }



    public function edit(Category $category)
    {
        $board = DB::table('boards')->get();
      
        $class = DB::table('periods')->get();
        $category = DB::table('categories')
            ->where('categories.id', '=', $category->id)
            ->join('periods', 'periods.id', '=', 'categories.class')
            ->join('boards', 'boards.id', '=', 'categories.board')
            ->select(
                'categories.*',
                'boards.title as boards',
                'periods.title as classes',
                'time_per_question',
                'no_of_question_sub',
                'start_time'
            )->first();
            
        return view('category.edit', compact('category', 'board',  'class'));

    }



    public function update(Request $request, Category $category)
    {

        $category->update($request->all());

        if($category){
        return redirect()->route('category.index')
            ->with('success', 'category updated successfully');
        }else{
            return redirect()->route('category.index')
            ->with('success', 'category Not  updated');
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}
