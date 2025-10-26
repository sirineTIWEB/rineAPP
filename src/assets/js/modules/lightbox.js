/**
 * Lightbox Module
 * Handles image click to open full-screen lightbox
 */

export function initLightbox() {
    // Create lightbox element if it doesn't exist
    let lightbox = document.querySelector('.lightbox');

    if (!lightbox) {
        lightbox = document.createElement('div');
        lightbox.className = 'lightbox';

        // Get the mood color from CSS variable or default to blue
        const moodColor = getComputedStyle(document.documentElement)
            .getPropertyValue('--color-myblue').trim() || '#092EFF';

        lightbox.innerHTML = `
            <div class="lightbox-close" aria-label="Close lightbox">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M6 6.5L26.5 25.5" stroke="${moodColor}" stroke-width="3" stroke-linecap="round"/>
                    <path d="M26 6L5.5 26" stroke="${moodColor}" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </div>
            <img class="lightbox-content" src="" alt="Lightbox image">
        `;
        document.body.appendChild(lightbox);
    }

    const lightboxImg = lightbox.querySelector('.lightbox-content');
    const closeBtn = lightbox.querySelector('.lightbox-close');

    // Find all carousel images
    const carouselImages = document.querySelectorAll('.embla__slide img');

    if (carouselImages.length === 0) return;

    // Add click event to each image
    carouselImages.forEach(img => {
        img.addEventListener('click', (e) => {
            e.stopPropagation();
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
    });

    // Close lightbox when clicking background
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close lightbox when clicking close button
    closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        closeLightbox();
    });

    // Close lightbox with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            closeLightbox();
        }
    });

    // Stop image clicks from propagating to lightbox
    lightboxImg.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = ''; // Restore scrolling
    }

    console.log('Lightbox initialized');
}
