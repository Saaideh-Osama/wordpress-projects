<?php

/**
 * Option Panel
 *
 * @package BroadNews
 */

$broadnews_default = broadnews_get_default_theme_options();


/**
 * Frontpage options section
 *
 * @package BroadNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel(
    'main_banner_option_panel',
    array(
        'title' => esc_html__('Main Banner Options', 'broadnews'),
        'priority' => 31,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Main Banner Slider Section
 * */

// Main banner Sider Section.
$wp_customize->add_section(
    'frontpage_main_banner_section_settings',
    array(
        'title' => esc_html__('Main Banner', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting(
    'show_main_news_section',
    array(
        'default' => $broadnews_default['show_main_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'show_main_news_section',
    array(
        'label' => esc_html__('Enable Main Banner Section', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);



// Setting banner_advertisement_section.
$wp_customize->add_setting(
    'main_banner_background_section',
    array(
        'default' => $default['main_banner_background_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'main_banner_background_section',
        array(
            'label' => esc_html__('Main Banner Background Image', 'broadnews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'broadnews'), 1024, 800),
            'section' => 'frontpage_main_banner_section_settings',
            'width' => 1024,
            'height' => 800,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 100,
            'active_callback' => 'broadnews_main_banner_section_status'
        )
    )
);

//main banner order

$wp_customize->add_setting(
    'select_main_banner_order',
    array(
        'default' => $broadnews_default['select_main_banner_order'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'select_main_banner_order',
    array(
        'label' => esc_html__('Select Main Banner Order', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'order-1' => esc_html__("Order 1", 'broadnews'),
            'order-2' => esc_html__("Order 2", 'broadnews'),
            'order-3' => esc_html__("Order 3", 'broadnews'),
            'order-4' => esc_html__("Order 4", 'broadnews'),            
        ),
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
            );
        },
    )
);


//main banner order





/**
 * Main Banner Section
 * */

//section title
$wp_customize->add_setting(
    'main_banner_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'main_banner_panel_section_title',
        array(
            'label' => esc_html__('Main News Section ', 'broadnews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => 'broadnews_main_banner_section_status',
        )
    )
);


// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
    'select_main_banner_carousel_filterby',
    array(
        'default' => $broadnews_default['select_main_banner_carousel_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'select_main_banner_carousel_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'broadnews'),
            'tag' => esc_html__("Tag", 'broadnews'),            
        ),
        'priority' => 100,
        'active_callback' => 'broadnews_main_banner_section_status'
    )
);


// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_slider_news_category',
    array(
        'default' => $broadnews_default['select_slider_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_slider_news_category',
    array(
        'label' => esc_html__('Select Category', 'broadnews'),
        'description' => esc_html__('Select category to be shown on main slider section', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_main_banner_section_filterby_cat_status($control)
            );
        },

    )
));


// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_slider_news_tag',
    array(
        'default' => $broadnews_default['select_slider_news_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_slider_news_tag',
    array(
        'label' => esc_html__('Select Tag', 'broadnews'),
        'description' => esc_html__('Select tag to be shown on main slider section', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_main_banner_section_filterby_tag_status($control)
            );
        },
    )
));

$wp_customize->add_setting(
    'main_banner_carousel_autoplay',
    array(
        'default' => $broadnews_default['main_banner_carousel_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'main_banner_carousel_autoplay',
    array(
        'label' => esc_html__('Enable Autoplay', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)                
            );
        },
    )
);


/**
 * Editor's Picks Post Section
 * */


//section title
$wp_customize->add_setting(
    'editors_picks_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'editors_picks_panel_section_title',
        array(
            'label' => esc_html__("Editor's Picks Section", 'broadnews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (broadnews_main_banner_section_status($control)
                   
                );
            },
        )
    )
);


$wp_customize->add_setting(
    'main_editors_picks_section_title',
    array(
        'default' => $broadnews_default['main_editors_picks_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'main_editors_picks_section_title',
    array(
        'label' => esc_html__('Section Title ', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },

    )

);


// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
    'select_editors_picks_filterby',
    array(
        'default' => $broadnews_default['select_editors_picks_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'select_editors_picks_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'broadnews'),
            'tag' => esc_html__("Tag", 'broadnews'),
            
        ),
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },
    )
);


// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_editors_picks_news_category',
    array(
        'default' => $broadnews_default['select_editors_picks_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_editors_picks_news_category',
    array(
        'label' => esc_html__('Select Category', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_editors_picks_section_filterby_cat_status($control)
                
            );
        },

    )
));


// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_editors_picks_news_tag',
    array(
        'default' => $broadnews_default['select_editors_picks_news_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_editors_picks_news_tag',
    array(
        'label' => esc_html__('Select Tag', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_editors_picks_section_filterby_tag_status($control)
                
            );
        },
    )
));


$wp_customize->add_setting(
    'editors_picks_news_autoplay',
    array(
        'default' => $broadnews_default['editors_picks_news_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'editors_picks_news_autoplay',
    array(
        'label' => esc_html__('Enable Autoplay', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },
    )
);


/**
 * Trending Post Section
 * */

//section title
$wp_customize->add_setting(
    'trending_post_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'trending_post_panel_section_title',
        array(
            'label' => esc_html__("Trending Section", 'broadnews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (broadnews_main_banner_section_status($control)
                    
                );
            },
        )
    )
);


$wp_customize->add_setting(
    'main_trending_news_section_title',
    array(
        'default' => $broadnews_default['main_trending_news_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'main_trending_news_section_title',
    array(
        'label' => esc_html__('Section Title ', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },

    )

);


// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
    'select_trending_post_filterby',
    array(
        'default' => $broadnews_default['select_trending_post_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'select_trending_post_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'broadnews'),
            'tag' => esc_html__("Tag", 'broadnews'),
            
        ),
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },
    )
);



// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_trending_post_category',
    array(
        'default' => $broadnews_default['select_trending_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_trending_post_category',
    array(
        'label' => esc_html__('Select Category', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_trending_post_section_filterby_cat_status($control)
                
            );
        },

    )
));

// Setting - drop down category for slider.
$wp_customize->add_setting(
    'select_trending_post_tag',
    array(
        'default' => $broadnews_default['select_trending_post_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_trending_post_tag',
    array(
        'label' => esc_html__('Select Tag', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                &&
                broadnews_trending_post_section_filterby_tag_status($control)
                
            );
        },
    )
));


$wp_customize->add_setting(
    'trending_post_autoplay',
    array(
        'default' => $broadnews_default['trending_post_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'trending_post_autoplay',
    array(
        'label' => esc_html__('Enable Autoplay', 'broadnews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (broadnews_main_banner_section_status($control)
                
            );
        },
    )
);


//Popular Tags
// Advertisement Section.
$wp_customize->add_section(
    'frontpage_popular_tags_settings',
    array(
        'title' => esc_html__('Popular Tags', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
    'frontpage_popular_tags_settings',
    array(
        'default' => $broadnews_default['frontpage_popular_tags_settings'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_setting(
    'show_popular_tags_section',
    array(
        'default' => $broadnews_default['show_popular_tags_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'show_popular_tags_section',
    array(
        'label' => esc_html__('Enable Trending Tags', 'broadnews'),
        'section' => 'frontpage_popular_tags_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


$wp_customize->add_setting(
    'frontpage_popular_tags_section_title',
    array(
        'default' => $broadnews_default['frontpage_popular_tags_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'frontpage_popular_tags_section_title',
    array(
        'label' => esc_html__('Section Title ', 'broadnews'),
        'section' => 'frontpage_popular_tags_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_popular_tags_section_status'

    )

);

// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
    'frontpage_popular_tags_section_filterby',
    array(
        'default' => $broadnews_default['frontpage_popular_tags_section_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'frontpage_popular_tags_section_filterby',
    array(
        'label' => esc_html__('Order Tags By', 'broadnews'),
        'section' => 'frontpage_popular_tags_settings',
        'type' => 'select',
        'choices' => array(
            'popular' => esc_html__("Popularity", 'broadnews'),
            'latest' => esc_html__("Latest", 'broadnews'),
        ),
        'priority' => 100,
        'active_callback' => 'broadnews_popular_tags_section_status'
    )
);




//Flash news
$wp_customize->add_section(
    'frontpage_flash_news_settings',
    array(
        'title' => esc_html__('Exclusive News', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
    'frontpage_flash_news_settings',
    array(
        'default' => $broadnews_default['frontpage_flash_news_settings'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_setting(
    'show_flash_news_section',
    array(
        'default' => $broadnews_default['show_flash_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'show_flash_news_section',
    array(
        'label' => esc_html__('Enable Exclusive News', 'broadnews'),
        'section' => 'frontpage_flash_news_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


$wp_customize->add_setting(
    'flash_news_title',
    array(
        'default' => $broadnews_default['flash_news_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'flash_news_title',
    array(
        'label' => esc_html__('Section Title ', 'broadnews'),
        'section' => 'frontpage_flash_news_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_flash_posts_section_status'

    )

);

$wp_customize->add_setting(
    'select_flash_news_category',
    array(
        'default'           => $broadnews_default['select_flash_news_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new broadnews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_flash_news_category',
    array(
        'label'       => esc_html__('Flash Posts Category', 'broadnews'),
        'description' => esc_html__('Select category to be shown on trending posts ', 'broadnews'),
        'section'     => 'frontpage_flash_news_settings',
        'type'        => 'dropdown-taxonomies',
        'taxonomy'    => 'category',
        'priority'    => 100,
        'active_callback' => 'broadnews_flash_posts_section_status'
    )
));


/**
 * Frontpage options section
 *
 * @package BroadNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel(
    'frontpage_option_panel',
    array(
        'title' => esc_html__('Frontpage Options', 'broadnews'),
        'priority' => 31,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Grid Post Section
 * */


$wp_customize->add_section(
    'frontpage_post_carousel_settings',
    array(
        'title' => esc_html__('Posts Carousel', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);

// Setting - show_featured_posts_section.
$wp_customize->add_setting(
    'show_post_carousel_section',
    array(
        'default' => $broadnews_default['show_post_carousel_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'show_post_carousel_section',
    array(
        'label' => esc_html__('Enable Posts Carousel Section', 'broadnews'),
        'section' => 'frontpage_post_carousel_settings',
        'type' => 'checkbox',
        'priority' => 22,


    )
);

$wp_customize->add_setting(
    'featured_post_carousel_section_title',
    array(
        'default' => $broadnews_default['featured_post_carousel_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'featured_post_carousel_section_title',
    array(
        'label' => esc_html__('Section Title ', 'broadnews'),
        'section' => 'frontpage_post_carousel_settings',
        'type' => 'text',
        'priority' => 130,
        'active_callback' => 'broadnews_featured_post_carousel_section_status'

    )

);

//List of categories

$wp_customize->add_setting(
    'select_featured_post_carousel_category',
    array(
        'default' => $broadnews_default['select_featured_post_carousel_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(new BroadNews_Dropdown_Taxonomies_Control(
    $wp_customize,
    'select_featured_post_carousel_category',
    array(
        'label' => sprintf(__('Select ', 'broadnews')),
        'description' => esc_html__('Select category to be shown on featured section ', 'broadnews'),
        'section' => 'frontpage_post_carousel_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 130,
        'active_callback' => 'broadnews_featured_post_carousel_section_status',


    )
));




// Frontpage Layout Section.
$wp_customize->add_section(
    'frontpage_layout_settings',
    array(
        'title' => esc_html__('Frontpage Layout Settings', 'broadnews'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting(
    'frontpage_content_alignment',
    array(
        'default' => $broadnews_default['frontpage_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'frontpage_content_alignment',
    array(
        'label' => esc_html__('Frontpage Content Alignment', 'broadnews'),
        'description' => esc_html__('Select frontpage content alignment', 'broadnews'),
        'section' => 'frontpage_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Home Content - Home Sidebar', 'broadnews'),
            'align-content-right' => esc_html__('Home Sidebar - Home Content', 'broadnews'),
            'full-width-content' => esc_html__('Only Home Content', 'broadnews')
        ),
        'priority' => 10,
    )
);
