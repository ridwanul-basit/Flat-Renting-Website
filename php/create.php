
<?php
session_start();
include "database.php";
?>
<?php



if (isset(($_POST["Create_account"]))){
    $username=$_POST["name"];
    $fullname=$_POST["fullname"];
    $phone=$_POST["phone"];
    $mail=$_POST["email"];
    $address=$_POST["address"];
    $nid=$_POST["nid"];
    $password =$_POST["password"];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);



    $insert = "INSERT INTO `user` (`user_name`,`name`,`phone_number`, `mail`,`address`,`nid`, `password`)
         VALUES ('$username','$fullname','$phone','$mail','$address','$nid','$hash_password')";
    
    try{
      $result = mysqli_query($con,$insert);
      $_SESSION["message"]="Account Created Succesfully";
      header("location:registration.php");
      exit(0);
    }

    catch(mysqli_sql_exception) {
        $_SESSION["message"]="could not enter data";
        header("location:registration.php");
        exit(0);
    }
}

?>