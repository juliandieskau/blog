<?php include('includes/config.php'); ?>
<?php include('assets/preview-card/preview-card.php'); ?>
<?php $page_title = $lang['food_heading']; include('includes/head.php'); ?>
<!-- Additional head-elements go here -->
  <link rel='stylesheet' href='assets/preview-card/preview-card.css'>
<?php include('includes/header.php'); ?>

<h2><?= $lang['food_heading'] ?></h2>
<p><?= $lang['food_text'] ?></p>

<!-- Preview cards for blog posts go here -->
<div class="card-container">
  <?php
  renderPreviewCard(
    "/content/food/matchaTutorial/matchaTutorial.php", $lang['food_matchaTutorial_heading'],
    "/content/food/matchaTutorial/image5.jpeg", $lang['food_matchaTutorial_preface'] );
  ?>
</div>

<?php include('includes/footer.php'); ?>