<?php
/*
    Template name: Contact Page
*/
get_header();
?>
<main>
    <section class="contact-top-header">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Contact us</span>
                <h2 class="section-heading">
                    <span class="highlight">Contact us</span> by sending <br />
                    a message
                </h2>
                <p class="section-desc desc-width">
                    We always aim to reply within 24 hours.
                </p>
            </div>
        </div>
    </section>
    <section class="form-map-section">
        <div class="container form-map-grid">
            <div class="contact-form-in-grid">
                <form action="#" method="POST" class="contact-form">
                    <div class="contact-form-group">
                        <label for="fullname">Your Name</label>
                        <div class="row">
                            <input
                                type="text"
                                id="firstname"
                                name="firstname"
                                placeholder="First name"
                                required />
                            <input
                                type="text"
                                id="lastname"
                                name="lastname"
                                placeholder="Last Name"
                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="contact-form-group field">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Your Email"
                                required />
                        </div>

                        <div class="contact-form-group field">
                            <label for="phone">Phone</label>
                            <input
                                type="tel"
                                id="phone"
                                name="pnone"
                                placeholder="Your Number"
                                required />
                        </div>
                    </div>
                    <!-- DESTINATION -->
                    <div class="contact-form-group">
                        <label for="message">Message</label>
                        <textarea
                            type="textarea"
                            id="message"
                            name="message"
                            placeholder="Your Message"
                            rows="3"
                            required></textarea>
                    </div>
                    <!-- SUBMIT -->
                    <div class="form-actions">
                        <button type="submit" class="button primary-btn">
                            SEND MESSAGE
                        </button>
                    </div>
                </form>
            </div>
            <div class="map-in-grid">
                <div class="embed-map-responsive">
                    <div class="embed-map-container">
                        <?php
                        $contact_map = get_theme_mod('google_maps');
                        if ($contact_map) { ?>
                            <iframe
                                class="embed-map-frame"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                src="<?php echo $contact_map; ?>">
                            </iframe>
                        <?php } ?>
                        <a
                            href="https://sprunkiretake.net"
                            style="
                    font-size: 2px !important;
                    color: gray !important;
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    z-index: 1;
                    max-height: 1px;
                    overflow: hidden;
                  ">Sprunki</a>
                    </div>
                    <style>
                        .embed-map-responsive {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 100%;
                            padding-bottom: 86.66666666666667%;
                        }

                        .embed-map-container {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            top: 0;
                            left: 0;
                        }

                        .embed-map-frame {
                            width: 100% !important;
                            height: 100% !important;
                            position: absolute;
                            top: 0;
                            left: 0;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/content-contactsection'); ?>
</main>
<?php get_footer(); ?>