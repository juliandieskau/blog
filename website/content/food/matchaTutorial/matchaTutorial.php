<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['food_matchaTutorial_heading']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- Blogpost layout -->
<script src="/includes/layout/media-box-layout.js"></script>
<link rel="stylesheet" href="/includes/layout/media-box.css?v=<?= filemtime(RPATH . '/includes/layout/media-box.css') ?>">

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<!-- Assign ids to most elements, so they can be linked to -->
<h2 class="preview-start" id="content_heading"><?= $lang['food_matchaTutorial_heading'] ?></h2>
<div class="media-box media-text"><p><?= $lang['food_matchaTutorial_preface'] ?></p></div>

<!-- Parent element where all media-boxes will be inserted into -->
<div id="media-container"></div>

<!-- Script to call createMediaBox("<Text>", "<Caption>", "<imgPath>") or createMediaBox("", "<Caption>", "<imgPath>")
      for every media-box that should be inserted (path relative to this file): -->
<script>
  createMediaBox(<?= json_encode($lang['food_matchaTutorial_p1']) ?>, "", 
    "image1.jpeg");
  createMediaBox(<?= json_encode($lang['food_matchaTutorial_p2']) ?>, "", 
    "image2.jpeg");
  createMediaBox(<?= json_encode($lang['food_matchaTutorial_p3']) ?>, "", 
    "image3.jpeg");
  createMediaBox(<?= json_encode($lang['food_matchaTutorial_p4']) ?>, "", 
    "video4.mp4");
  createMediaBox(<?= json_encode($lang['food_matchaTutorial_p5']) ?>, "", 
    "image5.jpeg");
</script>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>