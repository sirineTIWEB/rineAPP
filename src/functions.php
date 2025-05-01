<?php

function ajouter_style() {
    wp_enqueue_style( 'monstyle', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'ajouter_style', PHP_INT_MAX );

//activer image mise en avant
add_theme_support( 'post-thumbnails' );

//créer des propres tailles
add_image_size( 'images-moyennes', 312, 255, true );
add_image_size( 'images-grandes', 527, 390, true );

register_nav_menu( 'primary', __( 'Navigation Menu' ) );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item'; // tu peux ajouter d'autres classes ici pour <li>
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="' . esc_attr($item->url) . '"' : '';

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
