<?php
session_start();

// Determine selected language
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (365 * 24 * 60 * 60), "/");
}

// Store supported languages
$lang_code = $_SESSION['lang'] ?? $_COOKIE['lang'] ?? 'en';
$supported = ['en', 'de'];

// If chosen language is not supported, fallback to English
if (!in_array($lang_code, $supported)) {
    $lang_code = 'en';
}

// Load translation file (if not found, use English)
$lang_file = __DIR__ . "/lang/$lang_code.php";
include file_exists($lang_file) ? $lang_file : __DIR__ . "/lang/en.php";
?>
