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
    // Only run this code on the projects page where .grid exists
    if ($('.grid').length > 0) {
        var $grid = $('.grid').imagesLoaded(function() {
            $grid.isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 10
                }
            });
            $grid.isotope();
        });

        // state actif pour bouton tout
        $('.filter-btns a[data-filter="*"]').attr('aria-current', 'true');
        $('.filter-btns').removeClass('md:w-96 w-40').addClass('w-28 md:w-52');


        // Filter items on button click
        $('.filter-btns').on('click', 'a', function(e) {
            e.preventDefault();

            // retirer classes actif à tous

            $('.filter-btns a').attr('aria-current', 'false');


            $(this).attr('aria-current', 'true');
            $(this).removeClass('w-28 md:w-52').addClass('md:w-96 w-40');



            // recuperer la valeur et filtrer
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });

            $(this).attr('aria-current', 'true');

            // Fix: Force recalculation after each filter to prevent glitch
            setTimeout(function() {
                $grid.isotope();
            }, 50);
        });
    }
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
jQuery(document).ready(function($) {
    $('.filter-btns').on('keydown', '.filter-btn', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).click(); // Trigger the click handler
        }
    });
});

// Hover effect for recent projects - scale up hovered, scale down others
document.addEventListener('DOMContentLoaded', () => {
    const projectsContainer = document.querySelector('.flex.overflow-x-auto');

    if (projectsContainer) {
        const projectArticles = projectsContainer.querySelectorAll('article');

        projectArticles.forEach(article => {
            // Mouse enter - scale up current, scale down others
            article.addEventListener('mouseenter', () => {
                projectArticles.forEach(otherArticle => {
                    if (otherArticle !== article) {
                        otherArticle.classList.add('scale-90', 'opacity-70');
                    } else {
                        otherArticle.classList.add('scale-105');
                    }
                });
            });

            // Mouse leave - reset all to normal
            article.addEventListener('mouseleave', () => {
                projectArticles.forEach(otherArticle => {
                    otherArticle.classList.remove('scale-90', 'opacity-70', 'scale-105');
                });
            });
        });
    }
});