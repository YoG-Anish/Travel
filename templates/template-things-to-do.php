<?php
/*
Template Name: Things To Do Page
*/
get_header();
?>
<section id="plan" class="things-section section-padding">
    <div class="container">
        <div class="section-header">
            <?php the_field('things_to_do_heading'); ?>
        </div>

        <div class="things-to-do-cards">
            <?php
            $travel_places = new WP_Query(array(
                'post_type' => 'travel_style',
                'posts_per_page' => -1,
            ))
            ?>
            <?php if ($travel_places->have_posts()) :
                while ($travel_places->have_posts()) : $travel_places->the_post(); ?>
                    <div class="things-to-do-card">
                        <div class="things-style-image-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            <?php endif; ?>
                            <h3 class="things-style-title"><?php the_title(); ?></h3>
                        </div>
                        <p>
                            <?php echo wp_trim_words(get_the_content(), 12, '...'); ?>
                        </p>
                        <button class="btn-tilted btn-primary-i">
                            <a href="<?php the_permalink(); ?>" class="discover-link">Discover More
                            </a>
                        </button>
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
<?php get_template_part('template-parts/content', 'contactsection'); ?>


<?php get_footer(); ?>