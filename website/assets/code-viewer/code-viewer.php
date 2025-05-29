<?php
// A reusable code viewer with tabs for each file and Prism.js syntax highlighting
// Requires: $base_path (string), $source_files (assoc array: filename => language)

/* Include with this php snippet:
<?php
// Define the relative/absolute path where the files are located
$base_path = __DIR__; 
// Define an associative array with keys as filenames to show and their values as the language used for syntax highlighting
$source_files = [
  'index.html' => 'markup',
  'style.css' => 'css',
  'script.js' => 'javascript'
];
// Include the code viewer
include RPATH . '/assets/code-viewer.php';
?>
*/

// Check if the variables are defined and valid that are needed to display the files
if (!isset($base_path) || !isset($source_files) || !is_array($source_files)) {
  echo "<!-- code-viewer: Required variables not set -->";
  return;
}
?>

<!-- Include Prism.js for syntax highlighting (php, css, js, html) -->
<link href="/assets/code-viewer/prism.css" rel="stylesheet" />
<script src="/assets/code-viewer/prism.js"></script>

<!-- Include styles for the tab switcher -->
<link href="/assets/code-viewer/tab-switcher.css" rel="stylesheet" />

<!-- HTML to display Tabs -->
<div id="code-viewer" class="code-tabs">
    <!-- Add buttons for each tab to switch to it -->
    <nav>
        <?php foreach ($source_files as $filename => $code_lang): ?>
            <button onclick="switchTab('<?= md5($filename) ?>')" id="tab-<?= md5($filename) ?>">
                <?= htmlspecialchars($filename) ?>
            </button>
        <?php endforeach; ?>
    </nav>
    <!-- Display every source file inside their tab -->
    <!-- pre, code: Wrapper for Prism.js to style the code, DO NOT INDENT THAT LINE!-->
    <!-- Display file contents by escaping with htmlspecialchars() to display file contents safely -->
<?php foreach ($source_files as $filename => $code_lang): ?>
    <?php
    $filepath = rtrim($base_path, '/') . '/' . $filename;
    $code = file_exists($filepath)
        ? file_get_contents($filepath)
        : "// File not found: $filename";
    ?>
    <div class="tab-content" id="content-<?= md5($filename) ?>">
<pre><code class="language-<?= htmlspecialchars($code_lang) ?>"><?= htmlentities($code) ?></code></pre>
    </div>
<?php endforeach; ?>
</div>

<!-- Include script for Tab Switching -->
<script src="/assets/code-viewer/tab-switcher.js"></script>