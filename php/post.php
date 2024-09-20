<?php
session_start();
require_once "database.php";



if (!isset($_SESSION["username"])){
    header("location:index.php");
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/post.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <script src="https://unpkg.com/scrollreveal"></script>


</head>
<body>
    <?php include "header.php"?>
    <main>  
    <div class="Reg_body">

<div class ="registration">
    <h1>Create a Post</h1>
    <hr>

<?php
include "message.php";
?>

<form action="query.php" method="POST" autocomplete="off" enctype="multipart/form-data">
<div class="form">
<div class = input_box>
<label for="name" id="label">Flat Name:</label>
    <input type="text" id="name" name="name" placeholder="enter flat name" class="login_input" required>
    <br>
    </div>
<div class = input_box>
<label for="area" id="label">Flat Area:</label>
    <input type="text" id="area" name="area" placeholder="enter flat area" class="login_input" required>
    <br>
    </div>
    <div class = input_box>
<label for="size" id="label">Flat Size:</label>
    <input type="text" id="size" name="size" placeholder="enter flat size" class="login_input" required>
    <br>
    </div>
    <div class = input_box>
<label for="bhk" id="label">BHK:</label>
    <input type="text" id="bhk" name="bhk" placeholder="enter flat bhk" class="login_input" required>
    <br>
</div>
<div class = input_box>
<label for="address" id="label">Flat Address:</label>
<input type="text" id="address" name="address" placeholder="enter flat address" class="login_input" required>
<br>
</div>
    <div class = input_box>
<label for="rent" id="label">Flat Rent:</label>
    <input type="text" id="rent" name="rent" placeholder="enter flat rent" class="login_input" required>
    <br>
    </div>
    <div class = input_box>
<label for="type" id="label">Flat type:</label>
    <input type="option" id="rent" name="type" placeholder="select flat type" list="scripts" class="login_input" required>
     <datalist id="scripts">
    <option value="Male_Bachelor">
    <option value="Family" >
    <option value="Female_Bachelor" >
</datalist>
    <br>
    </div>
    <div class = input_box id="images">
<label for="image" id="label_image">Upload 4 Images:</label>
    <input type="file" id="image" name="image[]" multiple accept="image/jpg, image/jpeg, image/webp" class="login_input" required>
    <br>
    </div>

<input class="regis_button" type="submit" name="Create_post" value="Create post" >
<button><a href ="home.php">Return to Home page</a></button>
</div>
</form>

</div> 
</div>  
    </main>
<div class="scroll">
    <?php include "footer.php" ?>
</div>


<script src="scroll.js"></script>
</body>
</html>

<?php include "fileslimit.php" ?>



