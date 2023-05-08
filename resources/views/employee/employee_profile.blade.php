@extends('employee.employee_index')
 @section('content')
   
          <div class="col-md-9 grid-margin stretch-card mt-5">
            <div class="card" style="width:350px; height:350px; margin-left:40%;">
            <div class="card-body">
            
                  <div class="row">
                    <div class="col-lg-12 margin-tb">
                      <div class="pull=left">
                       <b> <h4 style="margin-left:30%;color:darkblue">PROFILE</h4><b>
                      </div>
                     
                    </div>
                  </div>
                 
                 <div class="row">
                
                  <div class="col-xs-12 col-xl-12 col=md-12">
                    <div class="form-group">
                    <img class="img-fluid rounded-circle" src="{{asset('storage/images/'.$data->image) }}" width="100" height="90" style="margin-left:25%;">
                    </div>
                  </div>
                  </div><br>
                 
                  <div class="col-xs-12 col-xl-12 col=md-12">
                    <div class="form-group">
                    &nbsp;&nbsp;<strong>name:</strong>&nbsp;&nbsp;&nbsp;
                     {{ $data->name }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-xl-12 col=md-12">
                    <div class="form-group">
                    &nbsp;&nbsp;<strong>email:</strong>&nbsp;&nbsp;&nbsp;
                     {{ $data->email }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-xl-12 col=md-12">
                    <div class="form-group">
                    &nbsp;&nbsp; <strong>phone:</strong>&nbsp;&nbsp;&nbsp;
                     {{ $data->phone }}
                    </div>
                  </div>
                  <div style="margin-left:40%;margin-top:10px;">
  <a href="{{ route('employee.employee_edit',$data->employee_id) }}"class="btn btn-danger" type="submit">edit</a>
</div>
            </div>
            
  
           
      @endsection