<?php get_header(); ?>
<?php
if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="explore-banner">
            <div id="explore-splide" class="splide-explore">
                <div class="banner-slide">
                    <!-- Full-height banner image -->1
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
            </div>
        </section>
        <?php
        $destinations = get_the_terms(get_the_ID(), 'destination');
        if (!empty($destinations) && !is_wp_error($destinations)) {
            $dest = $destinations[0];

            $term_key = 'destination_' . $dest->term_id;
            $section1_image_back = get_field('section1_image_back', $term_key);
            $section1_image_front = get_field('section1_image_front', $term_key);
            $section1_heading = get_field('section1_heading', $term_key);
            $section1_description = get_field('section1_description', $term_key);
            $section2_heading = get_field('section2_heading', $term_key);
            $section3_heading = get_field('section3_heading', $term_key);
        ?>
            <section class="antient-section section-padding">
                <div class="container antient-grid">
                    <div class="antient-intro">
                        <?php echo wp_kses_post($section1_heading); ?>
                        <?php echo wp_kses_post($section1_description); ?>
                    </div>
                    <div class="antient-images">
                        <?php if ($section1_image_back) : ?>
                            <img src="<?php echo esc_url($section1_image_back['url']); ?>" alt="<?php echo esc_attr($section1_image_back['alt']); ?>" class="reef-img" />
                        <?php else : ?>
                            <img src="./images/tiger.png" alt="Tiger" class="tiger-img" />
                        <?php endif; ?>

                        <?php if ($section1_image_front) : ?>
                            <img src="<?php echo esc_url($section1_image_front['url']); ?>" alt="<?php echo esc_attr($section1_image_front['alt']); ?>" class="tiger-img" />
                        <?php else : ?>
                            <img src="./images/reef.png" alt="Reef" class="reef-img" />
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="style-section section-padding">
                <div class="container">
                    <div class="section-header">
                        <?php echo wp_kses_post($section2_heading); ?>
                    </div>
                    <div class="splide style-slider">
                        <div class="splide__arrows">
                            <button class="splide__arrow splide__arrow--prev">
                                <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Arrow.png"
                                    class="arrow-plan left-arrow-rotate"
                                    alt="prev" />
                            </button>
                            <button class="splide__arrow splide__arrow--next">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Arrow.png" class="arrow-plan" alt="next" />
                            </button>
                        </div>
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php
                                $args = array(
                                    'post_type'      => 'travel_place',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'destination',
                                            'field'    => 'term_id',
                                            'terms'    => $dest->term_id,
                                        ),
                                    ),
                                );

                                $places_query = new WP_Query($args);

                                if ($places_query->have_posts()) :
                                    while ($places_query->have_posts()) : $places_query->the_post(); ?>
                                        <!-- Slide 1 -->
                                        <div class="splide__slide">
                                            <div class="style-card">
                                                <div class="style-image-wrapper">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <h3 class="style-title"><?php the_field('country_name'); ?></h3>
                                                </div>
                                                <p class="style-text">
                                                    <?php echo wp_trim_words(get_the_content(), 12, '...'); ?>
                                                </p>
                                                <button class="btn-tilted btn-primary-i">
                                                    <a href="<?php the_permalink(); ?>" class="discover-link">Discover More</a>
                                                </button>
                                            </div>
                                        </div>
                                <?php endwhile;
                                endif;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="destination-section section-padding bg-light">
                <div class="container">
                    <div class="section-header">
                        <?php echo wp_kses_post($section3_heading); ?>
                    </div>
                    <div class="places-grid">
                        <?php
                        $travel_place_query = new WP_Query(array(
                            'post_type'      => 'travel_place',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'destination',
                                    'field'    => 'slug',
                                    'terms'    => $dest->slug,
                                    'operator' => 'NOT IN',
                                ),
                            )
                        ));
                        ?>
                        <?php
                        if ($travel_place_query->have_posts()) :
                            while ($travel_place_query->have_posts()) : $travel_place_query->the_post(); ?>
                                <div class="place-card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="place-card-content">
                                        <h3 class="place-title"><?php the_title(); ?></h3>
                                        <p class="place-text">
                                            <?php echo wp_trim_words(get_the_content(), 12, '...'); ?>
                                        </p>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
    <?php }
    endwhile;
    wp_reset_postdata();
else : ?>
    <p>No slides found.</p>
<?php endif; ?>
<?php get_template_part('template-parts/content', 'contactsection'); ?>

<?php get_footer(); ?>