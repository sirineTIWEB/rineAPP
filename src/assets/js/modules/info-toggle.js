/**
 * Info Toggle Module
 * Handles expandable info button functionality with smooth animations
 */

export function initInfoToggle() {
    const infoBtn = document.getElementById('mood-info-btn');
    const infoContent = document.getElementById('mood-info-content');

    if (!infoBtn || !infoContent) return;

    let isExpanded = false;

    const toggleInfo = () => {
        isExpanded = !isExpanded;

        if (isExpanded) {
            // Expand
            const scrollHeight = infoContent.scrollHeight;
            infoContent.style.maxHeight = scrollHeight + 'px';
            infoContent.style.opacity = '1';
            infoContent.style.marginBottom = '1rem';
            infoContent.setAttribute('aria-hidden', 'false');
            infoBtn.setAttribute('aria-expanded', 'true');
            infoBtn.classList.add('bg-myblue', 'text-mybeige');
        } else {
            // Collapse
            infoContent.style.maxHeight = '0';
            infoContent.style.opacity = '0';
            infoContent.style.marginBottom = '0';
            infoContent.setAttribute('aria-hidden', 'true');
            infoBtn.setAttribute('aria-expanded', 'false');
            infoBtn.classList.remove('bg-myblue', 'text-mybeige');
        }
    };

    // Click event
    infoBtn.addEventListener('click', toggleInfo);

    // Keyboard accessibility
    infoBtn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleInfo();
        }
    });

    console.log('Info toggle initialized');
}