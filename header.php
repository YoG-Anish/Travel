<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
    if (is_front_page()) { ?>
        
    <header id="home" class="hero-section">
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

        <div class="container hero-container">
            <div class="logo-wrapper">
                <?php
                $header_logo_id = get_theme_mod('travel_header_logo');
                if ($header_logo_id) :
                    $header_logo_url = wp_get_attachment_url($header_logo_id);
                    $header_logo_alt = get_post_meta($header_logo_id, '_wp_attachment_image_alt', true);
                ?>
                    <a href=<?php echo esc_url(home_url('/')); ?>>
                        <img src="<?php echo esc_url($header_logo_url); ?>" alt="<?php echo esc_attr($header_logo_alt); ?>" class="header-logo" />
                    <?php endif; ?>
                    </a>
            </div>
            <div class="hero-body">
                <div class="hero-content">
                    <span class="hero-subtitle">
                        <?php echo esc_html(get_theme_mod('travel_header_tagline')); ?>
                    </span>
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('travel_header_heading'); ?>
                    </h1>
                    <div class="hero-cta">
                        <button class="btn-tilted btn-primary-i">
                            <a href="<?php echo esc_url(get_theme_mod('travel_header_button_url')); ?>" class="btn btn-primary">
                                <?php echo esc_html(get_theme_mod('travel_header_button_text')); ?>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="hero-video">
                    <div class="video-wrapper">
                        <div class="dots-circle"></div>
                        <button id="videoToggleButton" class="play-circle" aria-label="Toggle Video">
                            <!-- We add an ID to the icon specifically -->
                            <i id="toggleIcon" class="fa-solid fa-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php } ?>

    <nav class="main-navigation">
        <div class="overflow-contain">
            <div class="container nav-container">
                <div class="nav-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img
                            src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('travel_navbar_logo'))); ?>"
                            alt="travel"
                            class="nav-logo" />
                    </a>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'add_li_class' => 'nav-item',
                    'add_a_class' => 'nav-link',
                ));
                ?>

                <div class="nav-icons">
                    <div class="icon menu-icon" id="hamburger" aria-label="Menu">
                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('travel_navbar_hamburger_icon'))); ?>" alt="menu" />
                    </div>

                    <a class="icon search-icon" href="#">
                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('travel_navbar_search_icon'))); ?>" />
                    </a>
                    <a class="icon heart-icon" href="#">
                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('travel_navbar_heart_icon'))); ?>" />
                    </a>
                    <a class="icon account-icon" href="#">
                        <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('travel_navbar_account_icon'))); ?>" />
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="side-menu" id="sideMenu">
        <div class="side-menu-header">
            <span class="close-btn" id="closeMenu">&times;</span>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'sidemenu',
            'container' => false,
            'fallback_cb' => false,
        ));
        ?>
    </div>

    <div class="overlay" id="overlay"></div>