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
                    <tr>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>image</th>
                      
                     </tr>
                </thead>
                  <tbody>
                    @foreach($data as $datas)
                    <tr>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td><img src="{{asset('storage/images/'.$datas->image) }}" width="45" height="50"></td> 
                    
                     </tr>
                   @endforeach
                </tbody>
                </table>
              </div>
                  </form>
              </div>
         @endsection