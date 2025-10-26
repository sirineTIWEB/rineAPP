<?php get_header(); ?>

<section class="animated-hero flex flex-col h-screen justify-center items-center lowercase">
  <h1 class="primary-title text-myblack md:text-left dark:text-mybeige text-4xl lg:text-8xl titre">
    <span class="highlight">=> </span><?php esc_html_e(' Curious coder', 'rine2'); ?><span class="highlight">,{</span><br><?php esc_html_e('growing abilities', 'rine2'); ?><span class="highlight">;}</span>
  </h1>

  <h1 class="secondary-title text-myblack dark:text-mybeige text-3xl lg:text-6xl font-family-alexandria font-bold"><span class="highlight"><</span><?php esc_html_e('Welcome to my portfolio', 'rine2'); ?><span class="highlight">/></span></h1>
</section>
<section class="projets flex flex-col my-10 gap-7">
  <h1 class="titre dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('MY RECENT PROJECTS', 'rine2'); ?>
  </h1>
  <div class="flex max-w-full lg:ml-15 overflow-x-scroll pt-5">

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
          class=" group relative mr-3 lg:mr-9 w-[243px] h-60 lg:w-[455px] lg:h-[300px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 block dark:border dark:border-mybeige rounded-2xl">

          <!-- Détails du projet -->
          <div
            class="absolute bottom-0 right-0 flex flex-col opacity-100 lg:opacity-0 transition-opacity duration-300 lg:group-hover:opacity-100 text-left lg:bg-transparent bg-myblack w-full p-3">
            <h2 class="soustitre text-end text-mybeige"><?php the_title(); ?></h2>
            <div class="flex justify-end gap-2">
              <p class="small-text lowercase text-end text-mybeige">
                <?php echo wp_kses_post(get_field('pr_category')); ?>
              </p>
              <p class="small-text lowercase text-end text-mybeige">
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
<section class="flex lg:flex-row flex-col my-10 lg:justify-between">
  <h1 class="titre w-fit dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('my services', 'rine2'); ?>
  </h1>
  <div class="w-full lg:w-1/2">
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
          <input type="checkbox" id="accordion-<?php echo $index; ?>" <?php echo ($index === 0) ? 'checked="checked"' : ''; ?> />

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