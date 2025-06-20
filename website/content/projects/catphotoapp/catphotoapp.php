<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> 
<!-- Include config from the correct path which includes RPATH to be used for every other include. -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['catphotoapp_heading']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<script src="/assets/resize-iframe.js" defer></script>

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<h2 id="content_heading"><?= $lang['catphotoapp_heading'] ?></h2>
<p id="content_description"><?= $lang['catphotoapp_text'] ?></p>

<!-- Iframe for the "cat photo app" -->
<div id="project_iframe" class="responsive-iframe-container">
  <iframe src="index.html" class="auto-resize"></iframe>
</div>

<p><?= $lang['catphotoapp_files'] ?></p>

<!-- Show source code of the project -->
<?php
// Define the relative/absolute path where the files are located
$base_path = __DIR__; 
// Define an associative array with keys as filenames to show and their values as the language used for syntax highlighting
$source_files = [
  'index.html' => 'markup'
];
// Display the code viewer
include RPATH . '/assets/code-viewer/code-viewer.php';
?>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>