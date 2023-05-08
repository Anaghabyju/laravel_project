@extends('hr.hr_index')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <style>
      .contact{
        border:1px solid black;
       border-radius: 100px;
       width:50%;
       height:50%;
       margin-left: 20%;
        margin-bottom: 10%;
       box-shadow: 20px 20px 20px 20px black; 
      }
      .col-sm-6{
        box-shadow: 10px 30px 60px 10px black;
      }
     
      </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="color: white;">
  <form class="contact" action="{{ route('hr.leevecreate') }}" method="POST">
    @csrf
    <u><h3 style="margin-top:5%;margin-left:35%;">LEAVE REQUEST</h3></u><br>
    <div class="row mb-3"style="margin-left:15%;">
   
    <div class="col-sm-6">
      <input type="hidden" name="hr_id" value="{{auth()->guard('hr')->user()->hr_id }}">
    </div>
    </div>
  
    <div class="row mb-3"style="margin-left:15%;">
    <label for="inputPassword3" class="col-sm-3 col-form-label">type of leeve</label>
    <div class="col-sm-6">
      
      <input type="text" required class="form-control" id="inputname3" name="typeofleeve" value="">
    </div>
    </div>
  
  <div class="row mb-3"style="margin-left:15%;">
    <label for="inputPassword3" class="col-sm-3 col-form-label">sdate</label>
    <div class="col-sm-6">
      <input type="date" required class="form-control" id="inputname3" name="sdate">
    </div>
    </div>
    <div class="row mb-3"style="margin-left:15%;">
    <label for="inputPassword3" class="col-sm-3 col-form-label">edate</label>
    <div class="col-sm-6">
      <input type="date" required class="form-control" id="inputname3" name="edate">
    </div>
    </div>
    <div class="mb-1"style="margin-left:15%;">
  <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">reason</label>
  <div class="col-sm-6">
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" style="margin-left:55%;" name="reason"></textarea>
</div>
    </div>
   <div style="margin-left:50%;">
  <button type="submit" class="btn btn-danger mt-3">apply</button>
</div>

</form>
  </body>
</html>
@endsection