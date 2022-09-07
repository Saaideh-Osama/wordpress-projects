<?php

/**
 * Font and Color Option Panel
 *
 * @package BroadNews
 */

$broadnews_default = broadnews_get_default_theme_options();

// Setting - global content alignment of news.
$wp_customize->add_setting('header_textcolor_dark_mode',
    array(
        'default' => $broadnews_default['header_textcolor_dark_mode'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control('header_textcolor_dark_mode',
    array(
        'label' => esc_html__('Site Title/Tagline Color (Dark Mode)', 'broadnews'),
        'section' => 'colors',
        'type' => 'color',
        'priority' => 5,
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('global_site_mode_setting',
    array(
        'default' => $broadnews_default['global_site_mode_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);

$wp_customize->add_control('global_site_mode_setting',
    array(
        'label' => esc_html__('Site Color Mode', 'broadnews'),
        'section' => 'colors',
        'type' => 'select',
        'choices' => array(
            'aft-light-mode' => esc_html__('Light', 'broadnews'),
            'aft-dark-mode' => esc_html__('Dark', 'broadnews'),
        ),
        'priority' => 5,
    ));

//section title
$wp_customize->add_setting('site_background_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'site_background_color_section_title',
        array(
            'label' => esc_html__('Primary Color Section ', 'broadnews'),
            'section' => 'colors',
            'priority' => 5,
            //'active_callback' => 'broadnews_global_site_mode_status'
        )
    )
);


// Setting - slider_caption_bg_color.
$wp_customize->add_setting('dark_background_color',
    array(
        'default' => $broadnews_default['dark_background_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'dark_background_color',
        array(
            'label' => esc_html__('Background Color (Dark Mode)', 'broadnews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 5,
            'active_callback' => 'broadnews_global_site_mode_dark_status'

        )
    )
);


//section title
$wp_customize->add_setting('global_color_section_notice',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Simple_Notice_Custom_Control(
        $wp_customize,
        'global_color_section_notice',
        array(
            'description' => esc_html__('Background Color (Dark Mode) will be applied for this mode.', 'broadnews'),
            'section' => 'colors',
            'priority' => 5,
            'active_callback' => 'broadnews_global_site_mode_dark_status'
        )
    )
);





// Setting - primary_color.
$wp_customize->add_setting('primary_color',
    array(
        'default' => $broadnews_default['primary_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label' => esc_html__('Primary Color', 'broadnews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 10,
            'active_callback' => 'broadnews_global_site_mode_dark_status'
        )
    )
);

// Setting - primary_color.
$wp_customize->add_setting('primary_color_light',
    array(
        'default' => $broadnews_default['primary_color_light'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color_light',
        array(
            'label' => esc_html__('Primary Color', 'broadnews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 10,
            'active_callback' => 'broadnews_global_site_mode_light_status'
        )
    )
);

//section title
$wp_customize->add_setting('secondary_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'secondary_color_section_title',
        array(
            'label' => esc_html__('Secondary Color Section ', 'broadnews'),
            'section' => 'colors',
            'priority' => 10,
            //'active_callback' => 'broadnews_global_site_mode_status'
        )
    )
);


// Setting - secondary_color.
$wp_customize->add_setting('secondary_color',
    array(
        'default' => $broadnews_default['secondary_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color',
        array(
            'label' => esc_html__('Secondary Color', 'broadnews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 10,
            //'active_callback' => 'broadnews_solid_secondary_color_status'
        )
    )
);



//section title
$wp_customize->add_setting('global_primay_menu_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'global_primay_menu_color_section_title',
        array(
            'label' => esc_html__('Primary Navigation Section ', 'broadnews'),
            'section' => 'colors',
            'priority' => 100,
            //'active_callback' => 'broadnews_global_site_mode_status'
        )
    )
);


// Setting - slider_caption_bg_color.
$wp_customize->add_setting('main_navigation_custom_background_color',
    array(
        'default' => $broadnews_default['main_navigation_custom_background_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'main_navigation_custom_background_color',
        array(
            'label' => esc_html__('Background Color', 'broadnews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 100,
            //'active_callback' => 'broadnews_global_site_mode_status'
        )
    )
);




//========== category colors  options ===============


//section title
$wp_customize->add_setting('global_category_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'global_category_color_section_title',
        array(
            'label' => esc_html__('Category Color Section ', 'broadnews'),
            'section' => 'colors',
            'priority' => 100,

        )
    )
);

// Single Section.
$wp_customize->add_section('site_category_color_settings',
    array(
        'title' => esc_html__('Category Colors', 'broadnews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


for ($broadnews_i = 1; $broadnews_i <= 3; $broadnews_i++) {
// Setting - slider_caption_bg_color.
    $wp_customize->add_setting('category_color_' . $broadnews_i,
        array(
            'default' => $broadnews_default['category_color_' . $broadnews_i],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'category_color_' . $broadnews_i,
            array(
                'label' => sprintf(esc_html__('Category %d Background', 'broadnews'), $broadnews_i),
                'section' => 'colors',
                'type' => 'color',
                'priority' => 100,
            )
        )
    );

    


}


//============= Font Options ===================
// font Section.
$wp_customize->add_section('font_typo_section',
    array(
        'title' => esc_html__('Fonts & Typography', 'broadnews'),
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

global $broadnews_google_fonts;


// Trending Section.
$wp_customize->add_setting('site_title_font_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new BroadNews_Section_Title(
        $wp_customize,
        'site_title_font_section_title',
        array(
            'label' => esc_html__("Font Family Section", 'broadnews'),
            'section' => 'font_typo_section',
            'priority' => 100,

        )
    )
);



// Setting - secondary_font.
$wp_customize->add_setting('site_title_font',
    array(
        'default' => $broadnews_default['site_title_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);
$wp_customize->add_control('site_title_font',
    array(
        'label' => esc_html__('Site Title Font', 'broadnews'),

        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $broadnews_google_fonts,
        'priority' => 100,
    )
);

// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default' => $broadnews_default['primary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label' => esc_html__('Primary Font', 'broadnews'),

        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $broadnews_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default' => $broadnews_default['secondary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'broadnews_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label' => esc_html__('Secondary Font', 'broadnews'),

        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $broadnews_google_fonts,
        'priority' => 110,
    )
);