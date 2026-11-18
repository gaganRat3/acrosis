/**
 * Acrosis Beverages Pvt Ltd — Shared JavaScript
 * Features: smooth scroll, mobile nav, fade-in observer,
 *           sticky nav, counter animation, image lightbox
 */
(function () {
  'use strict';

  /* ── Helpers ─────────────────────────────────────────────────────────── */
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];

  /* ── 1. Mobile Nav Toggle ─────────────────────────────────────────────── */
  function initMobileNav() {
    const hamburger  = $('#hamburger');
    const mobileMenu = $('#mobileMenu');
    if (!hamburger || !mobileMenu) return;

    hamburger.addEventListener('click', () => {
      const expanded = hamburger.getAttribute('aria-expanded') === 'true';
      hamburger.setAttribute('aria-expanded', String(!expanded));
      mobileMenu.setAttribute('aria-hidden', String(expanded));
      mobileMenu.classList.toggle('open', !expanded);
    });

    // Close menu on link click
    $$('.nav-link', mobileMenu).forEach(link => {
      link.addEventListener('click', () => {
        hamburger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileMenu.classList.remove('open');
      });
    });

    // Close on outside click
    document.addEventListener('click', e => {
      if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
        hamburger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileMenu.classList.remove('open');
      }
    });
  }

  /* ── 2. Sticky Nav Shadow on Scroll ──────────────────────────────────── */
  function initStickyNav() {
    const nav = $('#siteNav');
    if (!nav) return;

    const handler = () => {
      nav.classList.toggle('scrolled', window.scrollY > 40);
    };
    window.addEventListener('scroll', handler, { passive: true });
    handler();
  }

  /* ── 3. Smooth Scroll (for anchor links) ─────────────────────────────── */
  function initSmoothScroll() {
    document.addEventListener('click', e => {
      const link = e.target.closest('a[href^="#"]');
      if (!link) return;
      const target = document.getElementById(link.getAttribute('href').slice(1));
      if (!target) return;
      e.preventDefault();
      const navH = parseInt(getComputedStyle(document.documentElement)
        .getPropertyValue('--nav-h')) || 72;
      window.scrollTo({
        top: target.getBoundingClientRect().top + window.scrollY - navH - 16,
        behavior: 'smooth',
      });
    });
  }

  /* ── 4. Scroll-triggered Fade-in (Intersection Observer) ─────────────── */
  function initFadeIn() {
    const items = $$('.fade-in');
    if (!items.length) return;

    // If user prefers reduced motion — show everything immediately
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      items.forEach(el => el.classList.add('visible'));
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.05,          // fire as soon as 5% of element is visible
        rootMargin: '0px 0px -10px 0px'  // trigger just before element enters view
      }
    );

    items.forEach(el => observer.observe(el));
  }

  /* ── 5. Counter Animation ─────────────────────────────────────────────── */
  function animateCounter(el, target, duration = 1000) {
    const start = performance.now();
    const isDecimal = target % 1 !== 0;

    const tick = (now) => {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      // Ease-out cubic
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = eased * target;
      el.textContent = isDecimal
        ? current.toFixed(1)
        : Math.floor(current).toLocaleString('en-IN');
      if (progress < 1) requestAnimationFrame(tick);
      else el.textContent = isDecimal ? target.toFixed(1) : target.toLocaleString('en-IN');
    };
    requestAnimationFrame(tick);
  }

  function initCounters() {
    const counters = $$('[data-count]');
    if (!counters.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el     = entry.target;
            const target = parseFloat(el.dataset.count);
            const dur    = parseInt(el.dataset.duration) || 1000;
            animateCounter(el, target, dur);
            observer.unobserve(el);
          }
        });
      },
      { threshold: 0.2 }
    );

    counters.forEach(el => observer.observe(el));
  }

  /* ── 6. Simple Image Lightbox ─────────────────────────────────────────── */
  function initLightbox() {
    const overlay = $('#lightboxOverlay');
    const imgEl   = $('#lightboxImg');
    const closeBtn = $('#lightboxClose');
    if (!overlay || !imgEl) return;

    function open(src, alt) {
      imgEl.src = src;
      imgEl.alt = alt || '';
      overlay.hidden = false;
      overlay.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      closeBtn && closeBtn.focus();
    }

    function close() {
      overlay.hidden = true;
      overlay.setAttribute('aria-hidden', 'true');
      imgEl.src = '';
      document.body.style.overflow = '';
    }

    // Trigger on [data-lightbox]
    document.addEventListener('click', e => {
      const trigger = e.target.closest('[data-lightbox]');
      if (!trigger) return;
      e.preventDefault();
      const src = trigger.dataset.lightbox || trigger.href || trigger.src;
      const alt = trigger.dataset.caption || trigger.title || '';
      open(src, alt);
    });

    // Close on button / overlay click
    closeBtn && closeBtn.addEventListener('click', close);
    overlay.addEventListener('click', e => { if (e.target === overlay) close(); });

    // Close on Escape
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && !overlay.hidden) close();
    });
  }

  /* ── Init ─────────────────────────────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', () => {
    initMobileNav();
    initStickyNav();
    initSmoothScroll();
    initFadeIn();
    initCounters();
    initLightbox();
  });

})();
