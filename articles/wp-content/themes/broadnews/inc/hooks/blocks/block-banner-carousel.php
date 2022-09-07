<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package BroadNews
     */
    
    $broadnews_posts_filter_by = broadnews_get_option('select_main_banner_carousel_filterby');
    if ($broadnews_posts_filter_by == 'tag') {
        $broadnews_slider_category = broadnews_get_option('select_slider_news_tag');
        $broadnews_filterby = 'tag';
        
    } else {
        $broadnews_slider_category = broadnews_get_option('select_slider_news_category');
        $broadnews_filterby = 'cat';
        
    }
    
    $broadnews_number_of_slides = broadnews_get_option('number_of_slides');
    $broadnews_slider_mode = broadnews_get_option('select_main_banner_section_mode');
    $broadnews_main_banner_layout_section = 'layout-compressed';

    $broadnews_main_banner_carousel_autoplay = broadnews_get_option('main_banner_carousel_autoplay');
    $broadnews_main_banner_carousel_autoplay_speed = broadnews_get_option('main_banner_carousel_autoplay_speed');
    
    $broadnews_centerPadding = '';
    $broadnews_break_point_1_centerPadding = '';
    $broadnews_break_point_2_centerPadding = '';
    $broadnews_break_point_3_centerPadding = '';
    
    
    if (($broadnews_main_banner_layout_section == 'layout-5') || ($broadnews_main_banner_layout_section == 'layout-6')) {
        $thumbnail_size = 'broadnews-large';
    }else{
        $thumbnail_size = 'broadnews-medium';
    }

    $thumbnail_size = 'large';
    if ($broadnews_main_banner_layout_section == 'layout-horizontal') {
        $broadnews_centerMode = false;
        $broadnews_slidesToShow = 2;
        $broadnews_slidesToScroll = 1;
        $broadnews_carousel_class = 'af-carousel-2';
        $broadnews_break_point_1_slidesToShow = 2;
        $broadnews_break_point_1_slidesToScroll = 1;
        $broadnews_break_point_2_slidesToShow = 2;
        $broadnews_break_point_2_slidesToScroll = 1;
        $broadnews_break_point_3_slidesToShow = 1;
        $broadnews_break_point_3_slidesToScroll = 1;
    } else {
        $broadnews_centerMode = false;
        $broadnews_slidesToShow = 1;
        $broadnews_slidesToScroll = 1;
        $broadnews_carousel_class = 'af-carousel-default';
        $broadnews_break_point_1_slidesToShow = 1;
        $broadnews_break_point_1_slidesToScroll = 1;
        $broadnews_break_point_2_slidesToShow = 1;
        $broadnews_break_point_2_slidesToScroll = 1;
        $broadnews_break_point_3_slidesToShow = 1;
        $broadnews_break_point_3_slidesToScroll = 1;
    }
    
    $broadnews_carousel_args = array(
        'slidesToShow' => $broadnews_slidesToShow,
        'slidesToScroll' => $broadnews_slidesToScroll,
        'autoplay' => $broadnews_main_banner_carousel_autoplay,
        'autoplaySpeed' => absint($broadnews_main_banner_carousel_autoplay_speed),
        'centerMode' => $broadnews_centerMode,
        'centerPadding' => $broadnews_centerPadding,
        'responsive' => array(
            array(
                'breakpoint' => 1025,
                'settings' => array(
                    'slidesToShow' => $broadnews_break_point_2_slidesToShow,
                    'slidesToScroll' => $broadnews_break_point_3_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $broadnews_break_point_1_centerPadding,
                ),
            ),
            array(
                'breakpoint' => 600,
                'settings' => array(
                    'slidesToShow' => $broadnews_break_point_2_slidesToShow,
                    'slidesToScroll' => $broadnews_break_point_2_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $broadnews_break_point_2_centerPadding,
                ),
            ),
            array(
                'breakpoint' => 480,
                'settings' => array(
                    'slidesToShow' => $broadnews_break_point_3_slidesToShow,
                    'slidesToScroll' => $broadnews_break_point_3_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $broadnews_break_point_3_centerPadding,
                ),
            ),
        ),
    );
    
    $broadnews_carousel_args_encoded = wp_json_encode($broadnews_carousel_args);
?>

<div class="af-widget-carousel aft-carousel">
    <div class="slick-wrapper af-banner-carousel af-banner-carousel-1 common-carousel af-cat-widget-carousel <?php echo esc_html($broadnews_carousel_class); ?>"
         data-slick='<?php echo wp_kses_post($broadnews_carousel_args_encoded); ?>'>
        <?php
            $broadnews_slider_posts = broadnews_get_posts($broadnews_number_of_slides, $broadnews_slider_category, $broadnews_filterby);
            if ($broadnews_slider_posts->have_posts()) :
                while ($broadnews_slider_posts->have_posts()) : $broadnews_slider_posts->the_post();
                    global $post;

                    ?>
                    <div class="slick-item">
                        <?php do_action('broadnews_action_loop_grid', $post->ID, 'grid-design-texts-over-image', $thumbnail_size); ?>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
    <div class="af-main-navcontrols af-slick-navcontrols"></div>
</div>