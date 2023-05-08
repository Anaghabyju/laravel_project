<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Laravel\Sanctum\Guard;
class LoginController extends Controller
{
    public function login(Request $request)
    {
       $credentials=$request->only('email','password');
       if(Auth::attempt($credentials)){
           $request->session()->regenerate();
           return Redirect::to('/admin_index');
       }
       return back()->withErrors([
           'email' => 'invalid email or password'
       ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

   
    public function hr_login(Request $request)
    {
       $credentials=$request->only('email','password');
       $credentials['approval_status']=1;
       if(Auth::guard('hr')->attempt($credentials)){
           $request->session()->regenerate();
           return Redirect::to('hr/hrindex');
       }
       return redirect()->route('hr.showlogin');

      
    }
    public function hr_logout()
    {
        Auth::logout();
        return redirect()->route('index1');
    }
    public function employee_login(Request $request)
    {
       $credentials=$request->only('email','password');
       if(Auth::guard('employee')->attempt($credentials)){
           $request->session()->regenerate();
           return Redirect::to('employee/employeeindex');
       }
      
    }
    
    public function employee_logout()
    {
        Auth::logout();
        return redirect()->route('index2');
    }
    
}
