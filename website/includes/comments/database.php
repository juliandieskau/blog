<?php
session_start();
// Connect to database
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/comments/connection.php';

// Insert new comment into table on Form submit
// TODO: Handle post-requests for the SQL database
// Use flash_messages to show output instead of echo to prevent header() errors
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // If 'action' exists assign it to the variable, otherwise an empty string
  $action = $_POST['action'] ?? '';

  if ($action === 'insert') {
    // Get inputs and trim whitespace
    $username = trim($_POST['username'] ?? '');
    $comment = trim($_POST['comment'] ?? '');
    $table_name = $_POST['table'] ?? '';

    // Make sure the inputs aren't empty
    if ($username !== '' && $comment !== '') {
      // Prepare SQL with dynamic table name (tied to the current page name)
      // Make sure $table_name is safe (only alphanumeric + underscore) and abort if not (prevent SQL injections)
      if (preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
        // Use a prepared statement for username and comment insertion
        $sql = "INSERT INTO `$table_name` (username, comment) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
          // Bind user inputs as data only parameters into the query string
          // Data only makes sure there is no executable code injected directly into the string
          $stmt->bind_param("ss", $username, $comment);
          $stmt->execute();
          $stmt->close();

          $_SESSION['flash_message'] = "Comment submitted successfully!";
        } else {
          $_SESSION['flash_message'] = "Error: " . htmlspecialchars($conn->error);
        }
      } else {
        $_SESSION['flash_message'] = "Invalid table name detected.";
      }
    } else {
      $_SESSION['flash_message'] = "Please fill out all fields.";
    }
  } elseif ($action === 'like') {
    // UPDATE comment SET likes = likes + 1 WHERE id = ...
  } elseif ($action === 'dislike') {
    // UPDATE comment SET likes = likes - 1 WHERE id = ...
  } elseif ($action === 'report') {
    // DELETE FROM comments WHERE id = ...
  }
  // Redirect back to page using referrer
  $redirect = $_SERVER['HTTP_REFERER'] ?? '/';
  header("Location: $redirect");
  exit;
  // delete query parameters after being used, so it doesn't get resubmitted on reload of page
  // reload page with empty form without having to press confirm
}
?>