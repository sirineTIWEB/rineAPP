<?php get_header(); ?>

<h1 class="titre text-mydarkblue dark:text-myyellow text-end mr-20">Toolbox<span class="legend">v2, 2025</span></h1>
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
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <?php
                    $post_type = get_post_type();

                    $classes = 'bg-mylightblue rounded-lg'; // default classes

                    if ( $post_type === 'articles-en' || $post_type === 'articles-fr' || $post_type === 'script-fr' || $post_type === 'script-en' ) {
                        $classes .= ' col-span-3 row-span-4';
                    } elseif ( $post_type === 'capture-en' || $post_type === 'capture-fr' || $post_type === 'tuto-fr' || $post_type === 'tuto-en' ) {
                        $classes .= ' row-span-2';
                    }
                    // Add more conditions as needed
                    ?>
                    <article class="<?php echo esc_attr( $classes ); ?> px-4">
                        <h1 class="soustitre w-full text-center text-mybeige dark:text-mydarkblue"><?php single_term_title(); ?></h1> 
                        <h2 class="legend text-mydarkblue"> <?php the_title(); ?> </h2>
                        <?php the_field('scripts') ?>
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
                endwhile; // end while
                endif; // end if
                wp_reset_query(); ?>
        </div>
    </section>

<?php get_footer(); ?>