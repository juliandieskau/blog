<?php include('includes/config.php'); ?>
<?php include('assets/preview-card/preview-card.php'); ?>
<?php $page_title = $lang['travel_heading']; include('includes/head.php'); ?>
<!-- Additional head-elements go here -->
  <link rel='stylesheet' href='assets/preview-card/preview-card.css'>
<?php include('includes/header.php'); ?>

<h2><?= $lang['travel_heading'] ?></h2>
<p><?= $lang['travel_text'] ?></p>

<!-- Preview cards for blog posts go here -->
<div class="card-container">
  <?php
  renderPreviewCard(
    "content/travel/japan24/day0arrival/day0arrival.php", $lang['japan_day0arrival_heading'],
    "content/travel/japan24/day0arrival/image1.jpg", $lang['japan_day0arrival_preface'] );
    renderPreviewCard(
    "content/travel/japan24/day1shibuya/day1shibuya.php", $lang['japan_day1shibuya_heading'],
    "content/travel/japan24/day1shibuya/image4.jpg", $lang['japan_day1shibuya_p3'] );
  ?>
</div>

<?php include('includes/footer.php'); ?>