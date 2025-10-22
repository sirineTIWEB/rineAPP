// GSAP Scroll Effects Module
export function initScrollToTop() {
    // Check if GSAP and ScrollTrigger are loaded
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.error('GSAP or ScrollTrigger not loaded');
        return;
    }

    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    const scrollButton = document.getElementById('scrollToTop');
    const heroSection = document.querySelector('section'); // First section is the hero

    if (!scrollButton || !heroSection) {
        console.warn('Scroll button or hero section not found');
        return;
    }

    // GSAP animation for the button
    // Initially hidden (opacity: 0, scale: 0, pointer-events: none)
    gsap.set(scrollButton, {
        opacity: 0,
        scale: 0,
        pointerEvents: 'none'
    });

    // ScrollTrigger to show/hide button based on hero section visibility
    ScrollTrigger.create({
        trigger: heroSection,
        start: 'bottom top', // When bottom of hero reaches top of viewport
        end: 'bottom top',
        onLeave: () => {
            // Hero section has left the viewport - show button
            gsap.to(scrollButton, {
                opacity: 1,
                scale: 1,
                pointerEvents: 'auto',
                duration: 0.3,
                ease: 'back.out(1.7)'
            });
        },
        onEnterBack: () => {
            // Hero section is back in viewport - hide button
            gsap.to(scrollButton, {
                opacity: 0,
                scale: 0,
                pointerEvents: 'none',
                duration: 0.2,
                ease: 'power2.in'
            });
        }
    });

    // Smooth scroll to top on click
    scrollButton.addEventListener('click', () => {
        gsap.to(window, {
            scrollTo: 0,
            duration: 1,
            ease: 'power2.inOut'
        });
    });

    // Add keyboard support
    scrollButton.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            gsap.to(window, {
                scrollTo: 0,
                duration: 1,
                ease: 'power2.inOut'
            });
        }
    });

    console.log('Scroll to top initialized with GSAP');
}
