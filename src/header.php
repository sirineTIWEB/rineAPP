<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINE</title>
    <link rel="stylesheet" href="https://use.typekit.net/imo5mqr.css" defer>
    <link rel="stylesheet" href="CSS/output.css">
    <?php wp_head(); ?>
</head>
<body class="overflow-x-hidden bg-mybeige dark:bg-mydarkblue">
    <header class="w-full flex justify-between items-center text-mydarkblue bg-myyellow dark:bg-mylightblue py-5 px-8 flex-wrap">
        <img class="md:h-14 h-6 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBclair.svg" alt="-RINE">
        <img class="md:h-14 h-6 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBfonce.svg" alt="-RINE">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'hidden deskmenu md:flex',  // classe sur <nav>
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
            'container_class' => 'mobilemenu overflow-hidden flex h-0 w-full justify-center md:hidden my-4',  // classe sur <nav>
            'menu_class' => 'flex flex-col', // classe sur <ul>
            'menu_id' => 'mobilemenu',                   // id sur <ul>
            'walker' => new Custom_Walker_headNav_Menu(), // classe personnalisée pour le menu
        ));
        ?>
    </header>