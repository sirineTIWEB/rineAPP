// Main entry point - imports all modules
import { initCarousel } from './modules/carousel.js';
import { initToolboxSlider } from './modules/toolbox-slider.js';
import { initIsotopeFilter } from './modules/isotope-filter.js';
import { initBurgerMenu } from './modules/burger-menu.js';
import { initRecentProjectsHover, initProjectsGridHover } from './modules/hover-effects.js';
import { initKeyboardSupport } from './modules/keyboard.js';
import { initDarkMode } from './modules/dark-mode.js';
import { initTextAnimator } from './modules/text-animator.js';
import { initFlowerAnimation } from './modules/flower-animation.js';
import { initTimelineAnimation } from './modules/timeline-animation.js';
import { initServicesAnimation } from './modules/services-animation.js';
import { initMoodColorSwitcher } from './modules/mood-color-switcher.js';
import { initInfoToggle } from './modules/info-toggle.js';
import { initLightbox } from './modules/lightbox.js';

// Initialize all modules when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Core functionality
    initCarousel();
    initToolboxSlider();
    initBurgerMenu();
    initDarkMode();
    initTextAnimator();
    initFlowerAnimation();
    initTimelineAnimation();
    initServicesAnimation();
    initMoodColorSwitcher();
    initInfoToggle();
    initLightbox();

    // Hover effects
    initRecentProjectsHover();
    initProjectsGridHover();

    console.log('All modules initialized');
});

// jQuery-dependent modules - wait for jQuery
if (window.jQuery) {
    jQuery(document).ready(function() {
        initIsotopeFilter();
        initKeyboardSupport();
    });
}
