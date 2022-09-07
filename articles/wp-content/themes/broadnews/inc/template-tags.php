<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BroadNews
 */

if (!function_exists('broadnews_post_categories')) :
    function broadnews_post_categories($broadnews_is_single = false)
    {
        $broadnews_global_show_categories = broadnews_get_option('global_show_categories');
        if ($broadnews_global_show_categories == 'no') {
            return;
        }


        $broadnews_global_number_of_categories = broadnews_get_option('global_number_of_categories');
        if ($broadnews_global_number_of_categories == 'one') {
            $show_category_number = 1;
        } else {
            $show_category_number = 0;
        }

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            global $post;
            $broadnews_post_categories = get_the_category($post->ID);
            if ($broadnews_post_categories) {

                $broadnews_output = '<ul class="cat-links">';
                $category_count = 0;
                foreach ($broadnews_post_categories as $post_category) {
                    $broadnews_t_id = $post_category->term_id;
                    $broadnews_color_id = "category_color_" . $broadnews_t_id;

                    // retrieve the existing value(s) for this meta field. This returns an array
                    $broadnews_term_meta = get_option($broadnews_color_id);
                    $broadnews_color_class = ($broadnews_term_meta) ? $broadnews_term_meta['color_class_term_meta'] : 'category-color-1';

                    $broadnews_output .= '<li class="meta-category">
                             <a class="broadnews-categories ' . esc_attr($broadnews_color_class) . '" href="' . esc_url(get_category_link($post_category)) . '">
                                 ' . esc_html($post_category->name) . '
                             </a>
                        </li>';

                    if ($broadnews_is_single == false) {
                        if (++$category_count == $show_category_number) break;
                    }
                }
                $broadnews_output .= '</ul>';
                echo wp_kses_post($broadnews_output);
            }
        }
    }
endif;


if (!function_exists('broadnews_get_category_color_class')) :

    function broadnews_get_category_color_class($term_id)
    {

        $broadnews_color_id = "category_color_" . $term_id;
        // retrieve the existing value(s) for this meta field. This returns an array
        $broadnews_term_meta = get_option($broadnews_color_id);
        $broadnews_color_class = ($broadnews_term_meta) ? $broadnews_term_meta['color_class_term_meta'] : '';
        return $broadnews_color_class;
    }
endif;

if (!function_exists('broadnews_post_item_meta')) :

    function broadnews_post_item_meta($broadnews_post_display = 'spotlight-post')
    {

        global $post;
        if ('post' == get_post_type($post->ID)) :

            $broadnews_author_id = $post->post_author;
            $broadnews_date_display_setting = broadnews_get_option('global_date_display_setting');
            $broadnews_author_icon_gravatar_display_setting = broadnews_get_option('global_author_icon_gravatar_display_setting');

            if ($broadnews_post_display == 'list-post') {
                $broadnews_post_meta = broadnews_get_option('list_post_date_author_setting');
            } elseif ($broadnews_post_display == 'grid-post') {
                $broadnews_post_meta = broadnews_get_option('small_grid_post_date_author_setting');
            } else {
                $broadnews_post_meta = broadnews_get_option('global_post_date_author_setting');
            }

            if (($broadnews_post_meta == 'show-date-author')) {
                $broadnews_display_author = true;
                $broadnews_display_date = true;
            } else {
                $broadnews_display_author = false;
                $broadnews_display_date = false;
            }

?>

            <span class="author-links">
                <?php if ($broadnews_display_author) : ?>
                    <span class="item-metadata posts-author byline">
                    <?php if ($broadnews_author_icon_gravatar_display_setting == 'display-gravatar'){ 
                     broadnews_by_author($gravatar=true);
                     }elseif ($broadnews_author_icon_gravatar_display_setting == 'display-icon'){?>
                    <i class="far fa-user-circle"></i>
                    <?php   broadnews_by_author($gravatar=false);
                    }else{  
                    broadnews_by_author($gravatar=false);
                    }?>
                    </span>
                <?php endif; ?>


                <?php


                if ($broadnews_display_date) :

                    $broadnews_date_display_type = broadnews_get_option('global_date_display_type');
                    $post_date = broadnews_post_date_meta($broadnews_date_display_type);

                ?>
                    <span class="item-metadata posts-date">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <?php echo wp_kses_post($post_date);  ?>
                    </span>
                <?php endif; ?>

            </span>
<?php
        endif;
    }
endif;


if (!function_exists('broadnews_post_date_meta')) :

    function broadnews_post_date_meta($display_date_by = 'published')
    {
        $post_date = get_post_modified_time(get_option('date_format'));
        $broadnews_date_display_setting = broadnews_get_option('global_date_display_setting');
        if ($display_date_by == 'modified') {
            if ($broadnews_date_display_setting == 'default-date') {
                $post_date =  get_post_modified_time(get_option('date_format'));
            } else {
                $post_date = __(human_time_diff(get_post_modified_time('U'), current_time('timestamp')) . ' ' . __('ago', 'broadnews'));
            }
        } else {
            if ($broadnews_date_display_setting == 'default-date') {
                $post_date = get_the_time(get_option('date_format'));
            } else {
                $post_date = __(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'broadnews'));
            }
        }
        return $post_date;
    }
endif;

if (!function_exists('broadnews_post_item_tag')) :

    function broadnews_post_item_tag($view = 'default')
    {
        global $post;

        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', ' ');
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html('Tags: %1$s') . '</span>', $tags_list);
            }
        }

        if (is_single()) {
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'broadnews'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }
    }
endif;
