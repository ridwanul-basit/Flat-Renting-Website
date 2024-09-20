<?php
// Database connection settings
$host = "localhost";
$dbname = "rent"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
require_once "database.php";
// Initialize a variable to hold the success message
$successMessage = "";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the query and check if the insertion was successful
    if ($stmt->execute()) {
        $successMessage = "Message sent successfully!";
    } else {
        $successMessage = "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <title>Contact Us</title>
    <style>
        body {
            background-image: url('../image/bg3.jpg'); /* Replace with your image path */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .contact-form {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px;
            margin: 70px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        label{
            color: black;
        }

        h2 {
            text-align: center;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            margin-top: 10px;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="contact-form">
        <h2>Contact Us</h2>

        <!-- Contact Form -->
        <form action="contact.php" method="POST" autocomplete="off">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="5" cols="40" required></textarea><br>

            <input type="submit" value="Submit">
        </form>

        <!-- Success Message -->
        <?php if (!empty($successMessage)) { ?>
            <p class="success-message"><?php echo $successMessage; ?></p>
        <?php } ?>
    </div>

    <?php include "footer.php" ?>


    <script src="scroll.js"></script>
</body>
</html>


