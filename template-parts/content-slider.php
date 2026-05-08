<section class="explore-banner">
    <div id="explore-splide" class="splide splide-explore">
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev"></button>
            <button class="splide__arrow splide__arrow--next"></button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                // 1. Get the taxonomy terms instead of posts
                $terms = get_terms(array(
                    'taxonomy'   => 'destination',
                    'hide_empty' => false, // Show even if no posts are assigned yet
                ));

                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        // 2. Setup the ACF term ID reference
                        // ACF needs this format for terms: 'taxonomy_id' (e.g., 'destination_5')
                        $term_id = $term->taxonomy . '_' . $term->term_id;

                        // 3. Fetch ACF fields using the $term_id reference
                        $banner_img      = get_field('slider_image', $term_id); // Assumed field name
                        $overlay_id      = get_field('slider_overlay', $term_id);
                        $button_text     = get_field('slider_button', $term_id);
                        $location_icon   = get_field('slider_location_icon', $term_id);
                        $location_title  = get_field('slider_location_title', $term_id);
                ?>
                        <li class="splide__slide">
                            <div class="banner-slide">
                                <!-- Background Image from ACF Term Field -->
                                <?php if ($banner_img) : ?>
                                    <img src="<?php echo esc_url($banner_img['url']); ?>"
                                        alt="<?php echo esc_attr($term->name); ?>"
                                        class="banner-img" />
                                <?php endif; ?>

                                <!-- SVG overlay -->
                                <?php if ($overlay_id) : ?>
                                    <img src="<?php echo esc_url($overlay_id['url']); ?>"
                                        alt="<?php echo esc_attr($overlay_id['alt']); ?>"
                                        class="map-overlay" />
                                <?php endif; ?>

                                <!-- Slide content -->
                                <div class="slide-content container">
                                    <div class="text-center banner-gap-bot">
                                        <!-- the_content() doesn't work here, we use $term->description -->
                                        <span class="banner-tag"><?php echo esc_html($term->description); ?></span>
                                        <h2 class="banner-title"><?php echo esc_html($term->name); ?></h2>

                                        <button class="btn-tilted btn-primary-i">
                                            <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                                <?php echo esc_html($button_text); ?>
                                            </a>
                                        </button>
                                    </div>

                                    <div class="explore-location">
                                        <?php if ($location_icon) : ?>
                                            <img src="<?php echo esc_url($location_icon['url']); ?>"
                                                alt="<?php echo esc_attr($location_icon['alt']); ?>"
                                                class="location-icon" />
                                        <?php endif; ?>
                                        <span class="location-text"><?php echo esc_html($location_title); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No destinations found.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>