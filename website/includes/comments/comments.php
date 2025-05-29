<?php
// Connect to database
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/comments/connection.php';

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
  error_log("Table exists already or was successfully created.");
} else {
  error_log("Table not found: " . $conn->error);
}
?>



<!-- Show form to submit new comment (insert into table, and give the table_name to select the table to insert into) -->
<form id="comment_form" action="/includes/comments/database.php" method="POST">
  <!-- Transmit the SQL action and the table to use -->
  <input type="hidden" name="action" value="insert">
  <input type="hidden" name="table" value="<?= htmlspecialchars($table_name) ?>">

  <!-- Transmit the username -->
  <input type="hidden" id="username" name="username" required>

  <label for="comment">
    Comment: 
    <textarea id="comment" name="comment" maxlength="2000" required></textarea>
    <!-- Count the number of characters entered: -->
    <small id="comment-counter">0 / 2000</small>
  </label>
  
  <button type="submit">Submit</button>
</form>

<!-- Prompt for username on form submit if not saved locally -->
<div id="username-modal">
  <div id="username-prompt">
    <h2>Enter your username</h2>
    <input type="text" id="username-input" maxlength="30" placeholder="Max. 30 characters">
    <div id="username-buttons">
      <button id="username-cancel">Cancel</button>
      <button id="username-save">Save</button>
    </div>
  </div>
</div>
<script src="/includes/comments/username.js"></script>

<!-- TODO: Show posted comments (save their corresponding ID from the DB)-->
<?php
// Example to show the comments
$result = $conn->query("SELECT * FROM comments_cafemenu");

if ($result && $result->num_rows > 0) {
    echo "<table id='comment_table' border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Comment</th><th>Created At</th><th>Likes</th><th>Reports</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>" . htmlspecialchars($row['username']) . "</td>
            <td>" . htmlspecialchars($row['comment']) . "</td>
            <td>{$row['created_at']}</td>
            <td>{$row['likes']}</td>
            <td>{$row['reports']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    error_log("No comments found.");
}
?>

<!-- Example for like and dislike of a single comment -->
<!-- Like Button -->
<form id="like_form" action="/includes/comments/database.php" method="POST">
  <input type="hidden" name="action" value="like">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Like</button>
</form>

<!-- Dislike Button -->
<form id="dislike_form" action="/includes/comments/database.php" method="POST">
  <input type="hidden" name="action" value="dislike">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Dislike</button>
</form>

<!-- Report Button -->
<form id="report_form" action="/includes/comments/database.php" method="POST">
  <input type="hidden" name="action" value="report">

  <input type="hidden" name="comment_id" value="1">
  <button type="submit">Report</button>
</form>