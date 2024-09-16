<?php 
session_start();
require_once "database.php";
?>
<?php 
if (!isset($_SESSION["username"])){
    header("location:index.php");
}
else{
$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$ownerid = mysqli_fetch_assoc($query);
$ID=$_GET['id'];
$query1 = "SELECT * FROM user WHERE `user_id`=$ID";
$data = mysqli_query($con, $query1);
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Document</title>
</head>
<body>
    <?php include "header.php"?>
    <main>


    <div class="container">
    <div class="message1">
        <?php include "message.php" ?>
    </div>
   <h1>Profile Details</h1>
     <hr>
     <img  src="../image/user.webp" id="img" width="150" height="150" alt="">
     <h2><?= $output[0]["name"]?> | <?= $output[0]["phone_number"]?></h2>
     <h2><?= $output[0]["mail"]?></h2> 
     <h2><?= $output[0]["address"]?></h2>
     <h2><?= $output[0]["nid"]?></h2>
</div>
<div class="buttons">
<button type="button" class="btn btn-primary" id="appointment" data-toggle="modal">
<?= $output[0]["user_name"]?>
</button>
   <?php 
   if($ownerid['user_id'] === $output[0]['user_id']) {
    ?>
    <div class="options">
    <button type="button" class='btn btn-info btn-sm' id="edit">Edit</button>
    <button class='btn btn-danger btn-sm' data-delete="<?= $output[0]["user_id"]?>">Delete</button>
    </div>
    <?php
}
?>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="profilequery.php?id=<?= $output[0]["user_id"]; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= $output[0]["name"]?>">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?= $output[0]["phone_number"]?>">
  </div>
  <div class="form-group">
    <label for="mail">Mail</label>
    <input type="text" class="form-control" id="mail" name="mail" value="<?= $output[0]["mail"]?>">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address"  value="<?= $output[0]["address"]?>">
  </div>
  <div class="form-group">
    <label for="nid">NID</label>
    <input type="text" class="form-control" id="nid" name="nid"  value="<?= $output[0]["nid"]?>">
  </div>
  <div class="form-group">
    <label for="password">Old Password</label>
    <input type="password" class="form-control" id="password" name="oldpass"  placeholder="Enter Password">
    <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
       
</div>
  <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" class="form-control" id="password1" name="newpass" placeholder="Enter New Password if you want to change the Password">
    <span class="password-toggle-icon2"><i class="fas fa-eye"></i></span>  
</div>




        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" id="save" name="editprofile" value="Update">
      </div>
    </form>
       
      </div>
    </div>
  </div>
</div>

    </main>

<div class="scroll">
    <?php include "footer.php" ?>
</div>


<script src="scroll.js"></script>

</body>
</html>

<?php include "profilemodal.php" ?>

<?php include "passwordhideshow.php" ?>











