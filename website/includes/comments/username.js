// Load saved username from local storage or prompt user to enter a valid username if not found
document.addEventListener("DOMContentLoaded", () => {
  // Get values of the comment form
  const commentForm = document.getElementById("comment_form");
  const usernameField = document.getElementById("username");
  const commentField = document.getElementById("comment");

  // Get values of the username modal
  const modal = document.getElementById("username-modal");
  const usernameInput = document.getElementById("username-input");
  const usernameSaveBtn = document.getElementById("username-save");
  const usernameCancelBtn = document.getElementById("username-cancel");

  // Try to load saved username
  const savedUsername = localStorage.getItem("commentUsername");
  if (savedUsername) {
    usernameField.value = savedUsername;
  }

  // Listen to comment form if it tries to submit
  commentForm.addEventListener("submit", (e) => {
    // If no username was saved before, stop form from submitting and show the username modal
    if (!usernameField.value) {
      e.preventDefault(); // Stop form for now
      modal.style.display = "flex";
    }
  });

  // If the username gets saved, check if it is valid and then submit the form
  usernameSaveBtn.addEventListener("click", () => {
    const input = usernameInput.value.trim();
    if (input.length > 0 && input.length <= 30) {
      localStorage.setItem("commentUsername", input);
      usernameField.value = input;
      modal.style.display = "none";
      commentForm.submit(); // Now submit
    } else {
      alert($lang['username_alert']);
    }
  });

  // If inputting the username gets canceled, hide the username modal
  usernameCancelBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });
});