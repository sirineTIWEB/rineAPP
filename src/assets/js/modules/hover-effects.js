// Hover Effects Module
export function initRecentProjectsHover() {
    const projectsContainer = document.querySelector('.projets');

    if (!projectsContainer) {
        return;
    }

    const projectCards = projectsContainer.querySelectorAll('a.group');

    projectCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            projectCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.opacity = '0.5';
                    otherCard.classList.add('scale-90');
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            projectCards.forEach(otherCard => {
                otherCard.style.opacity = '1';
                otherCard.classList.remove('scale-90');
            });
        });
    });
}

export function initProjectsGridHover() {
    const projectsGrid = document.querySelector('.grid');

    if (!projectsGrid) {
        return;
    }

    const projectCards = projectsGrid.querySelectorAll('a.grid-item');

    projectCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            projectCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.classList.add('scale-95');
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            projectCards.forEach(otherCard => {
                otherCard.classList.remove('scale-95');
            });
        });
    });
}
