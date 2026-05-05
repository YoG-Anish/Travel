<section class="testimonials-section section-padding">
    <div class="container testimonials-container">
        <div class="testimonials-wrapper">
            <div class="testimonials-header">
                <span class="section-tag"><?php echo get_theme_mod('testinomial_title'); ?></span>
                <h2 class="section-heading">
                    <?php echo get_theme_mod('testinomial_heading'); ?>
                </h2>
                <div class="overall-stars big-stars">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Star.svg" alt="*" />
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Star.svg" alt="*" />
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Star.svg" alt="*" />
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Star.svg" alt="*" />
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Star.svg" alt="*" />
                </div>
                <p class="review-count">
                    <?php echo get_theme_mod('rating_text'); ?>
                </p>
            </div>

            <!-- SPLIDE SLIDER -->
            <div class="testimonials-slider splide" id="testimonialsSplide">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Arrow.png"
                            class="left-arrow-testimonials left-arrow-rotate"
                            alt="prev" />
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Arrow.png"
                            class="right-arrow-testimonials"
                            alt="next" />
                    </button>
                </div>
                <div class="splide__track">
                    <div class="splide__list">
                        <?php
                        $testinomial_query = new WP_Query(array(
                            'post_type' => 'travel_testimonial',
                            'posts_per_page' => -1,
                        ));
                        if ($testinomial_query->have_posts()) :
                            while ($testinomial_query->have_posts()) : $testinomial_query->the_post(); ?>
                                <div class="splide__slide testimonial-card">
                                    <div class="overall-stars small-stars">
                                        <?php
                                        $star_count = get_field('testimonial_star_count');
                                        for ($i = 0; $i < $star_count; $i++) {
                                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/Star.svg" alt="*" />';
                                        }
                                        ?>
                                    </div>
                                    <h4 class="testimonial-title">
                                        <?php echo wp_trim_words(get_the_content(), 6); ?>
                                        
                                    </h4>
                                    <p class="testimonial-text">
                                        <?php echo wp_trim_words(get_the_content(), 20); ?>
                                    </p>
                                    <p class="testimonial-author">
                                        <?php echo esc_html(get_field('author_name')); ?>,
                                        <span class="testimonial-date">
                                            <?php echo get_the_date('F j, Y'); ?>
                                        </span>
                                    </p>
                                </div>
                            <?php endwhile;
                        else : ?>
                            <p><?php esc_html_e('No testimonials found.', 'travel'); ?></p>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>