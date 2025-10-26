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
    <div class="filter-btns flex px-8 gap-3 flex-wrap">
        <a
            role="button"
            tabindex="0"
            data-filter="*"
            class="filter-chip px-4 py-2 rounded-full border-2 border-myblack dark:border-mybeige text-myblack dark:text-mybeige transition-all duration-200 cursor-pointer hover:bg-myblack hover:text-mybeige dark:hover:bg-mybeige dark:hover:text-myblack opacity-50 [&.is-active]:opacity-100 [&.is-active]:bg-myblack [&.is-active]:text-mybeige dark:[&.is-active]:bg-mybeige dark:[&.is-active]:text-myblack legend-text">
            <?php esc_html_e('All', 'rine2'); ?>
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
                    class="filter-chip px-4 py-2 rounded-full border-2 border-myblack dark:border-mybeige text-myblack dark:text-mybeige transition-all duration-200 cursor-pointer hover:bg-myblack hover:text-mybeige dark:hover:bg-mybeige dark:hover:text-myblack opacity-50 [&.is-active]:opacity-100 [&.is-active]:bg-myblack [&.is-active]:text-mybeige dark:[&.is-active]:bg-mybeige dark:[&.is-active]:text-myblack legend-text">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php endforeach;
        } ?>

    </div>
</section>
<section
    class="grid lg:px-8 my-10 px-6 relative gap-x-15 gap-y-10">

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
                class="rounded-2xl grid-item group relative lg:mb-10 mb-5 mr-4 lg:mr-9 w-[243px] h-40 lg:w-[455px] lg:h-[400px] overflow-hidden bg-cover bg-center transition-all duration-300 ease-in-out block <?php echo esc_attr($slug); ?>">
                <!-- Détails du projet -->
                <div
                    class="absolute bottom-0 right-0 flex flex-col opacity-100 lg:opacity-0 transition-opacity duration-300 lg:group-hover:opacity-100 text-left text-mybeige lg:bg-transparent bg-myblack w-full p-3">
                    <h2 class="soustitre text-end"><?php the_title(); ?></h2>
                    <div class="flex justify-end gap-2">
                        <p class="small-text lowercase text-end">
                            <?php echo wp_kses_post(get_field('pr_category')); ?>
                        </p>
                        <p class="small-text lowercase text-end">
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
