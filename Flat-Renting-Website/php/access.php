<?php
session_start();
include "database.php";

if (isset($_POST["login"])) {

    $username = mysqli_real_escape_string($con, $_POST["name"]);
    $password = $_POST["password"];
    $_SESSION["username"] = $username;

    $data = "SELECT * FROM `user` WHERE `user_name`='$username'";
    $query = mysqli_query($con, $data);

    if (mysqli_num_rows($query) == 1) {
 
        $pass = mysqli_fetch_assoc($query);
   

        if (password_verify($password, $pass['password'])) {
            header("Location: index.php");
        } else {
     

            $_SESSION["message"] = "Wrong password";
            header("Location: login.php");
        }
    } else {
        $_SESSION["message"] = "No user found";
        header("Location: login.php");
    }
    die();
}
?>
