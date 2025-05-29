// Save the scroll position for every visisted page and restore it when reloading the page
(function () {
  document.addEventListener("DOMContentLoaded", function () {
    const key = "focusedElement_" + window.location.pathname;
    let allowScrollSave = false;

    // Enable scroll saving after delay to avoid overwriting during load
    setTimeout(() => {
      allowScrollSave = true;
    }, 1000); // Wait 1s after load

    // IntersectionObserver to track the most visible element
    let currentFocusedId = null;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && allowScrollSave) {
          currentFocusedId = entry.target.id;
          if (currentFocusedId) {
            localStorage.setItem(key, currentFocusedId);
          }
        }
      });
    }, {
      root: null,
      threshold: 0.6, // At least 60% of the element must be visible
    });

    document.querySelectorAll("[id]").forEach(el => observer.observe(el));

    // Save element id when clicking a link
    document.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
        const id = link.id || link.closest("[id]")?.id || currentFocusedId;
        if (id) {
          localStorage.setItem(key, id);
        }
      });
    });

    // Save element id when submitting a form
    document.querySelectorAll("form").forEach(form => {
      form.addEventListener("submit", () => {
        const id = form.id || form.closest("[id]")?.id || currentFocusedId;
        if (id) {
          localStorage.setItem(key, id);
        }
      });
    });

    // Block browser's automatic restoring of scroll
    if ("scrollRestoration" in history) {
      history.scrollRestoration = "manual";
    }

    // Clear any hash before browser uses it (to avoid browser default behavior)
    window.addEventListener("beforeunload", () => {
      history.replaceState(null, "", window.location.pathname);
    });

    // Restore scroll to focused element and update URL
    const savedId = localStorage.getItem(key);
    if (savedId) {
      const target = document.getElementById(savedId);
      if (target) {
        setTimeout(() => {
          target.scrollIntoView({ behavior: "auto", block: "start" });
          history.replaceState(null, "", "#" + savedId);
        }, 50);
      }
    }
  });
})();
