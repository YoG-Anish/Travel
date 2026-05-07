<?php
/*
    Template Name: Places To Go 2 Page
*/
get_header();
?>
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
                'posts_per_page' => 3,
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
                <?php endwhile; ?>
                <div class="pagination-trips">
                    <?php echo paginate_links(array(
                        'total' => $travel_places->max_num_pages
                    )); ?>
                </div>
            <?php wp_reset_postdata();
            else :
                echo '<p>No places found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/content', 'contactsection'); ?>
<?php get_footer(); ?>