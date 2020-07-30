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

@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
<div class="col-md-6">
<div class="container bg-info " >
<h1 class="text-center text-warning">create a post </h1>
<form action="{{'postinsert'}}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}



                <div class="form-group">
  
  <input type="hidden" class="form-control" name="user_id" >
  </div>
  <div class="form-group">
  
 Title:<input type="text" class="form-control" name="title">
 </div>
 <div class="form-group">
 Description:<textarea class="form-control" name="description" rows="3"></textarea>
 
 </div>
 status:
 <div class="radio">
<input type="radio" name="result" value="1">published
</div>
<div class="radio">
  <input type="radio" name="result" value="0">unpulished
</div>

<div class="input-group control-group increment" >
          <input type="file" name="filename" class="form-control">
         
        </div>



 

<button type="submit"class="btn btn-success " >post</button>

</form>
</div>
</div>
</body>
</html>