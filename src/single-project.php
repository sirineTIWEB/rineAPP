<?php
/**
 * Single Project Template
 * Template for displaying single project posts
 */

get_header();

// Get active mood color
$active_state = get_option('active_mood_state', 'blue');
$mood_colors = array('green' => '#23F80B', 'blue' => '#092EFF', 'purple' => '#B606FC');
$active_color = isset($mood_colors[$active_state]) ? $mood_colors[$active_state] : '#092EFF';
?>

<section class="py-20 h-full">

    <a href="<?php echo esc_url(site_url('/portfolio')); ?>"
        onclick="event.preventDefault(); if (document.referrer && document.referrer.indexOf(window.location.host) !== -1) { history.back(); } else { window.location.href = this.href; }"
        class="bouton hover-circle">
        <?php esc_html_e('← Back', 'rine2'); ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="97" height="44" viewBox="0 0 97 44" fill="none">
            <path
                d="M37.3038 5.83112C36.584 5.66503 35.8643 5.49894 33.1406 5.33034C30.4169 5.16173 25.711 4.99564 22.3179 5.04849C18.9247 5.10133 16.987 5.37815 14.9646 5.9083C10.8293 6.9923 7.67589 8.84257 5.5553 10.8759C3.14119 13.1907 2.52205 16.4995 2.15883 19.0102C1.81405 21.3934 2.07075 23.7706 2.54386 26.0858C3.02056 28.4186 4.13765 30.1508 5.44457 31.7387C7.4457 34.1701 10.2276 35.5211 13.2039 36.8297C15.209 37.7113 18.3392 38.7473 21.7357 39.6222C25.1322 40.4971 28.7308 41.1061 34.2109 41.4752C39.6911 41.8443 46.9437 41.955 51.981 41.8736C57.0182 41.7922 59.6203 41.5154 61.1822 41.3728C62.7441 41.2302 63.187 41.2302 65.2976 40.9811C67.4081 40.7319 71.1728 40.2337 75.2714 39.1742C79.37 38.1148 83.6883 36.5092 86.2728 35.3776C91.1514 33.2416 92.6572 29.8388 93.8106 26.9808C94.4705 25.3457 94.2342 23.2337 93.8727 20.9756C93.4594 18.3943 92.5028 16.3519 91.3629 14.4863C89.587 11.5801 87.0286 9.41802 85.0489 7.91145C83.0119 6.36124 80.4336 5.22213 77.9221 4.161C76.7557 3.66818 75.7428 3.43204 73.3194 3.06798C70.896 2.70393 67.0759 2.26102 63.1426 2.08822C59.2092 1.91542 55.2784 2.02614 52.3677 2.16623C49.4569 2.30632 47.6853 2.47241 45.8599 2.64353"
                stroke="<?php echo esc_attr($active_color); ?>" stroke-width="4" stroke-linecap="round" />
        </svg>
    </a>

    <?php
    // WordPress automatically loads the post
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>

            <section class="lg:py-8 mb-auto flex flex-col-reverse lg:flex-row px-10 text-myblack dark:text-mybeige w-full">
                <!-- Embla Carousel -->
                <div class="embla lg:w-1/2 mx-auto relative">
                    <div class="embla__viewport">
                        <div class="embla__container">
                            <div class="embla__slide">
                                <div class="h-96 bg-white rounded-lg dark:bg-myblack shadow-md overflow-hidden">
                                    <img class="w-full h-full object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                        alt="<?php esc_html_e('Project\'s mock-up', 'rine2'); ?>">
                                </div>
                            </div>
                            <?php
                            $video = get_field('video');
                            if ($video) {
                                $video_url = is_array($video) ? $video['url'] : $video;
                                ?>
                                <div class="embla__slide">
                                    <div
                                        class="flex justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-myblack shadow-md overflow-hidden">
                                        <video class="w-full h-full object-contain rounded" controls>
                                            <source src="<?php echo esc_url($video_url); ?>">
                                            <?php esc_html_e('Your browser does not support the video tag.', 'rine2'); ?>
                                        </video>
                                    </div>
                                </div>
                            <?php }
                            // Loop through multiple ACF file fields (carousel_1, carousel_2, etc.)
                            for ($i = 1; $i <= 10; $i++) {
                                $carousel = get_field('carousel_' . $i);
                                if ($carousel) {
                                    $file_url = is_array($carousel) ? $carousel['url'] : $carousel;
                                    $file_type = is_array($carousel) ? $carousel['mime_type'] : '';
                                    $file_title = is_array($carousel) ? $carousel['title'] : '';

                                    if (strpos($file_type, 'image') !== false) { ?>
                                        <div class="embla__slide">
                                            <div class="h-96 bg-white rounded-lg dark:bg-myblack shadow-md overflow-hidden">
                                                <img class="w-full h-full object-cover" src="<?php echo esc_url($file_url); ?>"
                                                    alt="<?php echo esc_attr($file_title); ?>">
                                            </div>
                                        </div>
                                    <?php } elseif ($file_type === 'application/pdf') { ?>
                                        <div class="embla__slide">
                                            <div
                                                class="flex flex-col justify-center items-center h-96 bg-white p-6 rounded-lg dark:bg-myblack shadow-md overflow-hidden gap-2">
                                                <iframe class="w-full h-full rounded" src="<?php echo esc_url($file_url); ?>#toolbar=0"
                                                    type="application/pdf"></iframe>
                                                <a href="<?php echo esc_url($file_url); ?>" target="_blank"
                                                    class="texte text-myblue hover:underline"><?php esc_html_e('Open PDF', 'rine2'); ?></a>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button type="button"
                        class="cursor-pointer text-myblue embla__prev absolute left-8 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg dark:bg-myblack/90 dark:hover:bg-myblack transition-all z-10">
                        <span class="sr-only">Previous</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>
                    <button type="button"
                        class="cursor-pointer text-myblue embla__next absolute right-8 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg dark:bg-myblack/90 dark:hover:bg-myblack transition-all z-10">
                        <span class="sr-only">Next</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>

                    <!-- Pagination Dots -->
                    <div class="embla__dots flex justify-center gap-2 mt-0 lg:mt-6 cursor-pointer"></div>
                </div>
                <!-- End Embla Carousel -->

                <div class="lg:w-1/2 my-5 lg:my-0 lg:mx-5">
                    <h1 class="h2-style mb-6"><span class="highlight">//</span><?php the_title(); ?></h1>
                    <table class="table-auto texte py-6">
                        <tbody>
                            <tr class="gap-4">
                                <td class="font-bold pr-4"><?php esc_html_e('Date:', 'rine2'); ?></td>
                                <td>
                                    <?php $acf_date = get_field('date');
                                    echo get_time_ago_acf($acf_date);
                                    ?>
                                </td>
                            </tr>
                            <tr class="gap-4">
                                <td class="font-bold pr-4"><?php esc_html_e('Category:', 'rine2'); ?></td>
                                <td>
                                    <?php
                                    $list = get_the_term_list(get_the_ID(), 'pr_category', '', ', ', '');
                                    echo $list ? $list : esc_html__('—', 'textdomain');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold pr-4"><?php esc_html_e('Context:', 'rine2'); ?></td>
                                <td>
                                    <?php
                                    $list = get_the_term_list(get_the_ID(), 'contexte', '', ', ', '');
                                    echo $list ? $list : esc_html__('—', 'textdomain');
                                    ?>
                                </td>
                            </tr>
                            <?php if (get_field('lien')) { ?>

                                <tr>
                                    <td class="font-bold pr-4"><?php esc_html_e('Link:', 'rine2'); ?></td>
                                    <td><a href="<?php echo get_field('lien'); ?>" target="_blank" rel="noopener noreferrer" class="hover-circle legend-text uppercase">
                                            <?php esc_html_e('GO TO PROJECT', 'rine2'); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="97" height="44" viewBox="0 0 97 44"
                                                fill="none">
                                                <path
                                                    d="M37.3038 5.83112C36.584 5.66503 35.8643 5.49894 33.1406 5.33034C30.4169 5.16173 25.711 4.99564 22.3179 5.04849C18.9247 5.10133 16.987 5.37815 14.9646 5.9083C10.8293 6.9923 7.67589 8.84257 5.5553 10.8759C3.14119 13.1907 2.52205 16.4995 2.15883 19.0102C1.81405 21.3934 2.07075 23.7706 2.54386 26.0858C3.02056 28.4186 4.13765 30.1508 5.44457 31.7387C7.4457 34.1701 10.2276 35.5211 13.2039 36.8297C15.209 37.7113 18.3392 38.7473 21.7357 39.6222C25.1322 40.4971 28.7308 41.1061 34.2109 41.4752C39.6911 41.8443 46.9437 41.955 51.981 41.8736C57.0182 41.7922 59.6203 41.5154 61.1822 41.3728C62.7441 41.2302 63.187 41.2302 65.2976 40.9811C67.4081 40.7319 71.1728 40.2337 75.2714 39.1742C79.37 38.1148 83.6883 36.5092 86.2728 35.3776C91.1514 33.2416 92.6572 29.8388 93.8106 26.9808C94.4705 25.3457 94.2342 23.2337 93.8727 20.9756C93.4594 18.3943 92.5028 16.3519 91.3629 14.4863C89.587 11.5801 87.0286 9.41802 85.0489 7.91145C83.0119 6.36124 80.4336 5.22213 77.9221 4.161C76.7557 3.66818 75.7428 3.43204 73.3194 3.06798C70.896 2.70393 67.0759 2.26102 63.1426 2.08822C59.2092 1.91542 55.2784 2.02614 52.3677 2.16623C49.4569 2.30632 47.6853 2.47241 45.8599 2.64353"
                                                    stroke="<?php echo esc_attr($active_color); ?>" stroke-width="4" stroke-linecap="round" />
                                            </svg>
                                        </a></td>
                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                    <p class="soustitre mt-6"><?php the_excerpt(); ?></p>
                </div>

            </section>
        </section>

        <?php
        } // end while
    } // end if
    wp_reset_postdata(); ?>

<?php get_footer(); ?> 
