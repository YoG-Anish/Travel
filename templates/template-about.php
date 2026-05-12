<?php
/*
    Template Name: About Page
*/
get_header();
?>
<section class="about-head-section">
    <div class="container">
        <div class="section-header">
            <?php echo get_field('about_heading'); ?>
            <?php the_content(); ?>
        </div>
    </div>
</section>
<section class="about-video-section">
    <div class="container">
        <div class="about-video-wrapper">
            <?php
            $video_id = get_theme_mod('travel_header_video');
            $video_url = $video_id ? wp_get_attachment_url($video_id) : '';

            if ($video_url) : ?>
                <video id="mainHeroVideo" muted loop playsinline class="hero-bg">
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                </video>
            <?php else : ?>
                <img src="<?php echo get_theme_mod('travel_header_image'); ?>" alt="background" class="hero-bg" />
            <?php endif; ?>

            <div class="video-wrapper video-overlay">
                <div class="dots-circle"></div>
                <button id="videoToggleButton" class="play-circle" aria-label="Play Video">
                    <i id="toggleIcon" class="fa-solid fa-play"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="about-desctiption-section">
    <div class="container">
        <div class="about-description-wrapper section-width-about">
            <?php echo get_field('about_description'); ?>
        </div>
    </div>
</section>
<section class="book-us-section section-padding">
    <div class="container book-us-grid">
        <div class="book-us-intro">
            <div class="section-header">
                <?php echo get_field('about_section2_heading'); ?>
            </div>
            <div class="book-us-cards">
                <?php echo get_field('about_section2_description'); ?>
            </div>
        </div>
        <div class="book-us-images">
        <?php
        $image_front_id = get_field('image_front');
        $image_back_id = get_field('image_back');
        if ($image_front_id) { ?>
            
            <img src="<?php echo $image_front_id['url']; ?>" alt="<?php echo $image_front_id['alt']; ?>" class="tiger-img" />
       <?php }
        if ($image_back_id) { ?>
            <img src="<?php echo $image_back_id['url']; ?>" alt="<?php echo $image_back_id['alt']; ?>" class="reef-img" />
       <?php } ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content-testinomial'); ?>
<?php get_template_part('template-parts/content-contactform'); ?>
<?php get_template_part('template-parts/content-contactsection'); ?>


<?php get_footer(); ?>