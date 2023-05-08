@extends('hr.hr_index')
 @section('content')
   
          <div class="col-md-9 grid-margin stretch-card mt-5">
            <div class="card" style="width:450px; height:150px; margin-left:40%;">
            <div class="card-body">
            
                  <div class="row">
                    <div class="col-lg-12 margin-tb">
                      <div class="pull=left">
                       <b> <h4 style="margin-left:30%;color:darkblue">Leave Response</h4><b>
                      </div>
                     
                    </div>
                  </div>
                 
                 <div class="row">
                 
                  <div class="col-xs-12 col-xl-12 col-md-12">
                  
                    <div class="form-group">
                     
                     @if(($data->status=='1'))
                    <p>admin is approved your leave request</p>
                    @else
                    <p>admin is  not approved your leave request</p>
                    @endif
                   
                    </div>
                    
                  </div>
            </div>
          
  
           
      @endsection