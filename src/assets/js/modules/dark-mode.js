// Dark Mode Toggle Module
export function initDarkMode() {
    const toggleButton = document.getElementById('darkModeToggle');
    const toggleButtonMobile = document.getElementById('darkModeToggleMobile');
    const modeText = document.getElementById('modeText');
    const modeTextMobile = document.getElementById('modeTextMobile');
    const htmlElement = document.documentElement;

    if (!toggleButton && !toggleButtonMobile) {
        return;
    }

    // Update button text to show the OPPOSITE mode (the one you can switch to)
    function updateButtonText(isDark) {
        const text = isDark ? 'light:' : 'dark:';
        if (modeText) {
            modeText.textContent = text;
        }
        if (modeTextMobile) {
            modeTextMobile.textContent = text;
        }
    }

    // Function to apply theme based on preference
    function applyTheme() {
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        // Use saved preference, or fall back to system preference
        const shouldBeDark = savedTheme === 'dark' || (!savedTheme && systemPrefersDark);

        if (shouldBeDark) {
            htmlElement.classList.add('dark');
        } else {
            htmlElement.classList.remove('dark');
        }

        updateButtonText(shouldBeDark);
    }

    // Initialize theme on page load
    applyTheme();

    // Toggle function for both buttons
    function toggleTheme() {
        const currentlyDark = htmlElement.classList.contains('dark');
        const newTheme = currentlyDark ? 'light' : 'dark';

        // Save user preference to localStorage (persists across sessions)
        localStorage.setItem('theme', newTheme);

        // Apply the new theme
        applyTheme();
    }

    // Attach event listeners to both desktop and mobile buttons
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleTheme);
    }
    if (toggleButtonMobile) {
        toggleButtonMobile.addEventListener('click', toggleTheme);
    }

    // Listen for system theme changes - only apply if no manual preference is saved
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (!localStorage.getItem('theme')) {
            applyTheme();
        }
    });
}
