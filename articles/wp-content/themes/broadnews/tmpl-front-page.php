<?php
 /* Template Name: Frontpage Widgets Template */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {

    // get current page we are on. If not set we can assume we are on page 1.
    $broadnews_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // are we on page one?
    if (1 == $broadnews_paged):


        if (is_front_page() && is_home()) {
            // Default homepage
            do_action('broadnews_action_front_page_main_section_scope');
            do_action('broadnews_action_banner_featured_section');

        } elseif (is_front_page()) {
            // Static homepage
            do_action('broadnews_action_front_page_main_section_scope');
            do_action('broadnews_action_banner_featured_section');

        } elseif (is_home()) {
            // Blog page
            do_action('broadnews_action_front_page_main_section_scope');

        }

        endif; 
    
    /**
     * broadnews_action_sidebar_section hook
     * @since Newsium 1.0.0
     *
     * @hooked broadnews_front_page_section -  20
     * @sub_hooked broadnews_front_page_section -  20
     */
    do_action('broadnews_front_page_section');


}
get_footer();