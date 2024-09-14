<?php
session_start();
include "database.php" ;

if (!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
    $username= $_SESSION["username"];
    $data = "SELECT * FROM `user` WHERE `user_name`='$username'";
    $query = mysqli_query($con, $data);

    if (mysqli_num_rows($query) == 1) {
 
        $id = mysqli_fetch_assoc($query);

}
}

if(isset($_POST["Create_post"])){
$ownerid= $id['user_id']; 
$area=$_POST["area"];
$size=$_POST["size"];
$bhk=$_POST["bhk"];
$address=$_POST["address"];
$rent=$_POST["rent"];
$image=$_FILES["image"]["name"];
$img_dir ="../image/".$_FILES["image"]["name"];
$status= true;
create();
}


function create(){
    global $con;
    global $ownerid,$area,$size,$bhk,$address,$rent,$image,$img_dir,$status;

   
    $sql = "INSERT INTO `flat` (`owner_id`, `area`, `size`, `BHK`,`address`,`price`,`image`,`status`) VALUES ('$ownerid', '$area','$size', '$bhk','$address','$rent','$image','$status')";

    if (mysqli_query($con,$sql)){
        move_uploaded_file($_FILES["image"]["tmp_name"],$img_dir);
        $_SESSION['message']='Add Posted';
        header("Location: post.php");

        
    } else {

        $_SESSION['message']='Add Not Posted';
        header("Location: post.php");
    }

} 
    

    
    

 


?>