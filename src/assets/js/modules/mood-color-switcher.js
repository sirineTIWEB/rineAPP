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

        // Update accordion arrow colors by injecting a style tag
        updateArrowColor(newColor);

        // Update any other elements with data-color-change attribute
        const colorChangeElements = document.querySelectorAll('[data-color-change]');
        colorChangeElements.forEach(element => {
            const property = element.dataset.colorChange || 'background-color';
            element.style[property] = newColor;
        });
    };

    // Function to update arrow color via data attribute
    const updateArrowColor = (color) => {
        // Map colors to mood state names
        const colorToMood = {
            '#23F80B': 'green',
            '#092EFF': 'blue',
            '#B606FC': 'purple'
        };

        // Normalize color format (remove spaces, uppercase)
        const normalizedColor = color.trim().toUpperCase();

        // Get the mood state for this color
        const moodState = colorToMood[normalizedColor] || 'blue';

        // Set data attribute on body
        document.body.setAttribute('data-mood-color', moodState);

        console.log(`Arrow color updated to: ${normalizedColor} (mood: ${moodState})`);
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

    // Initialize arrow color on page load with current CSS variable color
    const initArrowColor = () => {
        const currentColor = getComputedStyle(document.documentElement)
            .getPropertyValue('--color-myblue').trim();

        if (currentColor) {
            updateArrowColor(currentColor);
        }
    };

    // Initialize arrow color
    initArrowColor();

    console.log('Mood color switcher initialized');
}
