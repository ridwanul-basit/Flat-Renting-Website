<?php 
session_start();
require_once "database.php";
?>

<?php


if (isset(($_GET["id"]))){
  $flatid= $_GET['id'];




$insert = "INSERT INTO `cart` (`flat_id`,`time`,`date`) VALUES ('$flatid',NOW(),NOW())";

try{
  $result = mysqli_query($con,$insert);
  $_SESSION["message"]="Added to Wishlist Succesfully";
  header("location:home.php");

}

catch(mysqli_sql_exception) {
    $_SESSION["error"]="Already in the Wishlist";
    header("location:home.php");

}
}

else{
    echo "couldn't get id";
}

?>

