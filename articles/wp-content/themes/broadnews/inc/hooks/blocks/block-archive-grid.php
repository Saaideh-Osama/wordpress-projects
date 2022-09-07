<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package BroadNews
     */


$broadnews_thumbnail_size = 'medium';
$broadnews_grid_design ='grid-design-default';

$broadnews_term_meta_grid = '';
if(is_category()){
    $broadnews_queried_object = get_queried_object();
    $broadnews_t_id = $broadnews_queried_object->term_id;
    $broadnews_term_meta_grid = get_option("category_layout_grid_$broadnews_t_id");
}

if (!empty($broadnews_term_meta_grid)) {
    $broadnews_archive_image = $broadnews_term_meta_grid['archive_layout_alignment_term_meta_gird'];
} else {
    $broadnews_archive_image = broadnews_get_option('archive_image_alignment_grid');
}

if($broadnews_archive_image  == 'archive-image-tile'){
    $broadnews_grid_design ='grid-design-texts-over-image';
}



$broadnews_content_view = broadnews_get_option('archive_content_view');
$broadnews_show_excerpt = true;
if($broadnews_content_view == 'archive-content-none'){
    $broadnews_show_excerpt = false;
}
?>

<div class="archive-grid-post">
    <?php do_action('broadnews_action_loop_grid', $post->ID, $broadnews_grid_design, $broadnews_thumbnail_size, $broadnews_show_excerpt, $broadnews_content_view); ?>

    <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'broadnews'),
            'after' => '</div>',
        ));
    ?>
</div>








