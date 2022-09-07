<?php
if (!class_exists('BroadNews_Posts_lists')) :
    /**
     * Adds BroadNews_Posts_lists widget.
     */
    class BroadNews_Posts_lists extends BroadNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'broadnews-posts-list-title',
                'broadnews-posts-slider-number'
                
            );
            $this->select_fields = array(

                'broadnews-select-category',
                
            );

            $widget_ops = array(
                'classname' => 'broadnews_posts_lists_widget',
                'description' => __('Displays grid from selected categories.', 'broadnews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('broadnews_posts_list', __('AFTA Post List', 'broadnews'), $widget_ops);
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

            $title_1 = apply_filters('widget_title', $instance['broadnews-posts-list-title'], $instance, $this->id_base);
    
            $broadnews_no_of_post = 6;
            $broadnews_category = !empty($instance['broadnews-select-category']) ? $instance['broadnews-select-category'] : '0';


            $color_class = '';
            if(absint($broadnews_category) > 0){
                $color_id = "category_color_" . $broadnews_category;
                // retrieve the existing value(s) for this meta field. This returns an array
                $term_meta = get_option($color_id);
                $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';
            }


            // open the widget container
            echo $args['before_widget'];
            ?>
                <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec pad-v">
                    <?php if (!empty($title_1)): ?>
                        <?php broadnews_render_section_title($title_1, $color_class); ?>
                    <?php endif; ?>
                    <?php $broadnews_all_posts_vertical = broadnews_get_posts($broadnews_no_of_post, $broadnews_category); ?>

                    <div class="full-wid-resp af-widget-body af-container-row clearfix">
                        <?php
                            if ($broadnews_all_posts_vertical->have_posts()) :
                                while ($broadnews_all_posts_vertical->have_posts()) : $broadnews_all_posts_vertical->the_post();
                                    global $post;

                                    ?>
                                    <div class="pad float-l col-2">
                                        <?php do_action('broadnews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
                </section>
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


           
            $categories = broadnews_get_terms();
            


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::broadnews_generate_text_input('broadnews-posts-list-title', __('Title', 'broadnews'), 'Posts List');
                echo parent::broadnews_generate_select_options('broadnews-select-category', __('Select Category', 'broadnews'), $categories);
                

            }

           


        }

    }
endif;