document.querySelectorAll('.media-box').forEach(box => {
  const img = box.querySelector('.media-image');
  const content = box.querySelector('.media-content');

  // Wait until the image is loaded
  img.onload = () => {
    const aspectRatio = img.naturalWidth / img.naturalHeight;
    if (aspectRatio < 1) {
      // Vertical image: text left of image
      content.style.flexDirection = 'row';
    } else {
      // Horizontal image: text above image
      content.style.flexDirection = 'column';
    }
  };
});

// Function that takes a text, an image caption, an image and a selector for the parent element
// and generates a media-box out of the text and image and append it into the parent element 
// below any other media-boxes inside the element.
// Default parent element is one with the id="media-container".
// Call method with empty text string to just insert an image with caption.
let mediaBoxCounter = 0; // Counter to assign unique IDs

function createMediaBox(text, caption, imageUrl, parentSelector = '#media-container') {
  const box = document.createElement('div');
  box.className = 'media-box';
  // Assign id to each box to make them saveable for "scroll position"
  box.id = `media-box-${mediaBoxCounter++}`;

  const content = document.createElement('div');
  content.className = 'media-content';

  const imageWrapper = document.createElement('div');
  imageWrapper.className = 'media-image-wrapper';

  // Create image
  const img = document.createElement('img');
  img.className = 'media-image';
  img.src = imageUrl;
  img.alt = caption || '';

  const captionDiv = document.createElement('div');
  captionDiv.className = 'media-caption';
  captionDiv.textContent = caption;

  // Add image and its caption to the image wrapper
  imageWrapper.appendChild(img);
  imageWrapper.appendChild(captionDiv);

  // Check the aspect ratio of the image and set the flex direction accordingly
  img.onload = () => {
    const aspectRatio = img.naturalWidth / img.naturalHeight;
    content.style.flexDirection = aspectRatio < 1 ? 'row' : 'column';
  };

  // Add text if it's provided and not just whitespace
  if (text && text.trim() !== '') {
    const textDiv = document.createElement('div');
    textDiv.className = 'media-text';
    textDiv.innerHTML = text;
    content.appendChild(textDiv);
  }


  // Add remaining elements to box
  content.appendChild(imageWrapper);
  box.appendChild(content);

  document.querySelector(parentSelector).appendChild(box);
}