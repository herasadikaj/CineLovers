

<?php
$con = mysqli_connect("localhost", "root", "", "cinelovers");

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

return $con;
?>
