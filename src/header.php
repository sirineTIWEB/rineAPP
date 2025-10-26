<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINE</title>
    <link rel="stylesheet" href="https://use.typekit.net/imo5mqr.css" defer>
    <?php wp_head(); ?>
</head>
<?php
// Get active mood state for arrow color
$active_state = get_option('active_mood_state', 'blue');
?>
<body class="overflow-x-hidden bg-mybeige dark:bg-myblack drawer" data-theme-url="<?php echo get_template_directory_uri(); ?>/assets/icons/" data-mood-color="<?php echo esc_attr($active_state); ?>">
    <!-- Drawer toggle checkbox (hidden, controls sidebar) -->
    <input id="mobile-drawer" type="checkbox" class="drawer-toggle" />

    <!-- Main content area -->
    <div class="drawer-content">
        <!-- Fixed header/navbar -->
        <header class="flex justify-between items-start self-stretch fixed top-0 right-0 left-0 px-5 lg:px-10 py-5 z-50 bg-mybeige dark:bg-myblack">

            <!-- Burger menu button for mobile (opens drawer) -->
            <label for="mobile-drawer" class="visible lg:hidden cursor-pointer" aria-label="Open menu">
                <img class="burger-icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/burger.svg" alt="Toggle menu">
            </label>

            <!-- Desktop navigation menu -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'hidden deskmenu lg:flex rounded-2xl text-myblack dark:text-mybeige',
                'menu_class' => 'flex gap-8',
                'menu_id' => 'deskmenu',
                'walker' => new Custom_Walker_headNav_Menu(),
            ));
            ?>

            <!-- Logo -->
            <img class="dark:block hidden h-5 lg:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoB.svg" alt="-RINE">
            <img class="dark:hidden h-5 lg:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoW.svg" alt="-RINE">

            <!-- Contact & Dark mode buttons -->
            <ul class="flex lg:flex-row flex-col justify-center items-end gap-2.5 lg:gap-8 lg:justify-end lg:items-center flex-wrap">
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
        </header>

        <!-- Page content starts here (with padding for fixed header) -->
        <div class="lg:px-10 px-5 py-5 lg:py-5 ">