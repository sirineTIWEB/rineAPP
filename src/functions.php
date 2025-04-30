<?php
function mon_theme_scripts() {
    // Ajouter la feuille de style principale
    wp_enqueue_style('mon-style', get_stylesheet_uri());

    // Ajouter GSAP via un CDN (si tu veux utiliser GSAP directement à partir du CDN)
    wp_enqueue_script('gsap-cdn', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), null, true);
    
    // Ajouter des scripts JS si nécessaire
    wp_enqueue_script('animejs', get_template_directory_uri() . '/assets/js/animGSAP.js', array(), null, true);
    // wp_enqueue_script('mon-custom-script', get_template_directory_uri() . '/js/custom.js', array('animejs'), null, true);
}

add_action('wp_enqueue_scripts', 'mon_theme_scripts');
