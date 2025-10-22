<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINE</title>
    <link rel="stylesheet" href="https://use.typekit.net/imo5mqr.css" defer>
    <?php wp_head(); ?>
</head>
<body class="overflow-x-hidden px-10 py-5 bg-mybeige dark:bg-myblack">
    <header class="flex justify-between items-center self-stretch fixed md:top-10 top-20 left-20 md:left-10 right-20 md:right-10 z-50">
        
        <button id="burger" aria-expanded="false" aria-controls="mobilemenu" class="visible md:hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/burger.svg" alt="Toggle menu">
        </button>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'hidden deskmenu md:flex rounded-2xl text-myblack dark:text-mybeige',  // classe sur <nav>
            'menu_class' => 'flex gap-8', // classe sur <ul>
            'menu_id' => 'deskmenu',                   // id sur <ul>
            'walker' => new Custom_Walker_headNav_Menu(), // classe personnalisée pour le menu
        ));
        ?>

        <img class="dark:hidden h-5 md:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoB.svg" alt="-RINE">
        <img class="hidden dark:block h-5 md:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoW.svg" alt="-RINE">
        
        <ul class="flex md:flex-row flex-col justify-center items-end gap-2.5 md:gap-8 md:justify-end md:items-center ">
            <li>
                <a href="#contact" class="bouton border dark:border-mybeige border-myblack">
                    <?php esc_html_e('contact me', 'rine2'); ?>
                </a>
            </li>
            <li>
                <button id="darkModeToggle" class="cursor-pointer bouton border dark:border-mybeige border-myblack" aria-label="<?php esc_attr_e('Toggle dark mode', 'rine2'); ?>">
                    <span class="highlight" id="modeText">dark:</span> <?php esc_html_e('mode', 'rine2'); ?>
                </button>
            </li>
        </ul>
        
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mobilemenu overflow-hidden flex h-0 basis-full justify-center md:hidden my-4',  // classe sur <nav>
            'menu_class' => 'flex flex-col', // classe sur <ul>
            'menu_id' => 'mobilemenu',                   // id sur <ul>
            'walker' => new Custom_Walker_headNav_Menu(), // classe personnalisée pour le menu
        ));
        ?>
    </header>