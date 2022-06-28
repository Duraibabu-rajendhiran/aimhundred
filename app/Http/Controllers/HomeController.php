<?php

use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return session('user');
    }


    public function index()
    {
        return view('home');
    }
}
