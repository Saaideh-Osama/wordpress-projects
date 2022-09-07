<?php

/**
 * List block part for displaying page content in page.php
 *
 * @package BroadNews
 */



global $post;
$broadnews_categories = get_the_category($post->ID);
$broadnews_related_section_title = esc_attr(broadnews_get_option('single_related_posts_title'));
$broadnews_number_of_related_posts = esc_attr(broadnews_get_option('single_number_of_related_posts'));

if ($broadnews_categories) :
    $broadnews_cat_ids = array();
    foreach ($broadnews_categories as $broadnews_category) $broadnews_cat_ids[] = $broadnews_category->term_id;
    $broadnews_args = array(
        'category__in' => $broadnews_cat_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page' => $broadnews_number_of_related_posts, // Number of related posts to display.
        'ignore_sticky_posts' => 1
    );
    $broadnews_related_posts = new wp_query($broadnews_args);
    if ($broadnews_related_posts->have_posts()) :?>

        <div class="promotionspace enable-promotionspace">
            <div class="af-reated-posts broadnews-customizer">

                <?php broadnews_render_section_title($broadnews_related_section_title); ?>

                <div class="af-container-row clearfix">
                    <?php
                    while ($broadnews_related_posts->have_posts()) {
                        $broadnews_related_posts->the_post();
                        global $post;


                    ?>
                        <div class="col-2 pad float-l trending-posts-item">
                            <div class="aft-trending-posts list-part af-sec-post">
                                <?php do_action('broadnews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                                
                            </div>
                        </div>
                    <?php }

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
<?php
    endif;
endif;
