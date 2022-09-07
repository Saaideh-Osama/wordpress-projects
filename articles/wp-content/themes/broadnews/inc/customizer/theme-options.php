<?php

/**
 * Option Panel
 *
 * @package BroadNews
 */

$broadnews_default = broadnews_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/frontpage-options.php';

//font and color options
require get_template_directory() . '/inc/customizer/font-color-options.php';


/**
 * Frontpage options section
 *
 * @package BroadNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel(
    'site_header_option_panel',
    array(
        'title' => esc_html__('Header Options', 'broadnews'),
        'priority' => 30,
        'capability' => 'edit_theme_options',
    )
);

/**
 * Header section
 *
 * @package BroadNews
 */

// Frontpage Section.
$wp_customize->add_section(
    'header_options_settings',
    array(
        'title' => esc_html__('Header Settings', 'broadnews'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'site_header_option_panel',
    )
);



// Setting - menus desc of news.
$wp_customize->add_setting(
    'enable_primary_menu_desc',
    array(
        'default' => $broadnews_default['enable_primary_menu_desc'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'enable_primary_menu_desc',
    array(
        'label' => esc_html__('Primary Menu Desc (Badge)', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'select',
        'choices' => array(
            'aft-enable-menu-desc' => esc_html__('Enable', 'broadnews'),
            'aft-disable-menu-desc' => esc_html__('Disable', 'broadnews'),
        ),
        'priority' => 5,
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'enable_site_mode_switch',
    array(
        'default' => $broadnews_default['enable_site_mode_switch'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'enable_site_mode_switch',
    array(
        'label' => esc_html__('Site Mode Switch', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'select',
        'choices' => array(
            'aft-enable-mode-switch' => esc_html__('Enable', 'broadnews'),
            'aft-disable-mode-switch' => esc_html__('Disable', 'broadnews'),
        ),
        'priority' => 5,
    )
);

// // Setting - global content alignment of news.
// $wp_customize->add_setting('continue_switched_site_mode',
// array(
//     'default' => $broadnews_default['continue_switched_site_mode'],
//     'capability' => 'edit_theme_options',
//     'sanitize_callback' => 'broadnews_sanitize_select',
// )
// );

// $wp_customize->add_control('continue_switched_site_mode',
// array(
//     'label' => esc_html__('Switched Mode Scope', 'broadnews'),
//     'section' => 'colors',
//     'type' => 'select',
//     'choices' => array(
//         'aft-only-on-switched-page' => esc_html__('Only on Switched Page ', 'broadnews'),
//         'aft-apply-on-all-page' => esc_html__('Continue on All Pages', 'broadnews'),
//     ),
//     'priority' => 5,
// ));


//section title
$wp_customize->add_setting(
    'show_top_header_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'show_top_header_section_title',
        array(
            'label' => esc_html__("Top Header Section", 'broadnews'),
            'section' => 'header_options_settings',
            'priority' => 10,

        )
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting(
    'show_top_header_section',
    array(
        'default' => $broadnews_default['show_top_header_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'show_top_header_section',
    array(
        'label' => esc_html__('Show Top Header', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        //'active_callback' => 'broadnews_top_header_status'
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting(
    'show_social_menu_section',
    array(
        'default' => $broadnews_default['show_social_menu_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'show_social_menu_section',
    array(
        'label' => esc_html__('Show Social Menu', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'broadnews_top_header_status'
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting(
    'show_date_section',
    array(
        'default' => $broadnews_default['show_date_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'show_date_section',
    array(
        'label' => esc_html__('Show Date', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'broadnews_top_header_status'
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting(
    'show_time_section',
    array(
        'default' => $broadnews_default['show_time_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'show_time_section',
    array(
        'label' => esc_html__('Show Time', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'broadnews_top_header_status'
    )
);

// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
    'top_header_time_format',
    array(
        'default' => $broadnews_default['top_header_time_format'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'top_header_time_format',
    array(
        'label' => esc_html__('Time Format', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'select',
        'choices' => array(
            'en-US' => esc_html__('12 hours', 'broadnews'),
            'en-GB' => esc_html__('24 hours', 'broadnews'),
            'en-WP' => esc_html__('From WordPress Settings', 'broadnews'),
        ),
        'priority' => 10,
        'active_callback' => function ($control) {
            return (broadnews_top_header_status($control)
                &&
                broadnews_show_time_status($control)


            );
        },

    )
);



// Advertisement Section.
$wp_customize->add_section(
    'frontpage_advertisement_settings',
    array(
        'title' => esc_html__('Header Advertisement', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'site_header_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
    'banner_advertisement_section',
    array(
        'default' => $broadnews_default['banner_advertisement_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'banner_advertisement_section',
        array(
            'label' => esc_html__('Header Section Advertisement', 'broadnews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'broadnews'), 930, 110),
            'section' => 'frontpage_advertisement_settings',
            'width' => 930,
            'height' => 110,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 120,
        )
    )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting(
    'banner_advertisement_section_url',
    array(
        'default' => $broadnews_default['banner_advertisement_section_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'banner_advertisement_section_url',
    array(
        'label' => esc_html__('URL Link', 'broadnews'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'text',
        'priority' => 130,
    )
);

// Add Theme Options Panel.
$wp_customize->add_panel(
    'theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'broadnews'),
        'priority' => 32,
        'capability' => 'edit_theme_options',
    )
);



/**
 * Layout options section
 *
 * @package BroadNews
 */

// Layout Section.
$wp_customize->add_section(
    'site_layout_mode_settings',
    array(
        'title' => esc_html__('Site Layout Mode', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);



$wp_customize->add_setting(
    'global_site_layout_topbottom_gaps',
    array(
        'default' => $broadnews_default['global_site_layout_topbottom_gaps'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'global_site_layout_topbottom_gaps',
    array(
        'label' => esc_html__("Enable Gaps Around", 'broadnews'),
        'section' => 'site_layout_mode_settings',
        'type' => 'checkbox',
        'priority' => 130,
        
    )
);





// Breadcrumb Section.
$wp_customize->add_section(
    'site_breadcrumb_settings',
    array(
        'title' => esc_html__('Breadcrumb Options', 'broadnews'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - breadcrumb.
$wp_customize->add_setting(
    'enable_breadcrumb',
    array(
        'default' => $broadnews_default['enable_breadcrumb'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'enable_breadcrumb',
    array(
        'label' => esc_html__('Show breadcrumbs', 'broadnews'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'select_breadcrumb_mode',
    array(
        'default' => $default['select_breadcrumb_mode'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'select_breadcrumb_mode',
    array(
        'label' => esc_html__('Select Breadcrumbs', 'broadnews'),
        'description' => esc_html__("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'broadnews'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'select',
        'choices' => array(
            'default' => esc_html__('Default', 'broadnews'),
            'yoast' => esc_html__('Yoast SEO', 'broadnews'),
            'rankmath' => esc_html__('Rank Math', 'broadnews'),
            'bcn' => esc_html__('NavXT', 'broadnews'),
        ),
        'priority' => 100,
    )
);




/**
 * Layout options section
 *
 * @package BroadNews
 */

// Layout Section.
$wp_customize->add_section(
    'site_layout_settings',
    array(
        'title' => esc_html__('Global Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - preloader.
$wp_customize->add_setting(
    'enable_site_preloader',
    array(
        'default' => $broadnews_default['enable_site_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'enable_site_preloader',
    array(
        'label' => esc_html__('Enable Preloader', 'broadnews'),
        'section' => 'site_layout_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_content_alignment',
    array(
        'default' => $broadnews_default['global_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_content_alignment',
    array(
        'label' => esc_html__('Global Content Alignment', 'broadnews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Content - Primary sidebar', 'broadnews'),
            'align-content-right' => esc_html__('Primary sidebar - Content', 'broadnews'),
            'full-width-content' => esc_html__('Full width content', 'broadnews')
        ),
        'priority' => 130,
    )
);


// Global Section.
$wp_customize->add_section(
    'site_categories_settings',
    array(
        'title' => esc_html__('Categories Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_show_categories',
    array(
        'default' => $broadnews_default['global_show_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_show_categories',
    array(
        'label' => esc_html__('Post Categories', 'broadnews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'broadnews'),
            'no' => esc_html__('Hide', 'broadnews'),

        ),
        'priority' => 130,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_number_of_categories',
    array(
        'default' => $broadnews_default['global_number_of_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_number_of_categories',
    array(
        'label' => esc_html__('Categories in Archives', 'broadnews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'all' => esc_html__('Show All', 'broadnews'),
            'one' => esc_html__('Show Top Category', 'broadnews'),           

        ),
        'priority' => 130,
        'active_callback' => 'broadnews_global_show_category_number_status'

    )
);

// Setting - sticky_header_option.
$wp_customize->add_setting(
    'global_custom_number_of_categories',
    array(
        'default' => $broadnews_default['global_custom_number_of_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'global_custom_number_of_categories',
    array(
        'label' => esc_html__('Number of Categories', 'broadnews'),
        'section' => 'site_categories_settings',
        'type' => 'number',
        'priority' => 130,
        'active_callback' => 'broadnews_global_show_custom_category_number_status'
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_show_comment_count',
    array(
        'default' => $broadnews_default['global_show_comment_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_show_comment_count',
    array(
        'label' => esc_html__('Comment Count', 'broadnews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'broadnews'),
            'no' => esc_html__('Hide', 'broadnews'),

        ),
        'priority' => 130,
    )
);


// Global Section.
$wp_customize->add_section(
    'site_author_and_date_settings',
    array(
        'title' => esc_html__('Author and Date Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_post_date_author_setting',
    array(
        'default' => $broadnews_default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_post_date_author_setting',
    array(
        'label' => esc_html__('For Spotlight Posts', 'broadnews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'broadnews'),            
            'hide-date-author' => esc_html__('Hide All', 'broadnews'),
        ),
        'priority' => 130,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_author_icon_gravatar_display_setting',
    array(
        'default' => $broadnews_default['global_author_icon_gravatar_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_author_icon_gravatar_display_setting',
    array(
        'label' => esc_html__('Author Icon/Gravatar', 'broadnews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'display-gravatar' => esc_html__('Show Gravatar', 'broadnews'),
            'display-icon' => esc_html__('Show Icon', 'broadnews'),
            'display-none' => esc_html__('None', 'broadnews'),
        ),
        'priority' => 130,
        'active_callback' => 'broadnews_display_author_status'
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_date_display_type',
    array(
        'default' => $broadnews_default['global_date_display_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_date_display_type',
    array(
        'label' => esc_html__('Post Date Type', 'broadnews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'published' => esc_html__('Published Date', 'broadnews'),
            'modified' => esc_html__('Modified Date', 'broadnews'),          


        ),
        'priority' => 130,
        'active_callback' => 'broadnews_display_date_status'
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_date_display_setting',
    array(
        'default' => $broadnews_default['global_date_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_date_display_setting',
    array(
        'label' => esc_html__('Date Format', 'broadnews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'default-date' => esc_html__('WordPress Default Date Format', 'broadnews'),
            'theme-date' => esc_html__('Ago Date Format', 'broadnews'),          


        ),
        'priority' => 130,
        'active_callback' => 'broadnews_display_date_status'
    )
);


//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section(
    'site_min_read_settings',
    array(
        'title' => esc_html__('Minutes Read Count', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_show_min_read',
    array(
        'default' => $broadnews_default['global_show_min_read'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_show_min_read',
    array(
        'label' => esc_html__('Minutes Read Count', 'broadnews'),
        'section' => 'site_min_read_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'broadnews'),
            'no' => esc_html__('Hide', 'broadnews'),

        ),
        'priority' => 130,
    )
);

// Global Section.
$wp_customize->add_section(
    'site_excerpt_settings',
    array(
        'title' => esc_html__('Excerpt Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - related posts.
$wp_customize->add_setting(
    'global_read_more_texts',
    array(
        'default' => $broadnews_default['global_read_more_texts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'global_read_more_texts',
    array(
        'label' => __('Global Excerpt Read More', 'broadnews'),
        'section' => 'site_excerpt_settings',
        'type' => 'text',
        'priority' => 130,

    )
);


//============= Watch Online Section ==========
//section title
$wp_customize->add_setting(
    'show_watch_online_section_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'show_watch_online_section_section_title',
        array(
            'label' => esc_html__("Custom Menu Section", 'broadnews'),
            'section' => 'header_options_settings',
            'priority' => 100,

        )
    )
);

$wp_customize->add_setting(
    'show_watch_online_section',
    array(
        'default' => $broadnews_default['show_watch_online_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'show_watch_online_section',
    array(
        'label' => esc_html__('Enable Custom Menu Section', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);

$wp_customize->add_setting(
    'aft_custom_icon_preset',
    array(
        'default' => $broadnews_default['aft_custom_icon_preset'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'aft_custom_icon_preset',
    array(
        'label' => esc_html__('Icon', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'select',
        'choices' => array(
            'fas fa-bell' => esc_html__('Bell', 'broadnews'),
            'fas fa-play' => esc_html__('Play', 'broadnews'),
            'fas fa-user' => esc_html__('User', 'broadnews'),            
        ),
        'priority' => 100,
        'active_callback' => 'broadnews_show_watch_online_section_status'
    )
);


// Setting - related posts.
$wp_customize->add_setting(
    'aft_custom_icon',
    array(
        'default' => $broadnews_default['aft_custom_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'aft_custom_icon',
    array(
        'label' => __('FontAwesome Code', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,        
        'active_callback' => function ($control) {
            return (broadnews_show_watch_online_section_status($control)
                &&
                broadnews_custom_icon_preset_status($control)

            );
        },
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'aft_custom_title',
    array(
        'default' => $broadnews_default['aft_custom_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'aft_custom_title',
    array(
        'label' => __('Title', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_show_watch_online_section_status'
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'aft_custom_link',
    array(
        'default' => $broadnews_default['aft_custom_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    'aft_custom_link',
    array(
        'label' => __('Link', 'broadnews'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_show_watch_online_section_status'
    )
);


//========== single posts options ===============

// Single Section.
$wp_customize->add_section(
    'site_single_posts_settings',
    array(
        'title' => esc_html__('Single Post', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


$wp_customize->add_setting(
    'single_content_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'single_content_section_title',
        array(
            'label' => esc_html__("Content Options", 'broadnews'),
            'section' => 'site_single_posts_settings',
            'priority' => 100,

        )
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'single_show_featured_image',
    array(
        'default' => $broadnews_default['single_show_featured_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'single_show_featured_image',
    array(
        'label' => __('Show Featured Image', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'global_single_content_mode',
    array(
        'default'           => $default['global_single_content_mode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'global_single_content_mode',
    array(
        'label'       => esc_html__('Single Content', 'broadnews'),
        'section'     => 'site_single_posts_settings',
        'type'        => 'select',
        'choices'               => array(
            'single-content-mode-boxed' => esc_html__('Spacious', 'broadnews'),
            'single-content-mode-compact' => esc_html__('Compact', 'broadnews'),
        ),
        'priority'    => 100,
    )
);





//Social share option

$wp_customize->add_setting(
    'single_social_share_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'single_social_share_section_title',
        array(
            'label' => esc_html__("Social Share", 'broadnews'),
            'section' => 'site_single_posts_settings',
            'priority' => 100,

        )
    )
);

$wp_customize->add_setting(
    'single_post_social_share_type',
    array(
        'default' => $broadnews_default['single_post_social_share_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'single_post_social_share_type',
    array(
        'label' => esc_html__('Defined Links', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'select',
        'choices' => array(
            'theme' => esc_html__('Theme', 'broadnews'),
            'jetpack' => esc_html__('JetPack', 'broadnews'),
            'none' => esc_html__('None', 'broadnews'),
        ),
        'priority' => 100,
    )
);


// Setting - related posts.
$wp_customize->add_setting(
    'single_post_social_share_facebook',
    array(
        'default' => $broadnews_default['single_post_social_share_facebook'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'single_post_social_share_facebook',
    array(
        'label' => __('Facebook', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                broadnews_single_post_social_share_status($control)
                &&
                broadnews_single_post_social_share_theme_status($control)

            );
        },
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'single_post_social_share_twitter',
    array(
        'default' => $broadnews_default['single_post_social_share_twitter'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'single_post_social_share_twitter',
    array(
        'label' => __('Twitter', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                broadnews_single_post_social_share_status($control)
                &&
                broadnews_single_post_social_share_theme_status($control)

            );
        },
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'single_post_social_share_email',
    array(
        'default' => $broadnews_default['single_post_social_share_email'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'single_post_social_share_email',
    array(
        'label' => __('Email', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                broadnews_single_post_social_share_status($control)
                &&
                broadnews_single_post_social_share_theme_status($control)

            );
        },
    )
);



//========== related posts  options ===============

$wp_customize->add_setting(
    'single_related_posts_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'single_related_posts_section_title',
        array(
            'label' => esc_html__("Related Posts Settings", 'broadnews'),
            'section' => 'site_single_posts_settings',
            'priority' => 100,

        )
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'single_show_related_posts',
    array(
        'default' => $broadnews_default['single_show_related_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'single_show_related_posts',
    array(
        'label' => __('Enable Related Posts', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - related posts.
$wp_customize->add_setting(
    'single_related_posts_title',
    array(
        'default' => $broadnews_default['single_related_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'single_related_posts_title',
    array(
        'label' => __('Title', 'broadnews'),
        'section' => 'site_single_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_related_posts_status'
    )
);



/**
 * Archive options section
 *
 * @package BroadNews
 */

// Archive Section.
$wp_customize->add_section(
    'site_archive_settings',
    array(
        'title' => esc_html__('Archive Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


//Setting - archive content view of news.
$wp_customize->add_setting(
    'archive_layout',
    array(
        'default' => $broadnews_default['archive_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'archive_layout',
    array(
        'label' => esc_html__('Archive layout', 'broadnews'),
        'description' => esc_html__('Select layout for archive', 'broadnews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-layout-grid' => esc_html__('Grid', 'broadnews'),            
            'archive-layout-full' => esc_html__('Full', 'broadnews'),            
        ),
        'priority' => 130,
    )
);

// Setting - latest blog carousel.
$wp_customize->add_setting(
    'archive_layout_first_post_full',
    array(
        'default' => $broadnews_default['archive_layout_first_post_full'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'archive_layout_first_post_full',
    array(
        'label' => __('Make First Post Full', 'broadnews'),
        'section' => 'site_archive_settings',
        'type' => 'checkbox',
        'priority' => 130,
        'active_callback' => 'broadnews_archive_layout_first_post_full_status'
    )
);


//========== sidebar blocks options ===============

// Trending Section.
$wp_customize->add_section(
    'sidebar_block_settings',
    array(
        'title' => esc_html__('Sidebar Settings', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting(
    'frontpage_sticky_sidebar',
    array(
        'default' => $default['frontpage_sticky_sidebar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'frontpage_sticky_sidebar',
    array(
        'label' => esc_html__('Make Sidebar Sticky', 'broadnews'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'frontpage_sticky_sidebar_position',
    array(
        'default' => $default['frontpage_sticky_sidebar_position'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control(
    'frontpage_sticky_sidebar_position',
    array(
        'label' => esc_html__('Sidebar Sticky Position', 'broadnews'),
        'section' => 'sidebar_block_settings',
        'type' => 'select',
        'choices' => array(
            'sidebar-sticky-top' => esc_html__('Top', 'broadnews'),
            'sidebar-sticky-bottom' => esc_html__('Bottom', 'broadnews'),
        ),
        'priority' => 100,
        'active_callback' => 'broadnews_frontpage_sticky_sidebar_status'
    )
);

//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section(
    'frontpage_latest_posts_settings',
    array(
        'title' => esc_html__('You May Have Missed', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);
// Setting - latest blog carousel.
$wp_customize->add_setting(
    'frontpage_show_latest_posts',
    array(
        'default' => $broadnews_default['frontpage_show_latest_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'frontpage_show_latest_posts',
    array(
        'label' => __('Show Above Footer', 'broadnews'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Setting - featured_news_section_title.
$wp_customize->add_setting(
    'frontpage_latest_posts_section_title',
    array(
        'default' => $broadnews_default['frontpage_latest_posts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'frontpage_latest_posts_section_title',
    array(
        'label' => esc_html__('Posts Section Title', 'broadnews'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'broadnews_latest_news_section_status'

    )
);


//========== footer section options ===============
// Footer Section.
$wp_customize->add_section(
    'site_footer_settings',
    array(
        'title' => esc_html__('Footer', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
    'footer_background_image',
    array(
        'default' => $default['footer_background_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'footer_background_image',
        array(
            'label' => esc_html__('Footer Background Image', 'broadnews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'broadnews'), 1024, 800),
            'section' => 'site_footer_settings',
            'width' => 1024,
            'height' => 800,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 100,
        )
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
    'footer_copyright_text',
    array(
        'default' => $broadnews_default['footer_copyright_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'footer_copyright_text',
    array(
        'label' => __('Copyright Text', 'broadnews'),
        'section' => 'site_footer_settings',
        'type' => 'text',
        'priority' => 100,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
    'hide_footer_menu_section',
    array(
        'default' => $broadnews_default['hide_footer_menu_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'hide_footer_menu_section',
    array(
        'label' => __('Hide footer Menu Section', 'broadnews'),
        'section' => 'site_footer_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

