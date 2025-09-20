<?php
// enqueue style
function ajouter_style()
{
    wp_enqueue_style('monstyle', get_stylesheet_uri());

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

        // Ajoute ici tes classes sur les <a>
        $attributes .= ' class="capitalize p-2 legend"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
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
function slides_toolbox_scripts()
{
    wp_enqueue_script(
        'slidetoolbox', // Unique handle
        get_template_directory_uri() . '/assets/js/slideshow.js', // Path to JS file
        array(), // Dependencies, e.g. array('jquery')
        null, // Version number (null for no version)
        true // Load in header or footer (true for footer)
    );
}
add_action('wp_enqueue_scripts', 'slides_toolbox_scripts');

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

function enqueue_font_awesome_kit()
{
    wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/916225c0a4.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome_kit');
// Add icons


function get_time_ago_acf($date)
{
    // Convert ACF date format (Ymd or Y-m-d) to timestamp
    $timestamp = strtotime($date);
    $time_diff = time() - $timestamp;

    if ($time_diff < 60) {
        return intval($time_diff) . ' seconds ago';
    } elseif ($time_diff < 3600) {
        return intval($time_diff / 60) . ' minutes ago';
    } elseif ($time_diff < 86400) {
        return intval($time_diff / 3600) . ' hours ago';
    } elseif ($time_diff < 604800) {
        return intval($time_diff / 86400) . ' days ago';
    } elseif ($time_diff < 2592000) { // Less than 30 days
        return intval($time_diff / 604800) . ' weeks ago';
    } elseif ($time_diff < 31556926) { // Less than a year
        return intval($time_diff / 2592000) . ' months ago'; // 30 days per month
    } else {
        return intval($time_diff / 31556926) . ' years ago';
    }
}

// time expression