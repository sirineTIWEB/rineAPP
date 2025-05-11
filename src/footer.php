<?php get_header(); ?>

<footer class="relative border-t-2 border-mylightblue">
        <img class="absolute h-10 -top-4 md:-top-6 left-3 md:left-6 md:h-16" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli1.svg" alt="gribouilli1">
        <nav class="h-fit flex justify-evenly px-8 md:px-16 items-start md:items-center w-full text-mydarkblue dark:text-mybeige">
          <ul class="flex flex-col md:flex-row order-2 md:gap-2 md:order-1">
            <li class="legend p-0 md:p-2">Sirine El Alami</li>
            <li class="legend p-0 md:p-2"><a href="mailto:microsoft@rine.ovh">mail</a></li>
            <li class="legend p-0 md:p-2">
              <a href="https://www.linkedin.com/in/elalamisirine/" 
                target="_blank" 
                rel="noopener noreferrer"
                aria-label="LinkedIn (opens in new tab)">
                LinkedIn
              </a>
            </li>
            <li class="legend p-0 md:p-2"><a href=""><?php esc_html_e('Brand Style Guide', 'rine2'); ?></a></li>
          </ul>
          <img class="order-1 mt-2 md:h-14 h-6 md:order-2 md:mb-3" src="<?php echo get_template_directory_uri(); ?>/assets/logo/jaunelong.svg" alt="-RINE">
          <!-- <ul class="flex flex-col md:flex-row md:gap-2 order-3">
            <li><a class="capitalize p-0 md:p-2 legend" href="index.html">accueil</a></li>
            <li><a class="capitalize p-0 md:p-2 legend" href="about.html">à propos</a></li>
            <li><a class="capitalize p-0 md:p-2 legend" href="projects.html">portfolio</a></li>
            <li><a class="capitalize p-0 md:p-2 legend" href="contact.html">contact</a></li>
          </ul> -->
          <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'false',
                'menu_class' => 'flex flex-col md:flex-row md:gap-2 order-3', // classe sur <ul>
                'menu_id' => 'footmenu',                   // id sur <ul>
                'walker' => new Custom_Walker_footNav_Menu(), // classe personnalisée pour le menu
            ));
          ?>
        </nav>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>