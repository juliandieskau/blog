// Auto-expand textarea, when the text is too long
document.addEventListener("DOMContentLoaded", () => {
  const textarea = document.getElementById("comment");
  const counter = document.getElementById("comment-counter");
  const cancelBtn = document.getElementById("cancel-button");

  // Auto-expand textarea
  const autoGrow = (el) => {
    el.style.height = "auto";
    el.style.height = el.scrollHeight + "px";
  };

  // Live character counter
  textarea.addEventListener("input", () => {
    counter.textContent = `${textarea.value.length} / 2000`;
    autoGrow(textarea);
  });0

  // Cancel button clears and blurs
  cancelBtn.addEventListener("click", () => {
    textarea.value = "";
    textarea.blur();
    counter.textContent = "0 / 2000";
    autoGrow(textarea);
  });

  // Trigger initial sizing
  autoGrow(textarea);
});