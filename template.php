<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['<page_title>']; include(RPATH . 'includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- For project pages (defer loads after HTML is parsed): -->
<script src="<?= RPATH ?>/assets/resize-iframe.js" defer></script>

<?php include(RPATH . 'includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<!-- Assign ids to most elements, so they can be linked to -->
<h2 id="content_heading"><?= $lang['<site>_heading'] ?></h2>
<p id="content_description"><?= $lang['<site>_text'] ?></p>

<!-- Closing tags get included below -->
<?php include(RPATH . 'includes/footer.php'); ?>