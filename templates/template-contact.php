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
                <?php echo get_field('contact_headings'); ?>
            </div>
        </div>
    </section>
    <section class="form-map-section">
        <div class="container form-map-grid">
            <div class="contact-form-in-grid">
                <?php echo do_shortcode('[contact-form-7 id="d9294fc" title="Contact page form"]'); ?>
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