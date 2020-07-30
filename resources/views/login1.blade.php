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
  <form action="{{url('accountlogin')}}" class="col-md-4" method="POST">
 {{ csrf_field()}}
    <div class="form-group">
     
      <input type="email" class="form-control"  id="email" placeholder="Enter email" name="email" >
     
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
    </div>
    <div class="form-group">
      <input type="password" style="position:relative" class="form-control"  id="pwd" placeholder="Enter password"  name="password"  >
      <i class="fa fa-eye" style="position:absolute" aria-hidden="true" onclick="myFunction()"></i>
      <!-- <input type="checkbox" onclick="myFunction()"> -->
      <script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    


    



      @if($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
    </div>
    <a href="{{url('/conformpassword')}}">forgetpassword</a>
</br>
    <button type="submit" class="btn btn-primary">login</button>
  </form>
  <div>
  <p class="mt-3"> Don't have an account?<a href="{{ url('/register1') }}"> signup</a></p>
  </div>
</div>

</body>
</html>
