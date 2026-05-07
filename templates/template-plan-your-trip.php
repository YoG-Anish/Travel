<?php
/*
    Template Name: Plan Your Trip Page
*/
get_header();
?>
<section class="plan-section-head">
    <div class="container">
        <div class="section-header">
            <?php the_field('plan_heading'); ?>
        </div>
    </div>
</section>

<section class="overlapping-bg">
    <div class="container">
        <?php
        $plan_image = get_field('plan_image');
        if ($plan_image) { ?>
            <img src="<?php echo $plan_image['url']; ?>" alt="<?php echo $plan_image['alt']; ?>" />
        <?php } ?>
    </div>
</section>
<section class="planning-form section-padding">
    <div class="container text-center">
        <div class="section-header plan-header">
            <img
                src="<?php get_template_directory_uri(); ?>/images/Destination.svg"
                class="header-bg-swash"
                alt="" />
            <h2 class="section-heading remove-margin-top">
                Build Your <span class="highlight">itinerary</span>
            </h2>
            <p class="section-desc section-width-plan">
                Design your day-to-day itinerary. Select the destinations you want
                to visit and when you are planning to visit them.
            </p>
        </div>
        <div class="plan-form-wrapper">
            <?php echo do_shortcode('[contact-form-7 id="5deb1a5" title="intenerery form"]'); ?>
        </div>
    </div>
</section>
<section class="plan-ideas section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-heading remove-margin-top">
                <span class="highlight">Fresh Ideas</span> at your fingertips
            </h2>
            <p class="section-desc desc-width">
                Wherever the path may lead you in the future, you will always find
                something to make your heart sing. The greatest Slovenian
                treasures await. How will you feel Slovenia?
            </p>
        </div>
        <div class="places-grid">
            <?php
            $itinerary_query = new WP_Query(array(
                'post_type' => 'travel_itinerary',
                'posts_per_page' => -1,
            )) ?>
            <?php
            if ($itinerary_query->have_posts()):
                while ($itinerary_query->have_posts()): $itinerary_query->the_post(); ?>
                    <div class="place-card plan-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="place-card-content">
                                <h3 class="place-title"><?php the_title(); ?></h3>
                                <p class="place-text">
                                    <?php echo wp_trim_words(get_the_content(), 7, '...'); ?>
                                </p>
                            </div>
                        </a>
                        <div class="hover-details">
                            <?php
                            // 1. Define your taxonomy slugs and their human-readable labels
                            $itinerary_meta = array(
                                'preference'       => 'Preference',
                                'pace'             => 'Pace',
                                'attraction-style' => 'Attraction Style',
                            );

                            // 2. Loop through each taxonomy
                            foreach ($itinerary_meta as $slug => $label) :
                                // Fetch the terms assigned to the current post ID
                                $terms = get_the_terms(get_the_ID(), $slug);

                                // 3. Only display if terms exist and there is no error
                                if (! empty($terms) && ! is_wp_error($terms)) :
                                    // Extract names and join them with a comma (e.g., "August, September")
                                    $term_list = implode(', ', wp_list_pluck($terms, 'name'));
                            ?>
                                    <p><?php echo esc_html($label); ?> : <?php echo esc_html($term_list); ?></p>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content', 'contactsection'); ?>

<?php get_footer(); ?>