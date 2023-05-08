<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Hr;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Leeve;
use App\Models\Salary;
use App\Models\Worksheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DatabaseController extends Controller
{
    public function create(Request $request)
    {
        $data= $request->validate([
       
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
            'phone' =>'required',
            'image' =>'required',
            
        ]);
        $path='asset/storage/images/'.$data['image'];
        $filename=time().$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->storeAs('images',$filename,'public');
        $datas["image"]='/storage/'.$path;
        $data['image']=$filename;
       Hr::create([
        'name' => $request->name,
        'email' =>$request->email,
       'password'=> bcrypt($request->password),
       'phone' =>$request->phone,
       'image' =>$filename,
      
       ]);
       return redirect()->route('hr.register')->with('sussess','registration successfully completed');
    }
    public function empcreate(Request $request)
    {
        $data= $request->validate([
       
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
            'phone' =>'required',
            'image' =>'required',
            
        ]);
        $path='asset/storage/images/'.$data['image'];
        $filename=time().$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->storeAs('images',$filename,'public');
        $datas["image"]='/storage/'.$path;
        $data['image']=$filename;


    Employee::create([
        'name' => $request->name,
        'email' =>$request->email,
        'password'=> bcrypt($request->password),
        'phone' =>$request->phone,
        'image' =>$filename,
      
        ]);
       return redirect()->route('hr.addemployee')->with('sussess','registration successfully completed');
    }    
       public function updateapproval($id)
       {
        
       DB::table('hrs')->where('hr_id',$id)->update(['approval_status'=>'1']);
        return redirect()->route('admin_hrview');
      
       
       }   
      public function salarycreate(Request $request)
      {
           $request->validate([
       
            'employee_id' =>'required',
            'salary' =>'required',
        ]);
        Salary::create([
            'employee_id' => $request->employee_id,
            'salary' =>$request->salary,
        ]);
        return redirect()->route('hr.salary');
            
      }
      public function admin_salarycreate(Request $request)
      {
           $request->validate([
       
            'employee_id' =>'required',
            'salary' =>'required',
        ]);
        Salary::create([
            'employee_id' => $request->employee_id,
            'salary' =>$request->salary,
        ]);
        return redirect()->route('admin_salary');
            
      }
      public function leevecreate(Request $request)
      {
        $request->validate([

            'reason' =>'required',
            'typeofleeve' =>'required',
            'sdate' =>'required',
            'edate'=>'required',

        ]);
         Leeve::create([
            'employee_id' => $request->employee_id,
            'reason' =>$request->reason,
           'typeofleeve'=>$request->typeofleeve,
           'sdate' =>$request->sdate,
           'edate' =>$request->edate,
           
        ]);
        return redirect()->route('employee.employee_leave');
      }
      public function leeveapproval($id)
      {       
      DB::table('leeves')->where('id',$id)->update(['status'=>1]);
       return redirect()->route('hr.viewempleeve');   
      
      }   

      public function worksheetcreate(Request $request){
      $request->validate([
        'stime' =>'required',
        'etime'=>'required',
        'description'=>'required',
    
      ]);
      Worksheet::create([
        'employee_id'=>$request->employee_id,
        'date'=>$request->date,
        'description'=>$request->description,
        'stime' =>$request->stime,
        'etime' =>$request->etime,
       
       
    
      ]);
      return redirect()->route('employee.employee_worksheet');
      }
      public function hr_leevecreate(Request $request)
      {
        
        $request->validate([

            'reason' =>'required',
            'typeofleeve' =>'required',
            'sdate' =>'required',
            'edate'=>'required',

        ]);
         Leeve::create([
            'employee_id' => $request->hr_id,
            'reason' =>$request->reason,
           'typeofleeve'=>$request->typeofleeve,
           'sdate' =>$request->sdate,
           'edate' =>$request->edate,
           
        ]);
        return redirect()->route('hr.hr_leave');
      }

      public function admin_leeveapproval($id)
      {       
      DB::table('leeves')->where('id',$id)->update(['status'=>1]);
       return redirect()->route('admin.viewleeve');   
      
      }   
      public function changePassword(Request $request)
      {
        
          $request->validate([
              'currentpassword' => 'required',
              'confirmpassword' => 'required',
          ]);

  
         
  
        if (Auth::check())
         {
         
          $user = Auth::user();
          if (!Hash::check($request->currentpassword, $user->password)) {
            return back()->withErrors(['currentpassword' => 'The current password is incorrect.']);
        }
          $user->password = bcrypt($request->confirmpassword);
          $user->save();
      }
      

  
          return redirect()->route('showlogin')->with('status', 'Password updated successfully!');
      }
}
