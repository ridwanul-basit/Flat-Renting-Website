<?php
session_start();
require_once "database.php";
include "adds.php";




if (!isset($_SESSION["username"])){
    header("location:index.php");
$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$ownerid = mysqli_fetch_assoc($query);
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
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <script src="https://unpkg.com/scrollreveal"></script>


</head>

<body id="<?= $nr ?>">

<?php include "header.php"?>

<h1 class="ads">Flat For Rent</h1>

<div class="post">
    <?php 
    if($ownerid['subscription_days'] != 0){  
    ?>
    <a href='post.php' class='btn btn-info btn-sm'>Create a Post</a>
    <?php
    }
    ?>
    <a href='carts.php' class='btn btn-info btn-sm'>Wishlist</a>
 </div>    
<div class="message">
<?php
    include "message.php";
?>
</div> 
 <?php 
if(isset($_GET['page-nr'])){
    $nr= $_GET['page-nr'];
}else{
    $nr =1;
}
?>





<div class="container py-5">
    <div class="row justify-content-center" >
        <div class="col-md-6">
        <form  method="POST" class="d-flex search_form">
            <input type="text" class="form-control me-2" placeholder="Search area, category or price" name="search">
            <button class="btn btn-dark" name="submit">Search</button>
           

        </form>
        </div>
    </div>
</div>

    
              
    <?php
        if (!isset($_POST['submit'])){ 
          
          $getQuery="SELECT * From flat";
          getData($getQuery);
        }
        else if(isset($_POST['submit']) ){
          $search=$_POST['search'];
          if(is_numeric($search)){
          $getQuery= "SELECT * from flat  where price<='$search'";
          } else{
          $getQuery= "SELECT * from flat  where area LIKE '%$search%' OR category LIKE '%$search%'";
          }
          getData($getQuery);
        } ?> 
     
    
<?php
function getData($sql){

    include("database.php");
    global $ownerid;

    global $pages,$page,$nr;

    $result=mysqli_query($con, $sql);
    if(!$result){
        die('error in query:'.mysqli_error($con));
    }
    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result))
        {
        ?>

    <div class="row mt-2 cards">

              <div class="row-mb-3">

        
                  <div class="card mb-2">
        
                      <img src="../image/<?= $row["image"]?>" width="150px" height="150px" alt="">
                      <div class="card-body">
                    <div class="info">
                     <h2 class="title"><?= $row["name"]; ?> |</h2>
                     <h2 class="title"><?= $row["area"]; ?> |</h2>
                     <h2 class="title"><?= $row["BHK"]; ?> |</h2>
                     <h2 class="title"><?= $row["category"]; ?> |</h2>
   </div>
                     <h2 class="Email">Rent: <?= $row["price"]; ?></h2>
                     <a href="description.php?id=<?= $row["flat_id"]; ?>"><button>Description</button></a>
                     <?php  
        if($row['owner_id']!==$ownerid['user_id']){
        
        ?>
                     <a href="addtocart.php?id=<?= $row["flat_id"]; ?>"><button >Add to Wishlist</button></a>
          <?php 
        }
          ?>
                    </div>
                 </div>
              </div>
              </div>
              </div>

              <?php
         }}?>

<div class="page-info">
    <?php
    if(!isset($_GET["page-nr"])){
        $page = 1;
    } else{
        $page = $_GET["page-nr"];
    }
    ?>
   <?php 
   if ($page <= $pages){
    ?>
    <h4 class="pages">showing <?= $page ?> of <?= $pages ?> pages</h4>
    <?php
   } else {
    ?>
  <h3>No Records Found</h3>
  <?php
   }

   ?>

</div>

<div class="pagination">
    <a href="home.php" ><button>First</button></a>
    <?php
     if(isset($_GET["page-nr"]) && $_GET["page-nr"] >1){
     ?>
         <a href="?page-nr=<?= $_GET['page-nr'] -1 ?>" ><button>Previous</button></a>
<?php
}
?>
<div class="page_num">
    <?php
      for($counter = 1; $counter <= $pages; $counter++){
        ?>
        <a href="?page-nr=<?= $counter?>" <?php if ($page ==="home.php?page-nr= $counter") {?> class="activeLink" <?php }  ?>><button><?= $counter; ?></button></a>
        <?php
      }
    ?>

</div>
    <?php
     if(!isset($_GET["page-nr"])){
     ?>
         <a href="?page-nr=2"><button>Next</button></a>
<?php
}
else{ 
    if($_GET['page-nr'] > $pages){
        if ( $page < $pages){
         ?>  
            <a href="?page-nr=<?= $_GET['page-nr'] +1 ?>" ><button>Next</button></a>
            <?php
        }
    
    }
    else{
        ?>
         <a href="?page-nr=<?= $_GET['page-nr'] +1 ?>" ><button>Next</button></a>
        <?php   
        }
    ?>
  
<?php
}
    ?>
    <a href="?page-nr=<?= $pages ?>" ><button>Last</button></a>
</div>

</div>

<?php
}
?>

             
              



<div class="scroll">
    <?php include "footer.php" ?>
</div>
</main>


<script src="scroll.js"></script>
</body>
</html>