/**
 * Jacob Dolph Resume — theme script.
 * Every block is independently guarded: a missing element on any template
 * must never crash the rest of the script.
 */
(function () {
  'use strict';

  /* ----------------------------------------------------------------------
   * 1. Mobile navigation drawer
   * -------------------------------------------------------------------- */
  (function mobileNav() {
    var toggle   = document.getElementById('navToggle');
    var drawer   = document.getElementById('mobileNav');
    var overlay  = document.getElementById('mobileOverlay');
    var closeBtn = document.getElementById('mobileNavClose');
    if (!toggle || !drawer || !overlay) return;

    function openMenu() {
      drawer.hidden = false;
      overlay.hidden = false;
      // Force a frame so the transition runs from the un-hidden state.
      requestAnimationFrame(function () {
        drawer.classList.add('is-open');
        overlay.classList.add('is-open');
      });
      toggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
      drawer.classList.remove('is-open');
      overlay.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
      window.setTimeout(function () {
        drawer.hidden = true;
        overlay.hidden = true;
      }, 250);
    }

    toggle.addEventListener('click', openMenu);
    overlay.addEventListener('click', closeMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);

    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !drawer.hidden) closeMenu();
    });
  })();

  /* ----------------------------------------------------------------------
   * 2. Scroll reveal
   * CSS only hides .reveal inside prefers-reduced-motion: no-preference,
   * so a failure here can never blank the page — but belt-and-suspenders:
   * bail into "everything visible" when IntersectionObserver is missing.
   * -------------------------------------------------------------------- */
  (function scrollReveal() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced || !('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('visible'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var siblings = el.parentElement
          ? el.parentElement.querySelectorAll(':scope > .reveal:not(.visible)')
          : [];
        // Stagger reveals that share a parent (grids, chip rows).
        var delay = 0;
        siblings.forEach(function (sib, i) {
          if (sib === el) delay = Math.min(i * 70, 350);
        });
        window.setTimeout(function () { el.classList.add('visible'); }, delay);
        observer.unobserve(el);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    items.forEach(function (el) { observer.observe(el); });
  })();

  /* ----------------------------------------------------------------------
   * 3. Email assembler — keeps the address out of the static HTML source.
   * -------------------------------------------------------------------- */
  (function emailAssembler() {
    document.querySelectorAll('[data-eu][data-ed]').forEach(function (el) {
      var address = el.getAttribute('data-eu') + '@' + el.getAttribute('data-ed');
      el.setAttribute('href', 'mailto:' + address);
    });
  })();

  /* ----------------------------------------------------------------------
   * 4. Nav scroll shadow + dock
   * Past the hero the pill docks into a compact "JD" button on the left
   * (desktop only — the CSS gates docked styles behind min-width: 721px).
   * Clicking it drops the links down below the button; scrolling on,
   * clicking a link, clicking outside, or Escape closes the menu. Back
   * at the top the full bar always returns.
   * -------------------------------------------------------------------- */
  (function navDock() {
    var nav = document.getElementById('siteNav');
    if (!nav) return;

    var dockToggle = document.getElementById('navDockToggle');
    var DOCK_AT = 160;      // px scrolled before the bar docks
    var CLOSE_AFTER = 120;  // px scrolled away from an open menu before it closes
    var menuOpen = false;
    var openY = 0;

    function update() {
      var y = window.scrollY;
      nav.classList.toggle('is-scrolled', y > 8);

      if (y <= DOCK_AT || (menuOpen && Math.abs(y - openY) > CLOSE_AFTER)) {
        menuOpen = false;
      }

      nav.classList.toggle('is-docked', y > DOCK_AT);
      nav.classList.toggle('is-menu-open', menuOpen);
      if (dockToggle) {
        dockToggle.setAttribute('aria-expanded', menuOpen ? 'true' : 'false');
      }
    }

    function closeMenu() {
      if (!menuOpen) return;
      menuOpen = false;
      update();
    }

    if (dockToggle) {
      dockToggle.addEventListener('click', function () {
        menuOpen = !menuOpen;
        openY = window.scrollY;
        update();
        if (menuOpen) {
          var firstLink = nav.querySelector('.site-nav-links a');
          if (firstLink) firstLink.focus();
        }
      });
    }

    nav.querySelectorAll('.site-nav-links a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', function (e) {
      if (menuOpen && !nav.contains(e.target)) closeMenu();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menuOpen) {
        closeMenu();
        if (dockToggle) dockToggle.focus();
      }
    });

    update();
    window.addEventListener('scroll', update, { passive: true });
  })();

})();
