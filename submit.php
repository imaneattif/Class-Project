<?php
require_once 'includes/db_connect.php';

$errors = []; // Initialize an array to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING);
    $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_STRING);
    $timezone = filter_input(INPUT_POST, 'timezone', FILTER_SANITIZE_STRING);

    date_default_timezone_set($timezone);
    $postDateTime = date('Y-m-d H:i:s');

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = "uploads/";
        $imageName = uniqid() . "-" . basename($_FILES["image"]["name"]);
        $uploadFile = $uploadDir . $imageName;

        // Check if the file is an actual image
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $errors[] = "File is not an image.";
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            $errors[] = "There was an error uploading the file.";
        }
    } else {
        $errors[] = "No image file detected or there was an upload error.";
    }

    if (count($errors) === 0) {
        try {
            $stmt = $pdo->prepare("INSERT INTO recipes (title, ingredients, steps, image_path) VALUES (:title, :ingredients, :instructions, :image_path)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':ingredients', $ingredients);
            $stmt->bindParam(':instructions', $instructions);
            $stmt->bindParam(':image_path', $uploadFile);
        
            $stmt->execute();

            // Redirect to a confirmation page or display a success message
            header("Location: recipe_submitted.php");
            exit;
        } catch (Exception $e) {
            $errors[] = "Error submitting recipe: " . $e->getMessage();
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Recipe - Recipe Sharing Platform</title>
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
        <h2>Submit Your Recipe</h2>

        <form action="process_submission.php" method="post" enctype="multipart/form-data">
            <label for="title">Recipe Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="image">Recipe Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" rows="4" required></textarea>

            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" rows="4" required></textarea>
            <label for="timezone">Timezone:</label>
             <select id="timezone" name="timezone">
            <option value="America/New_York">America/New York</option>
            <option value="Europe/London">Europe/London</option>
            
              </select>

            <input type="submit" value="Submit Recipe">
        </form>
    </main>

    <footer>
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>

</html>