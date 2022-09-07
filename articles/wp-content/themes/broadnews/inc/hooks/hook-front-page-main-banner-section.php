<?php
if (!function_exists('broadnews_front_page_main_section')) :
    /**
     * Banner Slider
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_front_page_main_section()
    {
        $broadnews_enable_main_slider = broadnews_get_option('show_main_news_section');





        $broadnews_banner_layout = 'layout-compressed';
        $broadnews_banner_background = broadnews_get_option('main_banner_background_section');

        $broadnews_layout_class = 'aft-banner-' . $broadnews_banner_layout;

        $broadnews_banner_background_color = broadnews_get_option('select_main_banner_background_color');
        $broadnews_layout_class .= ' aft-banner-' . $broadnews_banner_background_color;

        $broadnews_main_banner_order = broadnews_get_option('select_main_banner_order');
        $broadnews_layout_class .= ' aft-banner-' . $broadnews_main_banner_order;

        $broadnews_main_banner_url = '';

        if (!empty($broadnews_banner_background)) {
            $broadnews_banner_background = absint($broadnews_banner_background);
            $broadnews_main_banner_url = wp_get_attachment_url($broadnews_banner_background);
            $broadnews_layout_class .= ' data-bg';
        }

?>



        <section class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed  broadnews-customizer <?php echo esc_attr($broadnews_layout_class); ?>" data-background="<?php echo esc_attr($broadnews_main_banner_url); ?>">
            

            <?php do_action('broadnews_action_banner_exclusive_posts'); ?>

            <?php if ($broadnews_enable_main_slider) : ?>
                <div class="container-wrapper">
                    <div class="aft-main-banner-wrapper">
                        <?php
                        $broadnews_banner_block = 'main-' . $broadnews_banner_layout;
                        broadnews_get_block($broadnews_banner_block, 'banner');
                        ?>
                    </div>
                </div>
            <?php endif; ?>

        </section>
        <?php
    }
endif;
add_action('broadnews_action_front_page_main_section', 'broadnews_front_page_main_section', 40);
