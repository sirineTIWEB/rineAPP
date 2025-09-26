// slide de la toolbox

let currentSlide = 0;
const enfants = document.querySelectorAll('.childslide');

document.addEventListener('DOMContentLoaded', () => {
    // Afficher uniquement le premier enfant de chaque section .parentslide
    document.querySelectorAll('.parentslide').forEach(section => {
        section.dataset.currentIndex = currentSlide; // Définir l'index initial
        showSlide(section, currentSlide);
    });
});

function showSlide(parentSection, index) {
    const enfants = parentSection.querySelectorAll('.childslide');
    enfants.forEach((enfant, i) => {
        if (i === index) {
            enfant.classList.remove('hidden');
            enfant.classList.add('block');  // optional, to explicitly show
          } else {
            enfant.classList.add('hidden');
            enfant.classList.remove('block');
          }

        enfant.classList.toggle('active', i === index);
    });
}

function showNext() {
    const button = event.currentTarget; // Récupérer le bouton cliqué
    const parentSection = button.closest('.parentslide');
    const currentIndex = parseInt(parentSection.dataset.currentIndex) || 0;
    const enfants = parentSection.querySelectorAll('.childslide');
    const nextIndex = (currentIndex + 1) % enfants.length;
    showSlide(parentSection, nextIndex);
    parentSection.dataset.currentIndex = nextIndex;
}

function showPrev() {
    const button = event.currentTarget; // Récupérer le bouton cliqué
    const parentSection = button.closest('.parentslide');
    const currentIndex = parseInt(parentSection.dataset.currentIndex) || 0;
    const enfants = parentSection.querySelectorAll('.childslide');
    const prevIndex = (currentIndex - 1 + enfants.length) % enfants.length;
    showSlide(parentSection, prevIndex);
    parentSection.dataset.currentIndex = prevIndex;
}


// Filtrage des projets
jQuery(document).ready(function($) {
    var $grid = $('.grid').imagesLoaded(function() {
        $grid.isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });
        $grid.isotope();
    });

    // Filter items on button click
    $('.filter-btns').on('click', 'button', function(e) {
        e.preventDefault(); //
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });

        $grid.isotope({ filter: filterValue });
        
        // Fix: Force recalculation after each filter to prevent glitch
        setTimeout(function() {
            $grid.isotope();
        }, 50);
    });
});

// menu burger 

// Burger menu functionality
document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById('burger');
    const mobileMenu = document.querySelector('.mobilemenu');
    
    if (burgerButton && mobileMenu) {
        // Fonction pour toggle le menu
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
        
        // Écouter BOTH click ET touch events
        burgerButton.addEventListener('click', toggleMenu);
        burgerButton.addEventListener('touchstart', function(e) {
            e.preventDefault(); // Évite le double déclenchement
            toggleMenu();
        });
    }
});

// Add keyboard support for div-based buttons
$('.filter-btns').on('keydown', '.filter-btn', function(e) {
    if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        $(this).click(); // Trigger the click handler
    }
});