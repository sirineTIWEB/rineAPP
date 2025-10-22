// Isotope Filtering Module (requires jQuery)
export function initIsotopeFilter() {
    if (!jQuery || !jQuery('.grid').length) {
        return;
    }

    const $ = jQuery;

    const $grid = $('.grid').imagesLoaded(function() {
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
    $('.filter-btns a[data-filter="*"]').addClass('is-active').attr('aria-current', 'true');

    // Handle filter button clicks
    $('.filter-btns').on('click', 'a', function(e) {
        e.preventDefault();

        // Remove active state from all filter buttons
        $('.filter-btns a').removeClass('is-active').attr('aria-current', 'false');

        // Add active state to the clicked button
        $(this).addClass('is-active').attr('aria-current', 'true');

        // Get the filter value from data-filter attribute
        const filterValue = $(this).attr('data-filter');

        // Apply the filter using Isotope
        $grid.isotope({ filter: filterValue });

        // Force Isotope to recalculate layout
        setTimeout(function() {
            $grid.isotope();
        }, 50);
    });
}
