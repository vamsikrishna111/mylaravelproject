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

<div>

 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		
	</div>	

  



<div class="container  " >
<h1 class="text-center text-warning">Dashboard </h1>
<form action = ""  method="post">
{{ csrf_field() }}


<div class="container" >
<div class="row">
<div class="col-md-4 ">
<div class="card">
<div class="card-header bg-success">
 <h4 class="text-center"> Total publish</h4>
 </div>
<div class="card-body bg-danger ">
 <h5>
 @foreach(Session::get('post3') as $data)
{{$data->tcount}}@endforeach
<h5>





</div>
</div>
</div>



<div class="col-md-4">
<div class="card">
<div class="card-header bg-success">
   <h4 class="text-center">published<h4>
</div>
<div class="card-body bg-danger">


<h5>
@foreach(Session::get('post2') as $data)
{{$data->upcount}}@endforeach
</h5>


</div>
</div>
</div>


<div class="col-md-4">

<div class="card">
<div class="card-header bg-success">
    <h4 class="text-center">unpublished</h4>
</div>
<div class="card-body bg-danger">
<h5>

@foreach(Session::get('post1') as $data)
{{$data->pcount}}@endforeach
</h5>

</div>
</div>
</div>
</div>
</div>


<a href="{{url('accountselect')}}">managepost<a><br>

      
<a href="{{url('login1')}}" >logout</a>

      

</form>
</div>
</body>
</html>