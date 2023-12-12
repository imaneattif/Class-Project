<?php
session_start();

// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 0, // Session cookie
    'secure' => true, // Set to true if using HTTPS
    'httponly' => true, 
    'samesite' => 'Lax' // Lax, Strict, None
]);

// Function to check if user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to log out user
function logoutUser() {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: login.php"); // Redirect to login page
    exit;
}

// Function to initialize session and prevent session hijacking
function initializeSession() {
    preventSessionHijacking();
    updateUserLastActivity();
}

// Function to log in user
function loginUser($userId) {
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR']; // Store the IP address of the user
    session_regenerate_id(); // Regenerate session ID
}

// Function to prevent session hijacking
function preventSessionHijacking() {
    if (!isset($_SESSION['user_ip']) || $_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR']) {
        logoutUser();
    }
}

// Function to update user's last activity time
function updateUserLastActivity() {
    $_SESSION['last_activity'] = time(); // Update last activity time stamp
}

// Function to check user's activity for timeout
function checkUserActivity() {
    $timeout = 1800; // 30 minutes
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
        // User has been inactive for too long.
        logoutUser();
    }
}

// Initialize session at the start of each script
initializeSession();
