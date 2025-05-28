// Functions to resize the iframes in the html projects 
// so they are as high on the parent page as they are themselves.
// For safety reasons only works with iframes that are stored locally on this server.

// Determine iframe height
function resizeIframe(iframe) {
    try {
        const doc = iframe.contentDocument || iframe.contentWindow.document;
        const height = Math.max(
            doc.documentElement.scrollHeight,
            doc.body.scrollHeight,
            doc.documentElement.offsetHeight,
            doc.body.offsetHeight
        );
        iframe.style.height = height + 'px';
    } catch (e) {
        console.warn("Unable to resize iframe due to cross-origin restrictions.", e);
    }
}

// Resize the iframes with auto-resize class when the website is loaded
window.addEventListener('DOMContentLoaded', () => {
    const iframes = document.querySelectorAll('iframe.auto-resize');
    iframes.forEach(iframe => {
        iframe.addEventListener('load', () => resizeIframe(iframe));
    });
});