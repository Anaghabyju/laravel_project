@extends('hr.hr_index')
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
                    <h2 style="text-align: center;">Worksheet Details</h2>
                    <tr>
                      <th>employee_id</th>
                      <th>date</th>
                      <th>stime</th>
                      <th>etime</th>
                      <th>description</th>
                     
                      
                     </tr>
                </thead>
                  <tbody>
                    @foreach($data as $datas)
                    <tr>
                    <td>{{ $datas->employee_id }}</td>
                    <td>{{ $datas->date }}</td>
                    <td>{{ $datas->stime }}</td>
                    <td>{{ $datas->etime}}</td>
                    <td>{{ $datas->description}}</td> 
                   
                     </tr>
                   @endforeach
                </tbody>
                </table>
              </div>
                  </form>
              </div>
         @endsection