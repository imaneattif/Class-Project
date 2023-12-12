-- Description: Schema for the recipe app database
USE student121;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS recipe_ratings;
DROP TABLE IF EXISTS recipe_comments;
DROP TABLE IF EXISTS recipes;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;

-- Create the 'roles' table
CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

-- Create the 'users' table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

-- Create the 'recipes' table
CREATE TABLE recipes (
    recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    ingredients TEXT NOT NULL,
    steps TEXT NOT NULL,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Create the 'recipe_comments' table
CREATE TABLE recipe_comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Create the 'recipe_ratings' table
CREATE TABLE recipe_ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

 -- Create the 'recipe_views' table
CREATE TABLE recipe_views (
    view_id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    view_count INT NOT NULL DEFAULT 0,
    last_viewed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id)
);


-- Indexes for the 'users' table
CREATE INDEX idx_username ON users(username);
CREATE INDEX idx_email ON users(email);

-- Indexes for the 'recipes' table
CREATE INDEX idx_recipe_title ON recipes(title);

-- Populate the 'roles' table with basic roles
INSERT INTO roles (role_name) VALUES ('admin'), ('user');

-- Inserting a user
INSERT INTO users (username, password_hash, email, role_id) VALUES ('testuser', 'hashedpassword', 'testuser@example.com', 2);

-- Inserting a recipe
INSERT INTO recipes (user_id, title, ingredients, steps, image_path) VALUES (1, 'Test Recipe', 'List of ingredients', 'Cooking steps', 'path/to/image.jpg');

-- Inserting a comment
INSERT INTO recipe_comments (recipe_id, user_id, comment) VALUES (1, 1, 'This is a test comment.');

-- Inserting a rating
INSERT INTO recipe_ratings (recipe_id, user_id, rating) VALUES (1, 1, 5);
