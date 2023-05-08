@extends('admin_index')
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
                    <h2 style="text-align: center;">Leave Details</h2>
                    <tr>
                        <th>id</th>
                      <th>name</th>
                      <th>type of leave</th>
                      <th>sdate</th>
                      <th>edate</th>
                      <th>reason</th>
                      <th></th>
                      
                     </tr>
                </thead>
                <tbody>
                    @foreach($data as $datas)
                    <tr>
                        <td>{{$datas->id }}</td>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->typeofleeve }}</td>
                    <td>{{ $datas->sdate }}</td>
                    <td>{{ $datas->edate}}</td>
                    <td>{{ $datas->reason}}</td> 
                    <td>
                    @if($datas->status==0)
                    <a href="{{ route('admin.adminleeveupdate',$datas->id) }}" class="btn btn-primary">approve</a>
                    @else
                      <a href="" class="btn btn-warning">approved</a>
                    </td>
                    @endif
                     </tr>
                   @endforeach
                </tbody>
                </table>
              </div>
                  </form>
              </div>
         @endsection