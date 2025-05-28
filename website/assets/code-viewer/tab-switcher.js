// Make the clicked tab active and remove the active of all other tabs
function switchTab(id) {
    document.querySelectorAll('.code-tabs .tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.code-tabs nav button').forEach(el => el.classList.remove('active'));
    document.getElementById('content-' + id).classList.add('active');
    document.getElementById('tab-' + id).classList.add('active');

    // Trigger Prism to hightlight code in the new active tab
    if (window.Prism) Prism.highlightAll();
}

// Activate the first tab by default
window.addEventListener('DOMContentLoaded', () => {
  const firstTab = document.querySelector('.code-tabs nav button');
  if (firstTab) {
    switchTab(firstTab.id.replace('tab-', ''));
  }

  // Force Prism to re-scan the DOM after the code is loaded
  if (window.Prism) {
    Prism.highlightAll();
  }
});