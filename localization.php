<?php
session_start();

// Set the default language
$defaultLang = 'en';
$language = $defaultLang;

// Check if a new language has been selected
if (isset($_GET['lang'])) {
    $language = $_GET['lang'];
    $_SESSION['lang'] = $language;
} elseif (isset($_SESSION['lang'])) {
    $language = $_SESSION['lang'];
}

// Load the language file
$langFile = __DIR__ . "/locales/{$language}.php";
if (file_exists($langFile)) {
    $translations = require $langFile;
} else {
    $translations = require __DIR__ . "/locales/{$defaultLang}.php";
}

// Function to get the translated string
function __($key) {
    global $translations;
    return $translations[$key] ?? "Translation not found";
}
if (file_exists($langFile)) {
    $translations = require $langFile;
    echo "Loaded language file: $langFile<br>"; // Debugging line
} else {
    $translations = require __DIR__ . "/locales/{$defaultLang}.php";
    echo "Default language file loaded<br>"; // Debugging line
}
