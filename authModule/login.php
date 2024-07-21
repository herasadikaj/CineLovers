<?php
require("connection.php");
if (isset($_POST['btn'])) {
    $username = stripcslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $password = stripcslashes($_POST['psw']);
    $password = mysqli_real_escape_string($con, $password);
    $encrypted_password = md5($password);

    $sql = "SELECT * FROM `users` WHERE username ='$username' AND password = '$encrypted_password'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    if($rows == 1){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }else{
        echo "<script>alert('Incorrect username or password!')</script>";

    }
}
?>


<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #B03060;color:white;">
              
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="f1" method="post">
                <div class="container" style=color:#B03060;>
            <center>
                <h1>Login</h1>
            </center>
            <hr>
            <label for="username"><b>Username</b></label>
            <input type="text" style="border-radius:30px;" placeholder="Enter your username" name="username" id="username" required>
            <br>
           
            <label for="psw"> <b>Password:</b> </label>
            <input type="password" style="border-radius:30px;" placeholder="Enter Password" name="psw" id="psw">
            <br>
            <button class="btn" name="btn" style="background-color:#B03060;color:white">Log in</button>
            

           
        </div>
                    <div class="container-signin">
                        <p>You don't have an account <a href="register.php" style="color:gray"  data-toggle="modal" data-target="#modelId" data-dismiss="modal">Register</a>.</p>
                    </div>
              </form>
             <a href="forgot-password.php" style="color:gray" >Forgot password?</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
        
    </div>
</div>

