<?php

include "database.php";

$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$id = mysqli_fetch_assoc($query);




?>
<footer>

<div class="footer">
    <h2>Thank You</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo ut eaque iure est quas ipsum asperiores culpa.</p>
   <div class="footer_container">

    <div class = list>
        <h4>Home</h4>
    <ul>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="profile.php?id=<?= $id['user_id']?>">Profile</a></li>
        <li><a href="carts.php">Wishlist</a></li>
        <li><a href="logout.php">Log out</a></li>
   
    </ul>

    </div>
    <div class = list>
    <h4>Contacts</h4>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="services.php">Service</a></li>
    </ul>  
        </div>
        <div class = list>
        <h4>Services</h4>
    <ul>
    <li><a href="home.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="services.php">Service</a></li>
    </ul>  
        </div>
        <div class = list>
        <h4>Social</h4>
    <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Whatsapp</a></li>
    </ul>  
        </div>
   </div>
</div>
</footer>