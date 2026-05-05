<?php
function travel_enqueue_scripts()
{
    wp_enqueue_style('travel-style', get_stylesheet_uri());
    wp_enqueue_style('travel-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('travel-splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
    wp_enqueue_style('travel-base', get_template_directory_uri() . '/CSS/base.css');
    wp_enqueue_style('travel-hero', get_template_directory_uri() . '/CSS/hero.css');
    wp_enqueue_style('travel-button', get_template_directory_uri() . '/CSS/button.css');
    wp_enqueue_style('travel-nav', get_template_directory_uri() . '/CSS/nav.css');
    wp_enqueue_style('travel-main', get_template_directory_uri() . '/CSS/main.css');
    wp_enqueue_style('travel-features', get_template_directory_uri() . '/CSS/features.css');
    wp_enqueue_style('travel-places', get_template_directory_uri() . '/CSS/places.css');
    wp_enqueue_style('travel-slider', get_template_directory_uri() . '/CSS/slider.css');
    wp_enqueue_style('travel-overflow', get_template_directory_uri() . '/CSS/overflow.css');
    wp_enqueue_style('travel-stories', get_template_directory_uri() . '/CSS/stories.css');
    wp_enqueue_style('travel-testimonials', get_template_directory_uri() . '/CSS/testimonials.css');
    wp_enqueue_style('travel-bgoverlap', get_template_directory_uri() . '/CSS/bgoverlap.css');
    wp_enqueue_style('travel-form', get_template_directory_uri() . '/CSS/form.css');
    wp_enqueue_style('travel-contact', get_template_directory_uri() . '/CSS/contact.css');
    wp_enqueue_style('travel-footer', get_template_directory_uri() . '/CSS/footer.css');

    wp_enqueue_script('travel-script', get_template_directory_uri() . '/Js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('travel-splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true);
    wp_enqueue_script('travel-destinaion-slider', get_template_directory_uri() . '/Js/destination-slider.js', array(), '1.0.0', true);
    wp_enqueue_script('travel-testimonial-slider', get_template_directory_uri() . '/Js/testimonial-slider.js', array(), '1.0.0', true);
    wp_enqueue_script('travel-footer-seperator', get_template_directory_uri() . '/Js/footer-seperator.js', array(), '1.0.0', true);
    wp_enqueue_script('travel-pagination', get_template_directory_uri() . '/Js/pagination.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'travel_enqueue_scripts');

//add theme setup
function travel_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'travel'),
        'footer' => __('Footer Menu', 'travel'),
        'sidemenu' => __('Side Menu', 'travel'),
    ));
}
add_action('after_setup_theme', 'travel_theme_setup');

// Support SVG Uploads
function travel_allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'travel_allow_svg_uploads');

// 1. Add 'nav-item' class to the <li> tags
function add_nav_item_class($classes, $item, $args)
{
    if ($args->theme_location === 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_nav_item_class', 10, 3);

// 2. Add 'nav-link' class to the <a> tags
function add_nav_link_class($atts, $item, $args)
{
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_nav_link_class', 10, 3);

// Customizer section for header file
function travel_customize_register($wp_customize)
{
    $wp_customize->add_section('travel_header_section', array(
        'title' => __('Header Settings', 'travel'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('travel_header_video', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_header_video_control', array(
        'label' => __('Header Video', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_video',
        'mime_type' => 'video',
    )));

    // IF not Video show Image
    $wp_customize->add_setting('travel_header_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_header_image_control', array(
        'label' => __('If not Video show Image', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_image',
        'mime_type' => 'image',
    )));

    // Header Logo
    $wp_customize->add_setting('travel_header_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_header_logo', array(
        'label' => __('Header Logo', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_logo',
        'mime_type' => 'image',
    )));

    // Header Tagline   
    $wp_customize->add_setting('travel_header_tagline', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('travel_header_tagline_control', array(
        'label' => __('Header Tagline', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_tagline',
        'type' => 'text',
    ));

    // header Heading
    $wp_customize->add_setting('travel_header_heading', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('travel_header_heading_control', array(
        'label' => __('Header Heading', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_heading',
        'type' => 'text',
    ));

    // header Discover More Button text
    $wp_customize->add_setting('travel_header_button_text', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('travel_header_button_text_control', array(
        'label' => __('Header Button Text', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_button_text',
        'type' => 'text',
    ));

    // header Discover More Button URL
    $wp_customize->add_setting('travel_header_button_url', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('travel_header_button_url_control', array(
        'label' => __('Header Button URL', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_header_button_url',
        'type' => 'dropdown-pages',
    ));

    // Navbar Logo  
    $wp_customize->add_setting('travel_navbar_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_navbar_logo', array(
        'label' => __('Navbar Logo', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_navbar_logo',
        'mime_type' => 'image',
    )));

    // navbar hamburger menu icon
    $wp_customize->add_setting('travel_navbar_hamburger_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_navbar_hamburger_icon', array(
        'label' => __('Navbar Hamburger Icon', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_navbar_hamburger_icon',
        'mime_type' => 'image',
    )));

    // navbar search icon
    $wp_customize->add_setting('travel_navbar_search_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_navbar_search_icon', array(
        'label' => __('Navbar Search Icon', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_navbar_search_icon',
        'mime_type' => 'image',
    )));

    // navbar heart icon
    $wp_customize->add_setting('travel_navbar_heart_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_navbar_heart_icon', array(
        'label' => __('Navbar Heart Icon', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_navbar_heart_icon',
        'mime_type' => 'image',
    )));

    // navbar account icon
    $wp_customize->add_setting('travel_navbar_account_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_navbar_account_icon', array(
        'label' => __('Navbar Account Icon', 'travel'),
        'section' => 'travel_header_section',
        'settings' => 'travel_navbar_account_icon',
        'mime_type' => 'image',
    )));

    // testinomial dynamic seperate section 
    $wp_customize->add_section('travel_testimonial_section', array(
        'title' => __('Testimonial Settings', 'travel'),
        'priority' => 31,
    ));

     // testinomial title
     $wp_customize->add_setting('testinomial_title', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('testinomial_title_control', array(
        'label' => __('Testimonial Title', 'travel'),
        'section' => 'travel_testimonial_section',
        'settings' => 'testinomial_title',
        'type' => 'text',
    ));

    //testinomial heading
    $wp_customize->add_setting('testinomial_heading', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('testinomial_heading_control', array(
        'label' => __('Testimonial Heading', 'travel'),
        'section' => 'travel_testimonial_section',
        'settings' => 'testinomial_heading',
        'type' => 'text',
    ));

    // testinomial rating text
    $wp_customize->add_setting('rating_text', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('rating_text_control', array(
        'label' => __('Testimonial Rating Text', 'travel'),
        'section' => 'travel_testimonial_section',
        'settings' => 'rating_text',
        'type' => 'text',
    ));
  
}
add_action('customize_register', 'travel_customize_register');

// Register custom post types for all
function travel_register_custom_post_types()
{
    // Travel Places Custom Post Type
    $labels = array(
        'name' => 'Travel Places',
        'singular_name' => 'Travel Place',
        'add_new' => 'Add New Travel Place',
        'add_new_item' => 'Add New Travel Place',
        'edit_item' => 'Edit Travel Place',
        'new_item' => 'New Travel Place',
        'view_item' => 'View Travel Place',
        'search_items' => 'Search Travel Places',
        'not_found' => 'No travel places found',
        'not_found_in_trash' => 'No travel places found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-location-alt',
    );
    register_post_type('travel_place', $args);

    // Travel Stories Custom Post Type
    $labels = array(
        'name' => 'Travel Stories',
        'singular_name' => 'Travel Story',
        'add_new' => 'Add New Travel Story',
        'add_new_item' => 'Add New Travel Story',
        'edit_item' => 'Edit Travel Story',
        'new_item' => 'New Travel Story',
        'view_item' => 'View Travel Story',
        'search_items' => 'Search Travel Stories',
        'not_found' => 'No travel stories found',
        'not_found_in_trash' => 'No travel stories found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-aside',
    );
    register_post_type('travel_story', $args);

    // Travel Testimonials Custom Post Type
    $labels = array(
        'name' => 'Travel Testimonials',
        'singular_name' => 'Travel Testimonial',
        'add_new' => 'Add New Travel Testimonial',
        'add_new_item' => 'Add New Travel Testimonial',
        'edit_item' => 'Edit Travel Testimonial',
        'new_item' => 'New Travel Testimonial',
        'view_item' => 'View Travel Testimonial',
        'search_items' => 'Search Travel Testimonials',
        'not_found' => 'No travel testimonials found',
        'not_found_in_trash' => 'No travel testimonials found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-testimonial',
    );
    register_post_type('travel_testimonial', $args);

    // Travel Sliders Custom Post Type
    $labels = array(
        'name' => 'Travel Sliders',
        'singular_name' => 'Travel Slider',
        'add_new' => 'Add New Travel Slider',
        'add_new_item' => 'Add New Travel Slider',
        'edit_item' => 'Edit Travel Slider',
        'new_item' => 'New Travel Slider',
        'view_item' => 'View Travel Slider',
        'search_items' => 'Search Travel Sliders',
        'not_found' => 'No travel sliders found',
        'not_found_in_trash' => 'No travel sliders found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-images-alt2',
    );
    register_post_type('travel_slider', $args);

    // Travel Styles Custom Post Type
    $labels = array(
        'name' => 'Travel Styles',
        'singular_name' => 'Travel Style',
        'add_new' => 'Add New Travel Style',
        'add_new_item' => 'Add New Travel Style',
        'edit_item' => 'Edit Travel Style',
        'new_item' => 'New Travel Style',
        'view_item' => 'View Travel Style',
        'search_items' => 'Search Travel Styles',
        'not_found' => 'No travel styles found',
        'not_found_in_trash' => 'No travel styles found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-palmtree',
    );
    register_post_type('travel_style', $args);
}
add_action('init', 'travel_register_custom_post_types');
