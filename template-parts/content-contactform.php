<section class="newsletter-section">
    <?php 
    $contactform_image_id = get_theme_mod('contactform_image');
    $contactform_image_url = $contactform_image_id ? wp_get_attachment_url($contactform_image_id) : '';
    ?>
    <div class="mountain-cloud-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/cloud.png'), url('<?php echo esc_url($contactform_image_url); ?>') ;">
        <div class="container text-center">
            <span class="section-tag"> <?php echo get_theme_mod('contactform_tagline'); ?> </span>
            <h2 class="section-heading">
                <?php echo get_theme_mod('contactform_heading'); ?>
            </h2>
        </div>
    </div>
    <div class="cloud-bg">
        <div class="container newsletter-form-wrapper">
            <?php echo do_shortcode('[contact-form-7 id="9a17d08" title="travel contact"]'); ?>
        </div>
    </div>
</section>