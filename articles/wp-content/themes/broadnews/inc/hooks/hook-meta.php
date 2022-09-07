<?php
/**
 * Implement theme metabox.
 *
 * @package BroadNews
 */

if (!function_exists('broadnews_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function broadnews_add_theme_meta_box()
    {

        $broadnews_screens = array('post', 'page');

        foreach ($broadnews_screens as $screen) {
            add_meta_box(
                'broadnews-theme-settings',
                esc_html__('Layout Options', 'broadnews'),
                'broadnews_render_layout_options_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'broadnews_add_theme_meta_box');

if (!function_exists('broadnews_render_layout_options_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function broadnews_render_layout_options_metabox($post, $metabox)
    {

        $broadnews_post_id = $post->ID;

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'broadnews_meta_box_nonce');
        // Fetch Options list.
        $broadnews_content_layout = get_post_meta($broadnews_post_id, 'broadnews-meta-content-alignment', true);
        $broadnews_global_single_content_mode = get_post_meta($broadnews_post_id, 'broadnews-meta-content-mode', true);

        if (empty($broadnews_content_layout)) {
            $broadnews_content_layout = broadnews_get_option('global_content_alignment');
        }

        if (empty($broadnews_global_single_content_mode)) {
            $broadnews_global_single_content_mode = broadnews_get_option('global_single_content_mode');
        }


        ?>
        <div id="broadnews-settings-metabox-container" class="broadnews-settings-metabox-container">
            <div id="broadnews-settings-metabox-tab-layout">

                <div class="broadnews-row-content">
                    <!-- Select Field-->
                    <h3><?php esc_html_e('Content Options', 'broadnews') ?></h3>
                    <p>
                        <select name="broadnews-meta-content-mode" id="broadnews-meta-content-mode">

                            <option value="" <?php selected('', $broadnews_global_single_content_mode); ?>>
                                <?php esc_html_e('Set as global layout', 'broadnews') ?>
                            </option>
                            <option value="single-content-mode-boxed" <?php selected('single-content-mode-boxed', $broadnews_global_single_content_mode); ?>>
                                <?php esc_html_e('Spacious', 'broadnews') ?>
                            </option>
                            <option value="single-content-mode-compact" <?php selected('single-content-mode-compact', $broadnews_global_single_content_mode); ?>>
                                <?php esc_html_e('Default', 'broadnews') ?>
                            </option>


                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize>Themes Options for Single Post/Page.', 'broadnews')?></small>

                </div><!-- .broadnews-row-content -->
                <div class="broadnews-row-content">
                    <!-- Select Field-->
                    <h3><?php esc_html_e('Sidebar Options', 'broadnews') ?></h3>
                    <p>
                        <select name="broadnews-meta-content-alignment" id="broadnews-meta-content-alignment">

                            <option value="" <?php selected('', $broadnews_content_layout); ?>>
                                <?php esc_html_e('Set as global layout', 'broadnews') ?>
                            </option>
                            <option value="align-content-left" <?php selected('align-content-left', $broadnews_content_layout); ?>>
                                <?php esc_html_e('Content - Primary Sidebar', 'broadnews') ?>
                            </option>
                            <option value="align-content-right" <?php selected('align-content-right', $broadnews_content_layout); ?>>
                                <?php esc_html_e('Primary Sidebar - Content', 'broadnews') ?>
                            </option>
                            <option value="full-width-content" <?php selected('full-width-content', $broadnews_content_layout); ?>>
                                <?php esc_html_e('No Sidebar', 'broadnews') ?>
                            </option>
                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize>Frontpage Options for Homepage.', 'broadnews')?></small>

                </div><!-- .broadnews-row-content -->

            </div><!-- #broadnews-settings-metabox-tab-layout -->
        </div><!-- #broadnews-settings-metabox-container -->

        <?php
    }

endif;


if (!function_exists('broadnews_save_layout_options_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $broadnews_post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function broadnews_save_layout_options_meta($broadnews_post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['broadnews_meta_box_nonce']) || !wp_verify_nonce($_POST['broadnews_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $broadnews_post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $broadnews_post_id) {
            return;
        }

        // Check permission.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $broadnews_post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $broadnews_post_id)) {
            return;
        }

        $broadnews_content_layout = isset($_POST['broadnews-meta-content-alignment']) ? $_POST['broadnews-meta-content-alignment'] : '';
        $broadnews_global_single_content_mode = isset($_POST['broadnews-meta-content-mode']) ? $_POST['broadnews-meta-content-mode'] : '';
        update_post_meta($broadnews_post_id, 'broadnews-meta-content-alignment', sanitize_text_field($broadnews_content_layout));
        update_post_meta($broadnews_post_id, 'broadnews-meta-content-mode', sanitize_text_field($broadnews_global_single_content_mode));


    }

endif;

add_action('save_post', 'broadnews_save_layout_options_meta', 10, 2);


//Category fields meta starts


if (!function_exists('broadnews_taxonomy_add_new_meta_field')) :
// Add term page
    function broadnews_taxonomy_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page

        $broadnews_cat_color = array(
            'category-color-1' => __('Category Color 1', 'broadnews'),
            'category-color-2' => __('Category Color 2', 'broadnews'),
            'category-color-3' => __('Category Color 3', 'broadnews'),
            

        );
        ?>
        <div class="form-field">
            <label for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'broadnews'); ?></label>
            <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                <?php foreach ($broadnews_cat_color as $key => $value): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'broadnews'); ?></p>
        </div>
        <?php
    }
endif;
add_action('category_add_form_fields', 'broadnews_taxonomy_add_new_meta_field', 10, 2);


if (!function_exists('broadnews_taxonomy_edit_meta_field')) :
// Edit term page
    function broadnews_taxonomy_edit_meta_field($term)
    {

        // put the term ID into a variable
        $broadnews_t_id = $term->term_id;

        // retrieve the existing value(s) for this meta field. This returns an array
        $broadnews_term_meta = get_option("category_color_$broadnews_t_id");

        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label
                        for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'broadnews'); ?></label></th>
            <td>
                <?php
                $broadnews_cat_color = array(
                    'category-color-1' => __('Category Color 1', 'broadnews'),
                    'category-color-2' => __('Category Color 2', 'broadnews'),
                    'category-color-3' => __('Category Color 3', 'broadnews'),
                    

                );
                ?>
                <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                    <?php foreach ($broadnews_cat_color as $key => $value): ?>
                        <option value="<?php echo esc_attr($key); ?>"<?php selected(isset($broadnews_term_meta['color_class_term_meta'])?$broadnews_term_meta['color_class_term_meta']:'', $key); ?>><?php echo esc_html($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'broadnews'); ?></p>
            </td>
        </tr>
        <?php
    }
endif;
add_action('category_edit_form_fields', 'broadnews_taxonomy_edit_meta_field', 10, 2);




if (!function_exists('broadnews_save_taxonomy_color_class_meta')) :
// Save extra taxonomy fields callback function.
    function broadnews_save_taxonomy_color_class_meta($broadnews_term_id)
    {
        if (isset($_POST['term_meta'])) {
            $broadnews_t_id = $broadnews_term_id;
            $broadnews_term_meta = get_option("category_color_$broadnews_t_id");
            $broadnews_cat_keys = array_keys($_POST['term_meta']);
            foreach ($broadnews_cat_keys as $key) {
                if (isset ($_POST['term_meta'][$key])) {
                    $broadnews_term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option("category_color_$broadnews_t_id", $broadnews_term_meta);
        }
    }

endif;
add_action('edited_category', 'broadnews_save_taxonomy_color_class_meta', 10, 2);
add_action('create_category', 'broadnews_save_taxonomy_color_class_meta', 10, 2);