@extends('employee.employee_index')
 @section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                    <th>name</th>
                      <th>salary</th>
                      
                      
                     </tr>
                </thead>
                  <tbody>
                   
                    <tr>
                    <td>{{ $salary->name }}</td>
                    <td>{{ $salary->salary }}</td>
                   
                    
                     </tr>
                 
                </tbody>
                </table>
              </div>
                  </form>
              </div>
         @endsection