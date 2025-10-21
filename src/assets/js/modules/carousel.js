// Embla Carousel Module
export function initCarousel() {
    const emblaNode = document.querySelector('.embla');
    const viewportNode = emblaNode ? emblaNode.querySelector('.embla__viewport') : null;

    if (!viewportNode || !window.EmblaCarousel) {
        console.error('Embla Carousel or viewport not found');
        return;
    }

    const emblaApi = window.EmblaCarousel(viewportNode, {
        align: 'center',
        loop: true
    });

    // Navigation buttons
    const prevBtn = emblaNode.querySelector('.embla__prev');
    const nextBtn = emblaNode.querySelector('.embla__next');

    if (prevBtn) {
        prevBtn.addEventListener('click', emblaApi.scrollPrev, false);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', emblaApi.scrollNext, false);
    }

    // Pagination dots
    const dotsNode = emblaNode.querySelector('.embla__dots');

    const setupDots = () => {
        dotsNode.innerHTML = '';
        const scrollSnaps = emblaApi.scrollSnapList();

        scrollSnaps.forEach((snap, index) => {
            const dot = document.createElement('button');
            dot.className = 'embla__dot';
            dot.type = 'button';
            dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
            dot.addEventListener('click', () => emblaApi.scrollTo(index), false);
            dotsNode.appendChild(dot);
        });
    };

    const updateDots = () => {
        const dots = dotsNode.querySelectorAll('.embla__dot');
        const selectedIndex = emblaApi.selectedScrollSnap();

        dots.forEach((dot, index) => {
            if (index === selectedIndex) {
                dot.classList.add('embla__dot--selected');
            } else {
                dot.classList.remove('embla__dot--selected');
            }
        });
    };

    setupDots();
    updateDots();

    emblaApi.on('select', updateDots);
    emblaApi.on('reInit', () => {
        setupDots();
        updateDots();
    });

    console.log('Embla Carousel initialized successfully');
}
