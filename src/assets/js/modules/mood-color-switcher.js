/**
 * Mood Color Switcher Module
 * Handles interactive color switching based on mood states
 * Changes the primary color throughout the site dynamically
 */

export function initMoodColorSwitcher() {
    const buttons = document.querySelectorAll('.mood-state-btn');

    if (buttons.length === 0) return;

    // Update CSS custom property for myblue color
    const updatePrimaryColor = (newColor) => {
        document.documentElement.style.setProperty('--color-myblue', newColor);
    };

    // Update all elements that use the primary color
    const updateColoredElements = (newColor) => {
        // Update hover circle SVG strokes (menu items)
        const hoverCirclePaths = document.querySelectorAll('.hover-circle svg path');
        hoverCirclePaths.forEach(path => {
            path.setAttribute('stroke', newColor);
        });

        // Update timeline SVG fills
        const timelineSvgs = document.querySelectorAll('.timeline-middle svg');
        timelineSvgs.forEach(svg => {
            svg.setAttribute('fill', newColor);
        });

        // Update timeline SVG paths
        const timelinePaths = document.querySelectorAll('.timeline-middle svg path');
        timelinePaths.forEach(path => {
            path.setAttribute('fill', newColor);
        });

        // Update accordion arrow colors (background-image SVG)
        const collapseTitles = document.querySelectorAll('.collapse-title');
        const encodedColor = encodeURIComponent(newColor);
        const arrowSvg = `data:image/svg+xml;utf8,<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.00024 5.18785C2.27705 5.63076 2.55387 6.07367 3.80374 8.71014C5.05361 11.3466 7.26816 16.1632 8.46435 18.2847C9.66053 20.4061 9.77125 19.6864 9.91134 19.0665C10.1669 17.9356 11.5513 15.1097 13.4512 11.1713C14.1886 9.5582 14.4654 8.72775 15.0786 7.33108C15.6918 5.93441 16.633 3.99669 17.9382 2.00025" stroke="${encodedColor}" stroke-width="4" stroke-linecap="round"/></svg>`;
        collapseTitles.forEach(title => {
            title.style.setProperty('--arrow-color', `url('${arrowSvg}')`);
        });

        // Update any other elements with data-color-change attribute
        const colorChangeElements = document.querySelectorAll('[data-color-change]');
        colorChangeElements.forEach(element => {
            const property = element.dataset.colorChange || 'background-color';
            element.style[property] = newColor;
        });
    };

    // Update button states (visual only, no localStorage)
    const updateButtonStates = (activeButton) => {
        buttons.forEach(btn => {
            const color = btn.dataset.color;
            const textElement = btn.querySelector('p');
            const isActive = btn === activeButton;

            // Update aria-pressed for accessibility
            btn.setAttribute('aria-pressed', isActive);

            if (isActive) {
                // Active state: colored background, white text
                btn.classList.remove('bg-transparent', 'border-2', 'border-myblack', 'dark:border-mybeige');
                btn.style.backgroundColor = color;
                textElement.classList.remove('text-myblack', 'dark:text-mybeige');
                textElement.classList.add('text-mybeige');
                btn.classList.add('active');
            } else {
                // Inactive state: transparent with border
                btn.classList.add('bg-transparent', 'border-2', 'border-myblack', 'dark:border-mybeige');
                btn.style.backgroundColor = '';
                textElement.classList.add('text-myblack', 'dark:text-mybeige');
                textElement.classList.remove('text-mybeige');
                btn.classList.remove('active');
            }
        });
    };

    // Handle button click
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const newColor = button.dataset.color;
            const state = button.dataset.state;

            // Update the primary color across the site
            updatePrimaryColor(newColor);

            // Update all colored elements
            updateColoredElements(newColor);

            // Update button visual states
            updateButtonStates(button);

            // Optional: dispatch custom event for other parts of the site to react
            document.dispatchEvent(new CustomEvent('moodColorChanged', {
                detail: { color: newColor, state: state }
            }));

            console.log(`Mood color changed to ${state}: ${newColor}`);
        });
    });

    console.log('Mood color switcher initialized');
}
