<?php
// Define database connection according to docker-compose (database already exists from there)
$host = 'db';               // Service name
$username = 'julian';       // From MYSQL_USER
$password = 'julianpassword'; // From MYSQL_PASSWORD
$database = 'blogdb';       // From MYSQL_DATABASE

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error . "<br>");
}
echo "Connected to the database successfully!<br>";
$conn->set_charset("utf8mb4");
$conn->select_db("blogdb");

// SQL Concept:
// One Table for each Blog Post, uniquely tied to the page by the filename
// Holds every comment in a row and saves its data inside
$page_id = basename($_SERVER['SCRIPT_NAME'], '.php'); // e.g., 'about' or 'cafemenu', not 'comments'
$table_name = "comments_" . $page_id;

// Create the table, if it isn't in the database already
// id: Order of posts
// username: Username of who posted, is required
// comment: Content of the comment, is required
// created_at: Timestamp that can be provided, but should normally be left to be set by the DEFAULT
// likes: Amount of likes/dislikes a comment has gotten (additive/subtractive)
// reports: Amount of reports the comment has gotten (should be deleted after 3 reports)
$sql = "CREATE TABLE IF NOT EXISTS `$table_name`(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  comment VARCHAR(2000) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  likes INT DEFAULT 0,
  reports INT UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($conn->query($sql)) {
  echo("To be created table exists<br>");
} else {
  echo("Table not found: " . $conn->error . "<br>");
}


// Insert new comment into table on Form submit
// TODO: Handle post-requests for the SQL database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // If 'action' exists assign it to the variable, otherwise an empty string
  $action = $_POST['action'] ?? '';

  if ($action === 'insert') {
    // Get inputs and trim whitespace
    $username = trim($_POST['username'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

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
          echo "<p>Comment submitted successfully!</p>";
        } else {
          echo "<p>Error: " . htmlspecialchars($conn->error) . "</p>";
        }
      } else {
        echo "<p>Invalid table name detected.</p>";
      }
    } else {
      echo "<p>Please fill out all fields.</p>";
    }
  } elseif ($action === 'like') {
    // UPDATE comment SET likes = likes + 1 WHERE id = ...
  } elseif ($action === 'dislike') {
    // UPDATE comment SET likes = likes - 1 WHERE id = ...
  } elseif ($action === 'report') {
    // DELETE FROM comments WHERE id = ...
  }
}

?>

<!-- Show form to submit new comment -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <input type="hidden" name="action" value="insert">
  
  <label for="username">Username: <input id="username" type="text" name="username" required></label>
  <label for="comment">Comment: <textarea id="comment" name="comment" required></textarea></label>
  
  <button type="submit">Submit</button>
</form>

<!-- TODO: Show posted comments (save their corresponding ID from the DB)-->

<!-- Example for like and dislike of a single comment -->
<!-- Like Button -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <input type="hidden" name="action" value="like">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Like</button>
</form>

<!-- Dislike Button -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <input type="hidden" name="action" value="dislike">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Dislike</button>
</form>

<!-- Report Button -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <input type="hidden" name="action" value="report">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Report</button>
</form>