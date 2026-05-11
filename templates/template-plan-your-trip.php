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
            <?php the_field('plan_description'); ?>
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
                src="<?php echo get_template_directory_uri(); ?>/images/Destination.svg"
                class="header-bg-swash"
                alt="" />
            <?php the_field('plan2_content'); ?>
        </div>
        <div class="plan-form-wrapper">
            <form role="search" method="get" class="itinerary-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="s" value="" />

                <!-- 1. Destination (Taxonomy) -->
                <div class="form-group">
                    <label>Destination</label>
                    <select name="dest">
                        <option value="" disabled selected hidden>Select destination</option>
                        <?php
                        $destinations = get_terms(['taxonomy' => 'destination', 'hide_empty' => false]);
                        foreach ($destinations as $term) {
                            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- 2. Date Range (Meta Fields) -->
                <div class="form-row">
                    <div class="form-group">
                        <label>Date Range</label>
                        <input type="date" name="start_date" />
                    </div>
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="date" name="end_date" />
                    </div>
                </div>

                <!-- 3. Guests (Meta) & Activities (Taxonomy) -->
                <div class="form-row">
                    <div class="form-group">
                        <label>Guests</label>
                        <select name="guests">
                            <option value="" disabled selected hidden>Select number of guests</option>
                            <option value="1">1 adult</option>
                            <option value="2">2 adults</option>
                            <option value="3">3 adults</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Activities Preferences</label>
                        <select name="pref">
                            <option value="" disabled selected hidden>Select preferences</option>
                            <?php
                            $prefs = get_terms(['taxonomy' => 'attraction-style', 'hide_empty' => false]);
                            foreach ($prefs as $term) {
                                echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <!-- Hidden input to tell WP we only want to search 'travel_itinerary' CPT -->
                <input type="hidden" name="post_type" value="travel_itinerary" />

                <?php if (isset($_GET['search_error']) && $_GET['search_error'] === 'no-destination') : ?>
                    <p style="color: red;">Error: You must select a destination to see results!</p>
                <?php endif; ?>
                <button type="submit" class="btn-see-trip">SEE YOUR TRIP</button>
            </form>
        </div>
    </div>
</section>
<section class="plan-ideas section-padding">
    <div class="container">
        <div class="section-header">
            <?php the_field('plan3_content'); ?>
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