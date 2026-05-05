<section class="contact-cta-section section-padding bg-accent">
    <div class="container contact-grid">
        <div class="contact-text">
            <h2 class="section-heading">
                <?php echo get_theme_mod('contactform_section2_heading'); ?>
            </h2>
            <?php echo get_theme_mod('contactform_section2_tagline'); ?>
        </div>
        <?php
        $callus_icon_id = get_theme_mod('contactform_section2_phone_icon');
        $email_icon_id = get_theme_mod('contactform_section2_email_icon'); ?>
        <div class="contact-options">
            <div class="contact-option">
                <?php if ($callus_icon_id) { ?>
                    <img
                        src="<?php echo wp_get_attachment_url($callus_icon_id, 'full'); ?>"
                        alt="<?php echo esc_attr(get_theme_mod('contactform_section2_call_text')); ?>" />
                <?php } ?>
                <span class="option-label"><?php echo get_theme_mod('contactform_section2_call_text'); ?></span>
                <a href="tel:<?php echo get_theme_mod('contactform_section2_phone_number'); ?>" class="option-value">
                    <?php echo get_theme_mod('contactform_section2_phone_number'); ?>
                </a>
            </div>
            <div class="contact-option">
                <?php if ($email_icon_id) { ?>
                    <img
                        src="<?php echo wp_get_attachment_url($email_icon_id, 'full'); ?>"
                        alt="<?php echo esc_attr(get_theme_mod('contactform_section2_email_text')); ?>" />
                <?php } ?>
                <span class="option-label option-email-gap">
                    <a href="mailto:<?php echo get_theme_mod('contactform_section2_email'); ?>" class="option-value">
                        <?php echo get_theme_mod('contactform_section2_email_text'); ?>
                    </a>
                </span>
            </div>
        </div>
    </div>
</section>