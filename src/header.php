<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINE</title>
    <link rel="stylesheet" href="https://use.typekit.net/imo5mqr.css">
    <link rel="stylesheet" href="CSS/output.css">
    <?php wp_head(); ?>
</head>
<body class="overflow-x-hidden">
    <header class="w-full flex justify-between items-center text-mydarkblue bg-myyellow py-5 px-8">
        <img class="sm:h-14 h-6" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBclair.svg" alt="-RINE">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mon-nav-classe',  // classe sur <nav>
            'menu_class' => 'gap-8 hidden sm:flex', // classe sur <ul>
            'menu_id' => 'navbar',                   // id sur <ul>
            'walker' => new Custom_Walker_Nav_Menu(), // classe personnalisée pour le menu
        ));
        ?>
        <img class="visible sm:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/burger.svg" alt="menu burger">
</header>