<?php
/*
Template Name: toolbox
*/
get_header (); ?>

    <div class="flex justify-between mx-4 py-2">
        <img class="md:h-14 h-6 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBclair.svg" alt="logo -RINE">
        <img class="md:h-14 h-6 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo/courtBfonce.svg" alt="logo -RINE">
        <h1 class="titre text-mybeige dark:text-mydarkblue">TOOLBOX</h1>
    </div>
    <div class="flex h-[85vh] justify-center">
        <div class="w-[10vw] flex flex-col gap-10">
            <div class="flex flex-col items-center justify-start gap-4">
                <p class="texte text-mydarkblue bouton">articles</p>
                <p class="texte text-mydarkblue bouton">liens</p>
                <p class="texte text-mydarkblue bouton">captures</p>
                <p class="texte text-mydarkblue bouton">scripts</p>
                <p class="texte text-mydarkblue bouton">tutos</p>
            </div>
            <div class="flex flex-col items-center">
                <h1 class="texte text-mydarkblue">Tags</h1>
                <ul class="flex gap-2 flex-wrap mx-3">
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">css</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">java</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">height</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">responsive</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">dynamic</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">wordpress</li>
                    <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">react</li>
                </ul>
            </div>
        </div>
        <div class="grid w-[80vw] grid-cols-4 grid-rows-5 gap-5">
            <section class="bg-mybeige dark:bg-mylightblue col-span-2 row-span-3 rounded-lg parentslide">
                <h1 class="soustitre w-full text-center text-myyellow">Articles</h1>
                <article class="childslide">
                    <iframe 
                        src="https://www.joshwcomeau.com/css/height-enigma/" 
                        width="100%" 
                        height="300vh" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend text-mybeige">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <h1 class="texte text-myyellow">tags</h1>
                        <ul class="flex flex-wrap gap-2">
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">css</li>
                        </ul>
                    </div>
                </article>
                <article class="childslide">
                    <iframe 
                        src="https://www.joshwcomeau.com/css/height-enigma/" 
                        width="100%" 
                        height="300vh" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend text-mybeige">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <h1 class="texte text-myyellow">tags</h1>
                        <ul class="flex flex-wrap gap-2">
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">css</li>
                        </ul>
                    </div>
                </article>
            </section>
            <section class="bg-mybeige dark:bg-mylightblue col-span-2 row-span-1 rounded-lg">
                <h1 class="soustitre w-full text-center text-myyellow">Recherche précise ?</h1>
            </section>
            <section class="bg-mybeige dark:bg-mylightblue rounded-lg col-span-2 row-span-3">
                <h1 class="soustitre w-full text-center text-myyellow">scripts</h1>
                <p>document.addEventListener('DOMContentLoaded', () => {
    
                });</p>
            </section>
            <section class="bg-mybeige dark:bg-mylightblue rounded-lg row-span-2">
                <h1 class="soustitre w-full text-center text-myyellow">captures</h1>
            </section>
            <section class="bg-mybeige dark:bg-mydarkblue rounded-lg row-span-2 parentslide relative">
                <h1 class="soustitre w-full text-center text-myyellow">tutos</h1>
                <article class="childslide">
                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/vVn6Pui7EPo?si=6r59iCVHe3aXRdD7&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="flex flex-col gap-2 px-5">
                        <p class="legend">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <!-- <h1 class="texte text-myyellow">tags</h1> -->
                        <ul class="flex gap-2 overflow-scroll w-full">
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">css</li>
                        </ul>
                    </div>
                </article>
                <article class="childslide">
                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/vVn6Pui7EPo?si=6r59iCVHe3aXRdD7&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="flex flex-col gap-2 pl-5">
                        <p class="legend">LOREM ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <!-- <h1 class="texte text-myyellow">tags</h1> -->
                        <ul class="flex gap-2 overflow-scroll w-full">
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">heights</li>
                            <li class="bg-mylightblue py-1 px-2 rounded-lg w-fit text-mybeige legend">css</li>
                        </ul>
                    </div>
                </article>

                <button class="prev absolute left-0 top-0 bg-mydarkblue h-full">prev</button>
                <button class="next absolute right-0 top-0 bg-mydarkblue h-full">next</button>
            </section>
            <section class="bg-mybeige dark:bg-mylightblue rounded-lg col-span-2">
                <h1 class="soustitre w-full text-center text-myyellow">liens</h1>
            </section>

        </div>
    </div>
    
    <div>
        <p class="legend text-mydarkblue ml-2">V2, 2025</p>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slideshow.js "></script>

<?php get_footer(); ?>