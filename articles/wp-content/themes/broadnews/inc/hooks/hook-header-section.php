<?php
if (!function_exists('broadnews_header_section')) :
    /**
     * Banner Slider
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_header_section()
    {

        $broadnews_header_layout = 'header-layout-side';


?>

        <header id="masthead" class="<?php echo esc_attr($broadnews_header_layout); ?> broadnews-header">
            <?php

                broadnews_get_block('layout-default', 'header');
            
            ?>

        </header>

        <!-- end slider-section -->
    <?php
    }
endif;
add_action('broadnews_action_header_section', 'broadnews_header_section', 40);

//Load main nav menu
if (!function_exists('broadnews_main_menu_nav_section')) :

    function broadnews_main_menu_nav_section()
    {

    ?>
        <div class="navigation-container">
            <nav class="main-navigation clearfix">

                <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                    <a href="javascript:void(0)" class="aft-void-menu">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'broadnews'); ?>
                        </span>
                        <i class="ham"></i>
                    </a>
                </span>


                <?php
                $broadnews_global_show_home_menu = broadnews_get_option('global_show_primary_menu_border');
                wp_nav_menu(array(
                    'theme_location' => 'aft-primary-nav',
                    'menu_id' => 'primary-menu',
                    'container' => 'div',
                    'container_class' => 'menu main-menu menu-desktop ' . $broadnews_global_show_home_menu,
                ));
                ?>
            </nav>
        </div>


    <?php }
endif;

add_action('broadnews_action_main_menu_nav', 'broadnews_main_menu_nav_section', 40);

//load search form
if (!function_exists('broadnews_load_search_form_section')) :

    function broadnews_load_search_form_section()
    {
    ?>
        <div class="af-search-wrap">
            <div class="search-overlay">
                <a href="#" title="Search" class="search-icon">
                    <i class="fa fa-search"></i>
                </a>
                <div class="af-search-form">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

        <?php }

endif;
add_action('broadnews_load_search_form', 'broadnews_load_search_form_section');


//watch online
if (!function_exists('broadnews_load_watch_online_section')) :

    function broadnews_load_watch_online_section()
    {

        $broadnews_aft_enable_custom_link = broadnews_get_option('show_watch_online_section');
        if ($broadnews_aft_enable_custom_link) :
            $broadnews_aft_custom_link = broadnews_get_option('aft_custom_link');
            $broadnews_aft_custom_link = !empty($broadnews_aft_custom_link) ? $broadnews_aft_custom_link : '#';


            $broadnews_aft_custom_icon = broadnews_get_option('aft_custom_icon_preset');
            if ($broadnews_aft_custom_icon == 'custom') {
                $broadnews_aft_custom_icon = broadnews_get_option('aft_custom_icon');
            }


            $broadnews_aft_custom_title = broadnews_get_option('aft_custom_title');
            if (!empty($broadnews_aft_custom_title)) :
        ?>
                <div class="custom-menu-link">
                    <a href="<?php echo esc_url($broadnews_aft_custom_link); ?>">
                        <?php if (!empty($broadnews_aft_custom_icon)) : ?>
                            <i class="<?php echo esc_attr($broadnews_aft_custom_icon); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php echo esc_html($broadnews_aft_custom_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php }

endif;
add_action('broadnews_load_watch_online', 'broadnews_load_watch_online_section');

//watch online
if (!function_exists('broadnews_dark_and_light_mode_section')) :

    function broadnews_dark_and_light_mode_section()
    {
        $broadnews_enable_site_mode_switch = broadnews_get_option('enable_site_mode_switch');
        if ($broadnews_enable_site_mode_switch == 'aft-enable-mode-switch') :
            $broadnews_global_site_mode_setting = broadnews_get_option('global_site_mode_setting');
            if(isset($_COOKIE["stored-site-mode"])){
                $broadnews_global_site_mode_setting = $_COOKIE["stored-site-mode"];
            }else{
                if (!empty($broadnews_global_site_mode_setting)) {
                    $broadnews_global_site_mode_setting = $broadnews_global_site_mode_setting;        
                }
            }
        ?>
            <div id="aft-dark-light-mode-wrap">
                <a href="javascript:void(0)" class="<?php echo esc_attr($broadnews_global_site_mode_setting); ?>" data-site-mode="<?php echo esc_attr($broadnews_global_site_mode_setting); ?>" id="aft-dark-light-mode-btn">
                    <span class="aft-icon-circle"><?php esc_html_e('Light/Dark Button', 'broadnews'); ?></span>
                </a>
            </div>
        <?php
        endif;
    }

endif;
add_action('broadnews_dark_and_light_mode', 'broadnews_dark_and_light_mode_section');



//Load off canvas section
if (!function_exists('broadnews_load_off_canvas_section')) :

    function broadnews_load_off_canvas_section()
    {
        if (is_active_sidebar('express-off-canvas-panel')) :
        ?>


            <span class="offcanvas">
                <a href="#" class="offcanvas-nav">
                    <div class="offcanvas-menu">
                        <span class="mbtn-top"></span>
                        <span class="mbtn-mid"></span>
                        <span class="mbtn-bot"></span>
                    </div>
                </a>
            </span>
        <?php
        endif;
    }

endif;
add_action('broadnews_load_off_canvas', 'broadnews_load_off_canvas_section');

//load date part
if (!function_exists('broadnews_load_date_section')) :
    function broadnews_load_date_section()
    {
        $broadnews_show_date = broadnews_get_option('show_date_section');
        $broadnews_show_time = broadnews_get_option('show_time_section');

        if ($broadnews_show_date == true || $broadnews_show_time == true) : ?>
            <span class="topbar-date">
                <?php
                $datetime = '';
                if ($broadnews_show_date == true) {
                    $datetime .= date_i18n(get_option('date_format'), current_time('timestamp'));
                }

                if ($broadnews_show_time == true) {
                    $broadnews_top_header_time_format = broadnews_get_option('top_header_time_format');
                    if ($broadnews_top_header_time_format == 'en-US' || $broadnews_top_header_time_format == 'en-GB') {
                        $datetime .=  ' <span id="topbar-time"></span>';
                    } else {
                        $datetime .=  ' <span id="topbar-time-wp">';
                        $datetime .=  date_i18n(get_option('time_format'), current_time('timestamp'));
                        $datetime .=  '</span>';
                    }
                }

                echo wp_kses_post($datetime);
                ?>
            </span>
        <?php endif;
    }
endif;
add_action('broadnews_load_date', 'broadnews_load_date_section');

//load social icon menu
if (!function_exists('broadnews_load_social_menu_section')) :

    function broadnews_load_social_menu_section()
    {
        ?>
        <?php
        $broadnews_show_social_menu = broadnews_get_option('show_social_menu_section');
        if (has_nav_menu('aft-social-nav') && $broadnews_show_social_menu == true) : ?>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'aft-social-nav',
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>',
                'container' => 'div',
                'container_class' => 'social-navigation'
            ));
            ?>

        <?php endif; ?>
    <?php }

endif;

add_action('broadnews_load_social_menu', 'broadnews_load_social_menu_section');

//Load site branding section

if (!function_exists('broadnews_load_site_branding_section')) :
    function broadnews_load_site_branding_section()
    {
        $broadnews_class = '';
        $broadnews_site_title_uppercase = broadnews_get_option('site_title_uppercase');
        if ($broadnews_site_title_uppercase) {
            $broadnews_class = 'uppercase-site-title';
        }
    ?>
        <div class="site-branding <?php echo esc_attr($broadnews_class); ?>">
            <?php
            the_custom_logo();
            if (is_front_page() || is_home()) : ?>
                <h1 class="site-title font-family-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-anchor" rel="home"><?php bloginfo('name'); ?></a>
                </h1>
            <?php else : ?>
                <p class="site-title font-family-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-anchor" rel="home"><?php bloginfo('name'); ?></a>
                </p>
            <?php endif; ?>

            <?php
            $broadnews_description = get_bloginfo('description', 'display');
            if ($broadnews_description || is_customize_preview()) : ?>
                <p class="site-description"><?php echo esc_html($broadnews_description); ?></p>
            <?php
            endif; ?>
        </div>

    <?php }




endif;
add_action('broadnews_load_site_branding', 'broadnews_load_site_branding_section');

if (!function_exists('broadnews_header_advertisement_section')) :
    function broadnews_header_advertisement_section()
    { ?>

        <?php
        if (is_active_sidebar('home-above-main-banner-widgets')) : ?>

            <section class="aft-blocks aft-above-main-banner-section">
                <div class="container-wrapper">
                    <div class="home-main-banner-widgets upper">
                        <?php dynamic_sidebar('home-above-main-banner-widgets'); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }
    add_action('broadnews_action_header_advertisement_section', 'broadnews_header_advertisement_section');
endif;
