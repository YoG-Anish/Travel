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
                <span class="section-tag">FIND INSPIRATION FOR YOUR TRIP</span>
                <h2 class="section-heading">
                    Tailored Travel <br />
                    Guided By <span class="highlight">Experts</span> <br />
                    And Powered By <br />
                    Technology
                </h2>
                <p class="section-text">
                    If you're looking for that perfect green and safe ossis, you've
                    come to the right place. Slovenia is the green heart of Europe,
                    where everyone can find sormething for themselves
                </p>
                <p class="section-text">
                    We are ready to offer you the best we have With great deal of
                    responsibility, your visit to flavenia will be enjoyable and
                    unforgettabile
                </p>
            </div>
            <div class="features-cards">
                <div class="feature-card">
                    <div class="feature-icon icon-person">
                        <img src="./images/Service.svg" alt="service" />
                    </div>
                    <h3 class="feature-card-title">Personalized Service</h3>
                    <p class="feature-card-desc">
                        One-to-one service designed to fit your needs and preferences,
                        with around-the-clock support while you travel.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon icon-tech">
                        <img
                            src="./images/Mobile Navigator.svg"
                            alt="mobile navigator" />
                    </div>
                    <h3 class="feature-card-title">Technology-Driven</h3>
                    <p class="feature-card-desc">
                        Easy-to-use tools to keep trip details at your fingertips and
                        simplify your travel.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-connections">
                        <img
                            src="./images/Connected People.svg"
                            alt="connected people" />
                    </div>
                    <h3 class="feature-card-title">Insider Connections</h3>
                    <p class="feature-card-desc">
                        We leverage our global network to provide preferred rates,
                        upgrades, and experiences you won't find online.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-employee">
                        <img src="./images/Name Tag.svg" alt="name tag" />
                    </div>
                    <h3 class="feature-card-title">Employee-Owned</h3>
                    <p class="feature-card-desc">
                        We leverage our global network to provide preferred rates,
                        upgrades, and experiences you won't find online.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="places" class="places-section section-padding bg-light">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">GET INSPIRED</span>
                <h2 class="section-heading">
                    <span class="highlight">Inspiring</span> Places
                </h2>
                <p class="section-desc desc-width">
                    Wherever the path may lead you in the future, you will always find
                    something to make your heart sing. The greatest Slovenian
                    treasures await. How will you feel Slovenia?
                </p>
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
                                    <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
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
    </section>

    <?php get_template_part('template-parts/content', 'slider'); ?>

    <section id="plan" class="style-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">TRAVEL IN STYLE</span>
                <h2 class="section-heading">
                    Find Travel Inspiration By <span class="highlight">Style</span>
                </h2>
                <p class="section-desc desc-width">
                    Wherever the path may lead you in the future, you will always find
                    something to make your heart sing. The greatest Slovenian
                    treasures await. How will you feel Slovenia?
                </p>
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
                    GET A GLIMPSE OF WHAT YOU CAN EXPERIENCE
                </span>
                <h2 class="section-heading">
                    Inspiring <span class="highlight">Stories</span>
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