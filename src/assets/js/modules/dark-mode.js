// Dark Mode Toggle Module
export function initDarkMode() {
    const toggleButton = document.getElementById('darkModeToggle');
    const modeText = document.getElementById('modeText');
    const htmlElement = document.documentElement;

    if (!toggleButton) {
        console.warn('Dark mode toggle button not found');
        return;
    }

    // Check for saved user preference, otherwise check system preference
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Initialize theme
    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        htmlElement.classList.add('dark');
        updateButtonText(true);
    } else {
        htmlElement.classList.remove('dark');
        updateButtonText(false);
    }

    // Toggle dark mode on button click
    toggleButton.addEventListener('click', () => {
        const isDark = htmlElement.classList.toggle('dark');

        // Save preference to localStorage
        localStorage.setItem('theme', isDark ? 'dark' : 'light');

        // Update button text
        updateButtonText(isDark);
    });

    // Update button text to show the OPPOSITE mode (the one you can switch to)
    function updateButtonText(isDark) {
        if (modeText) {
            // If currently dark, show "light:" (can switch to light)
            // If currently light, show "dark:" (can switch to dark)
            modeText.textContent = isDark ? 'light:' : 'dark:';
        }
    }

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            // Only auto-switch if user hasn't set a preference
            if (e.matches) {
                htmlElement.classList.add('dark');
                updateButtonText(true);
            } else {
                htmlElement.classList.remove('dark');
                updateButtonText(false);
            }
        }
    });

    console.log('Dark mode initialized');
}
