<?php
require_once 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = filter_input(INPUT_POST, 'eventName', FILTER_SANITIZE_STRING);
    $eventDate = filter_input(INPUT_POST, 'eventDate', FILTER_SANITIZE_STRING); // Assuming YYYY-MM-DD format
    $eventTime = filter_input(INPUT_POST, 'eventTime', FILTER_SANITIZE_STRING); // Assuming HH:MM format

    // Combine date and time
    $eventDateTime = $eventDate . ' ' . $eventTime;

    // Database insertion logic here
    // ...

    echo "Event '{$eventName}' scheduled for {$eventDateTime}";
}
?>

<!-- HTML form for scheduling an event -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule an Event</title>
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
        </nav>
    </header>

<body>
    <form method="post">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>

        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required>

        <label for="eventTime">Event Time:</label>
        <input type="time" id="eventTime" name="eventTime" required>

        <input type="submit" value="Schedule Event">
    </form>
</body>
</html>
