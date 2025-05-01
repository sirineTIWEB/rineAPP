<?php get_header(); ?>

    <section class="bg-myyellow w-full box-border relative pb-16 mb-36 sm:mb-60">
        <div class="flex flex-col justify-end pb-5 px-2 sm:px-12 sm:pb-32 h-[487px] sm:h-[80vh] mx-4 sm:mx-8 bg-moiPC bg-cover bg-center bg-no-repeat rounded-3xl">
          <h1 class="titre text-myyellow"><?php esc_html_e('Rine’s portfolio', 'rine2'); ?></h1>
          <h2 class="font-bold condensed texte text-mybeige max-w-52 sm:max-w-none"><?php esc_html_e('Discover all projects I’ve done during my academic and free times.', 'rine2'); ?> </h2>
          <a href="#" class="bouton text-mybeige border-mydarkblue"><?php esc_html_e('explore my projects', 'rine2'); ?></a>
        </div>
        <img class="h-20 absolute bottom-[-5%] right-[7%] sm:h-36" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli1.svg" alt="gribouilli1">
    </section>
    <section class="relative flex flex-col items-center mb-16 sm:mb-52">
        <h1 class="titre text-mydarkblue mb-6 sm:mb-8"><?php esc_html_e('RECENT PROJECTS', 'rine2'); ?></h1>
        <div class="flex overflow-x-auto overflow-y-hidden max-w-full ml-6 sm:ml-12 pb-3">
            <article class="group relative mr-3 sm:mr-9 h-[243px] w-40 sm:w-[300px] overflow-hidden bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/mockups/rine.png')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] sm:h-[455px] sm:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mydarkblue text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mydarkblue text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mydarkblue text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
            <article class="group relative mr-3 sm:mr-9 h-[243px] w-40 sm:w-[300px] overflow-hidden bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/mockups/rine.png')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] sm:h-[455px] sm:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mydarkblue text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mydarkblue text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mydarkblue text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
            <article class="group relative mr-3 sm:mr-9 h-[243px] w-40 sm:w-[300px] overflow-hidden bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/mockups/rine.png')] bg-cover bg-center transition-all duration-300 ease-in-out shrink-0 active:w-[170px] sm:h-[455px] sm:hover:w-96">
                <!-- Overlay pour étendre la zone cliquable -->
                <div class="absolute inset-0 z-10"></div>
              
                <!-- Détails du projet -->
                <div class="mr-5 absolute bottom-0 right-0 flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 text-left">
                  <h2 class="soustitre text-mydarkblue text-end ">Titre projet</h2>
                  <div class="flex justify-end">
                    <p class="texte font-bold lowercase text-mydarkblue text-end ">cat - </p>
                    <p class="texte font-bold lowercase text-mydarkblue text-end "> JJ/MM/AA</p>
                  </div>
                </div>
            </article>
        </div>
        <img class="h-24 absolute sm:top-[-7%] top-[-3%] left-[2%] sm:h-40" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gribouilli2.svg" alt="gribouilli2">
    </section>
    <section class="relative bg-mylightblue px-6">
      <h1 class="titre text-myyellow py-6"><?php esc_html_e('services', 'rine2'); ?></h1>
      <div class="z-10 sm:z-0 flex justify-center flex-wrap gap-6 sm:gap-20 w-full pb-14 sm:pb-16">
        
        <article class="group w-96 sm:w-5/12 h-32 sm:h-80 bg-mybeige active:bg-moiPC hover:bg-moiPC bg-cover hover:h-96 sm:hover:h-52 active:h-52 rounded-3xl px-6 py-6 flex flex-col justify-end items-end text-mydarkblue hover:text-myyellow duration-300 ease-in-out transition-all">
          <h2 class="texte font-bold text-end">e-commerce</h2>
          <p class="texte text-end font-medium group-active:opacity-100 group-hover:opacity-100 opacity-0 transition-opacity duration-300">I can handle basket, payment and following orders,bla bla bla</p>
        </article>
      </div>
      <img class="bottom-1 left-1 h-32 sm:h-60 absolute sm:bottom-64 sm:right-[40rem]" src="<?php echo get_template_directory_uri(); ?>/assets/icons/algue.svg" alt="gribouilli3">
    </section>
    <section class="flex justify-end relative sm:mb-40 h-[20vh]">
      <a href="#"><img class="absolute right-3 -top-3 h-36 sm:h-60 sm:right-32 sm:-top-10 active:scale-110 hover:scale-110 transition-all duration-300" src="<?php echo get_template_directory_uri(); ?>/assets/icons/etoile.svg" alt="gribouilli4"></a>
      <h1 class="right-8 mt-11 sm:mt-12 titre absolute text-mydarkblue sm:right-80"><?php esc_html_e('want to know more?', 'rine2'); ?></h1>
    </section>

<?php get_footer(); ?>