<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINE</title>
    <link rel="stylesheet" href="https://use.typekit.net/imo5mqr.css" defer>
    <?php wp_head(); ?>
</head>
<body class="overflow-x-hidden mx-5 my-5 bg-mypink">
    <header class="w-[calc(100%-2.5rem)] fixed flex justify-between items-center text-mydarkgreen py-5 px-5 flex-wrap z-50 box-border">
        <img class="md:h-14 h-6 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBclair.svg" alt="-RINE">
        <img class="md:h-14 h-6 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBfonce.svg" alt="-RINE">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'bg-mypink hidden deskmenu md:flex py-3 px-2 rounded-2xl',  // classe sur <nav>
            'menu_class' => 'flex gap-8', // classe sur <ul>
            'menu_id' => 'deskmenu',                   // id sur <ul>
            'walker' => new Custom_Walker_headNav_Menu(), // classe personnalisée pour le menu
        ));
        ?>
        
        <button id="burger" aria-expanded="false" aria-controls="mobilemenu" class="visible md:hidden">
            <img class="dark:hidden visible" src="<?php echo get_template_directory_uri(); ?>/assets/icons/burger.svg" alt="Toggle menu">
            <img class="dark:block hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkburger.svg" alt="Toggle menu">
        </button>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'bg-mypink rounded-2xl mobilemenu overflow-hidden flex h-0 basis-full justify-center md:hidden my-4',  // classe sur <nav>
            'menu_class' => 'flex flex-col', // classe sur <ul>
            'menu_id' => 'mobilemenu',                   // id sur <ul>
            'walker' => new Custom_Walker_headNav_Menu(), // classe personnalisée pour le menu
        ));
        ?>
    </header>