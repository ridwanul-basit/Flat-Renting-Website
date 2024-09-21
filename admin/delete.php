<?php
include 'config/cd.php';


    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query= "DELETE  FROM cart WHERE cart_id= $id";
        $result4=mysqli_query($con,$query);
        if($result4){ 

            header('location: index.php');
        }else{
            echo("not deleted");
            // die(mysqli_error());
        }
}elseif(isset($_GET['id2'])){
    $id=$_GET['id2'];
    $query= "DELETE  FROM flat WHERE flat_id= $id";
    $result4=mysqli_query($con,$query);
    echo $result4;
    if($result4){ 

        header('location: index.php');
    }else{
        echo("not deleted");
        // die(mysqli_error());
    }
}elseif(isset($_GET['id3'])){
    $id=$_GET['id3'];
    $query= "DELETE  FROM user WHERE user_id= $id";
    $result4=mysqli_query($con,$query);
    if($result4){ 

        header('location: index.php');
    }else{
        echo("not deleted");
        // die(mysqli_error());
    }
}elseif(isset($_GET['id4'])){
    $id=$_GET['id4'];
    $query= "DELETE  FROM appointment WHERE appointment_id = $id";
    $result4=mysqli_query($con,$query);
    echo $result4;
    if($result4){ 

        header('location: index.php');
    }else{
        echo("not deleted");
        // die(mysqli_error());
    }
}elseif(isset($_GET['id5'])){
    $id=$_GET['id5'];
    $query= "DELETE  FROM agent WHERE agent_id= $id";
    $result5=mysqli_query($con,$query);
    echo $result5;
    if($result5){ 

        header('location: index.php');
    }else{
        echo("not deleted");
        // die(mysqli_error());
    }
}

?>