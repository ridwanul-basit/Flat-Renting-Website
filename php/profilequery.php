<?php   

require_once "database.php";
session_start();

$ID = $_GET['id'];
$data = "SELECT * FROM `user` WHERE `user_id`='$ID'";
$query = mysqli_query($con, $data);


$user = mysqli_fetch_assoc($query);

if (isset($_GET['id']) && !isset($_POST["editprofile"])) {
    $deleteid = $_GET['id'];
    deleteprofile();
}

if (isset($_POST["editprofile"])) {
    $userid = $_GET['id'];
    $name = $_POST["name"]; 
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $address = $_POST["address"];
    $nid = $_POST["nid"];
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $hash_password=password_hash($newpass,PASSWORD_DEFAULT);

    if (password_verify($oldpass, $user['password'])) {

        editprofile();
    } else {
        $_SESSION['error'] = "Wrong Password";
        header("Location: profile.php?id=$userid");
    }
}


function editprofile(){
    global $con;
    global $userid,$name,$phone,$mail,$address,$nid,$oldpass,$hash_password,$newpass;
    
    
    
    
    
    if($newpass!= ""){
    
    
     $sql= "UPDATE `user` SET `name`= '$name',`phone_number` = '$phone',`mail` = '$mail', `address`='$address', `nid`= '$nid', `password`='$hash_password' WHERE `user_id` = $userid";
    
    
     if (mysqli_query($con,$sql)){
         $_SESSION['message']="User Details Updated";
         header("location:profile.php?id=$userid");
         exit(0);
    
         
     } else {
        $_SESSION['error']="User Details Not Updated";
        header("location:profile.php?id=$userid");
        exit(0);
     }
    }
     else{
        $sql= "UPDATE `user` SET `name`= '$name',`phone_number` = '$phone',`mail` = '$mail', `address`='$address', `nid`= '$nid' WHERE `user_id` = $userid";
    
        if (mysqli_query($con,$sql)){
            $_SESSION['message']="User Details Updated";
            header("location:profile.php?id=$userid");
            exit(0);
       
            
        } else {
           $_SESSION['error']="User Details Not Updated";
           header("location:profile.php?id=$userid");
           exit(0);
        }
     }
    
    }
    
    
    function deleteprofile(){
        global $con;
        global $deleteid;
    
    
                $sql= "DELETE FROM `user` WHERE `user_id` = '$deleteid'";
    
                if ( mysqli_query($con,$sql)){
                    $_SESSION['user_delete']="User Deleted";
                    header("location:index.php");
                    exit(0);
    
                } else {
                    $_SESSION['error']="User Couldn't Deleted";
                    header("location:index.php");
                    exit(0);
    }
    }
    






?>