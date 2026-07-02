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
   * 4. Nav scroll shadow
   * -------------------------------------------------------------------- */
  (function navShadow() {
    var nav = document.getElementById('siteNav');
    if (!nav) return;

    function update() {
      nav.classList.toggle('is-scrolled', window.scrollY > 8);
    }
    update();
    window.addEventListener('scroll', update, { passive: true });
  })();

})();
