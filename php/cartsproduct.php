<?php
require_once "database.php";

$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$id = mysqli_fetch_assoc($query);
$userid=$id['user_id'];
$start = 0;
$end = 2;


$query1 = "SELECT flat_id FROM cart WHERE user_id ='$userid' ";
$data = mysqli_query($con, $query1);

$num_of_rows = mysqli_num_rows($data);


$pages = ceil($num_of_rows / $end);

if (isset($_GET["page-nr"])) {
    $page = $_GET["page-nr"];
    if ($page == 1) {
        header("Location: carts.php");
        exit();
    } else {
        $start = ($page - 1) * $end;
    }
}


$flat_ids = [];
while ($cart = mysqli_fetch_assoc($data)) {
    $flat_ids[] = $cart['flat_id'];
}


if (!empty($flat_ids)) {
    $flat_ids_str = implode(",", $flat_ids); 
    $sql = "SELECT * FROM flat WHERE `flat_id` IN ($flat_ids_str) LIMIT $start, $end";
    $all = mysqli_query($con, $sql);
} else {
    $_SESSION['error']="No items in the cart.";
 
}



?>;