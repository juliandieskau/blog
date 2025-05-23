<!-- HEADER SECTION TO BE INCLUDED ON EVERY PAGE BELOW HEAD SECTION AND ABOVE PAGE CONTENT -->

<!-- Head is specified in head.php, in between each sub page can add additional head elements -->
</head>
<body>
    <div class="wrapper">
        <header>
            <!-- Title at the top of page, links to Home-Page -->
            <h1><a href="index.php"><?= $lang['title'] ?></a></h1>
            <div class="navbar">
                <!-- Navigation Bar -->
                <nav>
                    <a href="index.php"><?= $lang['nav_home'] ?></a>
                    <a href="about.php"><?= $lang['nav_about'] ?></a>
                    <a href="contact.php"><?= $lang['nav_contact'] ?></a>
                </nav>
                <!-- Dropdown to select language -->
                <form method="get" id="langForm">
                    <label for="lang"><?= $lang['language'] ?>:</label>
                    <!-- Form submits the selected language through GET as URL parameters -->
                    <select name="lang" id="lang" onchange="this.form.submit()">
                        <option value="en" <?= $lang_code == 'en' ? 'selected' : '' ?>>English</option>
                        <option value="de" <?= $lang_code == 'de' ? 'selected' : '' ?>>Deutsch</option>
                    </select>

                    <?php
                    // Preserve other query params when changing language 
                    // by going through all query parameters in URL
                    foreach ($_GET as $key => $value) {
                        // Don't duplicate the lang that gets submitted already
                        if ($key !== 'lang') {
                            // Reconstruct query params to hidden inputs.
                            // When form gets submitted these inputs get submitted too, so they are preserved
                            echo "<input type='hidden' name='" . htmlspecialchars($key) . "' value='" . htmlspecialchars($value) . "'>";
                        }
                    }
                    ?>
                </form>
            </div>
        </header>
        <main>
        <!-- Start content below in different files -->
        <!-- Closing tags are in footer.php -->