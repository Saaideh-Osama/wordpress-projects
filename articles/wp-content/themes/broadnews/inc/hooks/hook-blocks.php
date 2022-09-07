<?php
if (!function_exists('broadnews_archive_layout_selection')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_archive_layout_selection($broadnews_archive_layout = 'default')
    {

        switch ($broadnews_archive_layout) {

            case "archive-layout-full":
                broadnews_get_block('full', 'archive');
                break;
            default:
                broadnews_get_block('grid', 'archive');
        }
    }
endif;

if (!function_exists('broadnews_archive_layout')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since BroadNews 1.0.0
     *
     */
    function broadnews_archive_layout($cat_slug = '')
    {

        $broadnews_archive_args = broadnews_archive_layout_class($cat_slug);
        if (!empty($broadnews_archive_args['data_mh'])) : ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class($broadnews_archive_args['add_archive_class']); ?> data-mh="<?php echo esc_attr($broadnews_archive_args['data_mh']); ?>">
                <?php broadnews_archive_layout_selection($broadnews_archive_args['archive_layout']); ?>
            </article>
        <?php else : ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class($broadnews_archive_args['add_archive_class']); ?>>
                <?php broadnews_archive_layout_selection($broadnews_archive_args['archive_layout']); ?>
            </article>
        <?php endif; ?>

    <?php

    }

    add_action('broadnews_action_archive_layout', 'broadnews_archive_layout', 10, 1);
endif;

function broadnews_archive_layout_class($broadnews_cat_slug)
{

    $broadnews_archive_args = [];
    $broadnews_archive_class = broadnews_get_option('archive_layout');
    $broadnews_archive_layout_grid = broadnews_get_option('archive_image_alignment_grid');

    if ($broadnews_archive_class == 'archive-layout-grid') {
        $broadnews_archive_args['archive_layout'] = 'archive-layout-grid';
        $broadnews_archive_args['add_archive_class'] = 'af-sec-post latest-posts-grid col-3 float-l pad ';
        //$broadnews_archive_layout_mode = broadnews_get_option('archive_image_alignment_grid');
        $broadnews_archive_layout_mode = $broadnews_archive_layout_grid;
        if ($broadnews_archive_layout_mode == 'archive-image-full-alternate' || $broadnews_archive_layout_mode == 'archive-image-list-alternate') {
            $broadnews_archive_args['data_mh'] = '';
        } else {
            $broadnews_archive_args['data_mh'] = 'archive-layout-grid';
        }
        $broadnews_image_align_class = 'archive-image-default';
        $broadnews_archive_args['add_archive_class'] .= ' ' . $broadnews_archive_class . ' ' . $broadnews_image_align_class;
    } else {
        $broadnews_archive_args['archive_layout'] = 'archive-layout-full';
        $broadnews_archive_args['add_archive_class'] = 'af-sec-post latest-posts-full col-1 float-l pad';
        $broadnews_archive_args['data_mh'] = '';
    }

    return $broadnews_archive_args;
}


//Archive div wrap before loop

if (!function_exists('broadnews_archive_layout_before_loop')) :

    /**
     *
     * @param null
     *
     * @return null
     *
     * @since BroadNews 1.0.0
     *
     */

    function broadnews_archive_layout_before_loop()
    {

        //grid layout option
        $broadnews_archive_mode = broadnews_get_option('archive_layout');
        if ($broadnews_archive_mode == 'archive-layout-grid') {
            $broadnews_archive_layout_grid = broadnews_get_option('archive_grid_column_layout');
            $broadnews_col_grid = $broadnews_archive_mode . " " . 'two-col-masonry';
            if ($broadnews_archive_layout_grid == 'grid-layout-two') {
                $broadnews_col_grid = $broadnews_archive_mode . " " . 'two-col-masonry';
            } else if ($broadnews_archive_layout_grid == 'grid-layout-four') {
                $broadnews_col_grid = $broadnews_archive_mode . " " . 'four-col-masonry';
            } else {
                $broadnews_col_grid = $broadnews_archive_mode . " " . 'three-col-masonry';
            }
            $broadnews_archive_class = $broadnews_col_grid;
        } //full layout option
        else if ($broadnews_archive_mode == 'archive-layout-full') {
            $broadnews_archive_layout_full = broadnews_get_option('archive_layout_full');
            if ($broadnews_archive_layout_full == 'full-image-first') {
                $broadnews_archive_class = $broadnews_archive_mode . " " . 'full-image-first';
            } else if ($broadnews_archive_layout_full == 'full-title-first') {
                $broadnews_archive_class = $broadnews_archive_mode . " " . 'archive-title-first';
            } else if ($broadnews_archive_layout_full == 'archive-full-grid') {
                $broadnews_archive_class = $broadnews_archive_mode . " " . "full-with-grid";
            } else {
                $broadnews_archive_class = $broadnews_archive_mode;
            }
        } else {

            $broadnews_archive_class = $broadnews_archive_mode;
        }

    ?>
        <div id="aft-archive-wrapper" class="af-container-row aft-archive-wrapper broadnews-customizer clearfix <?php echo esc_attr($broadnews_archive_class); ?>">
        <?php

    }

    add_action('broadnews_archive_layout_before_loop', 'broadnews_archive_layout_before_loop');
endif;

if (!function_exists('broadnews_archive_layout_after_loop')) :

    function broadnews_archive_layout_after_loop()
    {
        ?>
        </div>
<?php }

    add_action('broadnews_archive_layout_after_loop', 'broadnews_archive_layout_after_loop');

endif;