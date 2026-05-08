<?php
/*
Template Name: Home Page
*/
get_header();
?>
<main>
    <section id="things-to-do" class="features-section section-padding">
        <div class="container features-grid">
            <div class="features-intro">
                <span class="section-tag"><?php echo get_field('home_section1_tagline'); ?></span>
                <?php echo get_field('home_section1_heading'); ?>
                <?php echo get_field('home_section1_description'); ?>
            </div>
            <div class="features-cards">
                <div class="feature-card">
                    <div class="feature-icon icon-person">
                        <?php
                        $section1_parts = get_field('section1_parts');
                        $part1_image = $section1_parts['part1_image'];
                        $part1_content = $section1_parts['part1_content'];
                        $part2_image = $section1_parts['part2_image'];
                        $part2_content = $section1_parts['part2_content'];
                        $part3_image = $section1_parts['part3_image'];
                        $part3_content = $section1_parts['part3_content'];
                        $part4_image = $section1_parts['part4_image'];
                        $part4_content = $section1_parts['part4_content'];
                        if ($part1_image) : ?>
                            <img src="<?php echo esc_url($part1_image['url']); ?>" alt="<?php echo esc_attr($part1_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php echo $part1_content; ?>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-tech">
                        <?php
                        if ($part2_image) : ?>
                            <img src="<?php echo esc_url($part2_image['url']); ?>" alt="<?php echo esc_attr($part2_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php echo $part2_content; ?>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-connections">
                        <?php if ($part3_image) : ?>
                            <img src="<?php echo esc_url($part3_image['url']); ?>" alt="<?php echo esc_attr($part3_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php echo $part3_content; ?>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-employee">
                        <?php if ($part4_image) : ?>
                            <img src="<?php echo esc_url($part4_image['url']); ?>" alt="<?php echo esc_attr($part4_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php echo $part4_content; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="places" class="places-section section-padding bg-light">
        <div class="container">
            <div class="section-header">
                <span class="section-tag"><?php the_field('home_section2_tagline'); ?></span>
                <?php the_field('home_section2_content'); ?>
            </div>
            <div class="places-grid">
                <?php
                $travel_places = new WP_Query(array(
                    'post_type' => 'travel_place',
                    'posts_per_page' => 6,
                ));
                if ($travel_places->have_posts()) :
                    while ($travel_places->have_posts()) : $travel_places->the_post();
                ?>
                        <div class="place-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            <?php endif; ?>
                            <div class="place-card-content">
                                <h3 class="place-title"><?php the_title(); ?></h3>
                                <p class="place-text">
                                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                </p>
                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No places found.</p>';
                endif;
                ?>
            </div>
        </div>
        <a href ="<?php echo get_field('see_all_places') ?>" class="btn btn-primary">See all places</a>
    </section>

    <?php get_template_part('template-parts/content', 'slider'); ?>

    <section id="plan" class="style-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag"><?php the_field('home_section4_tagline'); ?></span>
                <?php the_field('home_section4_content'); ?>
            </div>

            <div class="splide style-slider">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <img
                            src="./images/Arrow.png"
                            class="arrow-plan left-arrow-rotate"
                            alt="prev" />
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <img src="./images/Arrow.png" class="arrow-plan" alt="next" />
                    </button>
                </div>
                <div class="splide__track">
                    <div class="splide__list">
                        <?php
                        $style_query = new WP_Query(array(
                            'post_type' => 'travel_style',
                            'posts_per_page' => -1,
                        ));
                        if ($style_query->have_posts()) :
                            while ($style_query->have_posts()) : $style_query->the_post();
                        ?>
                                <div class="splide__slide">
                                    <div class="style-card">
                                        <div class="style-image-wrapper">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                            </a>
                                            <h3 class="style-title"><?php the_title(); ?></h3>
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
                            wp_reset_postdata();
                        else :
                            echo '<p>No styles found.</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stories-section section-padding bg-light">
        <div class="container">
            <div class="section-header center-header">
                <span class="section-tag">
                    <?php the_field('home_section5_tagline'); ?>
                </span>
                <h2 class="section-heading">
                    <?php the_field('home_section5_content'); ?>
                </h2>
            </div>
            <div class="stories-grid">
                <?php
                $story_query = new WP_Query(array(
                    'post_type' => 'travel_story',
                    'posts_per_page' => 3,
                ));
                if ($story_query->have_posts()) :
                    while ($story_query->have_posts()) : $story_query->the_post(); ?>
                        <article class="story-item">
                            <div class="story-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <h3 class="story-title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="story-meta"><?php echo esc_html(get_field('about_author_text')); ?></p>
                            <div class="story-footer">
                                <span class="line"></span>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php echo esc_html(get_field('story_button')); ?> <span class="arrow">></span>
                                </a>
                            </div>
                        </article>
                <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No stories found.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'testonomial'); ?>
    <?php get_template_part('template-parts/content', 'contactform'); ?>
    <?php get_template_part('template-parts/content', 'contactsection'); ?>

</main>

<?php get_footer(); ?>