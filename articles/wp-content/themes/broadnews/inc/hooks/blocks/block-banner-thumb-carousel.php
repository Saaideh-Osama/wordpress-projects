<?php
$broadnews_editors_picks_news_autoplay = broadnews_get_option('editors_picks_news_autoplay');
$broadnews_editors_picks_news_autoplay_speed = broadnews_get_option('editors_picks_news_autoplay_speed');
$broadnews_carousel_args = array(    
    'autoplay' => $broadnews_editors_picks_news_autoplay,
    'autoplaySpeed' => absint($broadnews_editors_picks_news_autoplay_speed),    
    
);
$broadnews_carousel_args_encoded = wp_json_encode($broadnews_carousel_args);

?>

<div class="af-main-banner-thumb-posts">
    <div class="section-wrapper">
        <div class="slick-wrapper banner-thumb-carousel small-grid-style af-widget-carousel clearfix" data-slick='<?php echo wp_kses_post($broadnews_carousel_args_encoded); ?>'>
            <?php
            $broadnews_banner_layout = 'layout-compressed';
            $broadnews_grid_design = 'grid-design-texts-over-image';
            // if($broadnews_banner_layout == 'layout-compressed'){
            //     $broadnews_grid_design = 'grid-design-default';
            // }

            $broadnews_posts_filter_by = broadnews_get_option('select_editors_picks_filterby');

            if ($broadnews_posts_filter_by == 'tag') {
                $broadnews_editors_pick_category = broadnews_get_option('select_editors_picks_news_tag');
                $broadnews_filterby = 'tag';
            } else {

                $broadnews_editors_pick_category = broadnews_get_option('select_editors_picks_news_category');
                $broadnews_filterby = 'cat';
            }

            $broadnews_featured_posts = broadnews_get_posts(5, $broadnews_editors_pick_category, $broadnews_filterby);
            if ($broadnews_featured_posts->have_posts()) :
                $broadnews_count = 1;
                while ($broadnews_featured_posts->have_posts()) :
                    $broadnews_featured_posts->the_post();
                    global $post;

                    ?>
            <div class="slick-item">
                    <div class="af-sec-post">
                        <?php do_action('broadnews_action_loop_grid', $post->ID, $broadnews_grid_design); ?>
                    </div>
            </div>

                    <?php
                    $broadnews_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php endif; ?>
        </div>
        <div class="af-thumb-navcontrols af-slick-navcontrols"></div>
    </div>
</div>
<!-- Editors Pick line END -->
