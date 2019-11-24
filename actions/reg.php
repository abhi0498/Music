<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(!empty($_POST['uname']) and !empty($_POST['pass1']))
    {
        $uname=$_POST["uname"];
        $pass=$_POST["pass1"];
        require("../SQL/connection.php");
        $sql="insert into users values('".$uname."','".$pass."');";
  
        $stmt = $conn->prepare("INSERT INTO users VALUES (?, ?)");
$stmt->bind_param("ss", $uname, $pass);
        
            if($stmt->execute() === TRUE)
            {
                session_start();
                $_SESSION["username"]=$uname;
                header("Location:/Music/index.php");
                
            }
            else{
                session_start();
                $_SESSION["reg_err"]=true;
                header("Location:/Music/login.php#reg");
            }
            
        
    }
echo $uname;
}
?>