<?php include('includes/config.php'); ?>
<?php $page_title = $lang['about_heading']; include('includes/head.php'); ?>
<!-- Additional head-elements go here -->
<!-- Blogpost layout -->
<script src="/includes/layout/media-box-layout.js"></script>
<link rel="stylesheet" href="/includes/layout/media-box.css?v=<?= filemtime(RPATH . '/includes/layout/media-box.css') ?>">

<?php include('includes/header.php'); ?>

<h2><?= $lang['about_heading'] ?></h2>
<!-- Text with profile picture on the right -->
<div id="media-container"></div>
<script>createMediaBox(<?= json_encode($lang['about_text']) ?>, "", "/menus/about/me.jpeg");</script>

<?php include('includes/footer.php'); ?>