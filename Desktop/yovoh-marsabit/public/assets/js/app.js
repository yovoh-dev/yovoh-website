/* =========================================================
   Young Voices of Hope — Marsabit
   Front-end interactions & scroll animations
   ========================================================= */

/* ---------- Theme (dark / light / system) ----------
   The <head> already applies the correct class before first paint (see
   layouts/app.blade.php). This section keeps it in sync as the user
   changes their choice, and reacts live if their OS theme changes while
   "system" is selected. Exposed globally so the Alpine toggle can call it. */
(function () {
    var STORAGE_KEY = 'yovoh-theme';
    var media = window.matchMedia('(prefers-color-scheme: dark)');

    function applyTheme(pref) {
        var isDark = pref === 'dark' || (pref === 'system' && media.matches);
        document.documentElement.classList.toggle('dark', isDark);
    }

    window.setYovohTheme = function (pref) {
        localStorage.setItem(STORAGE_KEY, pref);
        applyTheme(pref);
    };

    media.addEventListener('change', function () {
        var current = localStorage.getItem(STORAGE_KEY) || 'system';
        if (current === 'system') applyTheme('system');
    });
})();

document.addEventListener('DOMContentLoaded', function () {

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- AOS init ---------- */
    if (window.AOS) {
        AOS.init({
            duration: 750,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60,
            disable: reduceMotion,
        });
    }

    /* ---------- Sticky nav background on scroll ---------- */
    var nav = document.getElementById('site-nav');
    if (nav) {
        var onScroll = function () {
            if (window.scrollY > 24) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- Hero star field (generated once) ---------- */
    document.querySelectorAll('.hero-stars').forEach(function (field) {
        var count = 45;
        for (var i = 0; i < count; i++) {
            var star = document.createElement('span');
            star.style.top = Math.random() * 55 + '%';
            star.style.left = Math.random() * 100 + '%';
            star.style.animationDelay = (Math.random() * 4) + 's';
            star.style.opacity = (0.2 + Math.random() * 0.6).toFixed(2);
            field.appendChild(star);
        }
    });

    /* ---------- Animated number counters ---------- */
    var counters = document.querySelectorAll('[data-counter]');
    var formatNumber = function (num) {
        return num.toLocaleString('en-US');
    };

    var animateCounter = function (el) {
        var target = parseFloat(el.getAttribute('data-counter'));
        var prefix = el.getAttribute('data-prefix') || '';
        var suffix = el.getAttribute('data-suffix') || '';
        var duration = reduceMotion ? 1 : 1600;
        var startTime = null;

        var step = function (timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(eased * target);
            el.textContent = prefix + formatNumber(current) + suffix;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                el.textContent = prefix + formatNumber(target) + suffix;
            }
        };
        window.requestAnimationFrame(step);
    };

    if ('IntersectionObserver' in window && counters.length) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        counters.forEach(function (c) { counterObserver.observe(c); });
    } else {
        counters.forEach(animateCounter);
    }

    /* ---------- Budget bar fill reveal ---------- */
    var bars = document.querySelectorAll('.budget-bar-fill');
    if ('IntersectionObserver' in window && bars.length) {
        var barObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    barObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        bars.forEach(function (b) { barObserver.observe(b); });
    } else {
        bars.forEach(function (b) { b.classList.add('in-view'); });
    }

    /* ---------- Timeline line draw-in ---------- */
    var lines = document.querySelectorAll('.timeline-line');
    if ('IntersectionObserver' in window && lines.length) {
        var lineObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        }, { threshold: 0.2 });
        lines.forEach(function (l) { lineObserver.observe(l); });
    } else {
        lines.forEach(function (l) { l.classList.add('in-view'); });
    }

    /* ---------- Subtle parallax on hero mountain (mouse move, desktop only) ---------- */
    var heroShell = document.querySelector('.hero-shell');
    var mountainLayers = document.querySelectorAll('[data-parallax]');
    if (heroShell && mountainLayers.length && !reduceMotion && window.matchMedia('(pointer:fine)').matches) {
        heroShell.addEventListener('mousemove', function (e) {
            var rect = heroShell.getBoundingClientRect();
            var relX = (e.clientX - rect.left) / rect.width - 0.5;
            mountainLayers.forEach(function (layer) {
                var depth = parseFloat(layer.getAttribute('data-parallax')) || 0;
                layer.style.transform = 'translateX(' + (relX * depth) + 'px)';
            });
        });
    }
});
