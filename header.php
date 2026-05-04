<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="home" class="hero-section">
        <?php
        // 1. Fetch the Video ID from Customizer
        $video_id = get_theme_mod('travel_header_video');
        $video_url = $video_id ? wp_get_attachment_url($video_id) : '';

        // 2. Check if video exists, otherwise show the static image
        if ($video_url) : ?>
            <video autoplay muted loop playsinline class="hero-bg">
                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
            </video>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/banner.svg" alt="background" class="hero-bg" />
        <?php endif; ?>

        
        
        <div class="container hero-container">
            <div class="logo-wrapper">
                <a href="./index.html">
                    <img src="./images/logo.svg" alt="travel" class="nav-logo" />
                </a>
            </div>
            <div class="hero-body">
                <div class="hero-content">
                    <span class="hero-subtitle">
                        CONNECTING YOUR JOURNEY WITH PURPOSE
                    </span>
                    <h1 class="hero-title">
                        <span class="highlight">Unforgettable</span> Travel <br />
                        Experiences With A <br />
                        Positive Impact
                    </h1>
                    <div class="hero-cta">
                        <button class="btn-tilted btn-primary">Discover More</button>
                    </div>
                </div>
                
                
                <!-- The Play Button UI Section -->
                <div class="hero-video">
                    <div class="video-wrapper">
                        <div class="dots-circle"></div>
                        <button class="play-circle" aria-label="Play Video">
                            <i class="fa-solid fa-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="main-navigation">
        <div class="overflow-contain">
            <div class="container nav-container">
                <div class="nav-brand">
                    <a href="./index.html">
                        <img
                            src="./images/logo_green.svg"
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
                        <img src="./images/Menu.svg" alt="menu" />
                    </div>

                    <a class="icon search-icon" href="#">
                        <img src="./images/Search.svg" />
                    </a>
                    <a class="icon heart-icon" href="#">
                        <img src="./images/Heart.svg" />
                    </a>
                    <a class="icon account-icon" href="#">
                        <img src="./images/User.svg" />
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