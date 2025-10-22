<?php
// enqueue style
function ajouter_style()
{
    wp_enqueue_style('monstyle', get_stylesheet_uri());
    // Add Tailwind CSS output
    wp_enqueue_style('tailwind-output', get_template_directory_uri() . '/CSS/output.css', array(), null);
    // Add DaisyUI
    wp_enqueue_style('daisyui', 'https://cdn.jsdelivr.net/npm/daisyui@5', array(), null);
    // Add Tailwind CSS browser script
    wp_enqueue_script('tailwind-browser', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array(), null, false);
}
add_action('wp_enqueue_scripts', 'ajouter_style', PHP_INT_MAX);

//activer image mise en avant
add_theme_support('post-thumbnails');

//créer des propres tailles
add_image_size('images-moyennes', 312, 255, true);
add_image_size('images-grandes', 527, 390, true);

register_nav_menu('primary', __('Navigation Menu'));

// personnalise li menu
class Custom_Walker_headNav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item'; // tu peux ajouter d'autres classes ici pour <li>
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Ajoute ici tes classes sur les <a> - add hover-circle class for desktop menu
        $attributes .= ' class="capitalize p-2 legend hover-circle"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        // Add SVG circle for hover effect (same as footer button)
        $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="97" height="44" viewBox="0 0 97 44" fill="none">
            <path d="M37.3038 5.83112C36.584 5.66503 35.8643 5.49894 33.1406 5.33034C30.4169 5.16173 25.711 4.99564 22.3179 5.04849C18.9247 5.10133 16.987 5.37815 14.9646 5.9083C10.8293 6.9923 7.67589 8.84257 5.5553 10.8759C3.14119 13.1907 2.52205 16.4995 2.15883 19.0102C1.81405 21.3934 2.07075 23.7706 2.54386 26.0858C3.02056 28.4186 4.13765 30.1508 5.44457 31.7387C7.4457 34.1701 10.2276 35.5211 13.2039 36.8297C15.209 37.7113 18.3392 38.7473 21.7357 39.6222C25.1322 40.4971 28.7308 41.1061 34.2109 41.4752C39.6911 41.8443 46.9437 41.955 51.981 41.8736C57.0182 41.7922 59.6203 41.5154 61.1822 41.3728C62.7441 41.2302 63.187 41.2302 65.2976 40.9811C67.4081 40.7319 71.1728 40.2337 75.2714 39.1742C79.37 38.1148 83.6883 36.5092 86.2728 35.3776C91.1514 33.2416 92.6572 29.8388 93.8106 26.9808C94.4705 25.3457 94.2342 23.2337 93.8727 20.9756C93.4594 18.3943 92.5028 16.3519 91.3629 14.4863C89.587 11.5801 87.0286 9.41802 85.0489 7.91145C83.0119 6.36124 80.4336 5.22213 77.9221 4.161C76.7557 3.66818 75.7428 3.43204 73.3194 3.06798C70.896 2.70393 67.0759 2.26102 63.1426 2.08822C59.2092 1.91542 55.2784 2.02614 52.3677 2.16623C49.4569 2.30632 47.6853 2.47241 45.8599 2.64353" stroke="#092EFF" stroke-width="4" stroke-linecap="round"/>
        </svg>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// personnalise li menu footer
class Custom_Walker_footNav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item'; // tu peux ajouter d'autres classes ici pour <li>
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Ajoute ici tes classes sur les <a>
        $attributes .= ' class="capitalize p-0 sm:p-2 legend"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// enqueue js
function dynamic_scripts()
{
    // Enqueue main.js as a module
    wp_enqueue_script(
        'main-module', // Unique handle
        get_template_directory_uri() . '/assets/js/main.js', // Path to main JS file
        array('jquery'), // Dependencies - jQuery is required
        null, // Version number (null for no version)
        true // Load in footer
    );

    // Add type="module" attribute to the script tag
    add_filter('script_loader_tag', function($tag, $handle) {
        if ('main-module' === $handle) {
            $tag = str_replace('<script ', '<script type="module" ', $tag);
        }
        return $tag;
    }, 10, 2);
}
add_action('wp_enqueue_scripts', 'dynamic_scripts');

// contact form
function handle_contact_form_submission()
{
    // recup mon bouton
    if (isset($_POST['sending'])) {

        // Verify nonce for security contre hacker etc. que ce form vient de moi et pas exeterieur
        if (!isset($_POST['contact_form_nonce_field']) || !wp_verify_nonce($_POST['contact_form_nonce_field'], 'contact_form_nonce_action')) {
            wp_die('Security check failed.');
        }

        // Sanitize inputs
        $name = sanitize_text_field($_POST['name']);
        $name = ucwords(strtolower($name)); // Capitalize first letter of each word
        $email = sanitize_email($_POST['email']);
        $business = sanitize_text_field($_POST['business']);
        $social_network = sanitize_text_field($_POST['socialNetwork']);
        $social_name = sanitize_text_field($_POST['socialName']);
        $message = sanitize_textarea_field($_POST['content']);

        // Validate required fields
        if (empty($name) || empty($email) || !is_email($email) || empty($social_network) || empty($social_name) || empty($message)) {
            wp_die('Please fill in all required fields correctly.');
        }

        // Prepare email
        $to = get_option('admin_email');
        $subject = $name . ' want to get in contact!';
        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $name . ' <' . $email . '>'
        ];


        // Map social networks to URL patterns
        $social_urls = [
            'facebook' => 'https://facebook.com/%s',
            'twitter' => 'https://twitter.com/%s',
            'instagram' => 'https://instagram.com/%s',
            'linkedin' => 'https://linkedin.com/in/%s',
            'web' => '%s' // For custom URLs, use as-is
        ];

        // Build the social profile URL safely
        if (array_key_exists($social_network, $social_urls)) {
            // Remove leading @ from username if present
            $social_profile_url = sprintf($social_urls[$social_network], ltrim($social_name, '@'));
        } else {
            // Fallback to plain text if unknown network
            $social_profile_url = esc_html($social_name);
        }

        $body = '<h2>Someone is a little curious about Rine..</h2>';
        $body .= '<p style="margin-bottom:0;">Résumé: </p>';
        $body .= '<p style="margin:0;">Name:' . esc_html($name) . '</p>';
        $body .= '<p style="margin-top:0;">Email:' . esc_html($email) . '</p>';
        $body .= '<p style="margin:0;"><strong>Business:</strong> ' . esc_html($business) . '</p>';
        $body .= '<p style="margin-top:0;">Social Profile: <a href="' . esc_url($social_profile_url) . '" target="_blank" rel="noopener noreferrer">' . esc_html($social_profile_url) . '</a></p>';
        $body .= '<p style="margin:0;"><strong>Message:</strong><br>' . nl2br(esc_html($message)) . '</p>';

        // Send email
        $sent = wp_mail($to, $subject, $body, $headers);

        if ($sent) {
            wp_redirect(add_query_arg('contact_form', 'success', wp_get_referer()));
            exit;
        } else {
            wp_die('Failed to send email.');
        }
    }
}
add_action('init', 'handle_contact_form_submission');

// Add icons
function enqueue_font_awesome_kit()
{
    wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/916225c0a4.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome_kit');



// time expression

function get_time_ago_acf( $date ) {
    $timestamp = is_string( $date ) ? strtotime( $date ) : 0;
    if ( ! $timestamp ) {
        return esc_html( $date );
    }

    $now       = time();
    $time_diff = max( 0, $now - $timestamp );

    if ( $time_diff < 60 ) {
        $count = max( 1, (int) $time_diff );
        $text  = _n( '%s second ago', '%s seconds ago', $count, 'rine2' );
    } elseif ( $time_diff < 3600 ) {
        $count = max( 1, (int) floor( $time_diff / 60 ) );
        $text  = _n( '%s minute ago', '%s minutes ago', $count, 'rine2' );
    } elseif ( $time_diff < 86400 ) {
        $count = max( 1, (int) floor( $time_diff / 3600 ) );
        $text  = _n( '%s hour ago', '%s hours ago', $count, 'rine2' );
    } elseif ( $time_diff < 604800 ) {
        $count = max( 1, (int) floor( $time_diff / 86400 ) );
        $text  = _n( '%s day ago', '%s days ago', $count, 'rine2' );
    } elseif ( $time_diff < 2592000 ) {
        $count = max( 1, (int) floor( $time_diff / 604800 ) );
        $text  = _n( '%s week ago', '%s weeks ago', $count, 'rine2' );
    } elseif ( $time_diff < 31556926 ) {
        $count = max( 1, (int) floor( $time_diff / 2592000 ) );
        $text  = _n( '%s month ago', '%s months ago', $count, 'rine2' );
    } else {
        $count = max( 1, (int) floor( $time_diff / 31556926 ) );
        $text  = _n( '%s year ago', '%s years ago', $count, 'rine2' );
    }

    // Keep the placeholder for translators and inject a locale-formatted number.
    $formatted = sprintf( $text, number_format_i18n( $count ) );
    return esc_html( $formatted );
}


function rine2_register_time_strings() {
    __( '%s second ago', 'rine2' );
    __( '%s seconds ago', 'rine2' );
    __( '%s minute ago', 'rine2' );
    __( '%s minutes ago', 'rine2' );
    __( '%s hour ago', 'rine2' );
    __( '%s hours ago', 'rine2' );
    __( '%s day ago', 'rine2' );
    __( '%s days ago', 'rine2' );
    __( '%s week ago', 'rine2' );
    __( '%s weeks ago', 'rine2' );
    __( '%s month ago', 'rine2' );
    __( '%s months ago', 'rine2' );
    __( '%s year ago', 'rine2' );
    __( '%s years ago', 'rine2' );
}
add_action( 'init', 'rine2_register_time_strings' );


function enqueue_isotope_assets() {
    // Fix: Use the actual Template Name from the header

    if ( is_page_template('projects.php') || is_page_template('Portfolio') ) {
        // array means it needs to load first before loading
        wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery', 'imagesloaded'), null, true);
        // Add your custom scripts.js file
        wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery', 'imagesloaded', 'isotope'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_isotope_assets');

// Embla Carousel
function enqueue_embla_carousel() {
    wp_enqueue_script(
        'embla-carousel',
        'https://unpkg.com/embla-carousel@8.6.0/embla-carousel.umd.js',
        array(),
        '8.6.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_embla_carousel');
