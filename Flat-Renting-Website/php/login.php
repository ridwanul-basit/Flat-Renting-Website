<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <img src="../image/background3.jpg">
    <title>Login Page</title>
</head>

<body class="body">
   <div class ="login">
    <h1>Login Form</h1>
    <?php  include "message.php"; ?>
    <form action="access.php" method="POST" autocomplete="off" >
        <div class = input_box>
    <label for="name" id="label">Username:</label>
        <input type="name" id="name" name="name" placeholder="enter username" class="login_input" required>
        <br>
        </div>
    <div class="input_box">
    <label for="password" id="label">Password:</label>
        <input type="password" id="password" name="password" placeholder="enter password" class="login_input" required>
    <br>
    </div>

    <input class="login_button" type="submit" name="login" value="Login" >
    </form>
    <p><a href ="registration.php">Don't have an account yet?</p></a>
   </div> 

</body>
</html>