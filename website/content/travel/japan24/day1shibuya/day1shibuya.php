<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; ?> <!-- This HAS TO be the first line in the document -->
<!-- Include config from the correct path which includes RPATH to be used for every other include -->

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['japan_day1shibuya_heading']; include(RPATH . '/includes/head.php'); ?>

<!-- Additional <head>-elements go here -->
<!-- Blogpost layout -->
<script src="/includes/layout/media-box-layout.js"></script>
<link rel="stylesheet" href="/includes/layout/media-box.css?v=<?= filemtime(RPATH . '/includes/layout/media-box.css') ?>">

<?php include(RPATH . '/includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<!-- Assign ids to most elements, so they can be linked to -->
<h2 id="content_heading"><?= $lang['japan_day1shibuya_heading'] ?></h2>

<!-- Parent element where all media-boxes will be inserted into -->
<div id="media-container"></div>

<!-- Script to call createMediaBox("<Text>", "<Caption>", "<imgPath>") or createMediaBox("", "<Caption>", "<imgPath>")
      for every media-box that should be inserted (path relative to this file): -->
<script>
  createMediaBox("", <?= json_encode($lang['japan_day1shibuya_c1']) ?>, 
    "image1.jpg");
  createMediaBox("", <?= json_encode($lang['japan_day1shibuya_c2']) ?>, 
    "image2.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p3']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c3']) ?>, 
    "image3.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p4']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c4']) ?>, 
    "image4.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p5']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c5']) ?>, 
    "image5.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p6']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c6']) ?>, 
    "image6.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p7']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c7']) ?>, 
    "image7.jpg");
  createMediaBox(<?= json_encode($lang['japan_day1shibuya_p8']) ?>, 
    <?= json_encode($lang['japan_day1shibuya_c8']) ?>, 
    "image8.jpg");
  createMediaBox("", <?= json_encode($lang['japan_day1shibuya_c9']) ?>, 
    "image9.jpg");
  createMediaBox("", <?= json_encode($lang['japan_day1shibuya_c10']) ?>, 
    "image10.jpg");
</script>

<!-- Show comment section -->
<?php include(RPATH . '/includes/comments/comments.php'); ?>

<!-- Closing tags get included below -->
<?php include(RPATH . '/includes/footer.php'); ?>