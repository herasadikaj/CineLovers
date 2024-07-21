<?php
session_start();
if(!$_SESSION['username']){
    header("Location: Login.php");
    exit();
}

?>