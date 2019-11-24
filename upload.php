<?php
require('SQL/connection.php');
require('header.php');

?>

<!-- <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<input type="text" name="id" id="id">
<input type="text" name="ar" id="ar">
<input type="text" name="al" id="al">
<input type="text" name="lan" id="lan">
<input type="file" name="file" id="mp" >
<button>Submit</button>
</form> -->

<div class="container">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="id">Song ID</label>
      <input type="number" class="form-control" name="id" id="id" placeholder="Song id">
    </div>
    <div class="form-group col-md-6">
      <label for="name">Song Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Song Name">
    </div>
  </div>
  <div class="form-group">
    <label for="al">Album ID</label>
    <input type="text" class="form-control" name="al" id="al" placeholder="Album ID">
  </div>

  <div class="form-group">
    <label for="lan">Language</label>
    <input type="text" class="form-control" name="lan" id="lan" placeholder="Language">
  </div>


  <div class="form-group">
    <label for="mp">Example file input</label>
    <input type="file" class="form-control-file" name="file" id="file">
  </div>


  <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>

<?php

session_start();
$_SESSION['user']='me';
$target='uploads/'.$_SESSION['user'].'/'.basename($_FILES['file']['name']);

try{
    // code that may throw an exception

if(move_uploaded_file($_FILES['file']['tmp_name'],$target))
{
    echo $_FILES['file']['name'];
}
$stmt=$conn->prepare('insert into songs values(?,?,?,?,?)');
$stmt->bind_param("isiss",$id,$ar,$al,$lan,$pth);
$id=$_POST["id"];
$ar=$_POST["name"];
$al=$_POST["al"];
$lan=$_POST["lan"];
$pth=$target;
$res=$stmt->execute();
if($res==TRUE)
{
    echo "Success";
}
} catch(Exception $e){
    echo $e->getMessage();
}
?>

<!-- <audio controls>
<source src="<?php echo $target ?>" type="audio/mpeg">
</audio> -->