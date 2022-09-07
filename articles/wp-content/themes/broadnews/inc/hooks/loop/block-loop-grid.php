<?php
if (!function_exists('broadnews_loop_grid')) :
    /**
     * Banner Slider
     *
     * @since Newsical 1.0.0
     *
     */
    function broadnews_loop_grid($broadnews_post_id, $broadnews_grid_design = 'grid-design-default', $broadnews_thumbnail_size = 'medium', $broadnews_show_excerpt = false, $archive_content_view = 'archive-content-excerpt', $broadnews_title_position = 'bottom', $broadnews_count = 0)
    {
        $broadnews_post_display = 'spotlight-post';
        if ($broadnews_thumbnail_size == 'medium') {
            $broadnews_post_display = 'grid-post';
        }

        ?>

        <div class="pos-rel read-single color-pad clearfix af-cat-widget-carousel <?php echo esc_attr($broadnews_grid_design); ?>">
            <?php if ($broadnews_title_position == 'top'): ?>
                <div class="read-title">
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
                <div class="post-item-metadata entry-meta">
                    <?php broadnews_post_item_meta($broadnews_post_display); ?>
                    <?php broadnews_get_comments_views_share($broadnews_post_id); ?>
                </div>
            <?php endif; ?>
            <div class="read-img pos-rel read-bg-img">
                <a class="aft-post-image-link"
                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php broadnews_the_post_thumbnail($broadnews_thumbnail_size, $broadnews_post_id); ?>
                <?php if (absint($broadnews_count) > 0): ?>
                    <span class="trending-no"><?php echo esc_html($broadnews_count); ?></span>
                <?php endif; ?>
                    <div class="post-format-and-min-read-wrap">
                        <?php broadnews_post_format($broadnews_post_id); ?>
                        <?php broadnews_count_content_words($broadnews_post_id); ?>
                    </div>

                    <?php if ($broadnews_grid_design == 'grid-design-default'): ?>
                        <div class="category-min-read-wrap">
                            <div class="read-categories">
                                <?php broadnews_post_categories(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

            </div>
            <div class="pad read-details color-tp-pad">

                    <?php if ($broadnews_grid_design == 'grid-design-texts-over-image'): ?>
                        <div class="read-categories">
                            <?php broadnews_post_categories(); ?>
                        </div>
                    <?php endif; ?>

                <?php if ($broadnews_title_position == 'bottom'): ?>
                    <div class="read-title">
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
        <?php //if ($broadnews_small_grid == false): ?>
                    <div class="post-item-metadata entry-meta">
                        <?php broadnews_post_item_meta($broadnews_post_display); ?>
                        <?php broadnews_get_comments_views_share($broadnews_post_id); ?>
                    </div>
                <?php endif; ?>
                <?php //endif; ?>

                <?php if ($broadnews_show_excerpt == true): ?>
                    <div class="post-description">
                        <?php
                        if ($archive_content_view == 'archive-content-full') {
                            the_content();
                        } else {
                            echo wp_kses_post(broadnews_get_the_excerpt($broadnews_post_id));
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
endif;
add_action('broadnews_action_loop_grid', 'broadnews_loop_grid', 10, 7);