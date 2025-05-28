<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> 
<!-- Include config from the correct path which includes RPATH to be used for every other include. -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['cafemenu_heading']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<script src="/assets/resize-iframe.js" defer></script>

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<h2><?= $lang['cafemenu_heading'] ?></h2>
<p><?= $lang['cafemenu_text'] ?></p>
<div class="responsive-iframe-container">
    <iframe src="index.html" class="auto-resize"></iframe>
</div>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>