<?php
/**
 * Single Project Template
 * Template for displaying single project posts
 */

get_header(); ?>

<section class="bg-myyellow dark:bg-mydarkblue py-0 md:py-16">

    <a href="<?php echo esc_url(site_url('/portfolio')); ?>" onclick="event.preventDefault(); if (document.referrer && document.referrer.indexOf(window.location.host) !== -1) { history.back(); } else { window.location.href = this.href; }" class="bouton ml-10 dark:text-mybeige text-mydarkblue border-mydarkblue dark:border-mybeige">
        <?php esc_html_e('← Back', 'rine2'); ?>
    </a>

    <?php
    // WordPress automatically loads the post
    if (have_posts()) {
        while (have_posts()) {
            the_post();
    ?>

    <section class="md:py-8 mb-auto w-screen flex flex-col-reverse md:flex-row px-10">
        <!-- Embla Carousel -->
        <div class="embla md:w-1/2 mx-auto relative">
            <div class="embla__viewport">
                <div class="embla__container">
                    <div class="embla__slide">
                        <div
                            class="h-96 bg-white rounded-lg dark:bg-neutral-900 shadow-md overflow-hidden">
                            <img class="w-full h-full object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php esc_html_e('Project\'s mock-up', 'rine2'); ?>">
                        </div>
                    </div>
                    <?php
                    $video = get_field('video');
                    if ($video) {
                        $video_url = is_array($video) ? $video['url'] : $video;
                    ?>
                    <div class="embla__slide">
                        <div class="flex justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-neutral-800 shadow-md overflow-hidden">
                            <video class="w-full h-full object-contain rounded" controls>
                                <source src="<?php echo esc_url($video_url); ?>">
                                <?php esc_html_e('Your browser does not support the video tag.', 'rine2'); ?>
                            </video>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="embla__slide">
                        <div
                            class="flex justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-neutral-700 shadow-md">
                            <span class="text-2xl text-gray-800 dark:text-white">Third slide</span>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div
                            class="flex justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-neutral-700 shadow-md">
                            <span class="text-2xl text-gray-800 dark:text-white">Third slide</span>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div
                            class="flex justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-neutral-700 shadow-md">
                            <span class="text-2xl text-gray-800 dark:text-white">Third slide</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button type="button"
                class="embla__prev absolute left-8 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 text-gray-800 bg-white/90 hover:bg-white rounded-full shadow-lg dark:text-white dark:bg-neutral-800/90 dark:hover:bg-neutral-800 transition-all z-10">
                <span class="sr-only">Previous</span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </button>
            <button type="button"
                class="embla__next absolute right-8 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 text-gray-800 bg-white/90 hover:bg-white rounded-full shadow-lg dark:text-white dark:bg-neutral-800/90 dark:hover:bg-neutral-800 transition-all z-10">
                <span class="sr-only">Next</span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </button>

            <!-- Pagination Dots -->
            <div class="embla__dots flex justify-center gap-2 mt-0 md:mt-6 cursor-pointer"></div>
        </div>
        <!-- End Embla Carousel -->

        <div class="md:w-1/2 my-5 md:my-0 md:mx-5">
            <h1 class="titre text-mydarkblue dark:text-myyellow"><?php the_title(); ?></h1>
            <table class="table-auto texte text-mydarkblue dark:text-mybeige">
                <tbody>
                    <tr class="gap-4">
                        <td>Date:</td>
                        <td>
                            <?php $acf_date = get_field('date');
                                echo get_time_ago_acf($acf_date);
                            ?>
                        </td>
                    </tr>
                    <tr class="gap-4">
                        <td><?php esc_html_e('Category:', 'rine2'); ?></td>
                        <td>
                            <?php
                                $list = get_the_term_list(get_the_ID(), 'pr_category', '', ', ', '');
                                echo $list ? $list : esc_html__('—', 'textdomain');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Context:', 'rine2'); ?></td>
                        <td>
                            <?php
                                $list = get_the_term_list(get_the_ID(), 'contexte', '', ', ', '');
                                echo $list ? $list : esc_html__('—', 'textdomain');
                            ?>
                        </td>
                    </tr>
                    <?php if(get_field('lien')){ ?>

                        <tr>
                            <td><?php esc_html_e('Link:', 'rine2'); ?></td>
                            <td><a href="<?php echo get_field('lien'); ?>" class=""><?php esc_html_e('GO TO PROJECT', 'rine2'); ?></a></td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>
            <h2 class="font-bold condensed soustitre text-mydarkblue dark:text-mybeige"><?php the_excerpt(); ?></h2>
        </div>

    </section>
</section>

    <?php
        } // end while
    } // end if
    wp_reset_postdata(); ?>

<?php get_footer(); ?>
