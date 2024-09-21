<?php
session_start();
include "database.php";
?>
<?php

$id= $_GET['id'];
$data = "SELECT * FROM flat WHERE flat_id ='$id'";
$query = mysqli_query($con, $data);
$Id = mysqli_fetch_assoc($query);
$ownerid = $Id['owner_id'];
$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query1 = mysqli_query($con, $data);
$user = mysqli_fetch_assoc($query1);
$userid = $user['user_id'];

if (isset(($_POST["save"]))){
   
    $date=$_POST["date"];
    $time=$_POST["time"];
    

    $insert = "INSERT INTO `appointment` (`user_id`,`owner_id`,`flat_id`,`date`,`time`)
         VALUES ('$userid','$ownerid','$id','$date','$time')";
    
    try{
      $result = mysqli_query($con,$insert);
      $_SESSION["message"]="Appointment Created Succesfully";
      header("location:description.php?id=$id");
      exit(0);
    }

    catch(mysqli_sql_exception) {
        $_SESSION["error"]="Appointment Couldn't Created";
        header("location:description.php?id=$id");
        exit(0);
    }
}

?>