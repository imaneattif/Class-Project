<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Detail - Recipe Sharing Platform</title>
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
            
            $recipe = array(
                "title" => "Spaghetti Bolognese",
                "author" => "Imane Attif",
                "ingredients" => array("Spaghetti", "Tomato Sauce", "Minced Meat", "Onions", "Garlic", "Olive Oil"),
                "instructions" => "Cook the spaghetti. Prepare the sauce. Combine and serve warm.",
                "image_url" => "path/to/image.jpg"
            );
        ?>

        <h2><?php echo $recipe['title']; ?></h2>
        <p>Recipe by <a href="#"><?php echo $recipe['author']; ?></a></p>

        <img src="<?php echo $recipe['image_url']; ?>" alt="<?php echo $recipe['title']; ?>">

        <h3>Ingredients:</h3>
        <ul>
            <?php
                foreach ($recipe['ingredients'] as $ingredient) {
                    echo "<li>$ingredient</li>";
                }
            ?>
        </ul>

        <h3>Instructions:</h3>
        <p><?php echo $recipe['instructions']; ?></p>
    </main>


    <footer>
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>

</html>
