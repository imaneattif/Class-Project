<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'session_manager.php'; // Corrected with semicolon

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (empty($username) || empty($password)) {
            throw new Exception("Both fields are required!");
        }

        // Prepare a SELECT statement to check if the user exists
        $stmt = $pdo->prepare("SELECT user_id, password_hash FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            // Verify the password against the hash stored in the database
            if (password_verify($password, $user['password_hash'])) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id();

                // Set session variables and redirect to the dashboard
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                throw new Exception("Invalid username or password!");
            }
        } else {
            throw new Exception("Invalid username or password!");
        }
    }
} catch (Exception $e) {
    // Consider redirecting to an error page with a user-friendly message
    header("Location: login_error.php?error=" . urlencode($e->getMessage()));
    exit;
}
?>


