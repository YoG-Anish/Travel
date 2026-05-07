<?php
/*
    Template Name: Places To Go 4 Page
*/
get_header();
?>

<section class="overview-banner-section">
    <img src="<?php echo get_template_directory_uri(); ?>/images/reflection.png" alt="Back Ground" class="hero-bg" />
    <div class="container">
        <div class="section-header">
            <span class="overview-section-tag">11 Day Tripsssss</span>
            <h3 class="overview-section-heading">
                Chitwan and Bardia Luxury Safari
            </h3>
            <p class="overview-section-desc desc-width">
                Head to the jungles and plains of Nepal’s south in search of
                iconic wildlife, getting an insight into the country’s rich
                history and culture as you explore two diverse national parks on
                safari.
            </p>
        </div>
    </div>
</section>
<section class="overview-section">
    <div class="container">
        <div class="overview-section-container">
            <span class="section-tag"> overview </span>
            <h3 class="overview-heading">
                Experience Nepal's wildest national parks
            </h3>
            <div class="overview-content">
                <p>
                    Head to the jungles and plains of Nepal’s south in search of
                    iconic wildlife, getting an insight into the country’s rich
                    history and culture as you explore two diverse national parks on
                    safari.
                </p>
                <p>
                    Begin with two nights in the colourful bustle of Kathmandu, with
                    a full-day private tour to introduce to the city, its people and
                    sacred sites. Then fly south to the iconic Chitwan, a beautiful
                    park that is home to an abundance of species, and the rarely
                    visited Bardia National Park, with two wonderfully relaxed
                    nights at a lodge in the mountains outside Pokhara in between
                    for an immersion into rural Nepali life.
                </p>
                <p>
                    In both parks, discover the landscape on an engaging mix of
                    activities, from game drives and elephant walks to village
                    visits and boat trips. Alongside expert naturalist guides, spot
                    Nepal’s most iconic species, such as leopards, Asian elephants,
                    greater one-horned rhinoceroses, gharial crocodiles, river
                    dolphins, sloth bears, monkeys, hundreds of bird species and, of
                    course, the majestic Bengal tiger.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="about-video-section">
    <div class="container">
        <div class="about-video-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/images/cliffwater.png" alt="Landscape" />
            <div class="video-wrapper video-overlay">
                <div class="dots-circle"></div>
                <button id="videoToggleButton" class="play-circle" aria-label="Toggle Video">
                    <i id="toggleIcon" class="fa-solid fa-play"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="highlight-content-section">1
    <div class="container">
        <div class="highlight-grid">
            <div class="highlight-card">
                <h3 class="overview-heading remove-margin">Trek Highlights</h3>
                <ul>
                    <li>
                        A chance to see iconic species including tigers in the wild
                    </li>
                    <li>A great mix of safari activities on land and water</li>
                    <li>Sundowners with the elephants at Tharu Lodge</li>
                    <li>Sundowners with the elephants at Tharu Lodge</li>
                </ul>
            </div>
            <div class="highlight-card">
                <h3 class="overview-heading remove-margin">What's included</h3>
                <ul>
                    <li>Ten nights of luxury accommodation</li>
                    <li>Tours, experiences and safari activities</li>
                    <li>Internal flights and private transfers</li>
                    <li>Price per person based on two adults sharing</li>
                </ul>
            </div>
        </div>
        <div class="highlight-timeline">
            <?php
            $pod = pods('travel_place', get_the_ID());
            $trek_outlines = $pod->field('trek_outlines');
            ?>
            <?php
            if (!empty($trek_outlines)) {
                foreach ($trek_outlines as $outline) {
                    $day_item_id = $outline['ID'];

                    $day_range   = get_post_meta($day_item_id, 'day_range', true);
                    $day_heading = get_post_meta($day_item_id, 'day_heading', true);
                    $day_desc    = get_post_meta($day_item_id, 'day_description', true);

                    // Logic: Determine if it's "DAY" or "DAYS"
                    $label = (strpos($day_range, '-') !== false) ? 'DAYS' : 'DAY';
            ?>
                    <h3 class="overview-heading remove-margin">Outlines of the trek</h3>
                    <div class="timelines-grid">
                        <div class="timeline-grid">
                            <div class="timeline-intro">
                                <div class="intro-icon">
                                    <img src="<?php get_template_directory_uri(); ?>/images/play.png" alt=">" class="rotate-90" />
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
<section class="example-trips-section section-padding">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">example trips</span>
            <h2 class="section-heading text-white">
                start your <span class="highlight">adventure</span> here
            </h2>
        </div>
        <div class="split-layout">
            <!-- Left Side -->
            <div class="section-left">
                <div class="section-left-content">
                    <p>Start your adventure here</p>
                    <p>
                        From <br />
                        <span class="price-tag">$ 4,390 </span>
                        <span class="price-unit">PP</span>
                    </p>
                </div>
                <button class="btn-enquire">Enquire</button>
            </div>

            <!-- Divider Middle -->
            <div class="divider">
                <div class="or-circle">or</div>
            </div>

            <!-- Right Side  -->
            <div class="section-right">
                <p>Call us</p>
                <a href="tel:+18331234567" class="section-right-phone">
                    +1 (833) 215 9253
                </a>
                <span class="section-font-small">
                    We always aim to reply within 24 hours.
                </span>
            </div>
        </div>
    </div>
</section>
<section class="similar-trips-section section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-heading remove-margin-top">
                <span class="highlight">Similar trips</span>
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
<?php get_footer(); ?>