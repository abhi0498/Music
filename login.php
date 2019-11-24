<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>



<body cz-shortcut-listen="true">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Music</a>
    </nav>



    <div class="container">

        <div class="d-flex justify-content-around">
            <div class="login">
                Login
            </div>
            <div class="register">
                Reg
            </div>
        </div>

    </div>

    <div class="container login-cont">
        <form method="POST" action="actions/login.php">
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <?php session_start(); 
         
            if($_SESSION["login_err"]){echo "
  <small id=\"emailHelp\" class=\"form-text\" style=\"color:red;\">Wrong username or password</small>";} ?>
        </form>
    </div>


    <div class="container register-cont">
        <form method="POST" action="actions/reg.php">
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp"
                    placeholder="Enter username">
                <small id="emailHelp" class="form-text text-muted">Username must be unique.</small>
            </div>
            <?php 
            
                if($_SESSION["reg_err"])
                {
                    echo "
  <small id=\"emailHelp\" class=\"form-text\" style=\"color:red;\">Username exists</small>";
            }
                
  ?>

            <div class="form-group">
                <label for="uname">Password</label>
                <input type="password" class="form-control" id="pass1" name="pass1"
                    placeholder="Enter password" >

            </div>

            <div class="form-group">
                <label for="pass">Confirm Password</label>
                <input type="password" name="conpass1" class="form-control" id="conpass1" placeholder="Password" onchange="checkPass()">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            
  <small id="emailHelp" class="form-text matchPass" style="color:red;">Passwords do not match</small>
        </form>
    </div>



    <script>
        var lgn = document.querySelector(".login-cont");
        var reg = document.querySelector(".register-cont");
        var lgBtn = document.querySelector(".login");
        var regBtn = document.querySelector(".register");
        var pass=document.querySelector("#pass1");
            var cpass=document.querySelector("#conpass1");
        lgn.style.display = "block";
        reg.style.display = "none";

        function dispReg() {
            lgn.style.display = "none";
            reg.style.display = "block";
            lgBtn.style.backgroundColor = "red";
        }
        function dispLog() {
            lgn.style.display = "block";
            reg.style.display = "none";
        }

        lgBtn.addEventListener("click", dispLog)
        regBtn.addEventListener("click", dispReg)
        document.querySelector("#conpass1").addEventListener('input', checkPass);
        function checkPass() {
            if(pass.value!==cpass.value)
            {
                document.querySelector(".matchPass").style.visibilty="visible";
            }
            else{
                document.querySelector(".matchPass").style.visibilty="hidden";
            }
            
        }

        if(window.location.hash="#reg")
        {
            dispReg();
        }
    </script>
</body>