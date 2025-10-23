<?php
/*
Template Name: Portfolio
*/
get_header(); ?>
<section class="">
    
</section>
<section class="flex flex-col my-10 gap-5 pt-20">
    <h1 class="titre dark:text-mybeige text-myblack">
        <span class="highlight">// </span><?php esc_html_e('MY PROJECTS', 'rine2'); ?>
    </h1>
    <div class="filter-btns flex px-8 gap-9 flex-wrap">
        <a
            role="button"
            tabindex="0"
            data-filter="*"
            class="w-3xs flex flex-col p-5 gap-5 rounded-2xl text-mybeige bg-myblack dark:bg-mybeige dark:text-myblack transition-all duration-300 ease-in-out overflow-hidden cursor-pointer opacity-50 [&.is-active]:opacity-100">
            <h2 class="texte"><?php esc_html_e('All', 'rine2'); ?></h2>
            <p class="legend hidden [.is-active_&]:block"><?php esc_html_e('Show all projects', 'rine2'); ?></p>
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
                    class="w-3xs flex flex-col p-5 gap-5 rounded-2xl text-mybeige bg-myblack dark:bg-mybeige dark:text-myblack transition-all duration-300 ease-in-out overflow-hidden cursor-pointer opacity-50 [&.is-active]:opacity-100">
                    <h2 class="texte"><?php echo esc_html($category->name); ?></h2>
                    <p class="hidden legend [.is-active_&]:block"><?php echo esc_html($category->description); ?></p>
                </a>
            <?php endforeach;
        } ?>

    </div>
</section>
<section
    class="grid md:px-8 my-10 px-6 relative gap-x-15 gap-y-10">

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
                    class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-100 md:opacity-0 transition-opacity duration-300 md:group-hover:opacity-100 text-left text-mybeige">
                    <h2 class="texte text-end "><?php the_title(); ?></h2>
                    <div class="flex justify-end">
                        <p class="sous-titre font-bold lowercase text-end ">
                            <?php echo wp_kses_post(get_field('pr_category')); ?>
                        </p>
                        <p class="soustitre font-bold lowercase text-end ">
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