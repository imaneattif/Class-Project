<?php 
require 'localization.php'; 

ini_set('display_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __('title'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
   
    <meta name="description" content="<?php echo __('seo_description'); ?>">
    <meta name="keywords" content="<?php echo __('seo_keywords'); ?>">
</head>

<body>
    
    <header>
        <h1><?php echo __('header_title'); ?></h1>
    
        <nav>
            <ul>
                <li><a href="index.php"><?php echo __('home'); ?></a></li>
                <li><a href="recipe_detail.php"><?php echo __('recipes'); ?></a></li>
                <li><a href="submit.php"><?php echo __('upload_recipe'); ?></a></li>
                <li><a href="profile.php"><?php echo __('profile'); ?></a></li>
                <li><a href="blogs.php"><?php echo __('blogs'); ?></a></li>
                <li><a href="login.php"><?php echo __('login'); ?></a></li>
                <li><a href="contact.php"><?php echo __('contact'); ?></a></li>
                <li><a href="recipe_post.php"><?php echo __('post_recipe'); ?></a></li>
                <li><a href="event_scheduler.php"><?php echo __('schedule_event'); ?></a></li>
                <li><a href="register.php"><?php echo __('register'); ?></a></li>
    
            </ul>
            <form action="/search" method="get" class="search-bar">
                <input type="text" name="query" placeholder="<?php echo __('search_placeholder'); ?>">
                <button type="submit"><?php echo __('search'); ?></button>
            </form>
        </nav>
    </header>

    <main class="container">
        <section id="featured-recipe" class="my-4">
            <h2><?php echo __('featured_recipe'); ?></h2>
            <div class="row">
                <!-- Placeholder for a featured recipe -->
                <div class="col-md-6">
                    <img src="path/to/featured-recipe-image.jpg" alt="Featured Recipe" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>Recipe Title</h3>
                    <p>Description of the featured recipe...</p>
                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </section>
        
        <section id="trending-recipes" class="my-4">
            <h2><?php echo __('trending_recipes'); ?></h2>
            <div class="row">
                <!-- Placeholder for trending recipes -->
                <div class="col-md-4 mb-3">
                    <img src="path/to/trending-recipe1.jpg" alt="Trending Recipe 1" class="img-fluid">
                    <h4>Trending Recipe 1</h4>
                    <a href="#" class="btn btn-secondary">View Recipe</a>
                </div>
                <div class="col-md-4 mb-3">
                    <img src="path/to/trending-recipe2.jpg" alt="Trending Recipe 2" class="img-fluid">
                    <h4>Trending Recipe 2</h4>
                    <a href="#" class="btn btn-secondary">View Recipe</a>
                </div>
                <div class="col-md-4 mb-3">
                    <img src="path/to/trending-recipe3.jpg" alt="Trending Recipe 3" class="img-fluid">
                    <h4>Trending Recipe 3</h4>
                    <a href="#" class="btn btn-secondary">View Recipe</a>
                </div>
            </div>
        </section>
    </main>

    <footer>        
        <p>&copy; 2023 <?php echo __('Recipe Sharing Platform'); ?></p>
    </footer>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.16/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

</html>
