<?php 
/*
Template Name: Portfolio
*/
get_header(); ?>
    <section class="sm:h-[500px] h-[25vh] bg-myyellow flex items-end sm:mb-64 mb-32">
        <div class="pl-10 sm:pl-20 pb-10 sm:pb-20">
            <h1 class="text-mybeige titre"><?php esc_html_e('rine’s projects', 'rine2'); ?></h1>
            <h2 class="texte text-mybeige max-w-56"><?php esc_html_e('A selection of proud/unproud projects, fictionnal or not, and everything in between.', 'rine2'); ?></h2>
        </div>
        <img class="absolute sm:right-1/3 sm:bottom-0 top-[15.5rem] right-24 h-16 sm:h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/icons/projets.svg" alt="gribouilli4">
    </section>
    <section class="sm:ml-12 ml-6 mb-20">
        <h1 class="titre text-mydarkblue"><?php esc_html_e('Categories', 'rine2'); ?></h1>
        <div class="flex gap-5">
            <article class="flex justify-end bg-mylightblue w-28 sm:w-52 sm:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
            <article class="flex justify-end bg-mylightblue w-28 sm:w-52 sm:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
            <article class="flex justify-end bg-mylightblue w-28 sm:w-52 sm:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
        </div>
    </section>
    <section class="bg-[linear-gradient(to_right,#F2DA91_1.5px,transparent_1.5px),linear-gradient(to_bottom,#F2DA91_1.5px,transparent_1.5px)] sm:bg-[size:30px_30px] bg-[size:20px_20px] z-[-1] border-b-[1.5px] border-myyellow sm:p-14 p-7 mb-11 flex flex-wrap gap-5 sm:gap-10 justify-center">
        <article class="bg-moiPC sm:h-96 h-56 w-40 sm:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC sm:h-96 h-56 w-40 sm:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC sm:h-96 h-56 w-40 sm:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC sm:h-96 h-56 w-40 sm:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC sm:h-96 h-56 w-40 sm:w-64 bg-cover object-contain"></article>
    </section>

<?php get_footer(); ?>