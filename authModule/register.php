<?php
require("connection.php");
if (isset($_POST['btn_reg'])) {
    $username = stripcslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $email = stripcslashes($_POST['reg_email']);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripcslashes($_POST['reg_psw']);
    $password = md5($password);

    $number = stripcslashes($_POST['number']);
    $number = mysqli_real_escape_string($con, $number);

    $sql = "INSERT INTO `users` (username, email, password, number) VALUES ('$username','$email','$password','$number')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('You are resgistered successfully')</script>";

    }else{
        echo "<script>alert('Something went wrong')</script>";


    }
}
?>


<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#B03060;color:white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="registrationForm" method="post">
                    <div class="container" style="color:#B03060;">
                        <center>
                            <h1>Register</h1>
                            <p>Please fill in this form to create an account</p>
                        </center>
                        <hr>

                        <label for="username"><b>Username</b></label>
                        <input type="text" style="border-radius:30px;" placeholder="Enter your username" name="username" id="username" required>
                        <br>

                        <label for="username"><b>Email</b></label>
                        <input type="text" style="border-radius:30px;" placeholder="Enter your email" name="reg_email" id="email" required>
                        <br>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" style="border-radius:30px;" placeholder="Enter your password" name="reg_psw" id="psw" required>
                        <br>

                        <label for="number"><b>Number</b></label>
                        <input type="tel" style="border-radius:30px;" placeholder="Enter your number" name="number" id="number" required>
                        <br>
                        <button class="btn" name="btn_reg"  style="background-color:#B03060;color:white">Register</button>

                        <hr>
                    </div>
                    <div class="container-signin">
                        <p>Already have an account? <a href="login.php" style="color:gray"  data-toggle="modal" data-target="#modelId1" data-dismiss="modal">Log in</a>.</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("psw").value;
        var number = document.getElementById("number").value;

        var usernameError = document.getElementById("usernameError");
        var emailError = document.getElementById("emailError");
        var passwordError = document.getElementById("passwordError");
        var numberError = document.getElementById("numberError");

        usernameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        numberError.textContent = "";

        var isValid = true;

        if (username.length < 5) {
            usernameError.textContent = "Username must be at least 5 characters long";
            isValid = false;
        }

        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            emailError.textContent = "Please enter a valid email address";
            isValid = false;
        }

        if (password.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters long";
            isValid = false;
        }

        if (!/^\d{10}$/.test(number)) {
            numberError.textContent = "Please enter a valid 10-digit phone number";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); 
        }
    });
</script>


