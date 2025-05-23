<?php
session_start();

// Determine selected language from user via GET
if (isset($_GET['lang'])) {
  $lang_code = $_GET['lang'];
  // Save language for a year
  setcookie('lang', $lang_code, time() + (365 * 24 * 60 * 60), "/");

  // Clean up URL from lang-param but preserve other query-params
  $params = $_GET;
  unset($params['lang']);

  // Strip query parameters
  $base_url = strtok($_SERVER["REQUEST_URI"], '?');
  $redirect_url = $base_url;

  // Add parameters to 
  if (!empty($params)) {
      $redirect_url .= '?' . http_build_query($params);
  }

  header("Location: $redirect_url");
  exit;
}

// If language is already in cookie
elseif (isset($_COOKIE['lang'])) {
    $lang_code = $_COOKIE['lang'];
} 
// Fallback: Set language to English
else {
    $lang_code = 'en';
}

// Load translation file (if not found, use English)
$lang_file = __DIR__ . "/lang/$lang_code.php";
if (file_exists($lang_file)) {
  include $lang_file;
} else {
  include __DIR__ . "/lang/en.php";
  $lang_code = 'en';
}
?>
