<?php
if (!class_exists('BroadNews_Express_Posts_Grid')) :
    /**
     * Adds BroadNews_Express_Posts_Grid widget.
     */
    class BroadNews_Express_Posts_Grid extends BroadNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'broadnews-express-posts-section-title',
                'broadnews-number-of-posts',
            );
            $this->select_fields = array(
                'broadnews-select-category',
            );

            $widget_ops = array(
                'classname' => 'broadnews_express_posts_grid_widget',
                'description' => __('Displays Express Posts from selected categories.', 'broadnews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('broadnews_express_posts_grid', __('AFTA Express Posts Grid', 'broadnews'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::broadnews_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */
    
            $broadnews_express_section_title = apply_filters('widget_title', $instance['broadnews-express-posts-section-title'], $instance, $this->id_base);

    
            $broadnews_no_of_post = 3;

            $broadnews_category = !empty($instance['broadnews-select-category']) ? $instance['broadnews-select-category'] : '0';

            $color_class = '';
            if(absint($broadnews_category) > 0){
                $color_id = "category_color_" . $broadnews_category;
                // retrieve the existing value(s) for this meta field. This returns an array
                $term_meta = get_option($color_id);
                $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';
            }


            $broadnews_featured_posts = broadnews_get_posts($broadnews_no_of_post, $broadnews_category);
            // open the widget container
            echo $args['before_widget'];
            ?>
            <div class="af-main-banner-categorized-posts express-grid pad-v">
                <div class="section-wrapper">
                    <?php if (!empty($broadnews_express_section_title)): ?>
                        <?php broadnews_render_section_title($broadnews_express_section_title, $color_class); ?>
                    <?php endif; ?>
                    <div class="af-widget-body">
                    <div class="af-express-grid-wrap">
                        <?php
                        if ($broadnews_featured_posts->have_posts()) :
                            $broadnews_count = 1;
                            while ($broadnews_featured_posts->have_posts()) :
                                $broadnews_featured_posts->the_post();
                                global $post;

                                if($broadnews_count == 1){
                                    $broadnews_thumbnail_size = 'broadnews-medium';
                                }else{
                                    $broadnews_thumbnail_size = 'medium';
                                }

                                ?>
                                <?php do_action('broadnews_action_loop_grid', $post->ID, 'grid-design-texts-over-image', $broadnews_thumbnail_size); ?>

                                <?php
                                $broadnews_count++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
            </div>
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;


            //print_pre($terms);
            $categories = broadnews_get_terms();
            


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::broadnews_generate_text_input('broadnews-express-posts-section-title', __('Title', 'broadnews'), 'Express Posts Grid');
                echo parent::broadnews_generate_select_options('broadnews-select-category', __('Select', 'broadnews'), $categories);                

            }

            //print_pre($terms);


        }

    }
endif;