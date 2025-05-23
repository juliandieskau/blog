<?php include('includes/config.php'); ?>

<!-- Change <page_title> to the title the page should have below: -->
<?php $page_title = $lang['<page_title>']; include('includes/head.php'); ?>

<!-- Additional <head>-elements go here -->

<?php include('includes/header.php'); ?>

<!-- This is inside the <main>-tag, use lang files to store text and include like below: -->
<h2><?= $lang['<site>_heading'] ?></h2>
<p><?= $lang['<site>_text'] ?></p>

<!-- Closing tags get included below -->
<?php include('includes/footer.php'); ?>