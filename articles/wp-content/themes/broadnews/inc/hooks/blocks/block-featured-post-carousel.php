<?php
$broadnews_featured_news_title = broadnews_get_option('featured_post_carousel_section_title');
$broadnews_category = broadnews_get_option('select_featured_post_carousel_category');
$broadnews_no_of_post = broadnews_get_option('number_of_featured_gird');
$broadnews_featured_posts = broadnews_get_posts($broadnews_no_of_post, $broadnews_category);

$color_class = '';
if (absint($broadnews_category) > 0) {
    $color_id = "category_color_" . $broadnews_category;
    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option($color_id);
    $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';
}
?>

<div class="af-main-banner-categorized-posts express-carousel layout-2 broadnews-customizer">
    <div class="section-wrapper">

            <?php if (!empty($broadnews_featured_news_title)): ?>
                <?php broadnews_render_section_title($broadnews_featured_news_title, $color_class); ?>
            <?php endif; ?>

        <div class="slick-wrapper af-featured-post-carousel af-post-carousel clearfix af-cat-widget-carousel af-widget-carousel af-widget-body">
            <?php


            if ($broadnews_featured_posts->have_posts()) :
                $broadnews_count = 1;
                while ($broadnews_featured_posts->have_posts()) :
                    $broadnews_featured_posts->the_post();
                    global $post;

                    ?>
                    <div class="slick-item pad float-l af-sec-post">
                        <?php do_action('broadnews_action_loop_grid', $post->ID, 'grid-design-texts-over-image'); ?>
                    </div>
                    <?php
                    $broadnews_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php endif; ?>
        </div>
        <div class="af-widget-featured-post-carousel-navcontrols af-slick-navcontrols"></div>
    </div>
</div>
<!-- Editors Pick line END -->
