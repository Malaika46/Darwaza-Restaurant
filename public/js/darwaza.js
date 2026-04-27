// DARWAZA — Premium JS
document.addEventListener('DOMContentLoaded', () => {

    // ── Particles ──
    const particleContainer = document.getElementById('particles');
    if (particleContainer) {
        for (let i = 0; i < 25; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            p.style.cssText = `
                left: ${Math.random() * 100}%;
                width: ${Math.random() * 3 + 1}px;
                height: ${Math.random() * 3 + 1}px;
                animation-duration: ${Math.random() * 15 + 10}s;
                animation-delay: ${Math.random() * 10}s;
                opacity: ${Math.random() * 0.4};
            `;
            particleContainer.appendChild(p);
        }
    }

    // ── Custom Cursor ──
    const cursor = document.createElement('div');
    cursor.style.cssText = `
        position: fixed; width: 8px; height: 8px;
        background: #C9A96E; border-radius: 50%;
        pointer-events: none; z-index: 99999;
        transform: translate(-50%, -50%);
        transition: transform 0.15s, width 0.3s, height 0.3s, opacity 0.3s;
        mix-blend-mode: screen;
    `;
    document.body.appendChild(cursor);

    const cursorRing = document.createElement('div');
    cursorRing.style.cssText = `
        position: fixed; width: 36px; height: 36px;
        border: 1px solid rgba(201,169,110,0.5); border-radius: 50%;
        pointer-events: none; z-index: 99998;
        transform: translate(-50%, -50%);
        transition: transform 0.4s ease, width 0.3s, height 0.3s;
    `;
    document.body.appendChild(cursorRing);

    let mouseX = 0, mouseY = 0;
    let ringX = 0, ringY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX; mouseY = e.clientY;
        cursor.style.left = mouseX + 'px';
        cursor.style.top = mouseY + 'px';
    });

    function animateRing() {
        ringX += (mouseX - ringX) * 0.12;
        ringY += (mouseY - ringY) * 0.12;
        cursorRing.style.left = ringX + 'px';
        cursorRing.style.top = ringY + 'px';
        requestAnimationFrame(animateRing);
    }
    animateRing();

    document.querySelectorAll('a, button, .room-card, .gallery-item').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.width = '4px';
            cursor.style.height = '4px';
            cursorRing.style.width = '60px';
            cursorRing.style.height = '60px';
        });
        el.addEventListener('mouseleave', () => {
            cursor.style.width = '8px';
            cursor.style.height = '8px';
            cursorRing.style.width = '36px';
            cursorRing.style.height = '36px';
        });
    });

    // ── Navbar Scroll ──
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });
    }

    // ── Hero BG Parallax ──
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg) {
        heroBg.classList.add('loaded');
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            heroBg.style.transform = `scale(1) translateY(${scrollY * 0.3}px)`;
        });
    }

    // ── Scroll Reveal ──
    const revealEls = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, i * 80);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach(el => observer.observe(el));

    // ── Counter Animation ──
    const counters = document.querySelectorAll('.stat-number');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target'));
                const suffix = el.getAttribute('data-suffix') || '';
                let count = 0;
                const step = target / 60;
                const timer = setInterval(() => {
                    count += step;
                    if (count >= target) {
                        el.textContent = target + suffix;
                        clearInterval(timer);
                    } else {
                        el.textContent = Math.floor(count) + suffix;
                    }
                }, 25);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(el => counterObserver.observe(el));

    // ── Menu Tabs ──
    const tabs = document.querySelectorAll('.menu-tab');
    const tabContents = document.querySelectorAll('.menu-tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(c => {
                c.style.display = 'none';
                c.style.opacity = '0';
            });
            tab.classList.add('active');
            const target = document.getElementById(tab.dataset.tab);
            if (target) {
                target.style.display = 'grid';
                setTimeout(() => { target.style.opacity = '1'; }, 10);
            }
        });
    });

    // ── Gallery Lightbox ──
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');

    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', () => {
            const src = item.querySelector('img')?.src;
            if (lightbox && lightboxImg && src) {
                lightboxImg.src = src;
                lightbox.classList.add('open');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    if (lightbox) {
        lightbox.querySelector('.lightbox-close')?.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });

    // ── Mobile Menu ──
    const navToggle = document.getElementById('navToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    if (navToggle && mobileMenu) {
        navToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });
    }

    // ── Secret Code Animation ──
    const codeDisplay = document.querySelector('.secret-code-display');
    if (codeDisplay) {
        const codes = ['DRZ-7843', 'DRZ-2156', 'DRZ-9312', 'DRZ-4587'];
        let idx = 0;
        setInterval(() => {
            idx = (idx + 1) % codes.length;
            codeDisplay.style.opacity = '0';
            setTimeout(() => {
                codeDisplay.textContent = codes[idx];
                codeDisplay.style.opacity = '1';
            }, 300);
        }, 2500);
        codeDisplay.style.transition = 'opacity 0.3s';
    }

    // ── Reservation form success flash ──
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 1s';
            successAlert.style.opacity = '0';
            setTimeout(() => successAlert.remove(), 1000);
        }, 5000);
    }
});
