<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Recipe Sharing Platform</title>
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
        </nav>
    </header>

    <main>
        <h2>Contact Us</h2>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            
            mail('your-email@example.com', 'New Contact Form Submission', $message, 'From: ' . $email);
            
            echo "Thank you for contacting us, $name!";
        }
        ?>
        
        <form action="contact.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <input type="submit" value="Send Message">
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>

</html>
