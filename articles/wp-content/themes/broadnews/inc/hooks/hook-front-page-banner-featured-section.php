<?php
if (!function_exists('broadnews_banner_featured_section')) :
    /**
     * Ticker Slider
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_banner_featured_section()
    {
        
        $broadnews_show_post_grid_section = broadnews_get_option('show_post_carousel_section');
?>
        <div class="aft-frontpage-feature-section-wrapper">   
            
            <?php if ($broadnews_show_post_grid_section) { ?>
                <section class="aft-blocks aft-featured-category-section featured-cate-sec">
                    <div class="container-wrapper">
                        <?php broadnews_get_block('post-carousel', 'featured'); ?>
                    </div>
                </section>
            <?php } ?>          


        </div>
<?php }
endif;


add_action('broadnews_action_banner_featured_section', 'broadnews_banner_featured_section', 10);
