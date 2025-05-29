document.addEventListener('DOMContentLoaded', () => {
    
    document.querySelectorAll('.parentslide').forEach(parentslide => {
        const children = parentslide.querySelectorAll('.childslide');
        const nextBtn = parentslide.querySelector('.next');
        const prevBtn = parentslide.querySelector('.prev');

        parentslide.currentIndex = 0;

        parentslide.showSlide = function(index) {
            children.forEach((child, i) => {
                child.style.display = (i === index) ? 'block' : 'none';
            });
        };

        parentslide.showSlide(parentslide.currentIndex);

        nextBtn?.addEventListener('click', () => {
            parentslide.currentIndex = (parentslide.currentIndex + 1) % children.length;
            parentslide.showSlide(parentslide.currentIndex);
        });
    
        prevBtn?.addEventListener('click', () => {
            parentslide.currentIndex = (parentslide.currentIndex - 1 + children.length) % children.length;
            parentslide.showSlide(parentslide.currentIndex);
        });
    });

});