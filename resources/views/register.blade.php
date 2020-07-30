<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<!-- <ul>
            @foreach ($errors->all() as $error)
          
                <li>{{ $error}}</li>
            @endforeach
        </ul> -->

<div class="container mt-5">

  <h2 class="text-center">registration form</h2>
  <form action="{{url('insert')}}" class="col-md-4" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
      <input type="text" class="form-control"  id="name" placeholder="Enter name" name="name">
      @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
    </div>
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

    <div class="form-group ">
    gender:
        <input type="radio"  id="radio1" name="gender" value="male" >male
     
        <input type="radio"  id="radio2" name="gender" value="female">female
      
        <input type="radio" value="others" name="gender">others
        @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
    
    </div>
<div class="form-group ">
   Check: <input type="checkbox"  id="check1" name="check" value="option1" >Option 1
    <input type="checkbox"  id="check1" name="check" value="option2" >Option 2
    <input type="checkbox"  id="check1" name="check" value="option3" >Option 3

    @if ($errors->has('check'))
                    <span class="text-danger">{{ $errors->first('check') }}</span>
                @endif
    
</div>
<div class="form-group ">
DOB:<input type="date" id="dob" name="dob">
</div>
<select class="form-control mb-3" name="select"id="sel1" name="sellist1">
        <option value="" name="select">Please select UI courses</option>
        <option value="html"  name="select">html</option>
        <option value="css"  name="select">css</option>
        <option value="bootstrap"  name="select">bootstrap</option>
        <option value="ajax"  name="select">ajax</option>
        
     
      </select>
      @if ($errors->has('select'))
                    <span class="text-danger">{{ $errors->first('select') }}</span>
                @endif</br></br>
   
    <button type="submit" class="btn btn-primary mb-4">register</button>
  </form>
 
</div>

</body>
</html>
