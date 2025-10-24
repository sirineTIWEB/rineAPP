// Flower animation with GSAP
export function initFlowerAnimation() {
    // Check if we're on the about page
    const flowers = document.querySelectorAll('.flower-animate');

    if (flowers.length === 0) return;

    // Animate each flower
    flowers.forEach((flower, index) => {
        gsap.from(flower, {
            opacity: 0,
            scale: 0,
            duration: 1,
            delay: index * 0.2, // Stagger animation
            ease: "power1.in", // Ease in (slow start, fast end)
        });
    });
}
