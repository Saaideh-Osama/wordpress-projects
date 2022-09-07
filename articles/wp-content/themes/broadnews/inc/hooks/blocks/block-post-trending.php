<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package BroadNews
     */

?>

<div class="promotionspace enable-promotionspace">
    <div class="af-trending-posts broadnews-customizer">
        <?php
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
            $broadnews_all_posts_vertical = broadnews_get_posts(4, $broadnews_editors_pick_category, $broadnews_filterby);
            $broadnews_trending_posts_title = broadnews_get_option('main_trending_news_section_title');
            
            if (!empty($broadnews_trending_posts_title)) { ?>
                <?php broadnews_render_section_title($broadnews_trending_posts_title); ?>
            <?php }
        ?>
        <div class="af-container-row clearfix">
            <?php
                $broadnews_count = 1;
                if ($broadnews_all_posts_vertical->have_posts()) :
                    while ($broadnews_all_posts_vertical->have_posts()) : $broadnews_all_posts_vertical->the_post();
                        global $post;

                        ?>
                        <div class="col-2 pad float-l trending-posts-item">
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
    </div>
</div>


