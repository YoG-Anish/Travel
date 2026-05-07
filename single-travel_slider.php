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
        if(!empty($destinations) && !is_wp_error($destinations)){
            $dest = $destinations[0];
        }
        $term_key = 'destination_' . $dest->term_id;
        $section1_image_back = get_field('section1_image_back', $term_key);
        $section1_image_front = get_field('section1_image_front', $term_key);
        $section1_heading = get_field('section1_heading', $term_key);
        $section1_description = get_field('section1_description', $term_key);
        ?>
                <?php
                echo $dest->name;
                echo wp_kses_post($section1_heading); 
                echo wp_kses_post($section1_description);
                echo wp_kses_post($section1_image_back);
                echo wp_kses_post($section1_image_front);
                ?>
        <?php
        $destination_terms = get_terms(array(
            'taxonomy' => 'destination',
            'hide_empty' => false,
        ));

        if (!empty($destination_terms) && !is_wp_error($destination_terms)) {
            foreach ($destination_terms as $term) {
                $term_key = 'destination_' . $term->term_id;
                $section1_heading = get_field('section1_heading', $term_key);
                $section1_description = get_field('section1_description', $term_key);
                $section1_image_back = get_field('section1_image_back', $term_key);
                $section1_image_front = get_field('section1_image_front', $term_key);
        ?>
                <section class="antient-section section-padding">
                    <div class="container antient-grid">
                        <div class="antient-intro">
                            <?php echo wp_kses_post($section1_heading); ?>
                            <?php echo wp_kses_post($section1_description); ?>
                        </div>
                        <div class="antient-images">
                            <?php if ($section1_image_back) : ?>
                                <img src="<?php echo esc_url($section1_image_back['url']); ?>" alt="<?php echo esc_attr($section1_image_back['alt']); ?>" class="tiger-img" />
                            <?php else : ?>
                                <img src="./images/tiger.png" alt="Tiger" class="tiger-img" />
                            <?php endif; ?>

                            <?php if ($section1_image_front) : ?>
                                <img src="<?php echo esc_url($section1_image_front['url']); ?>" alt="<?php echo esc_attr($section1_image_front['alt']); ?>" class="reef-img" />
                            <?php else : ?>
                                <img src="./images/reef.png" alt="Reef" class="reef-img" />
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
        <?php
            }
        }
        ?>
        <section class="style-section section-padding">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">COUNTRIES IN ASIA</span>
                    <h2 class="section-heading">
                        <span class="highlight">Where</span> do you want to go?
                    </h2>
                    <p class="section-desc desc-width">
                        We’re launching with mountainous Nepal and the Indonesian
                        Archipelago, with more fascinating destinations to follow in the
                        very near future. Please get in touch with the Niarra team if
                        you’d like to explore other parts of this wonderful continent.
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
                            <!-- Slide 1 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/family.png" alt="Family Travel" />
                                        </a>
                                        <h3 class="style-title">Nepal</h3>
                                    </div>
                                    <p class="style-text">
                                        Luxury family safaris and inspiring wildlife adventures
                                        with a positive impact.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/private.png" alt="Private Travel" />
                                        </a>
                                        <h3 class="style-title">Indonesia</h3>
                                    </div>
                                    <p class="style-text">
                                        Quality time with family and friends, complete flexibility
                                        and exclusive use safari camps.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/nature.png" alt="Discover Nature" />
                                        </a>
                                        <h3 class="style-title">Bhutan</h3>
                                    </div>
                                    <p class="style-text">
                                        Quality time with family and friends, complete flexibility
                                        and exclusive use safari camps.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>
                            <!-- Slide 1 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/family.png" alt="Family Travel" />
                                        </a>
                                        <h3 class="style-title">India</h3>
                                    </div>
                                    <p class="style-text">
                                        Luxury family safaris and inspiring wildlife adventures
                                        with a positive impact.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>
                            <!-- Slide 3 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/nature.png" alt="Discover Nature" />
                                        </a>
                                        <h3 class="style-title">China</h3>
                                    </div>
                                    <p class="style-text">
                                        Quality time with family and friends, complete flexibility
                                        and exclusive use safari camps.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>
                            <!-- Slide 1 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/family.png" alt="Family Travel" />
                                        </a>
                                        <h3 class="style-title">Japan</h3>
                                    </div>
                                    <p class="style-text">
                                        Luxury family safaris and inspiring wildlife adventures
                                        with a positive impact.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>
                            <!-- Slide 3 -->
                            <div class="splide__slide">
                                <div class="style-card">
                                    <div class="style-image-wrapper">
                                        <a href="#">
                                            <img src="./images/nature.png" alt="Discover Nature" />
                                        </a>
                                        <h3 class="style-title">Germany</h3>
                                    </div>
                                    <p class="style-text">
                                        Quality time with family and friends, complete flexibility
                                        and exclusive use safari camps.
                                    </p>
                                    <button class="btn-tilted btn-primary-i">
                                        Discover More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile;
    wp_reset_postdata();
else : ?>
    <p>No slides found.</p>
<?php endif; ?>
<section class="destination-section section-padding bg-light">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Example Trips</span>
            <h2 class="section-heading">
                <span class="highlight">Inspiring</span> Places
            </h2>
            <p class="section-desc desc-width">
                Browse our Asia example trips and get in contact to start planning
                your very own adventure.
            </p>
        </div>
        <div class="places-grid">
            <div class="place-card">
                <a href="#">
                    <img src="./images/piran.png" alt="Piran And Salt Pans" />
                </a>
                <div class="place-card-content">
                    <h3 class="place-title">Piran And Salt Pans</h3>
                    <p class="place-text">
                        Piran, the most beautiful town of Mediterranean Slovenia.
                    </p>
                </div>
            </div>
            <div class="place-card">
                <a href="#">
                    <img src="./images/postojna.png" alt="Postojna Cave" />
                </a>

                <div class="place-card-content">
                    <h3 class="place-title">Postojna Cave</h3>
                    <p class="place-text">
                        Postojna Cave and Predjama Castle are world-class attractions!
                    </p>
                </div>
            </div>
            <div class="place-card">
                <a href="#">
                    <img src="./images/bled.png" alt="Bled" />
                </a>

                <div class="place-card-content">
                    <h3 class="place-title">Bled</h3>
                    <p class="place-text">
                        Lake Bled and a castle perched on a cliff is one of the most
                        beautiful Alpine resorts in Europe.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/content', 'contactsection'); ?>

<?php get_footer(); ?>