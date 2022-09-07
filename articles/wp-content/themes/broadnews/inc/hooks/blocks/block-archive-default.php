<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package BroadNews
     */
    
    global $post;
    $broadnews_img_url = broadnews_get_freatured_image_url($post->ID, 'broadnews-featured');
    $broadnews_img_thumb_id = get_post_thumbnail_id($post->ID);
    $broadnews_show_excerpt = broadnews_get_option('archive_content_view');
?>
<div class="read-single color-pad">
    <div class="read-item">
        <div class="data-bg read-img pos-rel read-bg-img"
             data-background="<?php echo esc_url($broadnews_img_url); ?>">
            <img src="<?php echo esc_url($broadnews_img_url); ?>"
                 alt="<?php echo esc_attr(broadnews_get_img_alt($broadnews_img_thumb_id)); ?>">
            <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>            
            <?php broadnews_post_format($post->ID); ?>
            <?php broadnews_count_content_words($post->ID); ?>

        </div>

        <div class="read-details pad-archive">
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="read-categories">
                    <?php broadnews_post_categories(); ?>
                </div>
            <?php endif; ?>
            <div class="read-title">
                <?php the_title('<h4 class="entry-title">
                    <a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>
                </h4>'); ?>
            </div>
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="post-item-metadata entry-meta">
                    <?php broadnews_post_item_meta(); ?>
                    <?php broadnews_get_comments_views_share($post->ID); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php if ($broadnews_show_excerpt != 'archive-content-none'): ?>
        <div class="read-descprition full-item-discription">
            <div class="post-description">
                <?php
                    if ($broadnews_show_excerpt == 'archive-content-excerpt') {
                        echo wp_kses_post(broadnews_get_the_excerpt($post->ID));
                    } else {
                        the_content();
                    }
                ?>
            </div>
        </div>
    <?php endif; ?>

</div>