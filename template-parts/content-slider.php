<section class="explore-banner">
    <div id="explore-splide" class="splide splide-explore">
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev"></button>
            <button class="splide__arrow splide__arrow--next"></button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $slider_args = array(
                    'post_type' => 'travel_slider',
                    'posts_per_page' => -1,
                );
                $slider_query = new WP_Query($slider_args);
                if ($slider_query->have_posts()) : ?>
                    <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                        <li class="splide__slide">
                            <div class="banner-slide">
                                <!-- Full-height banner image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <img
                                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="banner-img" />
                                <?php endif; ?>

                                <!-- SVG overlay -->
                                <?php $overlay_id = get_field('slider_overlay');
                                if ($overlay_id) { ?>
                                    <img
                                        src="<?php echo esc_url($overlay_id['url']); ?>"
                                        alt="<?php echo esc_attr($overlay_id['alt']); ?>"
                                        class="map-overlay map-asia" />
                                <?php } ?>

                                <!-- Slide content -->
                                <div class="slide-content container">
                                    <div class="text-center banner-gap-bot">
                                        <span class="banner-tag"><?php the_content(); ?></span>
                                        <h2 class="banner-title"><?php the_title(); ?></h2>
                                        <button class="btn-tilted btn-primary-i">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html(get_field('slider_button')); ?>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="explore-location">
                                        <?php $location_icon_id = get_field('slider_location_icon');
                                        if ($location_icon_id) { ?>
                                            <img
                                                src="<?php echo esc_url($location_icon_id['url']); ?>"
                                                alt="<?php echo esc_attr($location_icon_id['alt']); ?>"
                                                class="location-icon" />
                                        <?php } ?>
                                        <span class="location-text"><?php echo esc_html(get_field('slider_location_title')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No slides found.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>