<?php include('includes/config.php'); ?>
<?php include('assets/preview-card/preview-card.php'); ?>
<?php $page_title = $lang['projects_heading']; include('includes/head.php'); ?>
<!-- Additional head-elements go here -->
  <link rel='stylesheet' href='assets/preview-card/preview-card.css'>
<?php include('includes/header.php'); ?>

<h2><?= $lang['projects_heading'] ?></h2>
<p><?= $lang['projects_text'] ?></p>

<!-- Preview cards for blog posts go here -->
<div class="card-container">
  <?php
  renderPreviewCard(
    "/content/projects/cafemenu/cafemenu.php", $lang['cafemenu_heading'],
    "/content/projects/cafemenu/preview.png", $lang['cafemenu_text'] );
  renderPreviewCard(
    "/content/projects/catphotoapp/catphotoapp.php", $lang['catphotoapp_heading'],
    "/content/projects/catphotoapp/preview.png", $lang['catphotoapp_text'] );
  renderPreviewCard(
    "/content/projects/coloredmarkers/coloredmarkers.php", $lang['coloredmarkers_heading'],
    "/content/projects/coloredmarkers/preview.png", $lang['coloredmarkers_text'] );
  renderPreviewCard(
    "/content/projects/registrationform/registrationform.php", $lang['registrationform_heading'],
    "/content/projects/registrationform/preview.png", $lang['registrationform_text'] );
  renderPreviewCard(
    "/content/projects/rothkopainting/rothkopainting.php", $lang['rothkopainting_heading'],
    "/content/projects/rothkopainting/preview.png", $lang['rothkopainting_text'] );
  ?>
</div>

<?php include('includes/footer.php'); ?>