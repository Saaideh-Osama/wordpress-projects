<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package BroadNews
 */

/*select page for slider*/
if (!function_exists('broadnews_frontpage_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_frontpage_content_status($control)
    {

        if ('page' == $control->manager->get_setting('show_on_front')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for broadnews_header_status news*/
if (!function_exists('broadnews_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_header_status($control)
    {

        if ('header-layout-1' == $control->manager->get_setting('header_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for broadnews_enable_header_image_tint_overlay_status news*/
if (!function_exists('broadnews_enable_header_image_tint_overlay_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_enable_header_image_tint_overlay_status($control)
    {

        if (true == $control->manager->get_setting('enable_header_image_tint_overlay')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for broadnews_show_date_on_header news*/
if (!function_exists('broadnews_top_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_top_header_status($control)
    {

        if (true == $control->manager->get_setting('show_top_header_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for broadnews_show_date_on_header news*/
if (!function_exists('broadnews_enable_primary_menu_desc_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_enable_primary_menu_desc_status($control)
    {

        if ('aft-enable-menu-desc' == $control->manager->get_setting('enable_primary_menu_desc')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for broadnews_show_date_on_header news*/
if (!function_exists('broadnews_show_time_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_show_time_status($control)
    {

        if (true == $control->manager->get_setting('show_time_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for broadnews_show_date_on_header news*/
if (!function_exists('broadnews_show_date_on_header')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_show_date_on_header($control)
    {

        if ('header-layout-compressed' != $control->manager->get_setting('header_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;




/*select page for trending news*/
if (!function_exists('broadnews_popular_tags_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_popular_tags_section_status($control)
    {

        if (true == $control->manager->get_setting('show_popular_tags_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('broadnews_flash_posts_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_flash_posts_section_status($control)
    {

        if (true == $control->manager->get_setting('show_flash_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_global_site_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_site_mode_status($control)
    {

        if (('aft-light-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_global_site_mode_dark_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_site_mode_dark_status($control)
    {

        if (('aft-dark-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_main_banner_custom_background_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_custom_background_color_status($control)
    {

        if (('background-custom' == $control->manager->get_setting('select_main_banner_background_color')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_global_site_mode_light_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_site_mode_light_status($control)
    {

        if (('aft-light-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_solid_secondary_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_solid_secondary_color_status($control)
    {

        if ('solid-color' == $control->manager->get_setting('secondary_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_gradient_secondary_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_gradient_secondary_color_status($control)
    {

        if ('gradient-color' == $control->manager->get_setting('secondary_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


    
    //broadnews_prime_news_section_status
    
    //Prime news
    if (!function_exists('broadnews_prime_news_section_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_prime_news_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_prime_news')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    //Youtube section
    if (!function_exists('broadnews_youtube_video_section_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_youtube_video_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_youtube_video')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
        
        //Express Posts Section
    
    
    if (!function_exists('broadnews_express_posts_section_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_express_posts_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_express_post_section')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    
    /*select page for slider*/
    if (!function_exists('broadnews_prime_news_section_filterby_cat_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_prime_news_section_filterby_cat_status($control)
        {
            
            if ('cat' == $control->manager->get_setting('select_prime_news_filterby')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    
    /*select page for slider*/
    if (!function_exists('broadnews_prime_news_section_filterby_tag_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_prime_news_section_filterby_tag_status($control)
        {
            
            if ('tag' == $control->manager->get_setting('select_prime_news_filterby')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    //Prime news
    if (!function_exists('broadnews_prime_news_related_section_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_prime_news_related_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_prime_news_related_posts')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    
    
    /*select page for slider*/
if (!function_exists('broadnews_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



 


/*select page for slider*/
if (!function_exists('broadnews_main_banner_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_main_banner_carousel_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;




/*select page for slider*/
if (!function_exists('broadnews_main_banner_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_main_banner_carousel_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_editors_picks_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_editors_picks_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_editors_picks_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_editors_picks_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_editors_picks_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_editors_picks_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*select page for slider*/
if (!function_exists('broadnews_trending_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_trending_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_trending_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_trending_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('broadnews_show_watch_online_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_show_watch_online_section_status($control)
    {

        if ( true == $control->manager->get_setting('show_watch_online_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_custom_icon_preset_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_custom_icon_preset_status($control)
    {

        if ( 'custom' == $control->manager->get_setting('aft_custom_icon_preset')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('broadnews_sidebar_trending_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_sidebar_trending_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_sidebar_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_sidebar_trending_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_sidebar_trending_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_sidebar_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;




/* Display if the slider is selected */
if (!function_exists('broadnews_main_banner_carousel_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_carousel_status($control)
    {

        if ('banner-carousel' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/* Display if the slider is selected */
if (!function_exists('broadnews_main_banner_carousel_layout_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_carousel_layout_status($control)
    {

        if ('carousel-layout-default' == $control->manager->get_setting('select_main_banner_carousel_option')->value() || 'carousel-layout-4' == $control->manager->get_setting('select_main_banner_carousel_option')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the Grid is selected */
if (!function_exists('broadnews_main_banner_grid_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_grid_status($control)
    {

        if ('banner-grid' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the Grid is selected */
if (!function_exists('broadnews_main_banner_grid_carousel_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_grid_carousel_status($control)
    {

        if ('default' == $control->manager->get_setting('select_main_banner_section_mode')->value() || 'banner-grid' == $control->manager->get_setting('select_main_banner_section_mode')->value() || 'banner-carousel' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the slider is selected */
if (!function_exists('broadnews_main_banner_slider_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_main_banner_slider_status($control)
    {

        if ('banner-slider' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_banner_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_banner_mode_status($control)
    {

        if (('banner-slider' == $control->manager->get_setting('select_main_banner_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_tabbed_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_tabbed_mode_status($control)
    {

        if (('default' == $control->manager->get_setting('select_tab_section_mode')->value()) || ('trending' == $control->manager->get_setting('select_tab_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select post*/
if (!function_exists('broadnews_featured_posts_section')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_posts_section($control)
    {

        if (true == $control->manager->get_setting('show_featured_posts_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_featured_post_list_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_post_list_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_post_list_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;
    
    if (!function_exists('broadnews_featured_post_carousel_section_status')) :
        
        /**
         * Check if ticker section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function broadnews_featured_post_carousel_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_post_carousel_section')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;




//choose page

/*select page for slider*/
if (!function_exists('broadnews_featured_news_pages_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_news_pages_section_status($control)
    {

        if ('page' == $control->manager->get_setting('show_featured_category_page_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

//choose page

/*select page for slider*/
if (!function_exists('broadnews_featured_news_custom_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_news_custom_section_status($control)
    {

        if ('custom' == $control->manager->get_setting('show_featured_category_page_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_featured_product_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_product_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_products_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_display_author_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_display_author_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-author-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_display_date_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_display_date_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-date-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select sticky sidebar*/
if (!function_exists('broadnews_frontpage_content_alignment_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_frontpage_content_alignment_status($control)
    {

        if ('align-content-left' == $control->manager->get_setting('frontpage_content_alignment')->value() || 'align-content-right' == $control->manager->get_setting('frontpage_content_alignment')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if ( ! function_exists( 'broadnews_frontpage_sticky_sidebar_status' ) ) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_frontpage_sticky_sidebar_status( $control ) {

        if ( true == $control->manager->get_setting( 'frontpage_sticky_sidebar' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_latest_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_latest_news_section_status($control)
    {

        if (true == $control->manager->get_setting('frontpage_show_latest_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_archive_image_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_archive_image_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_archive_image_gird_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_archive_image_gird_status($control)
    {

        if ('archive-layout-grid' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select layout for masonary for slider*/
if (!function_exists('broadnews_archive_masonry_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_archive_masonry_status($control)
    {

        if ('archive-layout-masonry' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select layout for masonary for slider*/
if (!function_exists('broadnews_archive_full_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_archive_full_status($control)
    {

        if ('archive-layout-full' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select layout for masonary for slider*/
if (!function_exists('broadnews_archive_layout_first_post_full_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_archive_layout_first_post_full_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value() || 'archive-layout-grid' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*featured image posts*/
if (!function_exists('broadnews_featured_image_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_featured_image_posts_status($control)
    {

        if (true == $control->manager->get_setting('single_show_featured_image')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('broadnews_single_post_social_share_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_single_post_social_share_status($control)
    {

        if ('none' != $control->manager->get_setting('single_post_social_share_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('broadnews_single_post_social_share_theme_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_single_post_social_share_theme_status($control)
    {

        if ('theme' == $control->manager->get_setting('single_post_social_share_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*related posts*/
if (!function_exists('broadnews_related_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_related_posts_status($control)
    {

        if (true == $control->manager->get_setting('single_show_related_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*mailchimp*/
if (!function_exists('broadnews_mailchimp_subscriptions_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_mailchimp_subscriptions_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_mailchimp_subscriptions')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('broadnews_footer_instagram_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_footer_instagram_posts_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_instagram_post_carousel')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_global_show_category_number_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_show_category_number_status($control)
    {

        if ('yes' == $control->manager->get_setting('global_show_categories')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('broadnews_global_show_custom_category_number_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_show_custom_category_number_status($control)
    {

        if ('custom' == $control->manager->get_setting('global_number_of_categories')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('broadnews_global_show_minutes_count_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function broadnews_global_show_minutes_count_status($control)
    {

        if ('yes' == $control->manager->get_setting('global_show_min_read')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;