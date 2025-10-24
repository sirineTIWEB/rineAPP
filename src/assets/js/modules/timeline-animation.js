/**
 * Timeline Animation Module
 * Adds GSAP stagger animation to timeline items
 */

export function initTimelineAnimation() {
    // Check if we're on a page with timeline elements
    const timelineItems = document.querySelectorAll('.timeline > li');

    if (timelineItems.length === 0) {
        return;
    }

    // Set initial state for all timeline items
    gsap.set(timelineItems, {
        opacity: 0,
        y: 50 // Start 50px below their final position
    });

    // Animate timeline items with stagger effect
    gsap.to(timelineItems, {
        opacity: 1,
        y: 0,
        duration: 0.8,
        stagger: {
            amount: 1.2, // Total time to stagger all items (1.2 seconds)
            from: "start" // Animate from first to last
        },
        ease: "power2.out",
        scrollTrigger: {
            trigger: '.timeline',
            start: 'top 80%', // Start animation when timeline is 80% down the viewport
            toggleActions: 'play none none none' // Only play once
        }
    });

    console.log('Timeline animation initialized');
}
