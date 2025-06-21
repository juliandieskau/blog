// Save the scroll position for every visisted page and restore it when reloading the page
(function () {
  document.addEventListener("DOMContentLoaded", function () {
    const key = "focusedElement_" + window.location.pathname;
    const timestampKey = key + "_timestamp";
    let allowScrollSave = false;

    // Enable scroll saving after delay to avoid overwriting during load
    setTimeout(() => {
      allowScrollSave = true;
    }, 1000); // Wait 1s after load

    let currentFocusedId = null;

    // Save ID and timestamp to localStorage
    function saveScrollId(id) {
      // Exclude the username-form elements from being saved, because they will only be shown once
      if (id && !id.toLowerCase().includes("username")) {
        localStorage.setItem(key, id);
        localStorage.setItem(timestampKey, Date.now());
      }
    }

    // IntersectionObserver to track the topmost visible element
    const observer = new IntersectionObserver((entries) => { 
      // Don't save if not scrolled down or not allowed to
      if (!allowScrollSave || window.scrollY <= 10) return;

      let topElement = null;
      let minTop = Infinity;

      // Find the topmost visible element
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const rectTop = entry.boundingClientRect.top;
          if (rectTop >= 0 && rectTop < minTop) {
            minTop = rectTop;
            topElement = entry.target;
          }
        }
      });

      // Save the topmost element
      if (topElement) {
        const id = topElement.id;
        if (id && !id.toLowerCase().includes("username")) {
          currentFocusedId = id;
          saveScrollId(id);
        }
      }
    }, {
      // Trigger on any element that is visible
      root: null,
      threshold: 0, 
    });

    document.querySelectorAll("[id]").forEach(el => observer.observe(el));

    // Save element id when clicking a link
    document.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
        const id = link.id || link.closest("[id]")?.id || currentFocusedId;
        if (id) {
          saveScrollId(id);
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

    // // Prevent browser's native scroll restoration
    if ("scrollRestoration" in history) {
      history.scrollRestoration = "manual";
    }

    // Clear any hash before browser uses it (to avoid browser default behavior)
    window.addEventListener("beforeunload", () => {
      history.replaceState(null, "", window.location.pathname);
    });

    // Restore scroll to focused element, cleanup and update URL if timestamp is recent
    const savedId = localStorage.getItem(key);
    const savedTime = parseInt(localStorage.getItem(timestampKey), 10);
    const duration = 15 * 60 * 1000; // 15 minutes

    // Scroll to valid URLs, when the timestamp is more recent than the relevant duration
    if (savedId && !savedId.toLowerCase().includes("username") 
        && savedTime && Date.now() - savedTime < duration) {
      // Select stored ID from storage
      const target = document.getElementById(savedId);
      if (target) {
        setTimeout(() => {
          target.scrollIntoView({ behavior: "auto", block: "start" });
          history.replaceState(null, "", "#" + savedId);
        }, 50);
      } 
      // Clean up stale IDs
      else {
        localStorage.removeItem(key);
        localStorage.removeItem(timestampKey);
      }
    }
    // Remove invalid IDs (only focused element related IDs)
    else {
      localStorage.removeItem(key); 
      localStorage.removeItem(timestampKey);
    }
  });
})();
