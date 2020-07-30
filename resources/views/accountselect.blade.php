<!DOCTYPE html>
<html lang="en">
<head>
  <title>account select</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
     

<div>
    add <a href="{{url('post')}}"><button class="btn btn-secondary mt-5 mb-5">post</button></a>
    
</div>
<table class="table">
<tr>
<td>Sr no</td>
<td>title</td>
<td>description</td>
<td>result</td>
<td>Photo</td>

<td>edit</td>
<td>delete</td>

</tr>
@foreach ($users as $key=>$image)
<tr>
<td>{{ $key + 1 }}</td>
<td>{{ $image->title }}</td>
<td>{{ $image->description }}</td>
@if($image->result==1)
      <td>publish</td>

@else
    <td>unpublish</td>

@endif

<td>
    <img src="{{asset ('/images/'.$image->image) }}" style="height:70px; width:70px"/>
               
                </td>


       
<td><a href="accountedit/{{ $image->id }}"><i class='fas fa-edit'>edit</i>
<a></td>
<td><a href="accountdelete/{{$image->id}}"><i class="fa fa-trash" aria-hidden="true">delete</i>
<a></td>

</tr>
@endforeach
</table>

<a href="{{url('dashboard')}}"><button class="btn btn-warning">go back to dashboard</button><a>
</body>
</html>