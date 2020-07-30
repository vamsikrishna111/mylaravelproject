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

<form action = "<?php echo $users[0]->id; ?>" method = "post" enctype="multipart/form-data">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table class="table">


<tr>
<td>title</td>


<td>
<div >
  
 <input type="text"  name="title" value = '<?php echo$users[0]->title; ?>' required />

 </div>
 </td>
 
</tr>
<tr>
<td>description</td>
<td>
<div class="form-group">
  
 
 <textarea rows="4"  name="description" required><?php echo$users[0]->description; ?>
</textarea>

 </td>
 
</tr>
 
<tr>
<td>status</td>
<td>
<div class="radio">
  <label><input type="radio" name="result"  <?php if($users[0]->result == 1) { echo 'Checked' ; } ?> value='1'>published</label>
</div>
<div class="radio">
  <label><input type="radio" name="result" <?php if($users[0]->result == 0) { echo 'Checked' ; } ?> value='0'>unpublished</label>
</div>
</td>

</tr>
<tr>
<td>image</td>
<td>
<div  >


<input type="file" name="filename" class="form-control" value="<?php echo $users[0]->image;?>" />
        </div><br>
        
        <div>
           
                 <img src="{{asset ('/images/'.$users[0]->image) }}" style="height:70px; width:70px"/>
         </div>
       
<br>
    <div >
        <input type="submit" name="submit"  value="Update post" class="btn btn-danger">
    </div>
    </td>
         </tr>






</table>
</form>
</body>
</html>