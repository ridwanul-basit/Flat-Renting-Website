<?php
require "database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/registration.css">
    <title>Registration Page</title>
</head>


<body class="Reg_body">
    <div class ="registration">
        <h1>Registration Form</h1>
        <hr>

<?php
    include "message.php";
?>
 
    <form action="create.php" method="POST" autocomplete="off" >
        <div class="form">
        <div class = input_box>
    <label for="name" id="label">Username:</label>
        <input type="name"  id="name" name="name" placeholder="enter username" autocomplete="new-password" class="login_input" required>
        <br>
        </div>
        <div class = input_box>
    <label for="fullname" id="label">Full Name:</label>
        <input type="name" id="fullname" name="fullname" placeholder="enter full name" autocomplete="new-password" class="login_input" required>
        <br>
        </div>
        <div class = input_box>
    <label for="phone" id="label">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="enter phone" autocomplete="new-password" class="login_input" required>
        <br>
    </div>
    <div class = input_box>
<label for="email" id="label">Email:</label>
    <input type="email" id="email" name="email" placeholder="enter email" autocomplete="new-password" class="login_input" required>
    <br>
    </div>
        <div class = input_box>
    <label for="address" id="label">Address:</label>
        <input type="text" id="address" name="address" placeholder="enter address" autocomplete="new-password" class="login_input" required>
        <br>
        </div>
        <div class = input_box>
    <label for="nid" id="label">NID:</label>
        <input type="text" id="nid" name="nid" placeholder="enter nid" autocomplete="new-password" class="login_input" required>
        <br>
        </div>
    <div class="input_box">
    <label for="password" id="label">Password:</label>
        <input type="password" id="password" name="password" placeholder="enter password" autocomplete="new-password" class="login_input" required>
    <br>
    </div>
    <button class="regis_button" type="submit" name="Create_account" >Create Account</button>
    <button><a href ="login.php">Return to login page</a></button>
    </div>
    </form>

   </div> 
</body>
</html>