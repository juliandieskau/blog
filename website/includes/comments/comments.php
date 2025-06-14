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

<!-- Add a divider above the comment section -->
<hr id="comment-divider">

<!-- Get the number of comments on the current post -->
<?php
$escaped_table = $conn->real_escape_string($table_name);

$count_result = $conn->query("SELECT COUNT(*) as total FROM `$escaped_table`");
$comment_count = 0;

if ($count_result && $row = $count_result->fetch_assoc()) {
    $comment_count = (int) $row['total'];
}
?>
<!-- Show the total amount of comments -->
<p id="comment-count">
  <?= $comment_count ?> <?= $lang['comments_amount'] ?><?= $comment_count !== 1 ? $lang['comments_plural'] : '' ?>
</p>

<!-- Show form to submit new comment (insert into table, and give the table_name to select the table to insert into) -->
<form id="comment_form" action="/includes/comments/database.php" method="POST">
  <!-- Transmit the SQL action, the table to use and the current page to redirect back to -->
  <input type="hidden" name="action" value="insert">
  <input type="hidden" name="table" value="<?= htmlspecialchars($table_name) ?>">
  <input type='hidden' name='redirect' value='<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>'>

  <!-- Transmit the username -->
  <input type="hidden" id="username" name="username" required>

  <textarea id="comment" name="comment" maxlength="2000" required 
    placeholder="<?= htmlspecialchars($lang['comments_placeholder']) ?>"
  ></textarea>
  <!-- Count the number of characters entered: -->
  <small id="comment-counter">0 / 2000</small>
  
  <!-- TODO: Disable submit when textarea is empty -->
  <div class="comment-buttons">
    <button type="button" id="cancel-button"><?= $lang['comments_post_cancel'] ?></button>
    <button type="submit"><?= $lang['comments_post_submit'] ?></button>
  </div>
</form>
<script src="/includes/comments/grow-textarea.js"></script>

<!-- Prompt for username on form submit if not saved locally -->
<div id="username-modal">
  <div id="username-prompt">
    <h2><?= $lang['username_heading'] ?></h2>
    <p><?= $lang['username_only_once'] ?></p>
    <input type="text" id="username-input" maxlength="30" placeholder="<?= htmlspecialchars($lang['username_placeholder']) ?>">
    <div id="username-buttons">
      <button id="username-cancel"><?= $lang['username_cancel'] ?></button>
      <button id="username-save"><?= $lang['username_save'] ?></button>
    </div>
  </div>
</div>
<script src="/includes/comments/username.js"></script>

<!-- Show posted comments (save their corresponding ID from the DB)-->
<?php
$table = $conn->real_escape_string($table_name);

// Fetch comment table data from database and sort by likes and date
$sql = "SELECT id, username, comment, created_at, likes 
        FROM `$table` 
        ORDER BY likes DESC, created_at DESC";

$result = $conn->query($sql);

// Show comments if they exist.
if ($result && $result->num_rows > 0) {
  echo "<div id='comments-container'>";
  while ($row = $result->fetch_assoc()) {
    $commentId = (int) $row['id'];
    $username = htmlspecialchars($row['username']);
    $comment = nl2br(htmlspecialchars($row['comment']));
    $likes = (int) $row['likes'];

    // Format the time depending on the region
    $locale = $lang['locale'] ?? 'en_US';
    $timestamp = strtotime($row['created_at']);
    $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $formatter->setPattern('d. MMMM yyyy');
    $createdAt = $formatter->format($timestamp);

    // For each form send:
    // - The table name the comment belongs to
    // - The action the form does
    // - The comment-id that belongs to the comment
    // - The current URI to redirect back to
    echo "
    <div class='comment-box' data-id='{$commentId}' data-table='{$table_name}'>
      <div class='comment-left'>
        <strong class='comment-username'>{$username}</strong>
        <form action='/includes/comments/database.php' method='POST' class='like-form'>
          <input type='hidden' name='table' value='" . htmlspecialchars($table_name) . "'>
          <input type='hidden' name='action' value='like'>
          <input type='hidden' name='comment_id' value='{$commentId}'>
          <input type='hidden' name='redirect' value='" . htmlspecialchars($_SERVER['REQUEST_URI']) . "'>
          <button type='submit' class='like-button'>👍</button>
        </form>
        <div class='like-count'>{$likes}</div>
        <form action='/includes/comments/database.php' method='POST' class='dislike-form'>
          <input type='hidden' name='table' value='" . htmlspecialchars($table_name) . "'>
          <input type='hidden' name='action' value='dislike'>
          <input type='hidden' name='comment_id' value='{$commentId}'>
          <input type='hidden' name='redirect' value='" . htmlspecialchars($_SERVER['REQUEST_URI']) . "'>
          <button type='submit' class='dislike-button'>👎</button>
        </form>
      </div>
      <div class='comment-divider'></div>
      <div class='comment-right'>
        <div class='comment-meta'>
          <span class='comment-date'>{$createdAt}</span>
          <form action='/includes/comments/database.php' method='POST' class='report-form'>
            <input type='hidden' name='table' value='" . htmlspecialchars($table_name) . "'>
            <input type='hidden' name='action' value='report'>
            <input type='hidden' name='comment_id' value='{$commentId}'>
            <input type='hidden' name='redirect' value='" . htmlspecialchars($_SERVER['REQUEST_URI']) . "'>
            <button type='submit' class='report-button'>🚩 {$lang['comments_report']}</button>
          </form>
        </div>
        <div class='comment-text'>{$comment}</div>
      </div>
    </div>";
  }
  echo "</div>";
} 
?>
<script src="/includes/comments/saveButtons.js"></script>