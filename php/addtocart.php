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
  $_SESSION["message"]="Added to cart Succesfully";
  header("location:home.php");

}

catch(mysqli_sql_exception) {
    $_SESSION["message"]="failed to add to cart";
    header("location:home.php");

}
}

else{
    echo "couldn't get id";
}

?>

