<?php
/*
Template Name: contact
*/
 get_header(); ?>
    <section class="flex flex-col justify-evenly md:flex-row text-mydarkblue bg-myyellow dark:bg-mylightblue h-[60vh] mb-[10vh] md:mb-[20vh]">
        <div class="flex flex-col md:justify-center items-start md:w-1/2 pl-10 md:pl-20">
            <h1 class="text-3xl md:text-6xl w-1/2 font-aqva uppercase md:w-[60%]"><?php esc_html_e('get in touch with me!', 'rine2'); ?></h1>
            <p class="texte md:w-1/2 w-2/3"><?php esc_html_e('Got a project or question in mind? Reach out — every message is reviewed and answered as quickly as possible.', 'rine2'); ?></p>
        </div>
        <div class="flex relative pl-4 md:pl-0 flex-col justify-center md:w-1/2">
            <!-- le ONSUBMIT c pour qu'il commence d'abord par JS puis php -->
            <form id="contactForm" method="post" action="">
                <input type="text" name="name" id="name" placeholder="<?php esc_html_e('Your Fullname', 'rine2'); ?>" class="capitalize input mr-4 md:mr-7 w-1/3" required>
                <input type="email" name="email" id="email" placeholder="<?php esc_html_e('Your Mail', 'rine2'); ?>" class="input mr-4 md:mr-7 w-1/2" required>
                <input type="text" name="business" id="business" placeholder="<?php esc_html_e('Business Name', 'rine2'); ?>" class="input mr-4 md:mr-7 w-1/3">
                <select id="socialNetwork" name="socialNetwork" class="rounded-none mr-0 capitalize input w-fit mt-1">
                    <option value="" disabled selected hidden><?php esc_html_e('Select', 'rine2'); ?></option>
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="instagram">Instagram</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="web">Web link</option>
                </select>
                <input type="text" name="socialName" id="socialName" placeholder="<?php esc_html_e('Social Username', 'rine2'); ?>" class="transform-none input mr-0 md:mr-7 w-[37%]">
                <textarea name="content" id="content" placeholder="<?php esc_html_e('Your Message', 'rine2'); ?>" class="rounded-none input mr-4 md:mr-7 max-h-max w-[95%]" required></textarea>
                <button type="submit" name="sending" value="send">
                    <img class="absolute md:right-20 md:top-[30rem] top-44 right-24 h-16 md:h-auto hover:scale-110 transition-all duration-300 dark:hidden" src="<?php echo get_template_directory_uri(); ?>/assets/icons/send.svg" alt="send button">
                    <img class="absolute md:right-20 md:top-[30rem] top-44 right-24 h-16 md:h-auto hover:scale-110 transition-all duration-300 hidden dark:block" src="<?php echo get_template_directory_uri(); ?>/assets/icons/darksend.svg" alt="send button">
                </button>
                <?php wp_nonce_field('contact_form_nonce_action', 'contact_form_nonce_field'); ?> 
                <!-- sécurité contre hacker -->
            </form>
        </div>
    </section>
<?php get_footer(); ?>