<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ReDirect
{
  
    public function handle(Request $request, Closure $next)
    {

        if(session()->has('SchoolId') && (session()->has('role') == '0' ) ){
            return redirect('student');
        }
        


        return $next($request);
    }
}
