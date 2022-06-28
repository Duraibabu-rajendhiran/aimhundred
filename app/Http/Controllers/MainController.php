<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MainController extends Controller
{

    function login()
    {
        $value = explode('&&&&', session('remember'));
        $check = DB::table('management')
            ->where('remember', session('remember'))
            ->where('email', $value[0])
            ->first();
        // return $value;

        return view('auth.login', compact('check', 'value'));
    }




    function check(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $userInfo = DB::table('management')
            ->where('email', '=',$request->email)
            ->first();


        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {

                $request->session()->put('LoggedUser', $userInfo->id);

                $request->session()->put('SchoolId', $userInfo->school);
                              
                $request->session()->put('Role', $userInfo->role);

                $value = $request['email'] . '&&&&' . $request['password'];

                $request->session()->put('remember', $value);


                if($userInfo->school_id != 0){
                    
                    $request->session()->put('SchoolId',  $userInfo->school_id);
                    $request->session()->put('teacher_id', $userInfo->school_id);
                    return redirect('question');
                }
                $store = DB::table('management')
                    ->where('id', $userInfo->id)
                    ->update(
                        array("remember" => $request['email'].'&&&&'.$request['password'], )
                    );
                    
                if ($userInfo->Deleted_id == 1) {
                    return redirect('login')->with('fail', 'Please Contact Proskools');
                } else {
                    if (session('SchoolId')) {
                        return redirect('student');
                    } else {
                        return redirect('question');
                    }
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }



    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            session()->pull('SchoolId');
            return redirect('/auth/login');
        }
    }
}
