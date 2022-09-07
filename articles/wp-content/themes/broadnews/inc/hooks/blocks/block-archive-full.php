<?php
/**
 * Full block part for displaying page content in page.php
 *
 * @package BroadNews
 */

$broadnews_thumbnail_size = 'broadnews-featured';
$broadnews_grid_design = 'grid-design-default';
$broadnews_title_position = 'bottom';

$broadnews_content_view = broadnews_get_option('archive_content_view');

$broadnews_term_meta_grid = '';
if(is_category()){
    $broadnews_queried_object = get_queried_object();
    $broadnews_t_id = $broadnews_queried_object->term_id;
    $broadnews_term_meta_grid = get_option("category_layout_full_$broadnews_t_id");
}

if (!empty($broadnews_term_meta_grid)) {
    $broadnews_archive_image = $broadnews_term_meta_grid['archive_layout_full'];
} else {
    $broadnews_archive_image = broadnews_get_option('archive_layout_full');
}

if($broadnews_archive_image  == 'full-image-tile'){
    $broadnews_grid_design ='grid-design-texts-over-image';
}

if($broadnews_archive_image == 'full-title-first'){
    $broadnews_title_position = 'top';
}



$broadnews_show_excerpt = true;
if ($broadnews_content_view == 'archive-content-none') {
    $broadnews_show_excerpt = false;
}
do_action('broadnews_action_loop_grid', $post->ID, $broadnews_grid_design, $broadnews_thumbnail_size, $broadnews_show_excerpt, $broadnews_content_view, $broadnews_title_position);