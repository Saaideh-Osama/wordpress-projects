<?php
    if (!class_exists('BroadNews_Featured_Post')) :
        /**
         * Adds BroadNews_Featured_Post widget.
         */
        class BroadNews_Featured_Post extends BroadNews_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array(
                    'broadnews-featured-posts-title',
                    'broadnews-number-of-posts'
                
                );
                $this->select_fields = array(
                    
                    'broadnews-select-category',
                
                );
                
                $widget_ops = array(
                    'classname' => 'broadnews_featured_posts_widget',
                    'description' => __('Displays grid from selected categories.', 'broadnews'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('broadnews_featured_posts', __('AFTA Post Grid', 'broadnews'), $widget_ops);
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
    
                $broadnews_featured_news_title = apply_filters('widget_title', $instance['broadnews-featured-posts-title'], $instance, $this->id_base);
    
                $broadnews_number_of_featured_news = 4;
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
                <section class="aft-blocks af-main-banner-featured-posts pad-v">
                    <div class="af-main-banner-featured-posts featured-posts">
                        <?php if (!empty($broadnews_featured_news_title)): ?>
                            <?php broadnews_render_section_title($broadnews_featured_news_title, $color_class); ?>
                        <?php endif; ?>
                        <div class="section-wrapper af-widget-body">
                            <div class="af-container-row clearfix">
                                <?php
                                    $broadnews_featured_posts = broadnews_get_posts($broadnews_number_of_featured_news, $broadnews_category);
                                    if ($broadnews_featured_posts->have_posts()) :
                                        while ($broadnews_featured_posts->have_posts()) :
                                            $broadnews_featured_posts->the_post();
                                            global $post;
                                            ?>
                                            <div class="col-4 pad float-l ">
                                                <?php do_action('broadnews_action_loop_grid', $post->ID, 'grid-design-default', 'medium', true); ?>
                                            </div>
                                        <?php endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
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
                    echo parent::broadnews_generate_text_input('broadnews-featured-posts-title', __('Title', 'broadnews'), 'Posts Grid');
                    echo parent::broadnews_generate_select_options('broadnews-select-category', __('Select Category', 'broadnews'), $categories);
                    
                    
                }
                
               
                
                
            }
            
        }
    endif;