<?php 
/*
Template Name: Portfolio
*/
get_header(); ?>
    <section class="md:h-[500px] h-[25vh] bg-myyellow dark:bg-mylightblue flex items-end md:mb-64 mb-32">
        <div class="pl-10 md:pl-20 pb-10 md:pb-20">
            <h1 class="text-mybeige dark:text-mydarkblue titre"><?php esc_html_e('rine’s projects', 'rine2'); ?></h1>
            <h2 class="texte text-mybeige dark:text-mydarkblue max-w-56"><?php esc_html_e('A selection of proud/unproud projects, fictionnal or not, and everything in between.', 'rine2'); ?></h2>
        </div>
        <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/projets.svg" alt="gribouilli4">
        <img class="absolute md:right-1/4 md:top-[30rem] top-80 right-24 h-16 md:h-auto hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkprojects.svg" alt="gribouilli4">
    </section>
    <section class="md:ml-12 ml-6 mb-20">
        <h1 class="titre text-mydarkblue dark:text-mybeige"><?php esc_html_e('Categories', 'rine2'); ?></h1>
        <div class="flex gap-5">
            <article class="flex justify-end bg-mylightblue w-28 md:w-52 md:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
            <article class="flex justify-end bg-mylightblue w-28 md:w-52 md:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
            <article class="flex justify-end bg-mylightblue w-28 md:w-52 md:h-24 h-14 pr-4">
                <h2 class="soustitre text-mybeige">WEB</h2>
            </article>
        </div>
    </section>
    <section class="bg-[linear-gradient(to_right,#F2DA91_1.5px,transparent_1.5px),linear-gradient(to_bottom,#F2DA91_1.5px,transparent_1.5px)] md:bg-[size:30px_30px] bg-[size:20px_20px] z-[-1] border-b-[1.5px] border-myyellow md:p-14 p-7 mb-11 flex flex-wrap gap-5 md:gap-10 justify-center">
        <article class="bg-moiPC md:h-96 h-56 w-40 md:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC md:h-96 h-56 w-40 md:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC md:h-96 h-56 w-40 md:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC md:h-96 h-56 w-40 md:w-64 bg-cover object-contain"></article>
        <article class="bg-moiPC md:h-96 h-56 w-40 md:w-64 bg-cover object-contain"></article>
    </section>

<?php get_footer(); ?>