// Toolbox Slider Module
let currentSlide = 0;

function showSlide(parentSection, index) {
    const enfants = parentSection.querySelectorAll('.childslide');
    enfants.forEach((enfant, i) => {
        if (i === index) {
            enfant.classList.remove('hidden');
            enfant.classList.add('block');
        } else {
            enfant.classList.add('hidden');
            enfant.classList.remove('block');
        }
        enfant.classList.toggle('active', i === index);
    });
}

export function showNext() {
    const button = event.currentTarget;
    const parentSection = button.closest('.parentslide');
    const currentIndex = parseInt(parentSection.dataset.currentIndex) || 0;
    const enfants = parentSection.querySelectorAll('.childslide');
    const nextIndex = (currentIndex + 1) % enfants.length;
    showSlide(parentSection, nextIndex);
    parentSection.dataset.currentIndex = nextIndex;
}

export function showPrev() {
    const button = event.currentTarget;
    const parentSection = button.closest('.parentslide');
    const currentIndex = parseInt(parentSection.dataset.currentIndex) || 0;
    const enfants = parentSection.querySelectorAll('.childslide');
    const prevIndex = (currentIndex - 1 + enfants.length) % enfants.length;
    showSlide(parentSection, prevIndex);
    parentSection.dataset.currentIndex = prevIndex;
}

export function initToolboxSlider() {
    document.querySelectorAll('.parentslide').forEach(section => {
        section.dataset.currentIndex = currentSlide;
        showSlide(section, currentSlide);
    });
}

// Make functions available globally for inline onclick handlers
window.showNext = showNext;
window.showPrev = showPrev;
