<?php
/*
    Template Name: Places To Go 4 Page
*/
get_header();
?>

<section class="overview-banner-section">
    <?php
    $image_id = get_field('itinerary_banner');
    if ($image_id) { ?>
        <img src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>" class="hero-bg" />
    <?php } else { ?>
        <div>
            <h1 style="text-align: center; font-color: #000000;"><?php the_title(); ?></h1>
        </div>';
    <?php } ?>


    <div class="container">
        <div class="section-header">
            <span class="overview-section-tag"><?php the_field('total_days'); ?></span>
            <?php the_field('itinerary_heading'); ?>
        </div>
    </div>
</section>
<section class="overview-section">
    <div class="container">
        <div class="overview-section-container">
            <?php the_field('itinerary_description'); ?>
        </div>
    </div>
</section>
<section class="about-video-section">
    <div class="container">
        <div class="about-video-wrapper">
            <?php
            $video_id = get_field('itinerary_video');

            if ($video_id) : ?>
                <video id="mainHeroVideo" muted loop playsinline class="hero-bg">
                    <source src="<?php echo esc_url($video_id['url']); ?>" type="video/mp4">
                </video>


                <div class="video-wrapper video-overlay">
                    <div class="dots-circle"></div>
                    <button id="videoToggleButton" class="play-circle" aria-label="Toggle Video">
                        <i id="toggleIcon" class="fa-solid fa-play"></i>
                    </button>
                </div>
            <?php endif;
            ?>
        </div>
    </div>
</section>
<section class="highlight-content-section">1
    <div class="container">
        <div class="highlight-grid">
            <div class="highlight-card">
                <?php the_field('itinerary_column1'); ?>
            </div>
            <div class="highlight-card">
                <?php the_field('itinerary_column2'); ?>
            </div>
        </div>
        <div class="highlight-timeline">
            <?php
            $pod = pods('travel_itinerary', get_the_ID());
            $trek_outlines = $pod->field('trek_outlines');
            ?>
            <?php
            if (!empty($trek_outlines)) { ?>
                <h3 class="overview-heading remove-margin">Outlines of the trek</h3>
                <?php
                foreach ($trek_outlines as $outline) {
                    $day_item_id = $outline['ID'];

                    $day_range   = get_post_meta($day_item_id, 'day_range', true);
                    $day_heading = get_post_meta($day_item_id, 'day_heading', true);
                    $day_desc    = get_post_meta($day_item_id, 'day_description', true);

                    // Logic: Determine if it's "DAY" or "DAYS"
                    $label = (strpos($day_range, '-') !== false) ? 'DAYS' : 'DAY';
                ?>
                    <div class="timelines-grid">
                        <div class="timeline-grid">
                            <div class="timeline-intro">
                                <div class="intro-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/play.png" alt=">" class="rotate-90" />
                                </div>
                                <div class="intro-header">
                                    <span class="intro-tag"><?php echo esc_html($day_range); ?></span>
                                    <h4 class="intro-header"><?php echo esc_html($day_heading); ?></h4>
                                </div>
                            </div>
                            <div class="timeline-desc">
                                <p>
                                    <?php echo esc_html($day_desc); ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php   }
            }
            ?>
        </div>
    </div>
</section>
<?php
$payment_section = get_field('payment_section');
$payment_heading = $payment_section['payment_heading'];
$payment_column1 = $payment_section['payment_column1'];
$payment_column2 = $payment_section['payment_column2'];
?>
<?php if ($payment_heading || $payment_column1 || $payment_column2) : ?>
    <section class="example-trips-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <?php echo $payment_heading ?>
            </div>
            <div class="split-layout">
                <!-- Left Side -->
                <div class="section-left">
                    <?php echo $payment_column1 ?>
                </div>

                <!-- Divider Middle -->1
                <div class="divider">
                    <div class="or-circle">or</div>
                </div>

                <!-- Right Side  -->
                <div class="section-right">
                    <?php echo $payment_column2 ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="similar-trips-section section-padding">
    <div class="container">
        <div class="section-header">
            <?php the_field('itinerary_last_section_content'); ?>
        </div>
        <div class="places-grid">
            <?php
            // 1. Get the current post ID (to exclude it and get its terms)
            $current_id = get_the_ID();

            // 2. Get the 'attraction-style' terms of the current post
            $current_terms = get_the_terms($current_id, 'attraction-style');

            // Proceed only if the current post actually has terms assigned
            if (!empty($current_terms) && !is_wp_error($current_terms)) :

                // Extract the IDs of the terms (e.g., [12, 15])
                $term_ids = wp_list_pluck($current_terms, 'term_id');

                // 3. Setup the arguments for the "Similar Posts" query
                $args = array(
                    'post_type'      => 'travel_itinerary',
                    'posts_per_page' => 3,              // Usually, 3 is enough for a "Similar" section
                    'post__not_in'   => array($current_id), // Don't show the post we are currently reading
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'attraction-style',
                            'field'    => 'term_id',
                            'terms'    => $term_ids,
                        ),
                    ),
                );

                $itinerary_query = new WP_Query($args);

                if ($itinerary_query->have_posts()) :
                    while ($itinerary_query->have_posts()) : $itinerary_query->the_post(); ?>

                        <div class="place-card plan-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : the_post_thumbnail();
                                endif; ?>
                                <div class="place-card-content">
                                    <h3 class="place-title"><?php the_title(); ?></h3>
                                    <p class="place-text">
                                        <?php echo wp_trim_words(get_the_content(), 7, '...'); ?>
                                    </p>
                                </div>
                            </a>

                            <div class="hover-details">
                                <?php
                                $itinerary_meta = array(
                                    'preference'       => 'Preference',
                                    'pace'             => 'Pace',
                                    'attraction-style' => 'Attraction Style',
                                );

                                foreach ($itinerary_meta as $slug => $label) :
                                    $terms = get_the_terms(get_the_ID(), $slug);
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                        $term_list = implode(', ', wp_list_pluck($terms, 'name'));
                                        echo '<p>' . esc_html($label) . ' : ' . esc_html($term_list) . '</p>';
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>

            <?php endwhile;
                    wp_reset_postdata(); // CRUCIAL
                else :
                    echo '<p>No similar itineraries found.</p>';
                endif;
            else :
                echo '<p>Please assign an Attraction Style to this post to see similar trips.</p>';
            endif; ?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/content', 'contactsection'); ?>
<?php get_footer(); ?>