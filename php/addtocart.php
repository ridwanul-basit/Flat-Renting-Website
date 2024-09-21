<?php 
session_start();
require_once "database.php";


if (!isset($_SESSION["username"])) {
    header("location:index.php");
    exit();
}

$username = $_SESSION["username"];


$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$id = mysqli_fetch_assoc($query);
$userid = $id['user_id'];


if (isset($_GET["id"])) {
    $flatid = $_GET['id'];

 
    $data1 = "SELECT * FROM `cart` WHERE `flat_id`='$flatid' AND `user_id`='$userid'";
    $query1 = mysqli_query($con, $data1);
    
    if (mysqli_num_rows($query1) > 0) {
     
        $_SESSION["error"] = "Already in the Wishlist";
    } else {
 
        $insert = "INSERT INTO `cart` (`user_id`, `flat_id`, `time`, `date`) VALUES ('$userid', '$flatid', NOW(), NOW())";
        if (mysqli_query($con, $insert)) {
            $_SESSION["message"] = "Added to Wishlist Successfully";
        } else {
            $_SESSION["error"] = "Failed to add to Wishlist. Please try again.";
        }
    }


    header("location:home.php");
    exit();
} else {
    echo "Couldn't get flat ID";
}
?>
