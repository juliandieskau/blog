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
          const id = entry.target.id;
          // exclude the hidden username field from being saved
          if (id && !id.toLowerCase().includes("username")) {
            currentFocusedId = id;
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
        const candidates = [
          form.id,
          form.closest("[id]")?.id,
          currentFocusedId
        ];
        
        // Prevent username modal from being chosen (because it gets hidden after submitting)
        // Skip saving if ID includes "username"
        const validId = candidates.find(id => id && !id.toLowerCase().includes("username"));

        // save id if found
        if (validId) {
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

    // Restore scroll to focused element, cleanup and update URL
    const savedId = localStorage.getItem(key);
    // Only scroll to valid URLs
    if (savedId && !savedId.toLowerCase().includes("username")) {
      const target = document.getElementById(savedId);
      if (target) {
        setTimeout(() => {
          target.scrollIntoView({ behavior: "auto", block: "start" });
          history.replaceState(null, "", "#" + savedId);
        }, 50);
      } else {
        localStorage.removeItem(key); // Clean up stale id
      }
    } else {
      localStorage.removeItem(key); // Remove invalid id
    }
  });
})();
