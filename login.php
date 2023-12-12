<?php
session_start();
require 'session_manager.php';
require 'includes/db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    
    // This is where you'll implement your authentication logic.
    
     $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username = ? AND password_hash = ?");
     $stmt->execute([$username, $hashedPassword]);
     if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        loginUser($user['user_id']);
         header("Location: user_dashboard.php");
         exit;
     } else {
         echo "Invalid username or password.";
     }

    // Placeholder for authentication logic
     $isValidUser = ...; // Determine if user is valid
     $userId = ...; // Fetch user ID

    if ($isValidUser) {
        loginUser($userId); // Login the user
        header("Location: user_dashboard.php"); // Redirect to a user dashboard or home page
        exit;
    } else {
        // Show an error message
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Recipe Sharing Platform</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
    
        <h1>Recipe Sharing Platform</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="recipe_detail.php">Recipes</a></li>
                <li><a href="submit.php">Upload Recipe</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="blogs.php">Blogs</a></li>
                <li><a href="login.php">Login</a></li>
                 <li><a href="contact.php">contact</a></li>
                <li><a href="event_scheduler.php">Schedule Event</a></li>
            </ul>
        </nav>
    
    </header>
    <main>
        <h2>Login</h2>

        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </main>

    <footer>
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>
</html>

</html>
