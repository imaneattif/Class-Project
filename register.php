<?php
require 'includes/db_connect.php'; 

// Initialize variables to store user input
$username = $password = $email = "";

// Error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Validate input and add errors to the $errors array if any
    // ...

    // If no errors, proceed with user registration
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL to insert a new user
        $sql = "INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bind_param("sss", $username, $hashedPassword, $email);

            if ($stmt->execute()) {
                echo "New user registered successfully";
                // Redirect to login page or home page
                header("Location: login.php");
                exit;
            } else {
                $errors[] = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

// Display errors if any
foreach ($errors as $error) {
    echo "<p>Error: $error</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Register">
    </form>
</body>
</html>
