<?php get_header();

// 1. Get the current taxonomy term object (e.g., Asia)
$term = get_queried_object();
$term_id = $term->term_id;
$term_key = 'destination_' . $term_id; // ACF reference

// 2. Fetch all ACF fields for the Banner and Sections
$banner_bg            = get_field('slider_image', $term_key); // Need an ACF Image field for term
$banner_overlay       = get_field('slider_overlay', $term_key);
$location_icon        = get_field('slider_location_icon', $term_key);
$location_title       = get_field('slider_location_title', $term_key);

$section1_image_back  = get_field('section1_image_back', $term_key);
$section1_image_front = get_field('section1_image_front', $term_key);
$section1_heading     = get_field('section1_heading', $term_key);
$section1_description = get_field('section1_description', $term_key);
$section2_heading     = get_field('section2_heading', $term_key);
$section3_heading     = get_field('section3_heading', $term_key);
?>

<!-- SECTION: Dynamic Destination Banner (Single) -->
<section class="explore-banner">
    <div class="banner-slide">
        <!-- Full-height banner image from Taxonomy ACF -->
        <?php if ($banner_bg) : ?>
            <img src="<?php echo esc_url($banner_bg['url']); ?>" alt="<?php echo esc_attr($term->name); ?>" class="banner-img" />
        <?php else : ?>
            <!-- Fallback to a default image if term image is empty -->
            <img src="<?php echo get_template_directory_uri(); ?>/images/default-banner.jpg" class="banner-img" />
        <?php endif; ?>

        <!-- SVG overlay from Taxonomy ACF -->
        <?php if ($banner_overlay) : ?>
            <img src="<?php echo esc_url($banner_overlay['url']); ?>" alt="map overlay" class="map-overlay" />
        <?php endif; ?>

        <!-- Slide content -->
        <div class="slide-content container">
            <div class="text-center banner-gap-bot">
                <!-- Using Term Description as the Tag -->
                <span class="banner-tag"><?php echo wp_kses_post(term_description()); ?></span>
                <h2 class="banner-title"><?php echo esc_html($term->name); ?></h2>
            </div>

            <div class="explore-location">
                <?php if ($location_icon) : ?>
                    <img src="<?php echo esc_url($location_icon['url']); ?>" class="location-icon" alt="icon" />
                <?php endif; ?>
                <span class="location-text"><?php echo esc_html($location_title); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 1: Ancient Cultures (Content from Term) -->
<section class="antient-section section-padding">
    <div class="container antient-grid">
        <div class="antient-intro">
            <?php echo wp_kses_post($section1_heading); ?>
            <?php echo wp_kses_post($section1_description); ?>
        </div>
        <div class="antient-images">
            <?php if ($section1_image_back) : ?>
                <img src="<?php echo esc_url($section1_image_back['url']); ?>" class="reef-img" alt="<?php echo esc_attr($section1_image_back['alt']); ?>" />
            <?php endif; ?>
            <?php if ($section1_image_front) : ?>
                <img src="<?php echo esc_url($section1_image_front['url']); ?>" class="tiger-img" alt="<?php echo esc_attr($section1_image_front['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SECTION 2: Style Slider (Posts assigned to THIS destination) -->
<section class="style-section section-padding">
    <div class="container">
        <div class="section-header">
            <?php echo wp_kses_post($section2_heading); ?>
        </div>

        <div id="style-splide" class="splide style-slider">
            <!-- Splide Arrows -->
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Arrow.png" class="arrow-plan left-arrow-rotate" alt="prev" />
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Arrow.png" class="arrow-plan" alt="next" />
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
                                'terms'    => $term_id,
                            ),
                        ),
                    );

                    $places_query = new WP_Query($args);
                    if ($places_query->have_posts()) :
                        while ($places_query->have_posts()) : $places_query->the_post(); ?>
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                                        <?php endif; ?>
                                        <h3 class="style-title"><?php the_field('country_name'); ?></h3>
                                    </div>
                                    <p class="style-text"><?php echo wp_trim_words(get_the_content(), 12, '...'); ?></p>
                                    <button class="btn-tilted btn-primary-i">
                                        <a href="<?php the_permalink(); ?>" class="discover-link">Discover More</a>
                                    </button>
                                </div>
                            </div>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 3: Other Destinations (Exclude THIS term) -->
<section class="destination-section section-padding bg-light">
    <div class="container">
        <div class="section-header">
            <?php echo wp_kses_post($section3_heading); ?>
        </div>
        <div class="places-grid">
            <?php
            $other_places_query = new WP_Query(array(
                'post_type'      => 'travel_place',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'destination',
                        'field'    => 'term_id',
                        'terms'    => $term_id,
                        'operator' => 'NOT IN',
                    ),
                )
            ));

            if ($other_places_query->have_posts()) :
                while ($other_places_query->have_posts()) : $other_places_query->the_post(); ?>
                    <div class="place-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('medium');
                            endif; ?>
                        </a>
                        <div class="place-card-content">
                            <h3 class="place-title"><?php the_title(); ?></h3>
                            <p class="place-text"><?php echo wp_trim_words(get_the_content(), 12, '...'); ?></p>
                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content', 'contactsection'); ?>
<?php get_footer(); ?>