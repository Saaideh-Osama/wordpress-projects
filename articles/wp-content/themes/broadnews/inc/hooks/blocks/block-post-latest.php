<?php
    /**
     * List block part for displaying latest posts in footer.php
     *
     * @package BroadNews
     */
    
    $broadnews_latest_posts_title = broadnews_get_option('frontpage_latest_posts_section_title');
    $broadnews_latest_posts_subtitle = broadnews_get_option('frontpage_latest_posts_section_subtitle');
    $broadnews_number_of_posts = broadnews_get_option('number_of_frontpage_latest_posts');
    $broadnews_all_posts = broadnews_get_posts($broadnews_number_of_posts);
?>
<div class="af-main-banner-latest-posts grid-layout broadnews-customizer">
    <div class="container-wrapper">
    
        <div class="widget-title-section">
            <?php if (!empty($broadnews_latest_posts_title)): ?>
                <?php broadnews_render_section_title($broadnews_latest_posts_title); ?>
            <?php endif; ?>
        </div>
        <div class="af-container-row clearfix">
            <?php
                if ($broadnews_all_posts->have_posts()) :
                    while ($broadnews_all_posts->have_posts()) : $broadnews_all_posts->the_post();
                        global $post;

                        ?>
                        <div class="col-3 pad float-l trending-posts-item">
                            <div class="aft-trending-posts list-part af-sec-post">
                                <?php do_action('broadnews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                                
                        </div>
                        </div>
                    <?php
                    endwhile; ?>
                <?php
                endif;
                wp_reset_postdata();
            ?>
        
        </div>
    </div>
</div>
