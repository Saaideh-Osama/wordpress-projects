<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BroadNews
 */


if (!is_active_sidebar('sidebar-1')) {
    return;
}

$global_layout = broadnews_get_option('global_content_alignment');
$page_layout = $global_layout;
// Check if single.

if (is_singular()) {
    $post_options = get_post_meta($post->ID, 'broadnews-meta-content-alignment', true);
    if (!empty($post_options)) {
        $page_layout = $post_options;
    } else {
        $page_layout = $global_layout;
    }
}

if (is_front_page() || is_home()) {
    $frontpage_layout = broadnews_get_option('frontpage_content_alignment');
    if (!empty($frontpage_layout)) {
        $page_layout = $frontpage_layout;
    } else {
        $page_layout = $global_layout;
    }
}


if ($page_layout == 'full-width-content') {
    return;
}

?>

<?php
$sticky_sidebar_class = '';
$sticky_sidebar = broadnews_get_option('frontpage_sticky_sidebar');
if ($sticky_sidebar) {
    $sticky_sidebar_class = broadnews_get_option('frontpage_sticky_sidebar_position');
}
?>


<div id="secondary" class="sidebar-area <?php echo esc_attr($sticky_sidebar_class); ?>">
        <aside class="widget-area color-pad">
            <?php dynamic_sidebar('sidebar-1'); ?>

        </aside>
</div>