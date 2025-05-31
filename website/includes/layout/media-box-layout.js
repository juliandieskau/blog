// Function that takes a text, an image caption, an image and a selector for the parent element
// and generates a media-box out of the text and image and append it into the parent element 
// below any other media-boxes inside the element.
// Default parent element is one with the id="media-container".
// Call method with empty text string to just insert an image with caption.
let mediaBoxCounter = 0; // Counter to assign unique IDs

function createMediaBox(text, caption, mediaPath, parentSelector = '#media-container') {
  // Media box to surround media and texts
  // Assign id to each box to make them saveable for "scroll position"
  const box = document.createElement('div');
  box.className = 'media-box';
  box.id = `media-box-${mediaBoxCounter++}`;

  const content = document.createElement('div');
  content.className = 'media-content';

  const mediaWrapper = document.createElement('div');
  mediaWrapper.className = 'media-image-wrapper';

  // Create image or video
  let media;
  if (mediaPath.endsWith('.mp4')) {
    media = document.createElement('video');
    media.src = mediaPath;
    media.className = 'media-video';
    media.controls = true;
    media.autoplay = true;
    media.muted = true;
    media.playsInline = true;
    media.style.maxWidth = '100%';
  } else {
    media = document.createElement('img');
    media.className = 'media-image';
    media.src = mediaPath;
  }
  media.alt = caption || '';

  // Check the aspect ratio of the media and set the flex direction of the box accordingly
  media.onload = () => {
    const aspectRatio = media.naturalWidth / media.naturalHeight;
    content.style.flexDirection = aspectRatio < 1 ? 'row' : 'column';
  };

  // Create the caption for the media
  const captionDiv = document.createElement('div');
  captionDiv.className = 'media-caption';
  captionDiv.textContent = caption;

  // Add media and its caption to the media wrapper
  mediaWrapper.appendChild(media);
  mediaWrapper.appendChild(captionDiv);

  // Add text if provided 
  if (text && text.trim() !== '') {
    const textDiv = document.createElement('div');
    textDiv.className = 'media-text';
    textDiv.innerHTML = text;
    content.appendChild(textDiv);
  }

  // Add the wrapper around media and caption to the box
  content.appendChild(mediaWrapper);
  box.appendChild(content);

  // Add the media box to the media container into the document
  document.querySelector(parentSelector).appendChild(box);
}