<?php
session_start();
// Connect to database
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/comments/connection.php';

// Insert new comment into table on Form submit
// Handle post-requests for the SQL database
// Use flash_messages to show output instead of echo to prevent header() errors
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // If 'action' exists assign it to the variable, otherwise an empty string
  $action = $_POST['action'] ?? '';
  $table_name = $_POST['table'] ?? '';

  // Sanitize table name to allow only safe characters
  // Make sure $table_name is safe (only alphanumeric + underscore) and abort if not (prevent SQL injections)
  if (!preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
    error_log("Invalid table name: $table_name");
    exit;
  }

  // Insert new comment into table
  if ($action === 'insert') {
    // Get inputs and trim whitespace
    $username = trim($_POST['username'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    // Make sure the inputs aren't empty
    if ($username !== '' && $comment !== '') {
      // Use a prepared statement for username and comment insertion
      $sql = "INSERT INTO `$table_name` (username, comment) VALUES (?, ?)";
      $stmt = $conn->prepare($sql);
      if ($stmt) {
        // Bind user inputs as data only parameters into the query string
        // Data only makes sure there is no executable code injected directly into the string
        $stmt->bind_param("ss", $username, $comment);
        $stmt->execute();
        $stmt->close();

        error_log("Comment submitted successfully!");
      } else {
        error_log("Error: " . htmlspecialchars($conn->error));
      }
    } else {
      error_log("Error: Missing username or comment.");
    }
  } 
  
  // Update a given comment
  elseif (in_array($action, ['like', 'dislike', 'report'], true)) {
    $commentId = intval($_POST['comment_id'] ?? 0);
    if ($commentId > 0) {
      switch ($action) {
        case 'like':
          // Increase existing comments likes by 1
          $sql = "UPDATE `$table_name` SET likes = likes + 1 WHERE id = ?";
          break;
        case 'dislike':
          // Decrease existing comments likes by 1
          $sql = "UPDATE `$table_name` SET likes = likes - 1 WHERE id = ?";
          break;
        case 'report':
          // Increase existing comments reports by 1 and delete if it reaches 3
          $sql = "UPDATE `$table_name` SET reports = reports + 1 WHERE id = ?";
          break;
      }

      // Run the update query
      // Bind form inputs as data only parameters into the query string to the correct comment
      $stmt = $conn->prepare($sql);
      if ($stmt) {
        $stmt->bind_param("i", $commentId);
        $stmt->execute();
        $stmt->close();

        // Extra logic for when it is a report
        if ($action === 'report') {
          // Check current report count of given comment
          $stmt = $conn->prepare("SELECT reports FROM `$table_name` WHERE id = ?");
          if ($stmt) {
            $stmt->bind_param("i", $commentId);
            $stmt->execute();
            $stmt->bind_result($reportCount);

            // If reports >= 3
            if ($stmt->fetch() && $reportCount >= 3) {
              $stmt->close();

              // Delete the comment that was reported
              $stmt = $conn->prepare("DELETE FROM `$table_name` WHERE id = ?");
              if ($stmt) {
                $stmt->bind_param("i", $commentId);
                $stmt->execute();
                $stmt->close();
              } else {
                error_log("Failed to prepare delete statement: " . htmlspecialchars($conn->error));
              }
            } else {
              // Close after SELECT if not deleted
              $stmt->close(); 
            }
          } else {
            error_log("Failed to fetch report count: " . htmlspecialchars($conn->error));
          }
        }
      } else {
        error_log("Database error during $action: " . htmlspecialchars($conn->error));
      }
    } else {
      error_log("Invalid comment ID.");
    }
  }

  // Redirect back to page using referrer sent by form or default referrer
  // WARNING: Only works if nothing has been printed to the website yet (like with echo or <html>)
  $redirect = $_POST['redirect'] ?? $_SERVER['HTTP_REFERER'] ?? '/';
  header("Location: $redirect");
  exit;
}
?>