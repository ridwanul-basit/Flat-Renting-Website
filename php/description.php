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
}


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query1 = "SELECT * FROM flat WHERE `flat_id`=$id";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/description.css">
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
   <h1>Flat Details</h1>
     <hr>
     <img  src="../image/<?= $output[0]["image"]?>" id="img" width="230" height="300" alt="">
     <h2><?= $output[0]["name"]?> | <?= $output[0]["area"]?></h2>
     <h2><?= $output[0]["size"]?> | <?= $output[0]["BHK"]?></h2>
     <h2><?= $output[0]["address"]?></h2>
     <h2><?= $output[0]["price"]?>/=</h2>
</div>
<div class="buttons">
<button type="button" class="btn btn-primary" id="appointment" data-toggle="modal">
 Set an appointment
</button>
   <?php 
   if($ownerid['user_id'] === $output[0]['owner_id']) {
    ?>
    <div class="options">
    <button type="button" class='btn btn-info btn-sm' id="edit">Edit</button>
    <button class='btn btn-danger btn-sm' data-delete="<?= $output[0]["flat_id"]?>">Delete</button>
    </div>
    <?php
}
?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set An Appointment</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="appointment.php?id=<?= $output[0]["flat_id"]; ?>" method="POST">
        <input type="time" name="time" id="time">
        <input type="date" name="date" id="date">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" id="save" name="save" value="Save">
      </div>
    </form>
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Flat Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="query.php?id=<?= $output[0]["flat_id"]; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= $output[0]["name"]?>">
  </div>
  <div class="form-group">
    <label for="area">Area</label>
    <input type="text" class="form-control" id="area" name="area" value="<?= $output[0]["area"]?>">
  </div>
  <div class="form-group">
    <label for="size">Size</label>
    <input type="text" class="form-control" id="size" name="size" value="<?= $output[0]["size"]?>">
  </div>
  <div class="form-group">
    <label for="bhk">BHK</label>
    <input type="text" class="form-control" id="bhk" name="bhk"  value="<?= $output[0]["BHK"]?>">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address"  value="<?= $output[0]["address"]?>">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price"  value="<?= $output[0]["price"]?>">
  </div>
<div class="form-group">
<label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image" value="<?= $output[0]["image"]?>" >
  </div>
  



        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" id="save" name="edit" value="Update">
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

<?php include "modal.php" ?>













