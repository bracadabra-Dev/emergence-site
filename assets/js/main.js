/**
 * Main JavaScript for Emergence Schools
 */

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize language switcher
    initLanguageSwitcher();
    
    // Initialize lazy loading
    initLazyLoading();
    
    // Initialize smooth scroll
    initSmoothScroll();
    
    // Initialize scroll reveal
    initScrollReveal();
});

/**
 * Language Switcher
 */
function initLanguageSwitcher() {
    const langButtons = document.querySelectorAll('[data-lang]');
    
    if (langButtons.length === 0) {
        console.warn('No language switcher buttons found');
        return;
    }
    
    // Get SITE_URL from global variable set in header.php
    // Fallback to constructing from current location if not available
    let siteUrl = window.SITE_URL;
    if (!siteUrl) {
        // Extract base path from current location
        const pathParts = window.location.pathname.split('/').filter(p => p);
        // Remove 'pages' or 'admin' from path if present
        const basePath = pathParts.length > 0 && (pathParts[0] === 'pages' || pathParts[0] === 'admin') 
            ? '/' + pathParts[0] 
            : '';
        siteUrl = window.location.protocol + '//' + window.location.host + basePath;
    }
    
    // Ensure siteUrl doesn't end with a slash (except for root)
    if (siteUrl.endsWith('/') && siteUrl !== window.location.protocol + '//' + window.location.host + '/') {
        siteUrl = siteUrl.slice(0, -1);
    }
    
    langButtons.forEach(button => {
        // Skip if already has event listener
        if (button.hasAttribute('data-lang-initialized')) {
            return;
        }
        button.setAttribute('data-lang-initialized', 'true');
        
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const lang = this.getAttribute('data-lang');
            
            if (!lang || !['en', 'fr'].includes(lang)) {
                console.error('Invalid language code:', lang);
                return;
            }
            
            // Disable button during request
            this.disabled = true;
            this.style.opacity = '0.6';
            this.style.cursor = 'wait';
            
            // Construct API URL - ensure it's relative to site root
            const apiUrl = siteUrl + '/api/language.php';
            
            // Send AJAX request to change language
            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                credentials: 'same-origin', // Include cookies/session
                body: 'lang=' + encodeURIComponent(lang)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status + ': ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Reload page to apply new language
                    // Use window.location.href to ensure full reload
                    window.location.href = window.location.href;
                } else {
                    console.error('Language switch error:', data.message);
                    alert('Error: ' + (data.message || 'Failed to change language'));
                    // Re-enable button
                    this.disabled = false;
                    this.style.opacity = '1';
                    this.style.cursor = 'pointer';
                }
            })
            .catch(error => {
                console.error('Language switch error:', error);
                alert('Error: Failed to change language. Please check your connection and try again.');
                // Re-enable button
                this.disabled = false;
                this.style.opacity = '1';
                this.style.cursor = 'pointer';
            });
        });
    });
}

/**
 * Lazy Loading for Images
 */
function initLazyLoading() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.getAttribute('data-src');
                    img.classList.add('loaded');
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        lazyImages.forEach(img => {
            img.src = img.getAttribute('data-src');
            img.classList.add('loaded');
        });
    }
}

/**
 * Smooth Scroll for Anchor Links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

/**
 * Show Flash Messages
 */
function showFlashMessage(message, type = 'success') {
    const messageDiv = document.createElement('div');
    messageDiv.className = `fixed top-24 right-4 p-6 rounded-xl shadow-2xl z-50 transform transition-all duration-300 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white`;
    messageDiv.innerHTML = `
        <div class="flex items-center gap-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}"></path>
            </svg>
            <span class="font-semibold">${message}</span>
        </div>
    `;
    
    document.body.appendChild(messageDiv);
    
    // Animate in
    setTimeout(() => {
        messageDiv.style.transform = 'translateX(0)';
        messageDiv.style.opacity = '1';
    }, 10);
    
    setTimeout(() => {
        messageDiv.style.transform = 'translateX(400px)';
        messageDiv.style.opacity = '0';
        setTimeout(() => messageDiv.remove(), 300);
    }, 3000);
}

/**
 * Scroll Reveal Animation
 */
function initScrollReveal() {
    const reveals = document.querySelectorAll('.reveal, .fade-in-up, .slide-in-left, .slide-in-right');
    
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    reveals.forEach(element => {
        revealObserver.observe(element);
    });
}


/**
 * Desktop nav: Alpine opened and closed on the raw mouse events, so a
 * pass along the bar flashed every menu. Strip those bindings before
 * Alpine starts, then open after a short pause and close after a longer one.
 * Runs at once: this file is a classic script, Alpine in the head is deferred.
 */
(function () {
  var menus = document.querySelectorAll('#main-nav [x-data]');
  for (var i = 0; i < menus.length; i++) {
    menus[i].removeAttribute('@mouseenter');
    menus[i].removeAttribute('@mouseleave');
    menus[i].removeAttribute('x-on:mouseenter');
    menus[i].removeAttribute('x-on:mouseleave');
  }

  function arm() {
    if (!window.Alpine || typeof Alpine.$data !== 'function') return false;
    for (var i = 0; i < menus.length; i++) {
      (function (el) {
        var data;
        try { data = Alpine.$data(el); } catch (err) { return; }
        if (!data || !('open' in data)) return;
        var openTimer;
        var closeTimer;
        el.addEventListener('mouseenter', function () {
          clearTimeout(closeTimer);
          clearTimeout(openTimer);
          openTimer = setTimeout(function () { data.open = true; }, 160);
        });
        el.addEventListener('mouseleave', function () {
          clearTimeout(openTimer);
          closeTimer = setTimeout(function () { data.open = false; }, 320);
        });
      })(menus[i]);
    }
    return true;
  }

  function start() {
    if (arm()) return;
    document.addEventListener('alpine:initialized', function () { arm(); });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', start);
  } else {
    start();
  }
})();

/**
 * The staff list still points two people at the same Unsplash portrait.
 * Swap those faces for initials until a real photograph is in the CMS.
 * Landscape stock used as a news fallback is left alone.
 */
(function () {
  var faces = document.querySelectorAll('img[src*="images.unsplash.com"]');
  for (var i = 0; i < faces.length; i++) {
    var img = faces[i];
    var src = img.getAttribute('src') || '';
    if (src.indexOf('photo-1507003211169') === -1 && src.indexOf('crop=faces') === -1) continue;
    var alt = (img.getAttribute('alt') || '').replace(/\s+/g, ' ').trim();
    var parts = alt.split(' ');
    var titles = { mr: 1, mme: 1, mrs: 1, ms: 1, dr: 1, m: 1 };
    var words = [];
    for (var p = 0; p < parts.length; p++) {
      var bare = parts[p].replace(/\./g, '').toLowerCase();
      if (!titles[bare] && parts[p].length > 1) words.push(parts[p]);
    }
    var initials = 'E';
    if (words.length >= 2) {
      initials = (words[0].charAt(0) + words[words.length - 1].charAt(0)).toUpperCase();
    } else if (words.length === 1) {
      initials = words[0].charAt(0).toUpperCase();
    } else if (alt.length >= 1 && alt.length <= 3) {
      initials = alt.toUpperCase();
    }
    var mark = document.createElement('span');
    mark.className = 'emergence-monogram' + (img.className ? ' ' + img.className : '');
    mark.setAttribute('role', 'img');
    mark.setAttribute('aria-label', alt || 'Emergence Schools');
    mark.textContent = initials;
    img.replaceWith(mark);
  }
})();
