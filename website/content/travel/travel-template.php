<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['<page_title>']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- Blogpost layout -->
<script src="/includes/layout/media-box-layout.js"></script>
<link rel="stylesheet" href="includes/layout/media-box.css?v=<?= filemtime(RPATH . '/includes/layout/media-box.css') ?>">

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<!-- Assign ids to most elements, so they can be linked to -->
<h2 class="preview-start" id="content_heading"><?= $lang['<site>_heading'] ?></h2>

<!-- Parent element where all media-boxes will be inserted into -->
<div id="media-container"></div>

<!-- Script to call createMediaBox("<Text>", "<Caption>", "<imgPath>") 
      For every media-box that should be inserted (path relative to this file): -->
<script>
  createMediaBox(<?= json_encode($lang['p1']) ?>, 
    <?= json_encode($lang['c1']) ?>, 
    "image1.jpg");
  // Just insert a image with caption without text:
  createMediaBox("", <?= json_encode($lang['c2']) ?>, 
    "image2.jpg");
</script>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>