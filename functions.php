<?php

function formatRecipe($recipe) {
    $output = '<div class="recipe">';
    $output .= '<h2>' . htmlspecialchars($recipe['title']) . '</h2>';
    $output .= '<p><strong>Ingredients:</strong> ' . htmlspecialchars($recipe['ingredients']) . '</p>';
    $output .= '<p><strong>Instructions:</strong> ' . htmlspecialchars($recipe['instructions']) . '</p>';
    $output .= '</div>';
    return $output;
}

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
