<?php

/*
Template Name: Project
*/

get_header(); ?>

<section class="bg-myyellow dark:bg-mylightblue py-16 md:mb-64 mb-32">
    <!-- Embla Carousel -->
    <div class="embla w-full max-w-7xl mx-auto relative">
        <div class="embla__viewport overflow-hidden">
            <div class="embla__container flex">
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-900 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">First slide</span>
                    </div>
                </div>
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-800 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">Second slide</span>
                    </div>
                </div>
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-700 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">Third slide</span>
                    </div>
                </div>
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-900 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">Fourth slide</span>
                    </div>
                </div>
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-800 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">Fifth slide</span>
                    </div>
                </div>
                <div class="embla__slide flex-[0_0_100%] md:flex-[0_0_50%] min-w-0 px-4">
                    <div class="flex justify-center h-72 bg-white p-6 rounded-lg dark:bg-neutral-700 shadow-md">
                        <span class="self-center text-2xl text-gray-800 dark:text-white">Sixth slide</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button type="button"
            class="embla__prev absolute left-4 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 text-gray-800 bg-white/80 hover:bg-white rounded-full shadow-lg dark:text-white dark:bg-neutral-800/80 dark:hover:bg-neutral-800 transition-all">
            <span class="sr-only">Previous</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
        </button>
        <button type="button"
            class="embla__next absolute right-4 top-1/2 -translate-y-1/2 inline-flex justify-center items-center w-12 h-12 text-gray-800 bg-white/80 hover:bg-white rounded-full shadow-lg dark:text-white dark:bg-neutral-800/80 dark:hover:bg-neutral-800 transition-all">
            <span class="sr-only">Next</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </button>
    </div>
    <!-- End Embla Carousel -->

</section>

<?php get_footer(); ?>