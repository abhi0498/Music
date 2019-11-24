
<?php
require('../SQL/connection.php');
$res=$conn->query("Select * from songs");
$songs=array();
while($row=$res->fetch_assoc())

{

    $songs[] = array('song_id'=> $row["song_id"],'path'=> $row["path"]);
}

echo json_encode($songs);
?>