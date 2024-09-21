<?php 
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "flat_renting_website"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = 150;
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
        $stmt = $conn->prepare("SELECT subscription_days FROM user WHERE user_id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($currentDays);
        $stmt->fetch();
        $stmt->close();

        $newDays = $currentDays + $subscriptionDays;

        $updateStmt = $conn->prepare("UPDATE user SET subscription_days = ? WHERE user_id = ?");
        if (!$updateStmt) {
            die("Prepare failed: " . $conn->error);
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

$conn->close();
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
                window.location.href = 'index.php';
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
