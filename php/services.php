<?php 
session_start();
include "database.php"; 

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
  <script src="https://unpkg.com/scrollreveal"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/description.css">
  <link rel="stylesheet" href="../css/services.css">
</head>
<body>
<?php include "header.php" ?>

<?php include "message.php" ?>
<div id="banner-sec" >
<main>

</main>
<h1>Our Packages</h1>
<hr>
<section id="menu">
    <div class="row r1">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-bdy">
                
                <div  class="item-dsc">
                    <h3 class="it-name">Weekly Package</h3>
                    <p>Subscription : 500BDt</p>
                    <p>Ratings : 8.9/10</p>
                    <a class="buy-now" href="payment.php?a=500">Buy now</a>
                    
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
                    <a class="buy-now" href="payment.php?a=2000">Buy now</a>
                    
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
                    <a class="buy-now" href="payment.php?a=20000">Buy now</a>
                    
                </div>
            </div>
            </div>
        </div>
        
        </div>
        
    </div>
</section>

</div>

</div>
<div class="scroll">
    <?php include "footer.php" ?>
</div>
</main>


<script src="scroll.js"></script>
</body>
</html>