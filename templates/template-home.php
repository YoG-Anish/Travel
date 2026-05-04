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
                        <!-- Slide 1 -->
                        <div class="splide__slide">
                            <div class="style-card">
                                <div class="style-image-wrapper">
                                    <a href="#">
                                        <img src="./images/family.png" alt="Family Travel" />
                                    </a>
                                    <h3 class="style-title">Family Travel</h3>
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
                                    <h3 class="style-title">Private Travel</h3>
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
                                    <h3 class="style-title">Discover Nature</h3>
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
                                    <h3 class="style-title">Family Travel</h3>
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
                                    <h3 class="style-title">Discover Nature</h3>
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
                                    <h3 class="style-title">Family Travel</h3>
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
                                    <h3 class="style-title">Discover Nature</h3>
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
                <article class="story-item">
                    <div class="story-image">
                        <a href="#">
                            <img src="./images/family.png" alt="Story" />
                        </a>
                    </div>
                    <h3 class="story-title">
                        How to choose a responsible tour operator
                    </h3>
                    <p class="story-meta">ABOUT NIARRA TRAVEL</p>

                    <div class="story-footer">
                        <span class="line"></span>
                        <a href="#" class="read-more">
                            Read Story <span class="arrow">></span>
                        </a>
                    </div>
                </article>
                <article class="story-item">
                    <div class="story-image">
                        <a href="#">
                            <img src="./images/diving.png" alt="Story" />
                        </a>
                    </div>
                    <h3 class="story-title">
                        Healthy waters of Slovenia with freediver Alenka Artnik
                    </h3>
                    <p class="story-meta">ABOUT NIARRA TRAVELS</p>
                    <div class="story-footer">
                        <span class="line"></span>
                        <a href="#" class="read-more">
                            Read Story <span class="arrow">></span>
                        </a>
                    </div>
                </article>
                <article class="story-item">
                    <div class="story-image">
                        <a href="#">
                            <img src="./images/fire.png" alt="Story" />
                        </a>
                    </div>
                    <h3 class="story-title">
                        Why the travel industry needs greater transparency
                    </h3>
                    <p class="story-meta">ABOUT NIARRA TRAVELS</p>
                    <div class="story-footer">
                        <span class="line"></span>
                        <a href="#" class="read-more">
                            Read Story <span class="arrow">></span>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="testimonials-section section-padding">
        <div class="container testimonials-container">
            <div class="testimonials-wrapper">
                <div class="testimonials-header">
                    <span class="section-tag">TESTIMONIALS</span>
                    <h2 class="section-heading">
                        What Travellers <br /><span class="highlight">Say About Us</span>
                    </h2>
                    <div class="overall-stars big-stars">
                        <img src="./images/Star.svg" alt="*" />
                        <img src="./images/Star.svg" alt="*" />
                        <img src="./images/Star.svg" alt="*" />
                        <img src="./images/Star.svg" alt="*" />
                        <img src="./images/Star.svg" alt="*" />
                    </div>
                    <p class="review-count">
                        Based On <span class="highlight">56 Reviews</span>
                    </p>
                </div>

                <!-- SPLIDE SLIDER -->
                <div class="testimonials-slider splide" id="testimonialsSplide">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                            <img
                                src="./images/Arrow.png"
                                class="left-arrow-testimonials left-arrow-rotate"
                                alt="prev" />
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            <img
                                src="./images/Arrow.png"
                                class="right-arrow-testimonials"
                                alt="next" />
                        </button>
                    </div>
                    <div class="splide__track">
                        <div class="splide__list">
                            <div class="splide__slide testimonial-card">
                                <div class="overall-stars small-stars">
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                </div>
                                <h4 class="testimonial-title">
                                    Niarra Exceeded All Expectations
                                </h4>
                                <p class="testimonial-text">
                                    Niarra Travel exceeded all expectations, providing an
                                    exceptional travel experience that deserves nothing less
                                    than a five-star rating...
                                </p>
                                <p class="testimonial-author">
                                    Josh, <span class="testimonial-date">2 days ago</span>
                                </p>
                            </div>

                            <div class="splide__slide testimonial-card">
                                <div class="overall-stars small-stars">
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                </div>
                                <h4 class="testimonial-title">
                                    Charlie Did A Fantastic Job Working
                                </h4>
                                <p class="testimonial-text">
                                    Charlie did a fantastic job working with the team to plan
                                    an amazing trip. It was so special and the attention to
                                    detail did not disappoint...
                                </p>
                                <p class="testimonial-author">
                                    Amber Restine,
                                    <span class="testimonial-date">2 August</span>
                                </p>
                            </div>
                            <div class="splide__slide testimonial-card">
                                <div class="overall-stars small-stars">
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                </div>
                                <h4 class="testimonial-title">
                                    Charlie Did A Fantastic Job Working
                                </h4>
                                <p class="testimonial-text">
                                    Charlie did a fantastic job working with the team to plan
                                    an amazing trip. It was so special and the attention to
                                    detail did not disappoint...
                                </p>
                                <p class="testimonial-author">
                                    Amber Restine,
                                    <span class="testimonial-date">2 August</span>
                                </p>
                            </div>
                            <div class="splide__slide testimonial-card">
                                <div class="overall-stars small-stars">
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                </div>
                                <h4 class="testimonial-title">
                                    Charlie Did A Fantastic Job Working
                                </h4>
                                <p class="testimonial-text">
                                    Charlie did a fantastic job working with the team to plan
                                    an amazing trip. It was so special and the attention to
                                    detail did not disappoint...
                                </p>
                                <p class="testimonial-author">
                                    Amber Restine,
                                    <span class="testimonial-date">2 August</span>
                                </p>
                            </div>
                            <div class="splide__slide testimonial-card">
                                <div class="overall-stars small-stars">
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                    <img src="./images/Star.svg" alt="*" />
                                </div>
                                <h4 class="testimonial-title">
                                    Charlie Did A Fantastic Job Working
                                </h4>
                                <p class="testimonial-text">
                                    Charlie did a fantastic job working with the team to plan
                                    an amazing trip. It was so special and the attention to
                                    detail did not disappoint...
                                </p>
                                <p class="testimonial-author">
                                    Amber Restine,
                                    <span class="testimonial-date">2 August</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <div class="mountain-cloud-bg">
            <div class="container text-center">
                <span class="section-tag"> THE WORLD IS AT YOUR FEET </span>
                <h2 class="section-heading">
                    Receive <span class="highlight">Inspiration</span> In Your Inbox
                </h2>
            </div>
        </div>
        <div class="cloud-bg">
            <div class="container newsletter-form-wrapper">
                <form action="#" class="newsletter-form">
                    <div class="form-row name-row">
                        <div class="input-data">
                            <input type="text" required />
                            <label for="">First Name</label>
                        </div>
                        <div class="input-data">
                            <input type="text" required />
                            <label for="">Last Name</label>
                        </div>
                    </div>

                    <div class="form-row email-row">
                        <div class="input-data">
                            <input type="text" required />
                            <label for="">Email Address</label>
                        </div>
                        <div class="input-data-check">
                            <div class="checkbox-wrapper-15">
                                <input
                                    class="inp-cbx"
                                    id="cbx-15"
                                    type="checkbox"
                                    style="display: none" />
                                <label class="cbx" for="cbx-15">
                                    <span>
                                        <svg width="12px" height="9px" viewbox="0 0 12 9">
                                            <polyline points="1 5 4 8 11 1"></polyline>
                                        </svg>
                                    </span>
                                    <span>I'm happy to receive emails*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn">
                        <div class="input-data">
                            <button type="submit" class="btn-tilted btn-outline-dark">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-cta-section section-padding bg-accent">
        <div class="container contact-grid">
            <div class="contact-text">
                <h2 class="section-heading">
                    <span class="highlight">Contact</span> A Travel Researcher
                </h2>
                <p>We always aim to reply within 24 hours.</p>
            </div>
            <div class="contact-options">
                <div class="contact-option">
                    <img src="./images/Call.svg" alt="Call" />
                    <span class="option-label">Call Us</span>
                    <a href="tel:+18331234567" class="option-value">
                        +1 (833) 123-4567
                    </a>
                </div>
                <div class="contact-option">
                    <img src="./images/Email.svg" alt="Email" />
                    <span class="option-label option-email-gap">
                        <a href="mailto:explore@travel.com" class="option-value">
                            Send Us An Enquiry
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>