<?php get_header(); ?>

<footer class="relative border-t-2 border-mylightblue">
        <img class="absolute h-10 -top-4 sm:-top-6 left-3 sm:left-6 sm:h-16" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli1.svg" alt="gribouilli1">
        <nav class="h-fit flex justify-evenly px-8 sm:px-16 items-start sm:items-center w-full text-mydarkblue">
          <ul class="flex flex-col sm:flex-row order-2 sm:gap-2 sm:order-1">
            <li class="legend p-0 sm:p-2">Sirine El Alami</li>
            <li class="legend p-0 sm:p-2"><a href="mailto:microsoft@rine.ovh">mail</a></li>
            <li class="legend p-0 sm:p-2">
              <a href="https://www.linkedin.com/in/elalamisirine/" 
                target="_blank" 
                rel="noopener noreferrer"
                aria-label="LinkedIn (opens in new tab)">
                LinkedIn
              </a>
            </li>
            <li class="legend p-0 sm:p-2"><a href="">Charte Graphique</a></li>
          </ul>
          <img class="order-1 mt-2 sm:h-14 h-6 sm:order-2 sm:mb-3" src="<?php echo get_template_directory_uri(); ?>/assets/logo/jaunelong.svg" alt="-RINE">
          <ul class="flex flex-col sm:flex-row sm:gap-2 order-3">
            <li><a class="capitalize p-0 sm:p-2 legend" href="index.html">accueil</a></li>
            <li><a class="capitalize p-0 sm:p-2 legend" href="about.html">à propos</a></li>
            <li><a class="capitalize p-0 sm:p-2 legend" href="projects.html">portfolio</a></li>
            <li><a class="capitalize p-0 sm:p-2 legend" href="contact.html">contact</a></li>
          </ul>
        </nav>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>