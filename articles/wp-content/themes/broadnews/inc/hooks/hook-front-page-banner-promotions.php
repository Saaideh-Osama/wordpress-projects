<?php
if (!function_exists('broadnews_banner_advertisement')):
    /**
     * Ticker Slider
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_banner_advertisement()
    {


        $broadnews_banner_advertisement = broadnews_get_option('banner_advertisement_section');

        if (('' != $broadnews_banner_advertisement) ) { ?>
            <div class="banner-promotions-wrapper">
                <?php if (('' != $broadnews_banner_advertisement)):
                    $broadnews_banner_advertisement = absint($broadnews_banner_advertisement);
                    $broadnews_banner_advertisement = wp_get_attachment_image($broadnews_banner_advertisement, 'full');
                    $broadnews_banner_advertisement_url = broadnews_get_option('banner_advertisement_section_url');
                    $broadnews_banner_advertisement_url = isset($broadnews_banner_advertisement_url) ? esc_url($broadnews_banner_advertisement_url) : '#';
                    $broadnews_open_on_new_tab = broadnews_get_option('banner_advertisement_open_on_new_tab');
                    $broadnews_open_on_new_tab = ('' != $broadnews_open_on_new_tab) ? '_blank' : '';

                    ?>
                    <div class="promotion-section">
                        <a href="<?php echo esc_url($broadnews_banner_advertisement_url); ?>" target="<?php echo esc_attr($broadnews_open_on_new_tab); ?>">
                            <?php echo wp_kses_post($broadnews_banner_advertisement); ?>
                        </a>
                    </div>
                <?php endif; ?>                

            </div>
            <!-- Trending line END -->
            <?php
        }

         if (is_active_sidebar('home-promotion-widgets')): ?>
                     <div class="banner-promotions-wrapper">
                    <div class="promotion-section">
                        <?php dynamic_sidebar('home-promotion-widgets'); ?>
                    </div>
                </div>
                <?php endif;
    }
endif;

add_action('broadnews_action_banner_advertisement', 'broadnews_banner_advertisement', 10);