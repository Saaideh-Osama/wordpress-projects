<?php

/**
 * Front page section additions.
 */


if (!function_exists('broadnews_full_width_upper_footer_section')) :
    /**
     *
     * @since BroadNews 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function broadnews_full_width_upper_footer_section()
    {



        ?>

        <section class="aft-blocks above-footer-widget-section">
            <?php

            if (1 == broadnews_get_option('frontpage_show_latest_posts')) {
                broadnews_get_block('latest');
            }           


            ?>
        </section>
        <?php

    }
endif;
add_action('broadnews_action_full_width_upper_footer_section', 'broadnews_full_width_upper_footer_section');
