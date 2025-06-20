<?php
/**
 * Function for category pages that shows a preview card for a blog post to display
 * 
 * @param string $url         The URL to the full blog post.
 * @param string $title       The title displayed below the preview.
 * @param string $imageUrl    The URL of the image shown in the preview.
 * @param string $previewText A short text excerpt shown over the image with a fade effect.
 */
function renderPreviewCard($url, $title, $imageUrl, $previewText) {
  echo "
<a href='$url' class='preview-card'>
    <img src='$imageUrl' alt='" . htmlspecialchars($title, ENT_QUOTES) . "' class='preview-image'>
    <div class='preview-content'>
      <div class='preview-title'>" . htmlspecialchars($title, ENT_QUOTES) . "</div>
      <div class='preview-text-container'>
        <p class='preview-text'>" . htmlspecialchars($previewText, ENT_QUOTES) . "</p>
        <div class='fade-out'></div>
      </div>
    </div>
  </a>
  ";
}
?>