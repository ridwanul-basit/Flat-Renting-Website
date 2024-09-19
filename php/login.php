<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <img src="../image/bg3.jpg">
    <title>Login Page</title>
</head>

<body class="body">
   <div class ="login">
    <h1>Login Form</h1>
    <?php  include "msg.php"; ?>
    <form action="access.php" method="POST" autocomplete="off" >
        <div class = input_box>
    <label for="name" id="label">Username:</label>
        <input type="name" id="name" name="name" placeholder="enter username" class="login_input"autocomplete="new-password" required>
        <br>
        </div>
    <div class="input_box">
    <label for="password" id="labelp" >Password:</label>
    <div class="hide">
        <input type="password" id="password" name="password" placeholder="enter password" class="login_inputp" autocomplete="new-password" required>
        <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
   </div>
    <br>
    </div>

    <input class="login_button" type="submit" name="login" value="Login" >
    </form>
    <p><a href ="registration.php">Don't have an account yet?</p></a>
   </div> 

</body>
</html>

<?php include "passwordhideshow.php" ?>