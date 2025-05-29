<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['<page_title>']; include(RPATH . 'includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- For project pages (defer loads after HTML is parsed): -->
<script src="<?= RPATH ?>/assets/resize-iframe.js" defer></script>

<?php include(RPATH . 'includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<h2><?= $lang['<site>_heading'] ?></h2>
<p><?= $lang['<site>_text'] ?></p>

<!-- Iframe to show html projects -->
<div class="responsive-iframe-container">
    <iframe src="index.html" class="auto-resize"></iframe>
    <!-- Make sure to include css for html, body inside iframe -->
</div>

<!-- Show source code of the project -->
<?php
// Define the relative/absolute path where the files are located
$base_path = __DIR__; 
// Define an associative array with keys as filenames to show and their values as the language used for syntax highlighting
$source_files = [
    'index.html' => 'markup',
    'styles.css' => 'css'
];
// Display the code viewer
include RPATH . '/assets/code-viewer.php';
?>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . 'includes/footer.php'); ?>