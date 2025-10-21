<?php get_header(); ?>

<section class="w-full box-border relative pb-16 rounded-3xl">
  <div
    class="flex flex-col justify-end pb-5 px-2 md:px-12 md:pb-32 h-[487px] md:h-[80vh] mx-4 md:mx-8 bg-moiPC bg-cover bg-center bg-no-repeat rounded-3xl">
    <h1 class="titre"><?php esc_html_e('Welcome to my portfolio', 'rine2'); ?></h1>
    <h2 class="font-bold condensed texte max-w-52 md:max-w-none">
      <?php esc_html_e('Discover all projects I’ve done during my academic and free times.', 'rine2'); ?>
    </h2>
    <a href="<?php echo esc_url(site_url('/portfolio')); ?>" c
      lass="bouton"><?php esc_html_e('explore my projects', 'rine2'); ?>
    </a>
  </div>
</section>
<section class="projets flex flex-col my-10 gap-7">
  <h1 class="titre dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('MY RECENT PROJECTS', 'rine2'); ?>
  </h1>
  <div class="flex max-w-full md:ml-15">

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

        <a href="<?php echo esc_url(get_permalink()); ?>"
          style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"
          class=" group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 md:h-[455px] block dark:border dark:border-mybeige rounded-2xl">

          <!-- Détails du projet -->
          <div
            class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-100 md:opacity-0 transition-opacity duration-300 md:group-hover:opacity-100 text-left">
            <h2 class="soustitre text-end text-mybeige"><?php the_title(); ?></h2>
            <div class="flex justify-end">
              <p class="texte font-bold lowercase text-end text-mybeige">
                <?php echo wp_kses_post(get_field('pr_category')); ?>
              </p>
              <p class="texte font-bold lowercase text-end text-mybeige">
                <?php $acf_date = get_field('date'); // Replace with your field name
                  echo get_time_ago_acf($acf_date);
                ?>
              </p>
            </div>
          </div>
        </a>

        <?php
      } // end while
    } // end if
    wp_reset_query(); ?>

  </div>
</section>
<section class="flex my-10 justify-between">
  <h1 class="titre w-fit dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('my services', 'rine2'); ?>
  </h1>
  <div class="w-1/2">
    <?php
    // 1) définir les arguments/filtres de la requête
    $args = array(
      'post_type' => 'services'
    );

    // 2) exécuter la requête et lancer la boucle
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
      $index = 0;
      while ($the_query->have_posts()) {
        $the_query->the_post();
        ?>
        <div class="collapse text-myblack dark:text-mybeige">
          <input type="radio" name="my-accordion-2" <?php echo ($index === 0) ? 'checked="checked"' : ''; ?> />

          <div class="collapse-title soustitre border-b border-myblack dark:border-mybeige">
            <?php the_title(); ?>
          </div>
          <div class="collapse-content texte my-2.5">
            <?php echo wp_kses_post(get_the_content()); ?>
          </div>

        </div>


        <?php
        $index++;
      } // end while
    } // end if
    wp_reset_query(); ?>
  </div>
</section>

<?php get_footer(); ?>