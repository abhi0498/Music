<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(!empty($_POST['uname']) and !empty($_POST['pass']))
    {
        $uname=$_POST["uname"];
        $pass=$_POST["pass"];
        require("../SQL/connection.php");
        $res = $conn->query("select count(*) as cnt from users where username='".$uname."' and password='".$pass."';");
  
    $row = $res->fetch_assoc();
        
            if($row["cnt"]==1)

            {
                session_start();
                $_SESSION["username"]=$uname;
                header("Location:/Music/index.php");
            }
            else{
                session_start();
                $_SESSION["login_err"]=true;
                header("Location:/Music/login.php");
            }
            
        
    }
}
?>