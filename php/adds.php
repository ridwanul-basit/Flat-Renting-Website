<?php

require_once "database.php";

$start= 0;
$end= 2;

$query1= "SELECT * FROM flat";
$data = mysqli_query($con,$query1);
$num_of_rows= mysqli_num_rows($data);


$pages = ceil($num_of_rows / $end);

if(isset($_GET["page-nr"])){
    if ($_GET["page-nr"]==1){
        header("home.php");
    }else{
    $page = $_GET["page-nr"] - 1;
    $start = $page * $end;

}
}



$sql="SELECT * FROM flat  LIMIT  $start,$end";
$all= mysqli_query($con,$sql);


?>

