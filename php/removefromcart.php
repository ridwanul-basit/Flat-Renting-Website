<?php
session_start();
require_once "database.php";

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
}




$sql= "DELETE FROM `cart` WHERE `flat_id` = '$deleteid'";

if ( mysqli_query($con,$sql)){
    $_SESSION['message']="Flat Removed From Carts";
    header("location:carts.php");
    exit(0);

} else {
    $_SESSION['error']="Flat Couldn't Removed From Carts";
    header("location:carts.php");
    exit(0);
}





?>