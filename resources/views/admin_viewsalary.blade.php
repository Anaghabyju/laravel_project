@extends('admin_index')
 @section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
      
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>salary</th>
                     
                      
                     </tr>
                </thead>
                  <tbody>
                    @foreach($empid as $datas)
                    <tr>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->salary }}</td>
                    
                  
                     </tr>
                   @endforeach
                </tbody>
                </table>
              </div>
                
              </div>
         @endsection