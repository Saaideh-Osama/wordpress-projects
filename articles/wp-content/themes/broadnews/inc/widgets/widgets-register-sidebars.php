<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function broadnews_widgets_init()
{
   
    
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'broadnews'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Front-page Content Section', 'broadnews'),
        'id' => 'home-content-widgets',
        'description' => esc_html__('Add widgets to front-page contents section.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Sidebar Section', 'broadnews'),
        'id' => 'home-sidebar-widgets',
        'description' => esc_html__('Add widgets to front-page sidebar section.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Banner Ad Section', 'broadnews'),
        'id'            => 'home-promotion-widgets',
        'description'   => esc_html__('Add widgets for frontpage banner section advertisement.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Off Canvas', 'broadnews'),
        'id'            => 'express-off-canvas-panel',
        'description'   => esc_html__('Add widgets for off-canvas section.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    )); 
    
    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'broadnews'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'broadnews'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'broadnews'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'broadnews'),
        'before_widget' => '<div id="%1$s" class="widget broadnews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));




}

add_action('widgets_init', 'broadnews_widgets_init');