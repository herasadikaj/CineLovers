<?php
session_start();
$_SESSION["admin_username"] = "";
$error = "";
if (isset($_POST['btn'])) {
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    if ("admin@gmail.com" == $email) {
        if ("cinelovers2024" == $psw) {
            $_SESSION["admin_username"] = $email;
            header("Location: dashboard.php");
        } else {
            $error = "Invalid Password";
        }

    } else {
        $error = "Invalid Email";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="Css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin:auto;">
                <form name="f1" method="post">
                    <div class="container" style=color:#B03060;>
                        <center>
                            <h1>Admin Login</h1>
                        </center>
                        <hr>
                        <label for="email"><b>Email:</b></label>
                        <input type="text" style="border-radius:30px;" placeholder="Enter your email" name="email"
                            id="email" required>
                        <br>

                        <label for="psw"> <b>Password:</b> </label>
                        <input type="password" style="border-radius:30px;" placeholder="Enter Password" name="psw"
                            id="psw">
                        <br>
                        <button class="btn" name="btn" style="background-color:#B03060;color:white">Log in</button>
                    </div>
                </form>
                <p style="color:#B03060;margin-left:1%;"><?php echo $error; ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>