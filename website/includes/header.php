</head>
<body>
    <div class="wrapper">
        <header>
            <h1><?= $lang['title'] ?></h1>
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
                    <select name="lang" id="lang" onchange="this.form.submit()">
                        <option value="en" <?= $lang_code == 'en' ? 'selected' : '' ?>>English</option>
                        <option value="de" <?= $lang_code == 'de' ? 'selected' : '' ?>>Deutsch</option>
                    </select>

                    <?php
                    // Preserve other query params when changing language
                    foreach ($_GET as $key => $value) {
                        if ($key !== 'lang') {
                            echo "<input type='hidden' name='" . htmlspecialchars($key) . "' value='" . htmlspecialchars($value) . "'>";
                        }
                    }
                    ?>
                </form>
            </div>
        </header>
        <main>