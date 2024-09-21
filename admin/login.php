<?php
session_start();
include 'config/cd.php';

if (isset($_POST["login"])) {

    $password = $_POST["password"];

   
    $data = "SELECT * FROM `admin` WHERE `user_name`='Admin'";
    $query = mysqli_query($con, $data);

    if (mysqli_num_rows($query) == 1) {
 
        $pass = mysqli_fetch_assoc($query);
   

        if ($password == $pass['password']) {
            $_SESSION['username'] ="Admin";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login Page</title>
</head>

<body class="body adminlogin">
   <div class ="adminlogin2">
    <h1>ADMIN LOGIN</h1>
    <?php  include "../php/msg.php"; ?>
    <?php  include "../php/message.php"; ?>
    <form action="" method="POST" autocomplete="off" >
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
   </div> 

</body>
</html>

<?php include "../php/passwordhideshow.php" ?>