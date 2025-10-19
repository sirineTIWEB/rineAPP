<?php
get_header();
?>

<section id="contact"
  class="flex flex-col justify-evenly bg-mybeige dark:bg-mydarkgreen text-mydarkgreen dark:text-mybeige my-10 items-center h-[60vh]">
  <div>
    <img class="md:h-14 h-6 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBclair.svg" alt="-RINE">
    <img class="md:h-14 h-6 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBfonce.svg" alt="-RINE">
    <h1 class="titre"><?php esc_html_e('Signed, RINE.', 'rine2'); ?></h1>
  </div>
  <div class="flex flex-col items-center justify-evenly md:flex-row">
    <div class="flex flex-col md:justify-center items-start md:w-1/2 pl-5 md:pl-15">
      <h1 class="text-3xl md:text-6xl font-family-aqva uppercase ">
        <?php esc_html_e('get in touch with me!', 'rine2'); ?>
      </h1>
      <p class="font-bold condensed texte md:w-1/2 w-2/3">
        <?php esc_html_e('Got a project or question in mind? Reach out — every message is reviewed and answered as quickly as possible.', 'rine2'); ?>
      </p>
    </div>
    <div class="border-l-2 border-mydarkgreen dark:border-mybeige flex px-10 pl-4 flex-col justify-center md:w-1/2 h-fit">
      <!-- le ONSUBMIT c pour qu'il commence d'abord par JS puis php -->
      <form id="contactForm" method="post" action="">
        <input type="text" name="name" id="name" placeholder="<?php esc_html_e('Your Fullname', 'rine2'); ?>"
          class="capitalize input mr-4 md:mr-7 w-1/3" required>
        <input type="email" name="email" id="email" placeholder="<?php esc_html_e('Your Mail', 'rine2'); ?>"
          class="input mr-4 md:mr-7 w-1/2" required>
        <input type="text" name="business" id="business" placeholder="<?php esc_html_e('Business Name', 'rine2'); ?>"
          class="input mr-4 md:mr-7 w-1/3">
        <div class="flex flex-wrap items-end gap-2 md:gap-4 w-1/3">
          <select id="socialNetwork" name="socialNetwork" class="rounded-none capitalize input flex-shrink-0 w-auto">
            <option value="" disabled selected hidden><?php esc_html_e('Select', 'rine2'); ?></option>
            <option value="facebook">Facebook</option>
            <option value="twitter">Twitter</option>
            <option value="instagram">Instagram</option>
            <option value="linkedin">LinkedIn</option>
            <option value="web">Web link</option>
          </select>
          <input type="text" name="socialName" id="socialName"
            placeholder="<?php esc_html_e('Social Username', 'rine2'); ?>"
            class="input flex-1 min-w-0 md:mr-7">
        </div>
        <textarea name="content" id="content" placeholder="<?php esc_html_e('Your Message', 'rine2'); ?>"
          class="rounded-none input mr-4 md:mr-7 max-h-max w-[95%]" required></textarea>
        <button type="submit" name="sending" value="send">
          <img class="h-16 md:h-auto hover:scale-110 transition-all duration-300 dark:hidden"
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/send.svg" alt="send button">
          <img class="h-16 md:h-auto hover:scale-110 transition-all duration-300 hidden dark:block"
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/darksend.svg" alt="send button">
        </button>
        <?php wp_nonce_field('contact_form_nonce_action', 'contact_form_nonce_field'); ?>
        <!-- sécurité contre hacker -->
      </form>
    </div>
  </div>
</section>


<footer class="relative bg-mybeige dark:bg-mydarkgreen rounded-3xl">
  <img class="absolute h-10 -top-4 md:-top-6 left-3 md:left-6 md:h-16"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli1.svg" alt="gribouilli1">
  <nav
    class="h-fit flex justify-evenly px-8 md:px-16 items-start md:items-center w-full text-mydarkgreen dark:text-mybeige">
    <ul class="flex flex-col md:flex-row order-2 md:gap-2 md:order-1">
      <li class="legend p-0 md:p-2">Sirine El Alami</li>
      <li class="legend p-0 md:p-2"><a href="mailto:microsoft@rine.ovh">mail</a></li>
      <li class="legend p-0 md:p-2">
        <a href="https://www.linkedin.com/in/elalamisirine/" target="_blank" rel="noopener noreferrer"
          aria-label="LinkedIn (opens in new tab)">
          LinkedIn
        </a>
      </li>
      <li class="legend p-0 md:p-2"><a href=""><?php esc_html_e('Brand Style Guide', 'rine2'); ?></a></li>
    </ul>
    <img class="order-1 mt-2 md:h-14 h-6 md:order-2 md:mb-3"
      src="<?php echo get_template_directory_uri(); ?>/assets/logo/jaunelong.svg" alt="-RINE">
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