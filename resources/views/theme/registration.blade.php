@extends('theme.partials.mainlayout')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="alert alert-danger">



 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		
	</div>	





<div class="row ">
<div class="col-md-6 offset-md-4 mt-5 mb-4">
<div class="container bg-info  " >
<h1 class="text-center"> REGISTRATION FORM</h1>

<form action = "{{url('insertt')}}"  method="post">
                {{ csrf_field() }}


<div class="form-group mt-3 text-">
fname:<input type="text" class="form-control" name="fname">
</div>
<div class="form-group">
lname:<input type="text" class="form-control" name="lname">
</div>
<div>
email:<input type="text"class="form-control" name="email">
</div>
<div class="form-group">
password:<input type="password"class="form-control" name="password">
</div>
<div class="form-group">
c_password:<input type="password"class="form-control" name="c_password">
</div>

<button type="submit"class="btn btn-danger mt-2" >register</button>

</form>
</div>
</div>
</div>
</body>
</html>
@endsection