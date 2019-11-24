<?php

$conn = new mysqli("localhost","root","root","music");
if($conn->connect_error){
    echo $conn->connect_error;
}


?>