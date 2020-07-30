<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  <style>
  .container{
    border-style: solid;
    background-color:;
  }
  </style>
</head>
<body>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container mt-5">

  <h2 class="text-center">login form</h2>
  <form action="{{url('forgetpassword')}}" class="col-md-4" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
     
            <div class="form-group">
     
     <input type="email" class="form-control"  id="email" placeholder="Enter email" name="email">
     @if ($errors->has('email'))
                   <span class="text-danger">{{ $errors->first('email') }}</span>
               @endif
   </div>
   <div class="form-group">
     <input type="password" class="form-control"  id="pwd" placeholder="Enter password" name="password">
     @if ($errors->has('password'))
                   <span class="text-danger">{{ $errors->first('password') }}</span>
               @endif
   </div>
   <div class="form-group">
     <input type="password" class="form-control"  id="cpwd" placeholder="Enter conform password" name="cpassword">
     @if ($errors->has('cpassword'))
                   <span class="text-danger">{{ $errors->first('cpassword') }}</span>
               @endif
   </div>

</br>
    <button type="submit" class="btn btn-primary mb-3">setpassword</button>
  </form>
 
</div>

</body>
</html>
