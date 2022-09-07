<?php
if (!function_exists('broadnews_banner_exclusive_posts')) :
    /**
     * Ticker Slider
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_banner_exclusive_posts()
    {



        if (false != broadnews_get_option('show_popular_tags_section')) : ?>
            <div class="aft-popular-tags">
                <div class="container-wrapper">
                    <?php

                    $broadnews_show_popular_tags_title = broadnews_get_option('frontpage_popular_tags_section_title');
                    $broadnews_select_popular_tags_mode = broadnews_get_option('select_popular_tags_mode');
                    $broadnews_number_of_popular_tags = broadnews_get_option('number_of_popular_tags');
                    $broadnews_tags_section_filterby = broadnews_get_option('frontpage_popular_tags_section_filterby');


                    broadnews_list_popular_taxonomies($broadnews_select_popular_tags_mode, $broadnews_show_popular_tags_title, $broadnews_number_of_popular_tags, $broadnews_tags_section_filterby);


                    ?>
                </div>
            </div>
        <?php endif;



        ?>
        <?php if (false != broadnews_get_option('show_flash_news_section')) :

            $broadnews_em_ticker_news_mode = 'aft-flash-slide left';
            $broadnews_dir = 'left';
            if (is_rtl()) {
                $broadnews_em_ticker_news_mode = 'aft-flash-slide right';
                $broadnews_dir = 'right';
            }
        ?>
            <div class="banner-exclusive-posts-wrapper">

                <?php
                $broadnews_categories = broadnews_get_option('select_flash_news_category');
                $broadnews_number_of_posts = broadnews_get_option('number_of_flash_news');
                $broadnews_em_ticker_news_title = broadnews_get_option('flash_news_title');

                $broadnews_all_posts = broadnews_get_posts($broadnews_number_of_posts, $broadnews_categories);
                $broadnews_show_trending = true;
                $broadnews_count = 1;
                ?>

                <div class="container-wrapper">
                    <div class="exclusive-posts">
                        <div class="exclusive-now primary-color">
                            <div class="aft-ripple"></div>
                            <?php if (!empty($broadnews_em_ticker_news_title)) : ?>
                                <span><?php echo esc_html($broadnews_em_ticker_news_title); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="exclusive-slides" dir="ltr">
                            <?php
                            if ($broadnews_all_posts->have_posts()) : ?>
                                <div class='marquee <?php echo esc_attr($broadnews_em_ticker_news_mode); ?>' data-speed='130000' data-gap='0' data-duplicated='true' data-direction="<?php echo esc_attr($broadnews_dir); ?>">
                                    <?php
                                    while ($broadnews_all_posts->have_posts()) : $broadnews_all_posts->the_post();
                                        global $post;
                                        
                                    ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ($broadnews_show_trending == true) : ?>

                                            <?php endif; ?>

                                            <span class="circle-marq">
                                                <?php  broadnews_the_post_thumbnail('thumbnail', $post->ID);  ?>  
                                            </span>
                                            <h4>
                                            <span class="exclusive-post-title">
                                                <?php the_title(); ?>
                                                </span>
                                                </h4>
                                        </a>
                                <?php
                                        $broadnews_count++;
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluive line END -->
<?php

        endif;
    }
endif;

add_action('broadnews_action_banner_exclusive_posts', 'broadnews_banner_exclusive_posts', 10);
