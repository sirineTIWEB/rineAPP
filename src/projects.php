<?php
/*
Template Name: Portfolio
*/
get_header(); ?>
<section class="md:h-[500px] h-[25vh] bg-myyellow dark:bg-mylightblue flex items-end md:mb-64 mb-32">
    <div class="pl-10 md:pl-20 pb-10 md:pb-20">
        <h1 class="text-mybeige dark:text-mydarkblue titre"><?php esc_html_e('rine’s projects', 'rine2'); ?></h1>
        <h2 class="texte text-mybeige dark:text-mydarkblue max-w-56">
            <?php esc_html_e('You\'re about to explore some of my academic and personal projects.', 'rine2'); ?>
        </h2>
    </div>
    <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto dark:hidden"
        src="<?php echo get_template_directory_uri(); ?>/assets/icons/projets.svg" alt="gribouilli4">
    <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto hidden dark:block"
        src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkprojects.svg" alt="gribouilli4">
</section>
<section class="md:ml-12 ml-6 mb-20">
    <h1 class="titre text-mydarkblue dark:text-mybeige"><?php esc_html_e('Categories', 'rine2'); ?></h1>
    <div class="flex gap-5 filter-btns">
        <button data-filter="*" class="flex justify-end bg-mylightblue w-28 md:w-52 md:h-24 h-14 pr-4">
            <h2 class="soustitre text-mybeige"><?php esc_html_e('All', 'rine2'); ?></h2>
        </button>
        <?php
        $categories = get_terms([
            'taxonomy' => 'pr_category',
            'hide_empty' => true
        ]);
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category): ?>
                <button data-filter=".<?php echo esc_attr($category->slug); ?>"
                    class="flex justify-end bg-mylightblue w-28 md:w-52 md:h-24 h-14 pr-4">
                    <h2 class="soustitre text-mybeige"><?php echo esc_html($category->name); ?></h2>
                </button>
            <?php endforeach;
        } ?>

    </div>
</section>
<section
    class="grid bg-[linear-gradient(to_right,#F2DA91_1.5px,transparent_1.5px),linear-gradient(to_bottom,#F2DA91_1.5px,transparent_1.5px)] md:bg-[size:30px_30px] bg-[size:20px_20px] z-[-1] border-b-[1.5px] border-myyellow md:p-14 p-7 mb-11 relative">

    <?php
    // 1) définir les arguments/filtres de la requête
    $args = array(
        'post_type' => 'project'
    );

    // 2) exécuter la requête et lancer la boucle
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $terms = get_the_terms(get_the_ID(), 'pr_category');
            $slug = '';
            if ($terms && !is_wp_error($terms)) {
                $slugs = array();
                foreach ($terms as $term) {
                    $slugs[] = $term->slug;
                }
                $slug = implode(' ', $slugs); // Join all slugs with spaces
            } ?>

            <article
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/mockups/rine.png')"
                class="grid-item group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] md:h-[455px] md:hover:w-96 float-left <?php echo esc_attr($slug); ?>">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>

                <!-- Détails du projet -->
                <div
                    class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                    <h2 class="soustitre text-mylightblue text-end "><?php the_title(); ?></h2>
                    <div class="flex justify-end">
                        <p class="texte font-bold lowercase text-mylightblue text-end ">
                            <?php echo wp_kses_post(get_field('pr_category')); ?>
                        </p>
                        <p class="texte font-bold lowercase text-mylightblue text-end ">
                            <?php $acf_date = get_field('date'); // Replace with your field name
                                    echo get_time_ago_acf($acf_date);
                                    ?>
                        </p>
                    </div>
                </div>
            </article>

            <?php
        } // end while
    } // end if
    wp_reset_query(); ?>
</section>

<?php get_footer(); ?>