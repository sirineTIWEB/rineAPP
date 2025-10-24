<?php
/*
Template Name: About V2
*/
get_header(); ?>

<section class="absolute z-20 animated-hero flex flex-col pt-30 h-[90vh] justify-left items-start lowercase pl-40">
    <h1 class="secondary-title text-myblack dark:text-mybeige text-3xl md:text-6xl font-family-alexandria font-bold capitalize"><span class="highlight"><</span><?php esc_html_e('El Alami Sirine', 'rine2'); ?><span class="highlight">/></span></h1>
  <h1 class="primary-title text-myblack text-left dark:text-mybeige text-4xl md:text-8xl titre">
    <?php esc_html_e('Student', 'rine2'); ?><span class="highlight">=> </span>HEFF<span class="highlight">() {</span><br><span class=" highlight underline"><?php esc_html_e('web', 'rine2'); ?></span>design/dev<span class="highlight">;}</span>
  </h1>
</section>
<section class="flex h-[90vh] justify-end items-end pr-30 pb-10">
    <?php if (has_post_thumbnail()) : ?>
        <div class="relative">
            <?php the_post_thumbnail('image-500h', ['class' => 'md:h-auto border-8 border-myblue rounded-xl', 'alt' => get_the_title()]); ?>

            <!-- Purple flower: left middle, 50% out -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/purpleflower.svg" alt="purple flower" class="flower-animate absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none" style="width: 87px; height: 93px;">

            <!-- Green flower: bottom right corner, 50% out -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/greenflower.svg" alt="green flower" class="flower-animate absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 pointer-events-none" style="width: 87px; height: 93px;">

            <!-- Blue flower: top right corner, 50% out -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/blueflower.svg" alt="blue flower" class="flower-animate absolute -top-5 -right-5 pointer-events-none" style="width: 87px; height: 93px;">
        </div>
    <?php endif; ?>
</section>

<section class="flex flex-col my-10 gap-8 h-screen">
  <h1 class="titre dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('MY MOOD TRACKER', 'rine2'); ?>
  </h1>
  <h1 class="soustitre text-center text-myblack dark:text-mybeige"><?php esc_html_e(' creativity isn’t static — it moves with how we feel.', 'rine2'); ?></h1>
  <div class="flex flex-col gap-9 h-full">
    <button
      class="mood-state-btn w-full h-1/3 rounded-4xl flex justify-center items-center transition-all duration-300 hover:bg-[#23F80B] <?php echo (get_option('active_mood_state') === 'green' ? 'bg-[#23F80B] active' : 'bg-transparent border-2 border-myblack dark:border-mybeige'); ?>"
      data-color="#23F80B"
      data-state="green"
      aria-pressed="<?php echo (get_option('active_mood_state') === 'green' ? 'true' : 'false'); ?>"
    >
      <p class="soustitre <?php echo (get_option('active_mood_state') === 'green' ? 'text-mybeige' : 'text-myblack dark:text-mybeige'); ?> uppercase text-center"><?php esc_html_e('focus and positivity', 'rine2'); ?></p>
    </button>
    <button
      class="mood-state-btn w-full h-1/3 rounded-4xl flex justify-center items-center transition-all duration-300 hover:bg-myblue <?php echo (get_option('active_mood_state') === 'blue' || !get_option('active_mood_state') ? 'bg-myblue active' : 'bg-transparent border-2 border-myblack dark:border-mybeige'); ?>"
      data-color="#092EFF"
      data-state="blue"
      aria-pressed="<?php echo (get_option('active_mood_state') === 'blue' || !get_option('active_mood_state') ? 'true' : 'false'); ?>"
    >
      <p class="soustitre <?php echo (get_option('active_mood_state') === 'blue' || !get_option('active_mood_state') ? 'text-mybeige' : 'text-myblack dark:text-mybeige'); ?> uppercase text-center"><?php esc_html_e('tension and introspection', 'rine2'); ?></p>
    </button>
    <button
      class="mood-state-btn w-full h-1/3 rounded-4xl flex justify-center items-center transition-all duration-300 hover:bg-[#B606FC] <?php echo (get_option('active_mood_state') === 'purple' ? 'bg-[#B606FC] active' : 'bg-transparent border-2 border-myblack dark:border-mybeige'); ?>"
      data-color="#B606FC"
      data-state="purple"
      aria-pressed="<?php echo (get_option('active_mood_state') === 'purple' ? 'true' : 'false'); ?>"
    >
      <p class="soustitre <?php echo (get_option('active_mood_state') === 'purple' ? 'text-mybeige' : 'text-myblack dark:text-mybeige'); ?> uppercase text-center"><?php esc_html_e('challenging moment', 'rine2'); ?></p>
    </button>
  </div>
</section>

<section class="w-full dark:text-mybeige text-myblack px-32">
  <h1 class="titre dark:text-mybeige text-myblack">
    <span class="highlight">// </span><?php esc_html_e('MY PARCOURS', 'rine2'); ?>
  </h1>
  <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
  <li>
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-start mb-10 md:text-end dark:text-mybeige text-myblack texte">
      <time class="texte font-mono italic dark:text-mybeige text-myblack">2020</time>
      <div class="text-lg dark:text-mybeige text-myblack soustitre">Graduated</div>
      Cursus général, option langues modernes
    </div>
    <hr />
  </li>
  <li>
    <hr />
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-end md:mb-10 dark:text-mybeige text-myblack texte">
      <time class="font-mono italic dark:text-mybeige text-myblack">2021</time>
      <div class="soustitre text-lg dark:text-mybeige text-myblack">1 year - Psychology</div>
      wanting something more practical.
    </div>
    <hr />
  </li>
  <li>
    <hr />
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-start mb-10 md:text-end dark:text-mybeige text-myblack texte">
      <time class="font-mono italic dark:text-mybeige text-myblack">2022</time>
      <div class="soustitre text-lg dark:text-mybeige text-myblack">B1 - Infography</div>
      Mix of 3D, edition, web. with the vision of going into 3D
    </div>
    <hr />
  </li>
  <li>
    <hr />
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-end md:mb-10 dark:text-mybeige text-myblack texte">
      <time class="font-mono italic dark:text-mybeige text-myblack">2023</time>
      <div class="soustitre text-lg dark:text-mybeige text-myblack">B2 - Infography WEB</div>
      discovering abilities in coding so going for it.
    </div>
    <hr />
  </li>
  <li>
    <hr />
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-start mb-10 md:text-end dark:text-mybeige text-myblack texte">
      <time class="font-mono italic dark:text-mybeige text-myblack">2024</time>
      <div class="soustitre text-lg dark:text-mybeige text-myblack">B3 - Infography WEB</div>
      going by the year but letting internship aside
    </div>
    <hr />
  </li>
  <li>
    <hr />
    <div class="timeline-middle">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="#092EFF"
        class="h-5 w-5"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="timeline-end md:mb-10 dark:text-mybeige text-myblack texte">
      <time class="font-mono italic dark:text-mybeige text-myblack">NOW</time>
      <div class="soustitre text-lg dark:text-mybeige text-myblack">B3² - Infography WEB</div>
      Hoping for a Great Opportunity for an internship in 2026
    </div>
  </li>
    
</ul>
</section>

<?php get_footer(); ?>