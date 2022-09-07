<?php
$broadnews_banner_layout = 'layout-compressed';
$broadnews_posts_filter_by = broadnews_get_option('select_trending_post_filterby');
if ($broadnews_posts_filter_by == 'tag') {
    $broadnews_editors_pick_category = broadnews_get_option('select_trending_post_tag');
    $broadnews_filterby = 'tag';
} elseif ($broadnews_posts_filter_by == 'view') {
    $broadnews_editors_pick_category = 0;
    $broadnews_filterby = 'view';
} else {
    $broadnews_editors_pick_category = broadnews_get_option('select_trending_post_category');
    $broadnews_filterby = 'cat';
}

$broadnews_trending_post_number_of_slides = broadnews_get_option('trending_post_number_of_slides');
$broadnews_all_posts_vertical = broadnews_get_posts($broadnews_trending_post_number_of_slides, $broadnews_editors_pick_category, $broadnews_filterby);
$broadnews_trending_post_autoplay = broadnews_get_option('trending_post_autoplay');
$broadnews_trending_post_autoplay_speed = broadnews_get_option('trending_post_autoplay_speed');
$broadnews_carousel_args = array(    
    'autoplay' => $broadnews_trending_post_autoplay,
    'autoplaySpeed' => absint($broadnews_trending_post_autoplay_speed),    
    
);

$broadnews_carousel_args_encoded = wp_json_encode($broadnews_carousel_args);

?>
<div class="full-wid-resp">
    <div class="slick-wrapper banner-vertical-slider af-widget-carousel" data-slick='<?php echo wp_kses_post($broadnews_carousel_args_encoded); ?>'>
        
        <?php
        $broadnews_count = 1;
        if ($broadnews_all_posts_vertical->have_posts()) :
            while ($broadnews_all_posts_vertical->have_posts()) : $broadnews_all_posts_vertical->the_post();

                global $post;

                ?>
                <div class="slick-item">
                    <div class="aft-trending-posts list-part af-sec-post">
                        <?php do_action('broadnews_action_loop_list', $post->ID, 'thumbnail', $broadnews_count, false, true, false); ?>
                    </div>
                </div>
                <?php
                $broadnews_count++;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <div class="af-trending-navcontrols af-slick-navcontrols"></div>
   
</div>
