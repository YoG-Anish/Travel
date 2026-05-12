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
    wp_enqueue_style('travel-about', get_template_directory_uri() . '/CSS/about.css');
    wp_enqueue_style('travel-features', get_template_directory_uri() . '/CSS/features.css');
    wp_enqueue_style('travel-plans', get_template_directory_uri() . '/CSS/plans.css');
    wp_enqueue_style('travel-places', get_template_directory_uri() . '/CSS/places.css');
    wp_enqueue_style('travel-pagination', get_template_directory_uri() . '/CSS/pagination.css');
    wp_enqueue_style('travel-destinations', get_template_directory_uri() . '/CSS/destinations.css');
    wp_enqueue_style('travel-slider', get_template_directory_uri() . '/CSS/slider.css');
    wp_enqueue_style('travel-overflow', get_template_directory_uri() . '/CSS/overflow.css');
    wp_enqueue_style('travel-stories', get_template_directory_uri() . '/CSS/stories.css');
    wp_enqueue_style('travel-details', get_template_directory_uri() . '/CSS/details.css');
    wp_enqueue_style('travel-things', get_template_directory_uri() . '/CSS/things.css');
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
        'footer-bottom' => __('Footer Bottom Menu', 'travel'),

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

    // Header Image
    $wp_customize->add_setting('travel_header_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travel_header_image_control', array(
        'label' => __('Header Image', 'travel'),
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
        1
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

    // contact form dynamic seperate section
    $wp_customize->add_section('travel_contact_section', array(
        'title' => __('Contact Form Settings', 'travel'),
        'priority' => 32,
    ));

    // contactform image
    $wp_customize->add_setting('contactform_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'contactform_image_control', array(
        'label' => __('Contact Form Image', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_image',
    )));

    // contactform tagline  
    $wp_customize->add_setting('contactform_tagline', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_tagline_control', array(
        'label' => __('Contact Form Tagline', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_tagline',
        'type' => 'text',
    ));

    // contactform heading
    $wp_customize->add_setting('contactform_heading', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_heading_control', array(
        'label' => __('Contact Form Heading', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_heading',
        'type' => 'text',
    ));

    // Contact section2 heading
    $wp_customize->add_setting('contactform_section2_heading', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_heading_control', array(
        'label' => __('Contact Section 2 Heading', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_heading',
        'type' => 'text',
    ));

    // contact section2 tagline
    $wp_customize->add_setting('contactform_section2_tagline', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_tagline_control', array(
        'label' => __('Contact Section 2 Tagline', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_tagline',
        'type' => 'text',
    ));

    // Contact section2 phone icon
    $wp_customize->add_setting('contactform_section2_phone_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'contactform_section2_phone_icon_control', array(
        'label' => __('Contact Section 2 Phone Icon', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_phone_icon',
        'mime_type' => 'image',
    )));

    // Contact section2 Call Us text
    $wp_customize->add_setting('contactform_section2_call_text', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_call_text_control', array(
        'label' => __('Contact Section 2 Call Us Text', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_call_text',
        'type' => 'text',
    ));

    // Contact section2 phone number
    $wp_customize->add_setting('contactform_section2_phone_number', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_phone_number_control', array(
        'label' => __('Contact Section 2 Phone Number', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_phone_number',
        'type' => 'text',
    ));

    // Contact section2 email icon
    $wp_customize->add_setting('contactform_section2_email_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'contactform_section2_email_icon_control', array(
        'label' => __('Contact Section 2 Email Icon', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_email_icon',
        'mime_type' => 'image',
    )));

    // Contact section2 email text
    $wp_customize->add_setting('contactform_section2_email_text', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_email_text_control', array(
        'label' => __('Contact Section 2 Email Text', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_email_text',
        'type' => 'text',
    ));

    // Contact section2 email address
    $wp_customize->add_setting('contactform_section2_email', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contactform_section2_email_control', array(
        'label' => __('Contact Section 2 Email Address', 'travel'),
        'section' => 'travel_contact_section',
        'settings' => 'contactform_section2_email',
        'type' => 'text',
    ));

    // Footer Menu
    $wp_customize->add_section('travel_footer_menu_section', array(
        'title' => __('Footer Menu Settings', 'travel'),
        'priority' => 33,
    ));

    // footer social media icons
    // footer facebook icon
    $wp_customize->add_setting('footer_facebook_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_facebook_icon_control', array(
        'label' => __('Footer Facebook Icon', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_facebook_icon',
        'mime_type' => 'image',
    )));

    // facebook URL
    $wp_customize->add_setting('footer_facebook_url', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_facebook_url_control', array(
        'label' => __('Footer Facebook URL', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_facebook_url',
        'type' => 'text',
    ));

    // footer instagram icon
    $wp_customize->add_setting('footer_instagram_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_instagram_icon_control', array(
        'label' => __('Footer Instagram Icon', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_instagram_icon',
        'mime_type' => 'image',
    )));

    // instagram URL
    $wp_customize->add_setting('footer_instagram_url', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_instagram_url_control', array(
        'label' => __('Footer Instagram URL', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_instagram_url',
        'type' => 'text',
    ));

    //  footer linkedin icon
    $wp_customize->add_setting('footer_linkedin_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_linkedin_icon_control', array(
        'label' => __('Footer LinkedIn Icon', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_linkedin_icon',
        'mime_type' => 'image',
    )));

    // linkedin URL
    $wp_customize->add_setting('footer_linkedin_url', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_linkedin_url_control', array(
        'label' => __('Footer LinkedIn URL', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_linkedin_url',
        'type' => 'text',
    ));

    // footer logo
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_control', array(
        'label' => __('Footer Logo', 'travel'),
        'section' => 'travel_footer_menu_section',
        'settings' => 'footer_logo',
        'mime_type' => 'image',
    )));

    // customizer for google maps section
    $wp_customize->add_section('travel_google_maps_section', array(
        'title' => __('Google Maps Settings', 'travel'),
        'priority' => 34,
    ));

    $wp_customize->add_setting('google_maps', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('google_maps_api_key_control', array(
        'label' => __('Google Maps', 'travel'),
        'section' => 'travel_google_maps_section',
        'settings' => 'google_maps',
        'type' => 'text',
    ));

    // customizer for video in itinerary section
    $wp_customize->add_section('travel_video_in_itinerary_section', array(
        'title' => __('Video in Itinerary Settings', 'travel'),
        'priority' => 35,
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

    // register Destination taxonomy for travel places that has choose option in post  
    $labels = array(
        'name' => 'Destinations',
        'singular_name' => 'Destination',
        'search_items' => 'Search Destinations',
        'all_items' => 'All Destinations',
        'parent_item' => 'Parent Destination',
        'parent_item_colon' => 'Parent Destination:',
        'edit_item' => 'Edit Destination',
        'update_item' => 'Update Destination',
        'add_new_item' => 'Add New Destination',
        'new_item_name' => 'New Destination Name',
        'menu_name' => 'Destinations',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'destination'),
        'show_in_rest' => true,
    );
    register_taxonomy('destination', array('travel_place', 'travel_itinerary'), $args);

    // travel Itinerary cpt
    $labels = array(
        'name' => 'Travel Itineraries',
        'singular_name' => 'Travel Itinerary',
        'add_new' => 'Add New Travel Itinerary',
        'add_new_item' => 'Add New Travel Itinerary',
        'edit_item' => 'Edit Travel Itinerary',
        'new_item' => 'New Travel Itinerary',
        'view_item' => 'View Travel Itinerary',
        'search_items' => 'Search Travel Itineraries',
        'not_found' => 'No travel itineraries found',
        'not_found_in_trash' => 'No travel itineraries found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar-alt',
    );
    register_post_type('travel_itinerary', $args);

    //taxonomy for travel itinerary preference, pace and attraction style
    $labels = array(
        'name' => 'Preferences',
        'singular_name' => 'Preference',
        'search_items' => 'Search Preferences',
        'all_items' => 'All Preferences',
        'parent_item' => 'Parent Preference',
        'parent_item_colon' => 'Parent Preference:',
        'edit_item' => 'Edit Preference',
        'update_item' => 'Update Preference',
        'add_new_item' => 'Add New Preference',
        'new_item_name' => 'New Preference Name',
        'menu_name' => 'Preferences',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'preference'),
        'show_in_rest' => true,
    );
    register_taxonomy('preference', array('travel_itinerary'), $args);

    // taxonomy for travel itinerary pace
    $labels = array(
        'name' => 'Paces',
        'singular_name' => 'Pace',
        'search_items' => 'Search Paces',
        'all_items' => 'All Paces',
        'parent_item' => 'Parent Pace',
        'parent_item_colon' => 'Parent Pace:',
        'edit_item' => 'Edit Pace',
        'update_item' => 'Update Pace',
        'add_new_item' => 'Add New Pace',
        'new_item_name' => 'New Pace Name',
        'menu_name' => 'Paces',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'pace'),
        'show_in_rest' => true,
    );
    register_taxonomy('pace', array('travel_itinerary'), $args);

    // attraction style taxonomy
    $labels = array(
        'name' => 'Attraction Styles',
        'singular_name' => 'Attraction Style',
        'search_items' => 'Search Attraction Styles',
        'all_items' => 'All Attraction Styles',
        'parent_item' => 'Parent Attraction Style',
        'parent_item_colon' => 'Parent Attraction Style:',
        'edit_item' => 'Edit Attraction Style',
        'update_item' => 'Update Attraction Style',
        'add_new_item' => 'Add New Attraction Style',
        'new_item_name' => 'New Attraction Style Name',
        'menu_name' => 'Attraction Styles',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'attraction-style'),
        'show_in_rest' => true,
    );
    register_taxonomy('attraction-style', array('travel_itinerary'), $args);
}
add_action('init', 'travel_register_custom_post_types');

/**
 * Dynamically populate the CF7 select field with Destination Taxonomy terms
 */
add_filter('wpcf7_form_tag', 'nextstep_dynamic_itinerary_dropdown', 10, 2);
function nextstep_dynamic_itinerary_dropdown($tag, $unused)
{
    // Only target our specific field name
    if ($tag['name'] != 'destination-list') {
        return $tag;
    }

    $terms = get_terms(array(
        'taxonomy'   => 'destination', // Your taxonomy slug
        'hide_empty' => false,
    ));

    if (! empty($terms) && ! is_wp_error($terms)) {
        $tag['raw_values'] = array();
        $tag['values']     = array();
        $tag['labels']     = array();

        // Add the placeholder
        $tag['raw_values'][] = '';
        $tag['values'][]     = '';
        $tag['labels'][]     = 'Select destination';

        foreach ($terms as $term) {
            $tag['raw_values'][] = $term->name;
            $tag['values'][]     = $term->name;
            $tag['labels'][]     = $term->name;
        }
    }
    return $tag;
}

function travel_custom_search_filter($query)
{
    // Only run on frontend search results for the main query
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {

        $tax_query = array('relation' => 'AND');

        // 1. Filter by Destination Taxonomy
        if (!empty($_GET['dest'])) {
            $tax_query[] = array(
                'taxonomy' => 'destination',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_GET['dest']),
            );
        }

        // 2. Filter by Preference Taxonomy
        if (!empty($_GET['pref'])) {
            $tax_query[] = array(
                'taxonomy' => 'attraction-style',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_GET['pref']),
            );
        }

        // Apply queries to the main search
        $query->set('tax_query', $tax_query);
    }
}
add_action('pre_get_posts', 'travel_custom_search_filter');


function travel_enforce_search_criteria()
{
    // 1. Check if we are on a search request
    if (is_search() && !is_admin()) {

        // 2. If 'dest' is missing or empty in the URL
        if (!isset($_GET['dest']) || empty($_GET['dest'])) {

            // 3. Redirect them back to the "Plan Your Trip" page
            // We add a 'error=no-dest' parameter to the URL
            $url = add_query_arg('search_error', 'no-destination', wp_get_referer());

            wp_safe_redirect($url);
            exit;
        }
    }
}
add_action('template_redirect', 'travel_enforce_search_criteria');

// Register Elementor widgets

function register_my_custom_widget( $widgets_manager ) {
    // Path to your widget file
    require_once( get_template_directory() . '/inc/elementor-widgets/my-test-widget.php' );

    // Register the widget class
    $widgets_manager->register( new \My_Custom_Test_Widget() );
}
add_action( 'elementor/widgets/register', 'register_my_custom_widget' );