<?php 
session_start();
include "database.php";
if (!isset($_SESSION["username"])){
    $_SESSION['error']="You must login first";
    header("location:login.php");
}else{
    $username = $_SESSION["username"];
    $data = "SELECT * FROM `user` WHERE `user_name`='$username'";
    $query = mysqli_query($con, $data);
    $id = mysqli_fetch_assoc($query);
} 



$userId = $id['user_id'];
$selectedPackage = '';
$subscriptionDays = 0;
$amount = 0;
$message = '';

if (isset($_GET['a'])) {
    $amount = intval($_GET['a']);

    switch ($amount) {
        case 500:
            $selectedPackage = 'weekly';
            $subscriptionDays = 7;
            break;
        case 2000:
            $selectedPackage = 'monthly';
            $subscriptionDays = 30;
            break;
        case 20000:
            $selectedPackage = 'yearly';
            $subscriptionDays = 365;
            break;
        default:
            $message = "Invalid selection.";
            break;
    }

    if ($selectedPackage) {
        $message = "You have selected the $selectedPackage package.<br>Amount: $amount BDT.";
    }
}

if (isset($_GET['b']) && $_GET['b'] == 1) {
    if ($selectedPackage) {
        $stmt = $con->prepare("SELECT subscription_days FROM user WHERE user_id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($currentDays);
        $stmt->fetch();
        $stmt->close();

        $newDays = $currentDays + $subscriptionDays;

        $updateStmt = $con->prepare("UPDATE user SET subscription_days = ? WHERE user_id = ?");
        if (!$updateStmt) {
            die("Prepare failed: " . $con->error);
        }
        $updateStmt->bind_param("ii", $newDays, $userId);
        if ($updateStmt->execute()) {
            $message .= "<br>Payment Successful.";
        } else {
            $message = "Failed to update subscription.";
        }
        $updateStmt->close();
    } else {
        $message = "No package selected. Please select a package before proceeding.";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function showPaymentPopup() {
            alert("Payment Successful");
            setTimeout(function() {
                window.location.href = 'services.php';
            }, 1000);
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1>Payment Confirmation</h1>
        <div class="alert alert-info">
            <?php echo $message; ?>
        </div>
        <a href="?a=<?php echo $amount; ?>&b=1" class="btn btn-primary">Proceed to payment</a>
        <a href="index.php" class="btn btn-secondary">Cancel payment</a>
    </div>

    <?php if (strpos($message, "Payment Successful") !== false): ?>
        <script>
            showPaymentPopup();
        </script>
    <?php endif; ?>
</body>
</html>
