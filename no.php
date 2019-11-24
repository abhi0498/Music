<?php
// session_start();

// if(!file_exists('uploads/'.$_SESSION['user']))
// {
// mkdir('uploads/'.$_SESSION['user']);
// }
// else{
//     echo file_exists('uploads/'.$_SESSION['user']);
// }

require('SQL/connection.php');

$res=$conn->query("select path from songs") or die($conn->error);
while($row=$res->fetch_assoc())
{
    $path=$row['path'];
}
echo $path;
?>

<?php
require("getid3/getid3.php");
  $Path="uploads/me/Imagine Dragons - Bad Liar.mp3";
  $id3 = new getID3;
  $OldThisFileInfo = $id3->analyze($Path);


  file_put_contents("image.jpg", $OldThisFileInfo['comments']['picture'][0]['data']);
  

  ?>
  <img id="FileImage" width="150" src="image.jpg" height="150">
  