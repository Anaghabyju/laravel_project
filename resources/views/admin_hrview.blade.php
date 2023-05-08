
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
                      <th>email</th>
                      <th>phone</th>
                      <th></th>
                      <th>image</th>
                      
                      <th>approval status</th>
                      
                     </tr>
                </thead>
                  <tbody>
                    @foreach($data as $datas)
                    <tr>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td>{{ $datas->hr_id }}</td>
                    <td><img src="{{asset('storage/images/'.$datas->image) }}" width="45" height="50"></td> 
                    <td>
                      @if($datas->approval_status==0)
                     
                     <a href="{{ route('admin.upadateapprove',$datas->hr_id) }}" class="btn btn-primary">approve </a>
                      @else
                      <a href="" class="btn btn-danger">approved</a>
                    </td>
                    @endif
                  
                     </tr>
                   @endforeach
                </tbody>
                </table>
              </div>
                
              </div>
         @endsection