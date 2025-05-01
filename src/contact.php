<?php
/*
Template Name: contact
*/
 get_header(); ?>
    <section class="flex flex-col justify-evenly sm:flex-row text-mydarkblue bg-myyellow h-[60vh] mb-[20vh]">
        <div class="flex flex-col sm:justify-center sm:items-start items-end sm:w-1/2 sm:pl-20">
            <h1 class="text-3xl sm:text-6xl w-1/2 font-aqva uppercase sm:w-[60%]"><?php esc_html_e('get in touch with me!', 'rine2'); ?></h1>
            <p class="texte sm:w-1/2 w-2/3"><?php esc_html_e('Got a project or question in mind? Reach out — every message is reviewed and answered as quickly as possible.', 'rine2'); ?></p>
        </div>
        <div class="flex relative pl-4 sm:pl-0 flex-col justify-center sm:w-1/2">
            <form action="">
                <input type="text" name="name" id="name" placeholder="Your Name" class="input mr-7 w-1/3">
                <input type="email" name="email" id="email" placeholder="Your Email" class="input mr-7 w-1/2">
                <input type="text" name="Business" id="Business" placeholder="Business Name" class="input mr-7 w-1/3">
                <select id="socialNetwork" required class="mr-0 input w-fit mt-1">
                    <option value="" disabled selected hidden><?php esc_html_e('Select', 'rine2'); ?></option>
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="instagram">Instagram</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="web">Web link</option>
                </select>
                <input type="text" name="socialName" id="socialName" placeholder="Business social name" class="input mr-7 w-[38.5%]">
                <input type="text" name="name" id="name" placeholder="Your Message" class="input mr-7 w-4/5">
                <button type="submit" class="">
                    <img class="absolute sm:right-20 sm:top-96 top-40 right-24 h-16 sm:h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/icons/send.svg" alt="send button">
                </button>
    
            </form>
        </div>
        
    </section>
<?php get_footer(); ?>