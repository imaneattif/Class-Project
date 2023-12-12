<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'session_manager.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user details and role from the database
$stmt = $pdo->prepare("SELECT username, bio, profile_picture, role FROM users WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch();

// Check for admin role
$isAdmin = $user['role'] === 'admin';

// Function to display admin controls if the user is an admin
function displayAdminControls() {
    echo "<div class='admin-controls'>
            <h3>Admin Controls</h3>
            <p>Manage Users, Recipes, and Site Settings.</p>
            <a href='admin_dashboard.php'>Go to Admin Dashboard</a>
          </div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Recipe Sharing Platform</title>
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
        <?php
           
            $user = array(
                "username" => "Imane Attif",
                "bio" => "Love cooking and sharing my recipes!",
                "profile_picture" => "path/to/profile-pic.jpg",
                "recipes" => array(
                    array("id" => 1, "title" => "Spaghetti Bolognese", "image_url" => "path/to/spaghetti.jpg"),
                    array("id" => 2, "title" => "Chicken Curry", "image_url" => "path/to/curry.jpg")
                )
            );
        ?>

        <h2><?php echo $user['username']; ?>'s Profile</h2>
        <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
        <p><?php echo $user['bio']; ?></p>

        <h3>My Recipes:</h3>
        <ul>
            <?php
                foreach ($user['recipes'] as $recipe) {
                    echo "<li><a href='recipe_detail.php?id={$recipe['id']}'>{$recipe['title']}</a></li>";
                }
            ?>
        </ul>
    </main>

    <footer>
        
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>

</html>
