<footer class="site-footer">
    <div class="footer-top border-bottom">
        <div class="container">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class' => 'footer-nav',
            ));
            ?>
        </div>
    </div>
    <div class="footer-main">
        <div class="container footer-grid">
            <div class="footer-column">
                <?php
                // Destination taxonomy query loop
                $destinations = get_terms(array(
                    'taxonomy' => 'destination',
                    'hide_empty' => false,
                ));
                if (!empty($destinations) && !is_wp_error($destinations)) {
                    echo '<h4 class="footer-heading">DESTINATION</h4>';
                    echo '<ul class="footer-links">';
                    foreach ($destinations as $destination) {
                        echo '<li><a href="' . esc_url(get_term_link($destination)) . '" target="_blank">' . esc_html($destination->name) . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
            <div class="footer-column">
                <h4 class="footer-heading"><?php echo get_theme_mod('contactform_section2_call_text'); ?></h4>
                <p class="contacts">
                    <a href="tel:+1833123456"><?php echo get_theme_mod('contactform_section2_phone_number'); ?></a>
                </p>

                <h4 class="footer-heading"><?php echo get_theme_mod('contactform_section2_email_text'); ?></h4>
                <p class="contacts">
                    <a href="mailto:<?php echo get_theme_mod('contactform_section2_email'); ?>"><?php echo get_theme_mod('contactform_section2_email'); ?></a>
                </p>
            </div>
            <div class="footer-column">
                <div class="footer-reviews">
                    <span class="stars">
                        <div class="overall-stars mid-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" />
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" />
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" />
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" />
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" />
                        </div>
                    </span>
                    <p> <?php echo get_theme_mod('rating_text'); ?> </p>
                    <a href="#" class="btn-white">Review Us On
                        <span class="tiny-star"><img src="<?php echo get_template_directory_uri(); ?>/images/Star.svg" alt="*" /></span>
                        Trustpilot</a>
                </div>
                <div class="social-links">
                    <?php
                    $facebook_icon_id = get_theme_mod('footer_facebook_icon');
                    $instagram_icon_id = get_theme_mod('footer_instagram_icon');
                    $linkedin_icon_id = get_theme_mod('footer_linkedin_icon');
                    ?>
                    <span class="social-icon">
                        <?php if ($facebook_icon_id) { ?>
                            <a href="<?php echo get_theme_mod('footer_facebook_url'); ?>" target="_blank">
                                <img src="<?php echo wp_get_attachment_url($facebook_icon_id, 'full'); ?>" alt="Facebook" />
                            </a>
                        <?php } ?>
                    </span>
                    <span class="social-icon">
                        <?php if ($instagram_icon_id) { ?>
                            <a href="<?php echo get_theme_mod('footer_instagram_url'); ?>" target="_blank">
                                <img src="<?php echo wp_get_attachment_url($instagram_icon_id, 'full'); ?>" alt="Instagram" />
                            </a>
                        <?php } ?>
                    </span>
                    <span class="social-icon">
                        <?php if ($linkedin_icon_id) { ?>
                            <a href="<?php echo get_theme_mod('footer_linkedin_url'); ?>" target="_blank">
                                <img src="<?php echo wp_get_attachment_url($linkedin_icon_id, 'full'); ?>" alt="LinkedIn" />
                            </a>
                        <?php } ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom-design">
            <p><?php echo get_theme_mod('footer_copyright_text'); ?></p>
            <?php
            $footer_logo_id = get_theme_mod('footer_logo');
            
            if ($footer_logo_id) { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img
                        src="<?php echo wp_get_attachment_url($footer_logo_id, 'full'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                        class="logo-img" />
                </a>
            <?php }
            wp_nav_menu(array(
                'theme_location' => 'footer-bottom',
                'menu_class' => 'terms-and-policies',
            ));
            ?>
        </div>
    </div>
</footer>
<div class="search-modal" id="searchModal">
    <div class="search-box">
        <form>
        <?php get_search_form(); ?>
        </form>

        <span class="close-search" id="closeSearch">&times;</span>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>