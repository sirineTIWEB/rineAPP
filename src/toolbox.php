<?php
/*
Template Name: toolbox
*/
get_header(); ?>

    <h1 class="titre text-mydarkblue dark:text-myyellow text-end mr-20">TOOLBOX <span class="legend">V2,2025</span></h1>
    <section class="flex justify-center mb-5 min-h-[69vh]">
        <div class="min-w-[10vw] max-w-[12vw] flex flex-col gap-10 mx-1">
        <?php
        $types = get_terms( array(
            'taxonomy' => 'type-de-veille',
            'hide_empty' => false, // Show all terms, even if no posts
        ) );

        if ( $types && ! is_wp_error( $types ) ) : ?>
            <div class="flex flex-col items-center justify-start gap-4">
                <a class="texte text-mydarkblue bouton" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('All', 'rine2'); ?></a>
                <?php foreach ( $types as $type ) : ?>
                    <a class="texte text-mydarkblue bouton" href="<?php echo esc_url( get_term_link( $type ) ); ?>">
                        <?php echo esc_html( $type->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
            <div class="flex flex-col items-center">
                <h1 class="soustitre text-mylightblue"><?php esc_html_e('Tags', 'rine2'); ?></h1>
        <?php
        $tags = get_terms( array(
            'taxonomy' => 'tags',
            'hide_empty' => false, // Show all terms, even if no posts
        ) );

        if ( $tags ) : ?>
                <ul class="flex gap-2 flex-wrap mx-3">
                <?php foreach ( $tags as $tag ) : ?>
                    <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">
                        <a href="<?php echo esc_url( get_term_link( $tag ) ); ?>">
                            <?php echo esc_html( $tag->name ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>
            </div>
        </div>
        <div class="grid w-[78vw] grid-cols-4 grid-rows-5 gap-5">
            <section class="bg-mylightblue col-span-2 row-span-3 rounded-lg parentslide">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue">Articles</h1>
                <article class="childslide">
                    <!-- <iframe 
                        src="https://www.joshwcomeau.com/css/height-enigma/" 
                        width="100%" 
                        height="300vh" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe> -->
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend text-mydarkblue">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <ul class="flex flex-wrap gap-2">
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">css</li>
                        </ul>
                    </div>
                </article>
                <article class="childslide">
                    <!-- <iframe 
                        src="https://www.joshwcomeau.com/css/height-enigma/" 
                        width="100%" 
                        height="300vh" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe> -->
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend text-mydarkblue">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <ul class="flex flex-wrap gap-2">
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-myllightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-myllightblue legend">css</li>
                        </ul>
                    </div>
                </article>
            </section>
            <!-- <section class="bg-mylightblue col-span-2 row-span-1 rounded-lg">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue">Recherche précise ?</h1>
            </section> -->
            <section class="bg-mylightblue rounded-lg col-span-2 row-span-4 parentslide relative">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue"><?php esc_html_e('scripts', 'rine2'); ?></h1>
                <?php
                // 1) définir les arguments/filtres de la requête
                $args = array(
                    'post_type' => 'veilles',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'type-de-veille',
                            'field'    => 'slug',
                            'terms'    => array('script-en', 'script-fr'),
                        ),
                    ),
                );

                // 2) exécuter la requête et lancer la boucle
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                $the_query->the_post();
                ?>
                <article class="childslide px-5 hidden">
                    <h2 class="legend text-mydarkblue"> <?php the_title(); ?> </h2>
                    <?php echo wp_kses_post( get_field('scripts') ); ?>
                    <?php
                        $terms = get_the_terms( get_the_ID(), 'tags' ); // Replace 'post_tag' with your taxonomy slug

                        if ( $terms && ! is_wp_error( $terms ) ) : ?>
                            <ul class="flex flex-wrap gap-2 mb-1">
                                <?php foreach ( $terms as $term ) : ?>
                                    <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                            <?php echo esc_html( $term->name ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                </article>
                <?php
                } // end while
                } // end if
                wp_reset_query(); ?>
                <button class="px-1 absolute left-0 top-0 fa-xl hover:text-2xl rounded-lg h-full" onclick="showPrev()" data-section="scripts">
                    <i class="fa-solid fa-caret-left" style="color: #f2da91;"></i>
                </button>
                <button class="px-1 absolute right-0 top-0 fa-xl hover:text-2xl rounded-lg h-full" onclick="showNext()" data-section="scripts">
                    <i class="fa-solid fa-caret-right" style="color: #f2da91;"></i>
                </button>
            </section>
            <section class="bg-mylightblue rounded-lg row-span-2">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue">captures</h1>
            </section>
            <section class="bg-mylightblue rounded-lg row-span-2 parentslide relative">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue">tutos</h1>
                <article class="childslide">
                    <!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/vVn6Pui7EPo?si=6r59iCVHe3aXRdD7&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <!-- <h1 class="texte text-myyellow">tags</h1> -->
                        <ul class="flex gap-2 overflow-scroll w-full">
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">heights</li>
                            <li class="bg-myyellow py-1 px-2 rounded-lg w-fit text-mylightblue legend">css</li>
                        </ul>
                    </div>
                </article>
                <article class="childslide">
                    <!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/vVn6Pui7EPo?si=6r59iCVHe3aXRdD7&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                    <div class="flex flex-col gap-2">
                        <p class="legend pl-5">LOREM ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <!-- <h1 class="texte text-myyellow">tags</h1> -->
                        <ul class="flex gap-2 overflow-scroll w-full">
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mydarkblue legend">css</li>
                        </ul>
                    </div>
                </article>

                <button class="prev absolute left-0 top-0 bg-mylightblue rounded-lg h-full opacity-0 hover:opacity-5">prev</button>
                <button class="next absolute right-0 top-0 bg-mylightblue rounded-lg h-full opacity-0 hover:opacity-5">next</button>
            </section>
            <section class="bg-mylightblue rounded-lg col-span-2">
                <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue">liens</h1>
            </section>

        </div>
    </section>

<?php get_footer(); ?>