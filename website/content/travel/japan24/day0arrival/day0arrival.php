<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['japan_day0arrival_heading']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- Blogpost layout -->
<script src="/includes/layout/media-box-layout.js"></script>
<link rel="stylesheet" href="/includes/layout/media-box.css?v=<?= filemtime(RPATH . '/includes/layout/media-box.css') ?>">

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<!-- Assign ids to most elements, so they can be linked to -->
<h2 id="content_heading"><?= $lang['japan_day0arrival_heading'] ?></h2>
<div class="media-box media-text"><p><?= $lang['japan_day0arrival_preface'] ?></p></div>

<!-- Parent element where all media-boxes will be inserted into -->
<div id="media-container"></div>

<!-- Script to call createMediaBox("<Text>", "<Caption>", "<imgPath>") or createMediaBox("", "<Caption>", "<imgPath>")
      for every media-box that should be inserted (path relative to this file): -->
<script>
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p1']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c1']) ?>, 
    "image1.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p2']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c2']) ?>, 
    "image2.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p3']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c3']) ?>, 
    "image3.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p4']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c4']) ?>, 
    "image4.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p5']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c5']) ?>, 
    "image5.jpg");
  createMediaBox("", <?= json_encode($lang['japan_day0arrival_c6']) ?>, 
    "image6.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p7']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c7']) ?>, 
    "image7.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p8']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c8']) ?>, 
    "image8.jpg");
  createMediaBox(<?= json_encode($lang['japan_day0arrival_p9']) ?>, 
    <?= json_encode($lang['japan_day0arrival_c9']) ?>, 
    "image9.jpg");
</script>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>