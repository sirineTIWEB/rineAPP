<?php
/*
Template Name: Portfolio
*/
get_header(); ?>
<section class="md:h-[500px] h-[25vh] bg-mybeige dark:bg-mydarkgreen flex items-end rounded-3xl">
    <div class="pl-10 md:pl-20 pb-10 md:pb-20">
        <h1 class="text-mydarkgreen dark:text-mybeige titre"><?php esc_html_e('Rine\'s portfolio', 'rine2'); ?></h1>
        <h2 class="font-bold condensed texte text-mydarkgreen dark:text-mybeige max-w-56">
            <?php esc_html_e('You\'re about to explore some of my academic and personal projects.', 'rine2'); ?>
        </h2>
    </div>
    <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto dark:hidden"
        src="<?php echo get_template_directory_uri(); ?>/assets/icons/projets.svg" alt="gribouilli4">
    <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto hidden dark:block"
        src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkprojects.svg" alt="gribouilli4">
</section>
<section class="md:pl-12 pl-6 my-10 bg-mybeige dark:bg-mydarkgreen rounded-3xl py-20">
    <h1 class="titre text-mydarkblue dark:text-mybeige"><?php esc_html_e('Categories', 'rine2'); ?></h1>
    <div class="flex md:flex-row flex-col gap-5 filter-btns flex-wrap">
        <a
            role="button"
            tabindex="0"
            data-filter="*"
            class="bg-mydarkgreen dark:bg-mybeige flex flex-col justify-between items-end bg-mylightblue w-28 md:w-52 md:h-34 h-24 px-4 transition-all duration-300 ease-in-out overflow-hidden cursor-pointer">
            <h2 class="soustitre text-mybeige dark:text-mydarkgreen text-right"><?php esc_html_e('All', 'rine2'); ?></h2>
            <p class="texte text-mybeige dark:text-mydarkgreen text-right hidden"><?php esc_html_e('Show all projects', 'rine2'); ?></p>
        </a>
        <?php
        $categories = get_terms([
            'taxonomy' => 'pr_category',
            'hide_empty' => true
        ]);
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category): ?>
                <a
                    role="button"
                    tabindex="0"
                    data-filter=".<?php echo esc_attr($category->slug); ?>"
                    class="bg-mydarkgreen dark:bg-mybeige flex flex-col justify-between items-end bg-mylightblue w-28 md:w-52 md:h-34 h-24 px-4 transition-all duration-300 ease-in-out overflow-hidden cursor-pointer">
                    <h2 class="soustitre text-mybeige dark:text-mydarkgreen text-right"><?php echo esc_html($category->name); ?></h2>
                    <p class="texte text-mybeige dark:text-mydarkgreen text-right hidden"><?php echo esc_html($category->description); ?></p>
                </a>
            <?php endforeach;
        } ?>

    </div>
</section>
<section
    class="bg-mybeige dark:bg-mydarkgreen grid rounded-3xl bg-[linear-gradient(to_right,#f683a0_1.5px,transparent_1.5px),linear-gradient(to_bottom,#f683a0_1.5px,transparent_1.5px)] md:bg-[size:30px_30px] bg-[size:20px_20px] border-b-[1.5px] border-mypink md:p-14 p-7  my-10 relative gap-5">

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

            <a
                href="<?php echo esc_url(get_permalink()); ?>"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"
                class="rounded-2xl grid-item group relative md:mb-10 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out md:h-[455px] block <?php echo esc_attr($slug); ?>">
                <!-- Détails du projet -->
                <div
                    class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-100 md:opacity-0 transition-opacity duration-300 md:group-hover:opacity-100 text-left">
                    <h2 class="soustitre text-mydarkgreen text-end "><?php the_title(); ?></h2>
                    <div class="flex justify-end">
                        <p class="texte font-bold lowercase text-mydarkgreen text-end ">
                            <?php echo wp_kses_post(get_field('pr_category')); ?>
                        </p>
                        <p class="texte font-bold lowercase text-mydarkgreen text-end ">
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
</section>

<?php get_footer(); ?>