<?php

namespace App\Http\Controllers;
use App\Models\Hr;
use App\Models\Employee;
use App\Models\Leeve;
use App\Models\Salary;
use App\Models\Worksheet;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('layout.index');
    }
    public function showlogin()
    {
        return view('showlogin');
    }
    
    public function admin_index()
    {
     return view('admin_index');
    }
   
    public function index1()
    {
        return view('hr.layout.index1');
    }
    public function hr_register()
    {
        return view('hr.registration');
    }
    public function hr_showlogin()
    {
        return view('hr.showlogin');
    }
    
    public function hr_index()
    {
     return view('hr.hr_index');
    }
    public function index2()
    {
        return view('employee.layout.index2');
    }
    public function employee_showlogin()
    {
        return view('employee.showlogin');
    }
    
    public function employee_index()
    {
     return view('employee.employee_index');
    }
    public function hr_addemployee()
    {
        return view('hr.addemployee');
    }
    public function admin_hrview()
    {
        $data=Hr::all();
        return view('admin_hrview',compact('data'));
    }
    public function admin_employeeview()
    {
        $data=Employee::all();
        return view('admin_employeeview',compact('data'));
    }
    public function hr_viewemployee()
    {
        $data=Employee::all();
        return view('hr.viewemployee',compact('data'));
    }
    public function hr_salary()
    {
        $data=Employee::all();
        return view('hr.addsalary',compact('data'));
    }
   
   
  
    public function hr_profile()
    {      
        $data=Auth::guard('hr')->user();
       return view('hr.profile',compact('data'));
    }
    public function hr_edit($id)
    {
        $data=Hr::find($id);
        return view('hr.profile_edit',compact('data'));
    }
    public function hr_update(Request $request,$id){
        $del=Hr::find($id);
        $del->name=$request->input('name');
      
        $del->email=$request->input('email');
        if($request->hasfile('image')){
            $path='asset/storage/images/'.$del->image;
          if(file::exists($path)){
            file::delete($path);
          }
            $path='asset/storage/images/'.$del['image'];
            $fileName=time().$request->file('image')->getClientoriginalName();
            $path=$request->file('image')->storeAs('images',$fileName,'public');
            $datas["image"]='/storage/'.$path;
            $del['image'] =$fileName;
        }
        $del->update();

        return redirect()->route('hr.profile')->with('success','updated successfully');
     }
     public function hr_viewsalary()
     {
        $data=DB::table('employees')
        ->join('salaries', 'salaries.employee_id', '=', 'employees.employee_id')
       
        ->select( 'employees.name', 'salaries.salary')
        ->get();
        return view('hr.viewsalary',compact('data'));

     }
     public function admin_salary()
     {
        $data=Hr::all();
        return view('admin_addsalary',compact('data'));
     }
     public function admin_viewsalary()
     {
        $empid = DB::table('hrs')
        ->join('salaries', 'hr_id', '=', 'salaries.employee_id')
       
        ->select( 'hrs.name', 'salaries.salary')
        ->get();

        return view('admin_viewsalary',compact('empid'));
     } 
     public function admin_viewempsalary()
     {
        $empid = DB::table('employees')
        ->join('salaries', 'salaries.employee_id', '=', 'employees.employee_id')
       
        ->select( 'employees.name', 'salaries.salary')
        ->get();

        return view('admin_viewempsalary',compact('empid'));
     }          
     public function employee_viewsalary(Request $request)
     {
        $data=Auth::guard('employee')->user();        
       $id = $data->employee_id;
       $salary= DB::table('salaries')
        ->join('employees', 'salaries.employee_id','employees.employee_id')
        ->select( 'employees.name','salaries.salary')
        ->where('employees.employee_id',$id)
        ->first();   
     return view('employee.viewsalary',compact('salary'));
 }
    

 public function employee_profile()
 {      
     $data=Auth::guard('employee')->user();
    return view('employee.employee_profile',compact('data'));
 }
 public function employee_edit($id)
 {
     $data=Employee::find($id);
     return view('employee.employee_edit',compact('data'));
 }
 public function employee_update(Request $request,$id){
     $del=Employee::find($id);
     $del->name=$request->input('name');
   
     $del->email=$request->input('email');
     if($request->hasfile('image')){
         $path='asset/storage/images/'.$del->image;
       if(file::exists($path)){
         file::delete($path);
       }
         $path='asset/storage/images/'.$del['image'];
         $fileName=time().$request->file('image')->getClientoriginalName();
         $path=$request->file('image')->storeAs('images',$fileName,'public');
         $datas["image"]='/storage/'.$path;
         $del['image'] =$fileName;
     }
     $del->update();

     return redirect()->route('employee.employee_profile')->with('success','updated successfully');
  }
  public function employee_leave()
  {
    $data=Leeve::all();
    return view('employee.employee_leeve',compact('data'));
  }
  public function hr_viewempleeve()
  {
    $data=Leeve::all();
    return view('hr.viewemployee_leeve',compact('data'));
  }
  public function employee_viewresponse()
  {
    $data=Auth::guard('employee')->user();        
    $id = $data->employee_id;
    $salary= DB::table('leeves')
     ->join('employees', 'leeves.employee_id','employees.employee_id')
     ->select( 'leeves.status')
     ->where('leeves.employee_id',$id)
     ->first(); 
    $data=$salary;
    return view('employee.employee_viewresponse',compact('data'));
  }
  function employee_worksheet()
 {
    return view('employee.employee_worksheet');
 }
 public function hr_worksheetview()
 {
   $data=Worksheet::all();
   return view('hr.hr_worksheet',compact('data'));
 }
 public function hr_leeve()
 {
    return view('hr.hr_leeve');
 }
 public function admin_viewleeve()
 {
    $data=DB::table('leeves')
        ->join('hrs', 'hrs.hr_id', '=', 'leeves.employee_id')
       
        ->select( 'hrs.name', 'leeves.typeofleeve','leeves.sdate','leeves.edate','leeves.reason','leeves.status','leeves.id',)
        ->get();
   return view('admin_leeve',compact('data'));
 }
  public function hr_viewresponse()
  {
    $data=Auth::guard('hr')->user();        
    $id = $data->hr_id;
    $salary= DB::table('leeves')
     ->join('hrs', 'leeves.employee_id','hrs.hr_id')
     ->select( 'leeves.status')
     ->where('leeves.employee_id',$id)
     ->first(); 
    $data=$salary;
    return view('hr.hr_viewresponse',compact('data'));
  }
  public function password()
    {
        return view('admin_changepassword');
    }
}