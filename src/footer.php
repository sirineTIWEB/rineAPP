<?php
get_header();

// Get active mood color for footer SVG
$active_state = get_option('active_mood_state', 'blue');
$mood_colors = array('green' => '#23F80B', 'blue' => '#092EFF', 'purple' => '#B606FC');
$active_color = isset($mood_colors[$active_state]) ? $mood_colors[$active_state] : '#092EFF';
?>

<footer class="flex lg:flex-row flex-col my-10 gap-14">
  <section id="contact" class="bg-myblack text-mybeige dark:border-2 dark:border-mybeige w-full rounded-3xl p-10 lg:p-20 lg:w-2/3">
    <h1 class="titre">
      <span class="highlight">// </span><?php esc_html_e('get in touch with me!', 'rine2'); ?>
    </h1>
    <p class="soustitre">
      <?php esc_html_e('something on your mind? reach out to me!', 'rine2'); ?>
    </p>
    <div>
      <!-- le ONSUBMIT c pour qu'il commence d'abord par JS puis php -->
      <form id="contactForm" method="post" action="">
        <div class="input-wrapper">
          <input type="text" name="name" id="name" placeholder="<?php esc_html_e('Your Fullname', 'rine2'); ?>" class=""
            required>
        </div>
        <div class="input-wrapper">
          <input type="email" name="email" id="email" placeholder="<?php esc_html_e('Your Mail', 'rine2'); ?>" class=""
            required>
        </div>
        <div class="input-wrapper">
          <input type="text" name="business" id="business" placeholder="<?php esc_html_e('Business Name', 'rine2'); ?>"
            class="">
        </div>
        <div class="social-checkboxes">
          <p class="texte mb-2"><span
              class="texte highlight">$ </span><?php esc_html_e('Select social network', 'rine2'); ?></p>
          <div class="flex flex-wrap gap-y-2 gap-x-4">
            <label class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity">
              <input type="radio" name="socialNetwork" value="facebook">
              <span class="texte">Facebook</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity">
              <input type="radio" name="socialNetwork" value="instagram">
              <span class="texte">Instagram</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity">
              <input type="radio" name="socialNetwork" value="linkedin">
              <span class="texte">LinkedIn</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity">
              <input type="radio" name="socialNetwork" value="web">
              <span class="texte">Web Link</span>
            </label>
          </div>
        </div>
        <div class="social-username-wrapper">
          <input type="text" name="socialName" id="socialName"
            placeholder="<?php esc_html_e('Social Username', 'rine2'); ?>" class="texte">
        </div>
        <div class="textarea-wrapper">
          <textarea name="content" id="content"
            placeholder="<?php esc_html_e('< tell me more about your though > ', 'rine2'); ?>" class=""
            required></textarea>
        </div>
        <button type="submit" name="sending" value="send" class="legend-text uppercase px-5 py-3 hover-circle dark:text-mybeige text-mybeige mt-4">
          <?php esc_html_e('send', 'rine2'); ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="97" height="44" viewBox="0 0 97 44" fill="none">
            <path
              d="M37.3038 5.83112C36.584 5.66503 35.8643 5.49894 33.1406 5.33034C30.4169 5.16173 25.711 4.99564 22.3179 5.04849C18.9247 5.10133 16.987 5.37815 14.9646 5.9083C10.8293 6.9923 7.67589 8.84257 5.5553 10.8759C3.14119 13.1907 2.52205 16.4995 2.15883 19.0102C1.81405 21.3934 2.07075 23.7706 2.54386 26.0858C3.02056 28.4186 4.13765 30.1508 5.44457 31.7387C7.4457 34.1701 10.2276 35.5211 13.2039 36.8297C15.209 37.7113 18.3392 38.7473 21.7357 39.6222C25.1322 40.4971 28.7308 41.1061 34.2109 41.4752C39.6911 41.8443 46.9437 41.955 51.981 41.8736C57.0182 41.7922 59.6203 41.5154 61.1822 41.3728C62.7441 41.2302 63.187 41.2302 65.2976 40.9811C67.4081 40.7319 71.1728 40.2337 75.2714 39.1742C79.37 38.1148 83.6883 36.5092 86.2728 35.3776C91.1514 33.2416 92.6572 29.8388 93.8106 26.9808C94.4705 25.3457 94.2342 23.2337 93.8727 20.9756C93.4594 18.3943 92.5028 16.3519 91.3629 14.4863C89.587 11.5801 87.0286 9.41802 85.0489 7.91145C83.0119 6.36124 80.4336 5.22213 77.9221 4.161C76.7557 3.66818 75.7428 3.43204 73.3194 3.06798C70.896 2.70393 67.0759 2.26102 63.1426 2.08822C59.2092 1.91542 55.2784 2.02614 52.3677 2.16623C49.4569 2.30632 47.6853 2.47241 45.8599 2.64353"
              stroke="<?php echo esc_attr($active_color); ?>" stroke-width="4" stroke-linecap="round" />
          </svg>
        </button>
        <?php wp_nonce_field('contact_form_nonce_action', 'contact_form_nonce_field'); ?>
        <!-- sécurité contre hacker -->
      </form>
    </div>
  </section>

  <section class="flex flex-col text-myblack dark:text-mybeige justify-between items-start self-stretch md:gap-0 gap-8 lg:w-1/3">
    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoB.svg" alt="logo" class="dark:hidden">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoW.svg" alt="logo" class="dark:block hidden">
    </div>
    <div class="flex flex-col gap-3">
      <h1 class="soustitre"><?php esc_html_e('Location', 'rine2'); ?></h1>
      <ul>
        <li>
          <a href="https://www.google.com/maps/place/Francisco+Ferrer+University+College+-+Waterside+Campus/@50.8632,4.3521,17z"
             target="_blank"
             rel="noopener noreferrer"
             aria-label="<?php esc_attr_e('View on Google Maps (opens in new tab)', 'rine2'); ?>"
             class="small-text flex items-start gap-3 hover:opacity-80 transition-opacity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/maps.svg"
                 alt="location icon"
                 class="footer-icon-maps w-10 h-10 flex-shrink-0">
            <span>
              <?php esc_html_e('Francisco Ferrer University College', 'rine2'); ?><br>
              <?php esc_html_e('Waterside Campus', 'rine2'); ?><br>
              <?php esc_html_e('33 Quai de Willebroeck', 'rine2'); ?><br>
              <?php esc_html_e('1000 Brussels', 'rine2'); ?><br>
              <?php esc_html_e('Belgium', 'rine2'); ?>
            </span>
          </a>
        </li>
      </ul>

    </div>
    <div class="flex flex-col gap-3">
      <h1 class="soustitre"><?php esc_html_e('Stay Connected', 'rine2'); ?></h1>
      <ul class="flex flex-col gap-1.5">
        <li>
          <a href="https://www.linkedin.com/in/elalamisirine/"
             target="_blank"
             rel="noopener noreferrer"
             aria-label="LinkedIn (opens in new tab)"
             class="small-text flex items-center gap-1.5 hover:opacity-80 transition-opacity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin.svg"
                 alt="LinkedIn icon"
                 class="footer-icon-linkedin w-10 h-10 flex-shrink-0">
            <span>LinkedIn</span>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/elalamisirine/"
             target="_blank"
             rel="noopener noreferrer"
             aria-label="Instagram (opens in new tab)"
             class="small-text flex items-center gap-1.5 hover:opacity-80 transition-opacity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/insta.svg"
                 alt="Instagram icon"
                 class="footer-icon-insta w-10 h-10 flex-shrink-0">
            <span>Instagram</span>
          </a>
        </li>
        <li class="small-text flex items-center gap-1.5 opacity-60">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tiktok.svg"
               alt="Tiktok icon"
               class="footer-icon-tiktok w-10 h-10 flex-shrink-0">
          <span>Tiktok <?php esc_html_e('(soon)', 'rine2'); ?></span>
        </li>
      </ul>
    </div>
    <div class="flex flex-col gap-3">
      <h1 class="soustitre">Navigation</h1>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'false',
        'menu_class' => 'flex flex-col gap-1', // classe sur <ul>
        'menu_id' => 'footmenu',                   // id sur <ul>
        'walker' => new Custom_Walker_footNav_Menu(), // classe personnalisée pour le menu
      ));
      ?>
    </div>


  </section>

</footer>

        </div><!-- Close pt-20 px-10 py-5 div -->
    </div><!-- Close drawer-content -->

    <!-- Mobile sidebar drawer -->
    <div class="drawer-side z-50">
        <!-- Overlay - clicking it closes the drawer -->
        <label for="mobile-drawer" aria-label="close sidebar" class="drawer-overlay"></label>

        <!-- Sidebar content -->
        <div class="min-h-full w-80 bg-mybeige dark:bg-myblack p-10">
            <!-- Close button row - full width -->
            <div class="flex justify-end items-center w-full mb-8">
                <label for="mobile-drawer" aria-label="close sidebar" class="cursor-pointer hover:opacity-70 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M6 6.5L26.5 25.5" stroke="<?php echo esc_attr($active_color); ?>" stroke-width="3" stroke-linecap="round"/>
                        <path d="M26 6L5.5 26" stroke="<?php echo esc_attr($active_color); ?>" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                </label>
            </div>

            <!-- Logo in sidebar -->
            <div class="mb-8 flex justify-center">
                <img class="dark:hidden h-5 lg:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoB.svg" alt="-RINE">
                <img class="hidden dark:block h-5 lg:h-auto w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/logo/logoW.svg" alt="-RINE">
            </div>

            <!-- Mobile navigation menu -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'text-myblack dark:text-mybeige',
                'menu_class' => 'flex flex-col items-center gap-4',
                'menu_id' => 'mobilemenu',
                'walker' => new Custom_Walker_headNav_Menu(),
            ));
            ?>

            <!-- Contact & Dark mode buttons in sidebar -->
            <ul class="flex flex-col items-center gap-4 mt-8">
                <li>
                    <a href="#contact" class="bouton border dark:border-mybeige border-myblack w-full text-center">
                        <?php esc_html_e('contact me', 'rine2'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

<?php wp_footer(); ?>
</body>

</html>