<?php
require 'session_manager.php';

logoutUser(); // Logout the user
header("Location: index.php"); // Redirect to the homepage or login page
exit;
