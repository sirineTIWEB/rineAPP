<?php get_header(); ?>

<section class="bg-myyellow dark:bg-mylightblue w-full box-border relative pb-16 mb-36 md:mb-60">
  <div
    class="flex flex-col justify-end pb-5 px-2 md:px-12 md:pb-32 h-[487px] md:h-[80vh] mx-4 md:mx-8 bg-moiPC bg-cover bg-center bg-no-repeat rounded-3xl">
    <h1 class="titre dark:text-myyellow text-mydarkblue"><?php esc_html_e('Welcome to my portfolio', 'rine2'); ?></h1>
    <h2 class="font-bold condensed texte text-mybeige max-w-52 md:max-w-none">
      <?php esc_html_e('Discover all projects I’ve done during my academic and free times.', 'rine2'); ?>
    </h2>
    <a href="<?php echo esc_url(site_url('/portfolio')); ?>"
      class="bouton dark:text-mybeige text-mydarkblue border-mydarkblue dark:border-mybeige"><?php esc_html_e('explore my projects', 'rine2'); ?>
    </a>
  </div>
  <!-- <img class="h-20 absolute bottom-[-5%] right-[7%] md:h-36 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli1.svg" alt="gribouilli1">
        <img class="h-20 absolute bottom-[-5%] right-[7%] md:h-36 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkaccueil.svg" alt="gribouilli1"> -->
</section>
<section class="relative flex flex-col items-center mb-16 md:mb-52">
  <h1 class="titre text-mydarkblue dark:text-mylightblue mb-6 md:mb-8"><?php esc_html_e('RECENT PROJECTS', 'rine2'); ?>
  </h1>
  <div class="flex overflow-x-auto overflow-y-hidden max-w-full pl-6 md:pl-12 pb-3">

  <?php
    $today = date('Ymd');
    $last_year = date('Ymd', strtotime('-1 year'));
    // 1) définir les arguments/filtres de la requête
    $args = array(
      'post_type' => 'project',
      'meta_query' => array(
        array(
          'key' => 'date', // Set to your ACF date field name
          'value' => array($last_year, $today),
          'compare' => 'BETWEEN',
          'type' => 'DATE'
        ),
      ),
      'orderby' => 'date',
      'order' => 'DESC',
    );

    // 2) exécuter la requête et lancer la boucle
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post();
        ?>

        <article
          style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/mockups/rine.png')"
          class="group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] md:h-[455px] md:hover:w-96">
          <!-- Overlay pour étendre la zone cliquable -->
          <div class="absolute inset-0 z-10"></div>

          <!-- Détails du projet -->
          <div
          
            class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
            <h2 class="soustitre text-mylightblue text-end "><?php the_title(); ?></h2>
            <div class="flex justify-end">
              <p class="texte font-bold lowercase text-mylightblue text-end ">
                <?php echo wp_kses_post(get_field('pr_category')); ?></p>
              <p class="texte font-bold lowercase text-mylightblue text-end "><?php $acf_date = get_field('date'); // Replace with your field name
                  echo get_time_ago_acf($acf_date);
                  ?></p>
            </div>
          </div>
        </article>

        <?php
      } // end while
    } // end if
    wp_reset_query(); ?>

  </div>
  <img class="h-24 absolute md:top-[-7%] top-[-3%] left-[2%] md:h-40 dark:block"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli2.svg" alt="gribouilli2">
  <img class="h-24 absolute md:top-[-7%] top-[-3%] left-[2%] md:h-40 hidden dark:block"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkworm.svg" alt="gribouilli2">
</section>
<section class="relative bg-mylightblue px-6">
  <h1 class="titre text-myyellow py-6"><?php esc_html_e('services', 'rine2'); ?></h1>
  <div class="z-10 md:z-0 flex justify-center flex-wrap gap-6 md:gap-20 w-full pb-14 md:pb-16">
    <?php
    // 1) définir les arguments/filtres de la requête
    $args = array(
      'post_type' => 'services'
    );

    // 2) exécuter la requête et lancer la boucle
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post();
        ?>

        <article
          class="group w-96 md:w-5/12 h-32 md:h-52 bg-mybeige dark:bg-mydarkblue hover:h-52 md:hover:h-60 active:h-52 rounded-3xl px-6 py-6 flex flex-col justify-end items-end text-mydarkblue dark:text-mybeige duration-300 ease-in-out transition-all">
          <h2 class="texte font-bold text-end"><?php the_title(); ?></h2>
          <div
            class="opacity-0 hidden duration-300 group-hover:opacity-100 group-hover:block group-active:opacity-100 group-active:block transition-all">
            <p class="texte text-end font-medium"><?php the_content(); ?></p>
          </div>
        </article>

        <?php
      } // end while
    } // end if
    wp_reset_query(); ?>
  </div>
  <!-- <img class="bottom-15 left-1 h-32 md:h-60 absolute md:bottom-64 md:right-[40rem] dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/algue.svg" alt="gribouilli3">
      <img class="bottom-15 left-1 h-32 md:h-60 absolute md:bottom-64 md:right-[40rem] hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkservice.svg" alt="gribouilli3"> -->
</section>
<section class="flex justify-end relative md:mb-40 h-[20vh]">
  <a href="#">
    <img
      class="absolute right-3 -top-3 h-36 md:h-60 md:right-32 md:-top-10 active:scale-110 hover:scale-110 transition-all duration-300"
      src="<?php echo get_template_directory_uri(); ?>/assets/icons/etoile.svg" alt="gribouilli4">
  </a>
  <h1 class="right-8 mt-11 md:mt-12 titre absolute text-mydarkblue dark:text-mybeige md:right-80">
    <?php esc_html_e('want to know more?', 'rine2'); ?>
  </h1>
</section>

<?php get_footer(); ?>