<?php
$host = 'localhost';
$db = 'flat_renting_website'; 
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    exit("Database connection error.");
}

$agent_id = 415678901;

$sql = "SELECT user_id, flat_id, flat_number, location, time FROM appointments WHERE agent_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    error_log("Prepare failed: " . $conn->error);
    exit("SQL error.");
}

$stmt->bind_param("i", $agent_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/agent.css">
    <title>Appointment Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .logo {
            height: 6rem;
            background-color: #24a19c;
            padding: 0% 1%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ap {
            height: auto;
            width: 20rem;
            margin: 4rem auto;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .confirm {
            width: 10rem;
            margin-top: 1.2rem;
            align-self: center;
            padding: 0.5rem;
            background-color: #24a19c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        h2 {
            margin-bottom: 1rem;
        }
        .info {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"><h1>Flat Rent</h1></div>
    </header>
    <section class="ap">
        <h2>Your Appointment Details</h2>
        <div class="details">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p class='info'>Appointment With User ID: {$row['user_id']}</p>";
                    echo "<p class='info'>Flat Id: {$row['flat_id']}</p>";
                    echo "<p class='info'>Flat Number: {$row['flat_number']}</p>";
                    echo "<p class='info'>Location: {$row['location']}</p>";
                    echo "<p class='info'>Time: " . date('Y-m-d H:i', strtotime($row['time'])) . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>No more appointments today.</p>";
            }
            ?>
        </div>
        <button class="confirm" onclick="alert('Proceeding with the appointment!')">Proceed with your appointment</button>
    </section>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
