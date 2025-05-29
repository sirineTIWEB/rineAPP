<?php get_header(); ?>

<section class="gridfix">
            <section class="mereJS articles mauve">
            <h2 class="mauve">articles</h2>
            <?php
            // 1) définir les arguments/filtres de la requête
            $args = array(
                'post_type' => 'veille',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_de_veille',
                        'field'    => 'slug',
                        'terms'    => 'articles',
                    ),
                ),
            );

            // 2) exécuter la requête et lancer la boucle
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                $counter = 1; // initialiser le compteur
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
            <a href="<?php the_permalink(); ?>" class="enfantJS article" id="section<?php echo $counter; ?>">
                <?php the_post_thumbnail("images-medium"); ?>
                <div>
                    <div class="info">
                        <h1><?php the_title(); ?></h1>
                        <?php 
                    // Récupérer les termes de la taxonomie "Cours" pour ce post
                    $terms = get_the_terms(get_the_ID(), 'cours');
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<p style="color: #BB5CC1;; text-transform: uppercase;">' . esc_html($term->name) . '</p>';
                        }
                    }?>
                    </div>
                    <p>
                        <span><?php $date_format = 'd/m/Y'; // Format de date JJ/MM/AAAA
                        $formatted_date = get_the_date($date_format);
                        echo $formatted_date; ?></span>
                        <?php the_excerpt() ?>
                    </p>
                </div>
            </a>
            <?php
                    $counter++; // incrémenter le compteur
                } // end while
            } // end if
            wp_reset_query(); 
            ?>
            <div class="nav">
                <button style="background-color: rgba(187, 92, 193, 0.5);" class="prev jaune" onclick="showPrevTuto()" data-section="scripts">❮</button>
                <button style="background-color:rgba(187, 92, 193, 0.5);" class="next jaune" onclick="showNextTuto()" data-section="scripts">❯</button>
            </div>
        </section>

        <section class="search gris">
            <?php get_search_form(); ?>
        </section>

        <section class="mereJS gallery jaune">
           
                <h2 class="jaune">screens</h2>
        
            <?php
            // 1) définir les arguments/filtres de la requête
            $args = array(
                'post_type' => 'veille',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_de_veille',
                        'field'    => 'slug',
                        'terms'    => 'screens',
                    ),
                ),
            );

            // 2) exécuter la requête et lancer la boucle
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                $counter = 1; // initialiser le compteur
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
            <a href="<?php the_permalink(); ?>" class="enfantJS screen" id="section<?php echo $counter; ?>">
                <p><span><?php $date_format = 'd/m/Y'; // Format de date JJ/MM/AAAA
$formatted_date = get_the_date($date_format);
echo $formatted_date; ?></span></p>
                <?php 
                    // Récupérer les termes de la taxonomie "Cours" pour ce post
                    $terms = get_the_terms(get_the_ID(), 'cours');
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<p style="color: #F3CA40; text-transform: uppercase;">' . esc_html($term->name) . '</p>';
                        }
                    }
                    
                the_post_thumbnail("images-tiny"); ?>
            </a>
            <?php
                    $counter++; // incrémenter le compteur
                } // end while
            } // end if
            wp_reset_query(); 
            ?>
            <div class="nav">
                <button style="background-color: rgba(243, 202, 64, 0.5);" class="prev jaune" onclick="showPrevTuto()" data-section="scripts">❮</button>
                <button style="background-color: rgba(243, 202, 64, 0.5);" class="next jaune" onclick="showNextTuto()" data-section="scripts">❯</button>
            </div>
        </section>

        <section class="mereJS links bleu">
            
                <h2 class="bleu">liens</h2>
        
            <?php // 1) définir les arguments/filtres de la requête
            $args = array(
                'post_type' => 'veille',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_de_veille',
                        'field'    => 'slug',
                        'terms'    => 'liens',
                    ),
                ),
            );

            // 2) exécuter la requête et lancer la boucle
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                $counter = 1; // initialiser le compteur
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
            <a href="<?php the_permalink(); ?>" class="enfantJS link" id="section<?php echo $counter; ?>">
                <div>
                    <div class="info">
                        <h1><?php the_title(); ?></h1>
                        <?php 
                            // Récupérer les termes de la taxonomie "Cours" pour ce post
                            $terms = get_the_terms(get_the_ID(), 'cours');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<p style="color: #06AED5; text-transform: uppercase;">' . esc_html($term->name) . '</p>';
                                }
                            }
                            ?>
                    </div>
                    <p><span><?php $date_format = 'd/m/Y'; // Format de date JJ/MM/AAAA
$formatted_date = get_the_date($date_format);
echo $formatted_date; ?></span><?php the_excerpt() ?></p>

                </div>
                
            </a>
            <?php
                    $counter++; // incrémenter le compteur
                } // end while
            } // end if
            wp_reset_query(); 
            ?>
            
            <div class="nav">
                <button style="background-color:rgba(6, 174, 213, 0.5);" class="prev bleu" onclick="showPrevTuto()" data-section="links">❮</button>
                <button style="background-color:rgba(6, 174, 213, 0.5);" class="next bleu" onclick="showNextTuto()" data-section="links">❯</button>
            </div>
        </section>

        <section class="mereJS scripts rose">
           
                <h2 class="rose">scripts</h2>
        
            <?php
            // 1) définir les arguments/filtres de la requête
            $args = array(
                'post_type' => 'veille',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_de_veille',
                        'field'    => 'slug',
                        'terms'    => 'scripts',
                    ),
                ),
            );

            // 2) exécuter la requête et lancer la boucle
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                $counter = 1; // initialiser le compteur
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
            <a href="<?php the_permalink(); ?>" class="enfantJS script" id="section<?php echo $counter; ?>">
                <div>
                    <div class="info">
                        <h1><?php the_title(); ?></h1>
                        <?php 
                            // Récupérer les termes de la taxonomie "Cours" pour ce post
                            $terms = get_the_terms(get_the_ID(), 'cours');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<p style="color: #F44174; text-transform: uppercase;">' . esc_html($term->name) . '</p>';
                                }
                            }
                            ?>
                    </div>
                    <p><span><?php $date_format = 'd/m/Y'; // Format de date JJ/MM/AAAA
$formatted_date = get_the_date($date_format);
echo $formatted_date; ?></span><?php the_excerpt() ?></p>
                </div>
                <?php the_field('scripts') ?>
            </a>
            <?php
                    $counter++; // incrémenter le compteur
                } // end while
            } // end if
            wp_reset_query(); 
            ?>
            
            <div class="nav">
                <button style="background-color: rgba(244, 65, 116, 0.5);" class="prev rose" onclick="showPrevTuto()" data-section="scripts">❮</button>
                <button style="background-color: rgba(244, 65, 116, 0.5);" class="next rose" onclick="showNextTuto()" data-section="scripts">❯</button>
            </div>
        </section>

        <section class="mereJS tutos orange">
          
                <h2 class="orange">tutos</h2>
    
            <?php
            // 1) définir les arguments/filtres de la requête
            $args = array(
                'post_type' => 'veille',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_de_veille',
                        'field'    => 'slug',
                        'terms'    => 'tutos',
                    ),
                ),
            );

            // 2) exécuter la requête et lancer la boucle
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                $counter = 1; // initialiser le compteur
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="enfantJS tuto" id="section<?php echo $counter; ?>">
                    <?php the_field('lien_du_tuto') ?>
                        <div>
                            <h1><?php the_title(); ?></h1>
                            <p>durée: <?php the_field('duree_de_video') ?>min</p>
                            <?php 
                            // Récupérer les termes de la taxonomie "Cours" pour ce post
                            $terms = get_the_terms(get_the_ID(), 'cours');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<p style="color: #FA7E61; text-transform: uppercase;">' . esc_html($term->name) . '</p>';
                                }
                            }
                            ?>
                            <p><span><?php $date_format = 'd/m/Y'; // Format de date JJ/MM/AAAA
$formatted_date = get_the_date($date_format);
echo $formatted_date; ?></span><?php the_excerpt() ?></p>
                        </div>
                    </a>
                    <?php
                    $counter++; // incrémenter le compteur
                } // end while
            } // end if
            wp_reset_query(); 
            ?>

            <div class="nav">
                <button style="background-color: rgba(250, 126, 97, 0.5);" class="prev orange" onclick="showPrevTuto()" data-section="tutos">❮</button>
                <button style="background-color: rgba(250, 126, 97, 0.5);" class="next orange" onclick="showNextTuto()" data-section="tutos">❯</button>
            </div>
        </section>
    </section>
<?php get_footer(); ?>