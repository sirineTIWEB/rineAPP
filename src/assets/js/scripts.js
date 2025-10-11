// Embla Carousel initialization
document.addEventListener('DOMContentLoaded', () => {
    const emblaNode = document.querySelector('.embla');
    if (emblaNode && window.EmblaCarousel) {
        const emblaApi = window.EmblaCarousel(emblaNode, {
            align: 'center',
            loop: true,
            slidesToScroll: 1
        });

        // Previous button
        const prevBtn = document.querySelector('.embla__prev');
        const nextBtn = document.querySelector('.embla__next');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => emblaApi.scrollPrev());
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => emblaApi.scrollNext());
        }

        console.log('Embla Carousel initialized');
    }
});

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

        // Set the "All" button as active when page loads
        // aria-current="true" triggers CSS that widens the button and shows the description
        $('.filter-btns a[data-filter="*"]').attr('aria-current', 'true');

        // Handle filter button clicks
        $('.filter-btns').on('click', 'a', function(e) {
            e.preventDefault();

            // Step 1: Remove active state from ALL filter buttons
            // This resets all buttons to their narrow state (width defined in HTML classes)
            $('.filter-btns a').attr('aria-current', 'false');

            // Step 2: Add active state to the clicked button
            // aria-current="true" triggers the CSS rules that:
            // - Expand the button width (w-40 on mobile, w-52 on desktop)
            // - Show the description text (.texte becomes visible)
            $(this).attr('aria-current', 'true');

            // Step 3: Get the filter value from data-filter attribute
            // Examples: "*" (all), ".web-design" (specific category)
            var filterValue = $(this).attr('data-filter');

            // Step 4: Apply the filter using Isotope
            $grid.isotope({ filter: filterValue });

            // Step 5: Force Isotope to recalculate layout after a brief delay
            // This prevents visual glitches when items are filtered
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

// Hover effect for recent projects - scale down others when one is hovered
document.addEventListener('DOMContentLoaded', () => {
    const projectsContainer = document.querySelector('.flex.overflow-x-auto');

    if (projectsContainer) {
        const projectArticles = projectsContainer.querySelectorAll('.grid-item');

        projectArticles.forEach(article => {
            // Mouse enter - scale down and fade other cards
            article.addEventListener('mouseenter', () => {
                projectArticles.forEach(otherArticle => {
                    if (otherArticle !== article) {
                        otherArticle.classList.add('scale-90', 'opacity-60');
                    }
                });
            });

            // Mouse leave - reset all to normal
            article.addEventListener('mouseleave', () => {
                projectArticles.forEach(otherArticle => {
                    otherArticle.classList.remove('scale-90', 'opacity-60');
                });
            });
        });
    }
});