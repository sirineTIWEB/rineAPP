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

document.querySelectorAll('.category-filter').forEach(button => {
    button.addEventListener('click', function() {
        const filter = this.getAttribute('data-filter');
        document.querySelectorAll('.project-card').forEach(card => {
            if (!filter || card.getAttribute('data-filter') === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
