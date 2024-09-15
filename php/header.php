<?php $page = basename($_SERVER["REQUEST_URI"])?>
<header id="header">

            <nav class = "box_nav">
       
                <a href="home.php" id="box_nav1" <?php if ($page === "home.php") {?> class="activeLink" <?php }  ?> >Home</a>
                <a href = "contact.php" id="box_nav1" <?php if ($page === "contact.php") {?> class="activeLink" <?php }  ?> >Contact</a>
                <a href="services.php" id="box_nav1" <?php if ($page === "services.php") {?> class="activeLink" <?php }  ?> >Services</a>
            </nav>


  <div class = "social_1">
            <a target ="_blank" href= "https://facebook.com"><img src="../image/fb.jpg" id ='social' ></a>
            <a target ="_blank" href= "https://instagram.com"><img src="../image/insta.jpg" id ='social'></a>
            <a target ="_blank" href= "https://whatsapp.com"><img src="../image/whatsapp.jpg" id ='social'></a>
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






