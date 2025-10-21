// Keyboard Support Module (requires jQuery)
export function initKeyboardSupport() {
    if (!jQuery) {
        return;
    }

    const $ = jQuery;

    $('.filter-btns').on('keydown', '.filter-btn', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).click();
        }
    });
}
