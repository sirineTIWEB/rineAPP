<?php
/*
Template Name: About
*/
get_header(); ?>
    <section class="md:h-[500px] h-[25vh] bg-myyellow dark:bg-mylightblue flex items-end md:mb-64 mb-32">
        <div class="pl-10 md:pl-20 pb-10 md:pb-20">
            <h1 class="text-mybeige dark:text-mydarkblue titre"><?php esc_html_e('Rine’s profile', 'rine2'); ?></h1>
            <h2 class="texte text-mybeige dark:text-mydarkblue max-w-56"><?php esc_html_e('My full name is El Alami Sirine, I’m a student at HEFF, Belgium studying infographie as web designer/developper.', 'rine2'); ?></h2>
        </div>
        <img class="absolute md:right-1/4 md:top-[28rem] top-80 right-24 h-16 md:h-auto dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/profile.svg" alt="gribouilli4">
        <img class="absolute md:right-1/4 md:top-[28rem] top-80 right-24 h-16 md:h-1/4 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darkabout.svg" alt="gribouilli4">
    </section>
    <section class="flex flex-col items-center mb-16 md:mb-52">
        <h1 class="titre text-myyellow mb-6 md:mb-8 flex-wrap w-2/3 text-center"><?php esc_html_e('work experiences', 'rine2'); ?></h1>
        <div class="flex overflow-x-auto overflow-y-hidden max-w-full pl-6 md:pl-12 pb-3">
            <article class="group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-[url('../assets/images/mockups/rine.webp')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] md:h-[455px] md:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mybeige text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mybeige text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mybeige text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
            <article class="group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-[url('../assets/images/mockups/rine.webp')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] md:h-[455px] md:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mybeige text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mybeige text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mybeige text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
            <article class="group relative mr-3 md:mr-9 h-[243px] w-40 md:w-[300px] overflow-hidden bg-[url('../assets/images/mockups/rine.webp')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] md:h-[455px] md:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mybeige text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mybeige text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mybeige text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
        </div>
    </section>
    <section class="relative flex justify-end h-[80vh] p-12 md:mb-60 mb-20">
        <div class="absolute inset-0 h-[720px] w-full bg-[linear-gradient(to_right,#93B5C9_1.5px,transparent_1.5px),linear-gradient(to_bottom,#93B5C9_1.5px,transparent_1.5px)] bg-[size:30px_30px] z-[-1] border-b-[1.5px] border-mylightblue"></div>
        <!-- Contenu de la section -->
        <h1 class="titre text-mydarkblue dark:text-mybeige bg-mybeige dark:bg-mydarkblue h-fit w-fit"><?php esc_html_e('My skills', 'rine2'); ?></h1>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/skills.svg" alt="gribouillis" class="absolute h-10 md:h-auto left-1/3 bottom-0">

        <!-- <div id="flowerZone1" class="absolute top-5 left-4 md:top-10 md:left-5"> <img class="md:h-auto h-36" src="<?php echo get_template_directory_uri(); ?>/assets/icons/fleur1.svg" alt="yellow flower TL corner"></div>
        <div id="flowerZone2" class="absolute top-1/3 left-1/3 md:top-1/3 md:right-1/3"> <img class="md:h-auto h-44" src="<?php echo get_template_directory_uri(); ?>/assets/icons/fleur2.svg" alt="big yellow flower"></div>
        <div id="flowerZone3" class="absolute top-28 md:bottom-1/4 md:left-96"> <img class="md:h-auto h-32" src="<?php echo get_template_directory_uri(); ?>/assets/icons/fleur4.svg" alt="little dark blue flower"></div>
        <div id="flowerZone4" class="absolute bottom-28 left-1 md:top-1 md:right-1/4"> <img class="md:h-auto h-36" src="<?php echo get_template_directory_uri(); ?>/assets/icons/fleur3.svg" alt="mid light blue flower"></div>
        <div id="flowerZone5" class="absolute bottom-28 right-1  md:bottom-1 md:right-10"> <img class="md:h-auto h-36" src="<?php echo get_template_directory_uri(); ?>/assets/icons/fleur5.svg" alt="yellow B mid"></div> -->
    </section>
    <section class="w-full h-[50vh] flex flex-col md:flex-row md:mb-56 mb-20">
        <div class="bg-mylightblue h-1/2 md:h-auto md:w-1/2 flex flex-col justify-end items-end pr-6 md:pb-40 pb-6 bg-moiPC bg-cover bg-center">
            <h2 class="soustitre text-myyellow">Nom de project</h2>
            <p class="texte text-myyellow">date de project</p>
        </div>
        <div class="h-1/2 md:h-auto md:w-1/2 bg-mydarkblue dark:bg-myyellow flex flex-col items-start justify-end pl-6">
            <h1 class="soustitre md:w-1/2 w-2/3 text-mybeige dark:text-mylightblue text-end pt-5 sm:pt-0"><?php printf(__('Want  to see <br> more <span class="titre">PROJECTS?</span>', 'rine2')); ?></h1>
            <h2 class="texte text-mybeige dark:text-mylightblue w-2/3"><?php esc_html_e('During my studies, I worked on several fictional projects — some I liked, some I didn’t, some finished, others unfinished. On the projects page, you’ll find a selection of them all.', 'rine2'); ?></h2>
            <a href="#" class="bouton text-mydarkblue border-myyellow dark:border-mybeige md:my-10 my-5"><?php esc_html_e('explore my projects', 'rine2'); ?></a>
        </div>
    </section>
<?php get_footer(); ?>