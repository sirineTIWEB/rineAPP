// Burger Menu Module
export function initBurgerMenu() {
    const burgerButton = document.getElementById('burger');
    const mobileMenu = document.querySelector('.mobilemenu');

    if (!burgerButton || !mobileMenu) {
        return;
    }

    function toggleMenu() {
        const isHidden = mobileMenu.classList.contains('h-0');

        if (isHidden) {
            mobileMenu.classList.remove('h-0');
            mobileMenu.classList.add('h-auto');
            burgerButton.setAttribute('aria-expanded', 'true');
        } else {
            mobileMenu.classList.remove('h-auto');
            mobileMenu.classList.add('h-0');
            burgerButton.setAttribute('aria-expanded', 'false');
        }
    }

    // Listen to both click and touch events
    burgerButton.addEventListener('click', toggleMenu);
    burgerButton.addEventListener('touchstart', function(e) {
        e.preventDefault();
        toggleMenu();
    });
}
