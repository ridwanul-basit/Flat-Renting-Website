<?php 
session_unset();
session_start();

$selectedPackage = '';
$amount = 0;
$message = '';


if (isset($_GET['a'])) {
    $amount = $_GET['a'];

    if ($amount == 500) {
        $selectedPackage = 'weekly';
    } elseif ($amount == 2000) {
        $selectedPackage = 'monthly';
    } elseif ($amount == 20000) {
        $selectedPackage = 'yearly';
    }

    if ($selectedPackage) {
        $message = "Payment Successful!<br>You have selected the $selectedPackage package.<br>Amount: $amount BDT<br>Thank you for your purchase!";
    } else {
        $message = "Invalid selection.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flat Rent Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Handlee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header>
        <div class="row">
        <div class="col-lg-6"><h1>Flat Rent</h1></div>
        <div class="col-lg-6"><li><a href="login.php">Log In</a></li></div>
    </div>
</header>

<?php include "message.php" ?>
<div id="banner-sec" >
<main>
    <section >
     <div id="banner-con">
        <div class="banner-con">
            <h1>Let's Find Home Together</h1>
            <p>We are here to help you finding your desire home according to you</p>
     </div>
    </section>
</main>
<section id="menu">
    <div class="row r1">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-bdy">
                
                <div  class="item-dsc">
                    <h3 class="it-name">Weekly Package</h3>
                    <p>Subscription : 500BDt</p>
                    <p>Ratings : 8.9/10</p>
                    <a class="buy-now" href="login.php">Buy now</a>
                    
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-bdy">
                
                <div class="item-dsc">
                    <h3 class="it-name">Monthly Package</h3>
                    <p>Subscription : 2000BDt</p>
                    <p>Ratings : 9/10</p>
                    <a class="buy-now" href="login.php">Buy now</a>
                    
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-bdy">
                
                <div class="item-dsc">
                    <h3 class="it-name">Yearly Package</h3>
                    <p>Subscription : 20000BDt</p>
                    <p>Ratings : 9.5/10</p>
                    <a class="buy-now" href="login.php">Buy now</a>
                    
                </div>
            </div>
            </div>
        </div>
        
        </div>
        
    </div>
</section>
<footer>
    <div class="row">
        <div class="col-lg-6">
            <p>&copy; All rights reserved by Flat Rent Website  </p>
        </div>
        <div class="col-lg-6">
            <div class="social-menu">
                <a href="#"><i class="icon-style fas fa-arrow-up"></i></a>
                <a href="#"><i class="icon-style fab fa-facebook-f"></i></a>
                <a href="#"><i class="icon-style fab fa-instagram"></i></a>
                <a href="#"><i class="icon-style fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
</div>

</div>
</body>
</html>