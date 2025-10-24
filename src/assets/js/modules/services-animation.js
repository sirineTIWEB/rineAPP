/**
 * Services Animation Module
 * Adds GSAP stagger animation to services accordion items
 */

export function initServicesAnimation() {
    // Check if we're on a page with services (accordion/collapse) elements
    const servicesSection = document.querySelector('.collapse');

    if (!servicesSection) {
        return;
    }

    const collapseItems = document.querySelectorAll('.collapse');

    if (collapseItems.length === 0) {
        return;
    }

    // Set initial state for all collapse items
    gsap.set(collapseItems, {
        opacity: 0,
        x: 50 // Start 50px to the right
    });

    // Animate collapse items with stagger effect
    gsap.to(collapseItems, {
        opacity: 1,
        x: 0,
        duration: 0.8,
        stagger: {
            amount: 0.8, // Total time to stagger all items (0.8 seconds)
            from: "start" // Animate from first to last
        },
        ease: "power2.out",
        scrollTrigger: {
            trigger: collapseItems[0], // Trigger on first collapse item
            start: 'top 85%', // Start animation when services are 85% down the viewport
            toggleActions: 'play none none none' // Only play once
        }
    });

    console.log('Services animation initialized');
}
