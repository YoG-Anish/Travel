<?php get_header(); ?>

<?php if (have_posts()) : 
        while (have_posts()) : the_post(); ?>
            <article class="post">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
    <?php endwhile;
    wp_reset_postdata();
    endif; ?>

<?php get_footer(); ?>