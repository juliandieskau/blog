<!-- HEAD SECTION TO BE INCLUDED ON EVERY PAGE BELOW INCLUDE OF config.php AND ABOVE HEADER SECTION -->

<!DOCTYPE html>
<!-- Set language for html document according to chosen language -->
<html lang="<?= htmlspecialchars($lang_code) ?>">
<head>
    <meta charset="UTF-8">
    <!-- Set page title according to sub-page, if it set it's own title -->
    <title><?= isset($page_title) ? $page_title . ' - ' . $lang['title'] : $lang['title'] ?></title>
    <!-- Include CSS Rules and make browser reload file, if it changed (add last changed time as version to filename) -->
    <link rel="stylesheet" href="/assets/styles.css?v=<?= filemtime(RPATH . '/assets/styles.css') ?>">
    <!-- script src="/assets/script.js" defer></script -->

    <!-- Pages can add own head-tags below -->