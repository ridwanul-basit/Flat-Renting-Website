<?php
session_start();
include "database.php" ;

if (!isset($_SESSION["username"])){
    header("location:index.php");
}
else{
    $username= $_SESSION["username"];
    $data = "SELECT * FROM `user` WHERE `user_name`='$username'";
    $query = mysqli_query($con, $data);

    if (mysqli_num_rows($query) == 1) {
 
        $id = mysqli_fetch_assoc($query);

}
}

if(isset($_GET['id'])){
    $deleteid= $_GET['id'];
    delete();
}

if(isset($_POST["edit"])){
    $flatid=$_GET['id'];
    $name= $_POST["name"]; 
    $area=$_POST["area"];
    $size=$_POST["size"];
    $bhk=$_POST["bhk"];
    $address=$_POST["address"];
    $rent=$_POST["price"];
    $image=$_FILES["image"]["name"];
    $img_dir ="../image/".$_FILES["image"]["name"];
    $status= true;
    edit();
}

if(isset($_POST["Create_post"])){
$ownerid= $id['user_id']; 
$name= $_POST["name"]; 
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
    global $ownerid,$name,$area,$size,$bhk,$address,$rent,$image,$img_dir,$status;

   
    $sql = "INSERT INTO `flat` (`owner_id`, `name`,`area`, `size`, `BHK`,`address`,`price`,`image`,`status`) VALUES ('$ownerid','$name','$area','$size', '$bhk','$address','$rent','$image','$status')";

    if (mysqli_query($con,$sql)){
        move_uploaded_file($_FILES["image"]["tmp_name"],$img_dir);
        $_SESSION['message']='Add Posted';
        header("Location: post.php");

        
    } else {

        $_SESSION['message']='Add Not Posted';
        header("Location: post.php");
    }

} 

function edit(){
global $con;
global $flatid,$name,$area,$size,$bhk,$address,$rent,$image,$img_dir,$status;





if($image != ""){


 $sql= "UPDATE `flat` SET `name`= '$name',`area` = '$area',`size` = '$size', `BHK`='$bhk', `address`= '$address', `price`='$rent', `image`='$image' WHERE `flat_id` = $flatid";


 if (mysqli_query($con,$sql)){
     move_uploaded_file($_FILES["image"]["tmp_name"],$img_dir);
     $_SESSION['message']="Flat Details Updated";
     header("location:description.php?id=$flatid");
     exit(0);

     
 } else {
    $_SESSION['message']="Flat Details Not Updated";
    header("location:description.php?id=$flatid");
    exit(0);
 }
}
 else{
    $sql= "UPDATE `flat` SET `name`= '$name',`area` = '$area',`size` = '$size', `BHK`='$bhk', `address`= '$address', `price`='$rent'  WHERE `flat_id` = $flatid";

 if (mysqli_query($con,$sql)){
    $_SESSION['message']="Flat Details Updated";
    header("location:description.php?id=$flatid");
    exit(0);
     
 } else {
    $_SESSION['message']="Flat Details Not Updated";
    header("location:description.php?id=$flatid");
    exit(0);
 }
 }

}


function delete(){
    global $con;
    global $deleteid;


            $sql= "DELETE FROM `flat` WHERE `flat_id` = '$deleteid'";

            if ( mysqli_query($con,$sql)){
                $_SESSION['message']="Flat Add Deleted";
                header("location:home.php");
                exit(0);

            } else {
                $_SESSION['message']="Flat Add Couldn't Deleted";
                header("location:home.php");
                exit(0);
}
}

    

    
?>;