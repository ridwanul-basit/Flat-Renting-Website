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

if (isset(($_POST["save"]))){
   
    $date=$_POST["date"];
    $time=$_POST["time"];
    

    $insert = "INSERT INTO `appointment` (`owner_id`,`flat_id`,`date`,`time`)
         VALUES ('$ownerid','$id','$date','$time')";
    
    try{
      $result = mysqli_query($con,$insert);
      $_SESSION["message"]="Appointment Created Succesfully";
      header("location:description.php?id=$id");
      exit(0);
    }

    catch(mysqli_sql_exception) {
        $_SESSION["message"]="Appointment Couldn't Created";
        header("location:description.php?id=$id");
        exit(0);
    }
}

?>