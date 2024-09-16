<?php $page = basename($_SERVER["REQUEST_URI"]);
$username = $_SESSION["username"];
$data = "SELECT * FROM `user` WHERE `user_name`='$username'";
$query = mysqli_query($con, $data);
$ownerid = mysqli_fetch_assoc($query);

?>
<header id="header">

            <nav class = "box_nav">
       
                <a href="home.php" id="box_nav1" <?php if ($page === "home.php") {?> class="activeLink" <?php }  ?> >Home</a>
                <a href = "contact.php" id="box_nav1" <?php if ($page === "contact.php") {?> class="activeLink" <?php }  ?> >Contact</a>
                <a href="services.php" id="box_nav1" <?php if ($page === "services.php") {?> class="activeLink" <?php }  ?> >Services</a>
            </nav>


  <div class = "social_1">
            <a target ="_blank" href= "https://facebook.com"><img src="../image/fb.jpg" id ='social' ></a>
            <a target ="_blank" href= "https://whatsapp.com"><img src="../image/whatsapp.jpg" id ='social'></a>
            <a target ="_blank" href= "profile.php?id=<?= $ownerid["user_id"]?>"><img src="../image/user.webp" id ='social'></a>
  </div>

  </header>
  <script >
var lastscrollTop = 0;
header =document.getElementById("header");
window.addEventListener("scroll", ()=>{
 var scrollTop = window.pageYOffset ||document.documentElement.scrollTop;
 if(scrollTop > lastscrollTop){
    header.style.top = "-80px";
 }
 else{
    header.style.top = "0px";
 }
 lastscrollTop =scrollTop;
 
})

  </script>






