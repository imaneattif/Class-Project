<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - Recipe Sharing Platform</title>
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
            
            $blog_posts = array(
                array(
                    "title" => "5 Tips for Better Baking",
                    "snippet" => "Discover essential baking secrets that professionals swear by...",
                    "image_url" => "path/to/baking-tips.jpg",
                    "link" => "blog_post.php?id=1"
                ),
                array(
                    "title" => "Exploring Gluten-Free Flours",
                    "snippet" => "Not all flours are created equal. Understand the unique qualities of gluten-free flours...",
                    "image_url" => "path/to/gluten-free-flour.jpg",
                    "link" => "blog_post.php?id=2"
                )
            );
        ?>

        <h2>Latest Blog Posts</h2>

        <?php
            foreach ($blog_posts as $post) {
                echo "<article>";
                echo "<img src='{$post['image_url']}' alt='{$post['title']}'>";
                echo "<h3><a href='{$post['link']}'>{$post['title']}</a></h3>";
                echo "<p>{$post['snippet']}</p>";
                echo "</article>";
            }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 Recipe Sharing Platform</p>
    </footer>
</body>

</html>
